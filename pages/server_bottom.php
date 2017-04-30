<?PHP
/**
 * Streamers Admin Panel
 *
 * Originally written by Sebastian Graebner <djcrackhome>
 * Fixed and edited by David Schomburg <dave>
 *
 * The Streamers Admin Panel is a web-based administration interface for
 * Nullsoft, Inc.'s SHOUTcast Distributed Network Audio Server (DNAS),
 * and is intended for use on the Linux-distribution Debian.
 *
 * LICENSE: This work is licensed under the Creative Commons Attribution-
 * ShareAlike 3.0 Unported License. To view a copy of this license, visit
 * http://creativecommons.org/licenses/by-sa/3.0/ or send a letter to
 * Creative Commons, 444 Castro Street, Suite 900, Mountain View, California,
 * 94041, USA.
 *
 * @author     Sebastian Graebner <djcrackhome@streamerspanel.com>
 * @author     David Schomburg <dave@streamerspanel.com>
 * @copyright  2009-2012  S. Graebner <djcrackhome> D. Schomburg <dave>
 * @license    http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution-ShareAlike 3.0 Unported License
 * @link       http://www.streamerspanel.com

 */

if (stripos($_SERVER['PHP_SELF'], 'content.php') === false) { 
    die ("You can't access this file directly...");
}

$limit = $setting['display_limit'];
if (!isset($_GET['p'])) {
	$p = 0;
}
else {
	$p = $_GET['p'] * $limit; 
}
$l = $p + $limit;

if ($user_level == 'Super Administrator') {

    $listq = mysql_query("SELECT * FROM servers ORDER BY id ASC LIMIT $p,$limit");
}else{
    $listq = mysql_query("SELECT * FROM servers WHERE owner='".$loginun."' ORDER BY id ASC LIMIT $p,$limit");
}



if (!isset($_GET['manage'])) {
?>
		<h2><?php echo $messages["433"];?></h2>
			<div class="contact_top_menu">
				<div class="tool_top_menu">
					<div class="main_shorttool"><?php echo $messages["434"];?></div>
					<div class="main_righttool">
						<h2><?php echo $messages["435"];?></h2>
						<p><?php echo $messages["436"];?></p>
						<p>&nbsp;</p>
					</div>
				</div>
				<table cellspacing="0" cellpadding="0">
					<thead>
						<tr>

                            <?php   if ($user_level == 'Super Administrator') { echo "<th>".$messages["add439"]."</th>";} ?>
                            <th><?php echo $messages["437"];?></th>
							<th><?php echo $messages["438"];?></th>
							<th><?php echo $messages["439"];?></th>

							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if (mysql_num_rows($listq)==0) {
							echo "<tr>
								<td colspan=\"5\">".$messages["440"]."</td>
								</tr>";
						}
						else {
							while($data = mysql_fetch_array($listq)) {

                                echo "<tr>";
                                if ($user_level == 'Super Administrator') { echo "<td>".$data['owner']."</td>";}
                                echo '
									<td><a href="http://'.$setting['host_add'].':'.$data['portbase'].'/" target="_blank">'.$setting['host_add'].'</a></td>
									<td><a href="http://'.$setting['host_add'].':'.$data['portbase'].'/" target="_blank">'.$data['portbase'].'</a></td>
									<td><div class="space_show" style="background-position:';
								if (file_exists("./uploads/".$data['portbase']."/")) {
									$dir = "./uploads/".$data['portbase']."/";
									$filesize = 0;
									if(is_dir($dir)) {
										if($dp = opendir($dir)) {
											while( $filename = readdir($dp) ) {
												if(($filename == '.') || ($filename == '..'))
													continue;
												$filedata = stat($dir."/".$filename);
												$filesize += $filedata[7];
											}
											$actual_dir_size = $filesize/1024;
										}
									}
								}
								$negative_background_pos = ($actual_dir_size/$data['webspace'])*120;
if (!@$fp = fsockopen($setting['host_add'], $data['portbase'], $errno, $errstr, 1)){
$online = '1';
} else {
$online = '';
}



								echo '-'.$negative_background_pos.'px 0px;"></div></td>
									<td>';
if ($online) {
echo '<a href="content.php?include=server&view='.$data["id"].'&action=start" TITLE="Server ist nicht gestartet. Hier klicken zum starten!" onClick="return confirm(\'Wollen Sie den Server ' . $data['portbase'] . ' wirklich starten?\')"><img src="./images/inaktiv.gif" alt="Server gestoppt"></a>';
}
else {
echo '<a href="content.php?include=server&view='.$data["id"].'&action=stop" TITLE="Server l&auml;uft. Hier klicken zum stoppen!" onClick="return confirm(\'Wollen Sie den Server ' . $data['portbase'] . ' wirklich stoppen?\')"><img src="./images/ok.gif" alt="Server gestartet"></a>';

}
echo '<a href="content.php?include=server&manage='.$data["id"].'" TITLE="Server konfigurieren"><img src="./images/edit.gif"></a>';




echo '</td>




									</tr>';
							}
						}
						?>
					</tbody>
				</table>
				<ul class="paginator">
					<?php
					if (mysql_num_rows($listq)==0) { }
					else {
					$page = mysql_num_rows(mysql_query("SELECT * FROM servers WHERE owner='".$loginun."'"));
					$i = 0;
					$page = mysql_num_rows(mysql_query("SELECT * FROM servers"));
					while($page > "0") {
						echo "<li><a href=\"content.php?include=server&p=";
						if (($p / $limit) == $i){
							echo "";
						}
						echo "$i\">$i</a></li>";
						$i++;
						$page -= $limit;
						}
					}
					?>
				</ul>
			</div>

<?php 
}
else {

	?>

		<h2><?php echo $messages["444"];?> <?php if ($user_level=="Super Administrator")	{ $portquery = mysql_fetch_object(mysql_query("SELECT portbase FROM servers WHERE id='".$_GET['manage']."'"));	echo $portquery->portbase; } else { $portquery = mysql_fetch_object(mysql_query("SELECT portbase FROM servers WHERE owner='".$loginun."' AND id='".$_GET['manage']."'")); echo $portquery->portbase; }?></h2>
		<div class="contact_top_menu">
			<div class="tool_top_menu">
				<div class="main_shorttool"><?php echo $messages["445"];?></div>
				<div class="main_righttool">
					<h2><?php echo $messages["446"];?></h2>
					<p><?php echo $messages["447"];?></p>
				</div>
			</div>
		<form method="post" action="content.php?include=server&manage=<?php echo $_GET['manage'];?>&action=edit">
		  <fieldset>
			<legend><?php echo $messages["448"];?></legend>
			<input class="submit" type="submit" name="submit" value="<?php echo $messages["449"];?>" />
					<input class="submit" type="reset" value="<?php echo $messages["450"];?>" onclick="document.location='content.php?include=server';" />
				<?php
					if (isset($_GET['manage'])) {
						$server= mysql_query("SELECT * FROM servers WHERE id='".$_GET['manage']."'");
						foreach (mysql_fetch_array($server) as $field => $value) {
							if (!is_numeric($field) && $field != "id" && $field != "abuse" && $field != "pid" && $field != "autopid" && $field != "webspace" && $field != "serverip" && $field != "serverport" && $field != "streamtitle" && $field != "streamurl" && $field != "shuffle" && $field != "samplerate" && $field != "channels" && $field != "genre" && $field != "public" && $field != "aim" && $field != "icq" && $field != "irc" && $field != "encoder" && $field != "mp3quality" && $field != "mp3mode" && $field != "calendarrewrite" && $field != "calendarfile" && $field != "outprotocol" && $field != "useMetadata" && $field != "playlistfile" && $field != "xfade" && $field != "xfadethreshol" && $field != "djport_1" && $field != "djlogin_1" && $field != "djpassword_1" && $field != "djport_2" && $field != "djlogin_2" && $field != "djpassword_2" && $field != "djlogin_3" && $field != "djpassword_3" && $field != "djlogin_4" && $field != "djpassword_4" && $field != "djlogin_5" && $field != "djpassword_5" && $field != "djlogin_6" && $field != "djpassword_6" && $field != "djlogin_7" && $field != "djpassword_7" && $field != "djlogin_8" && $field != "djpassword_8" && $field != "djlogin_9" && $field != "djpassword_9" && $field != "djlogin_10" && $field != "djpassword_10" && $field != "djlogin_11" && $field != "djpassword_11" && $field != "djlogin_12" && $field != "djpassword_12" && $field != "djlogin_13" && $field != "djpassword_13" && $field != "djlogin_14" && $field != "djpassword_14" && $field != "djlogin_15" && $field != "djpassword_15" && $field != "djlogin_16" && $field != "djpassword_16" && $field != "djlogin_17" && $field != "djpassword_17" && $field != "djlogin_18" && $field != "djpassword_18" && $field != "djlogin_19" && $field != "djpassword_19" && $field != "djlogin_20" && $field != "djpassword_20" && $field != "djlogin_21" && $field != "djpassword_21" && $field != "djlogin_22" && $field != "djpassword_22" && $field != "djlogin_23" && $field != "djpassword_23" && $field != "djlogin_24" && $field != "djpassword_24" && $field != "djlogin_25" && $field != "djpassword_25" && $field != "djlogin_26" && $field != "djpassword_26" && $field != "djlogin_27" && $field != "djpassword_27" && $field != "djlogin_28" && $field != "djpassword_28" && $field != "djlogin_29" && $field != "djpassword_29" && $field != "djlogin_30" && $field != "djpassword_30" && $field != "djpriority_1" && $field != "djpriority_2"&& $field != "djpriority_3" && $field != "djpriority_4" && $field != "djpriority_5" && $field != "djpriority_6" && $field != "djpriority_7" && $field != "djpriority_8" && $field != "djpriority_9" && $field != "djpriority_10" && $field != "djpriority_11" && $field != "djpriority_12" && $field != "djpriority_13" && $field != "djpriority_14" && $field != "djpriority_15" && $field != "djpriority_16" && $field != "djpriority_17" && $field != "djpriority_18" && $field != "djpriority_19" && $field != "djpriority_20" && $field != "djpriority_21" && $field != "djpriority_22" && $field != "djpriority_23" && $field != "djpriority_24" && $field != "djpriority_25" && $field != "djpriority_26" && $field != "djpriority_27" && $field != "djpriority_28" && $field != "djpriority_29" && $field != "djpriority_30" && $field != "djbroadcasts"  && $field != "unlockkeyname" && $field != "unlockkeycode" && $field != "metadatapattern" && $field != "yport" && $field != "yp2" && $field != "uvox2sourcedebug" && $field !="displaymetadatapattern" && $field != "useMetadata" && $field != "log" && $field != "srcip" && $field != "destip" && $field != "contentdir" && $field != "metainterval" && $field != "flashpolicyfile" && $field != "yppath" && $field != "uvoxcihperkey" && $field != "djcapture" && $field != "uvoxradiometadata" && $field != "uvoxnewmetadata"  && $field != "logfile" && $field != "w3clog" && $field != "banfile" && $field != "ripfile" && $field != "sitepublic" && $field != "logfile" && $field != "realtime" && $field != "screenlog" && $field != "tchlog" && $field != "weblog" && $field != "w3cenable" && $field != "autodumpusers" && $field != "autodumpsourcetime" && $field != "publicserver" && $field != "url") {
								echo "<div class=\"input_field\">
									<label for=\"a\">";
								if ($field == "owner") echo $messages["451"];
								if ($field == "maxuser") echo $messages["452"];
								if ($field == "portbase") echo $messages["453"];
								if ($field == "bitrate") echo "Streambitrate";
								if ($field == "adminpassword") echo $messages["455"];
								if ($field == "password") echo $messages["456"];
								if ($field == "sitepublic") echo $messages["457"]; 
								if ($field == "logfile") echo $messages["458"];
								if ($field == "realtime") echo $messages["459"];
								if ($field == "screenlog") echo $messages["460"];
								if ($field == "showlastsongs") echo $messages["461"];
								if ($field == "tchlog") echo $messages["462"];
								if ($field == "weblog") echo $messages["463"];
								if ($field == "w3cenable") echo $messages["464"];
								if ($field == "w3clog") echo $messages["465"];
								if ($field == "srcip") echo $messages["466"];
								if ($field == "destip") echo $messages["467"];
								if ($field == "namelookups") echo $messages["469"];
								if ($field == "relayport") echo $messages["470"];
								if ($field == "relayserver") echo $messages["471"];
								if ($field == "autodumpusers") echo $messages["472"];
								if ($field == "autodumpsourcetime") echo $messages["473"];
								if ($field == "contentdir") echo $messages["474"];
								if ($field == "introfile") echo $messages["475"];
								if ($field == "titleformat") echo $messages["476"];
								if ($field == "urlformat") echo $messages["urlformat"];
								if ($field == "publicserver") echo $messages["477"];
								if ($field == "allowrelay") echo $messages["478"];
								if ($field == "allowpublicrelay") echo $messages["479"];
								if ($field == "metainterval") echo $messages["480"];
								if ($field == "banfile") echo "Banfile";
								if ($field == "ripfile") echo "Ripfile";
								
								

								echo "</label>";
								if (($field == "owner") || ($field == "portbase") || ($field == "banfile") || ($field == "ripfile") || ($field == "w3clog") || ($field == "logfile") || ($field == "maxuser") || ($field == "bitrate")) {
									echo "<input class=\"mediumfield\" name=\"".$field."\" type=\"text\" disabled=\"disabled\" value=\"".$value."\" />";
								}
								else {
									echo "<input class=\"mediumfield\" name=\"".$field."\" type=\"text\" value=\"".$value."\" />";
								}
								echo "<span class=\"field_desc\">";
								if ($field == "owner") echo $messages["481"];
								if ($field == "maxuser") echo $messages["482"];
								if ($field == "portbase") echo $messages["483"];
								if ($field == "bitrate") echo "Maximale Bitrate AutoDJ/Radioservers";
								if ($field == "adminpassword") echo $messages["485"];
								if ($field == "password") echo $messages["486"];
								if ($field == "sitepublic") echo $messages["487"];
								if ($field == "logfile") echo $messages["488"];
								if ($field == "realtime") echo $messages["489"];
								if ($field == "screenlog") echo $messages["490"];
								if ($field == "showlastsongs") echo $messages["491"];
								if ($field == "tchlog") echo $messages["492"];
								if ($field == "weblog") echo $messages["493"];
								if ($field == "w3cenable") echo $messages["494"];
								if ($field == "w3clog") echo $messages["495"];
								if ($field == "srcip") echo $messages["496"];
								if ($field == "destip") echo $messages["497"];
								if ($field == "namelookups") echo $messages["499"];
								if ($field == "relayport") echo $messages["500"];
								if ($field == "relayserver") echo $messages["501"];
								if ($field == "autodumpusers") echo $messages["502"];
								if ($field == "autodumpsourcetime") echo $messages["503"];
								if ($field == "contentdir") echo $messages["504"];
								if ($field == "introfile") echo $messages["505"];
								if ($field == "titleformat") echo $messages["506"];
								if ($field == "urlformat") echo $messages["urlformat1"];
								if ($field == "publicserver") echo $messages["507"];
								if ($field == "allowrelay") echo $messages["508"];
								if ($field == "allowpublicrelay") echo $messages["509"];
								if ($field == "metainterval") echo $messages["510"];
								if ($field == "yp2") echo "Shoutcast2 YP2";
								if ($field == "banfile") echo "Banfile";
								if ($field == "ripfile") echo "Ripfile";
								
								
								echo "</span>
									</div>";
							}
						}
					}
					?>
					<input class="submit" type="submit" name="submit" value="<?php echo $messages["449"];?>" />
					<input class="submit" type="reset" value="<?php echo $messages["450"];?>" onclick="document.location='content.php?include=server';" />
				</fieldset>
			</form>
		</div>
<?php 
}?>