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



if (!isset($_GET['action']) || $_GET['action'] !== "edit") {
    ?>
<h2><?php echo $messages["277"];?></h2>
<div class="contact_top_menu">
    <div class="tool_top_menu">
        <div class="main_shorttool"><?php echo $messages["278"];?></div>
        <div class="main_righttool">
            <h2><?php echo $messages["279"];?></h2>

            <p><?php echo $messages["280"];?></p>
        </div>
    </div>
    <table cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th><?php echo $messages["281"];?></th>
            <th><?php echo $messages["282"];?></th>
            <th><?php echo $messages["283"];?></th>
        </tr>
        </thead>
        <tbody>
            <?php
            if (mysql_num_rows($select) == 0) {
                echo "<tr>
							<td colspan=\"5\">" . $messages["284"] . "</td>
							</tr>";
							 
            }
            else {
                while ($data = mysql_fetch_array($select)) {
                        if ($data['autopid'] != "9999999") {
                        echo '<form action="content.php?include=autodj&id=' . $data['id'] . '&action=restart" method="post" name="sc_transform' . $data['portbase'] . '">
									<tr>
									<td><a href="http://' . $setting['host_add'] . ':' . $data['portbase'] . '/" target="_blank">' . $setting['host_add'] . '</a></td>
									<td><a href="http://' . $setting['host_add'] . ':' . $data['portbase'] . '/" target="_blank">' . $data['portbase'] . '</a></td>
									<td>';
							
				
								
                        define('entries_per_page', 100);
                        if (!isset($_GET['filecount']) or !is_numeric($_GET['filecount'])) $offset = 1;
                        else $offset = $_GET['filecount'];
                        if ($offset == 1) {
                            $listing_start = $offset * entries_per_page - entries_per_page;
                        }
                        else {
                            $listing_start = $offset * entries_per_page - entries_per_page + 3;
                        }
                        $listing_end = $offset * entries_per_page + 2;
                        $dirlisting = @scandir("./temp/" . $data['portbase'] . "/playlist/") or $errors[] = "";
                        if (!isset($dirlisting[$listing_start])) $errors[] = "";
                        echo '<select name="pllist" class="playlistselect"';
                        if (count($dirlisting) === 2) echo ' disabled';
                        echo '>';
  
                        //echo '<option class=\"playlistselectdrop\" value=\"">' . $messages["adb1"] . '</option>';
                        for ($i = $listing_start; $i <= $listing_end; $i++) {
                            if (($dirlisting[$i] != ".") and ($dirlisting[$i] != "..") and ($dirlisting[$i] != "")) {
                                echo "<option class=\"playlistselectdrop\" value=\"" . $dirlisting[$i] . "\">" . $dirlisting[$i] . "</option>";
                            }
                        }
                       
                   
                        if (count($dirlisting) === 2) echo "<option class=\"playlistselectdrop\" value=\"\">Keine Playlisten verf&uuml;gbar!</option>";
                        echo '</select>
									</td>
									<td><a href="javascript:document.sc_transform' . $data['portbase'] . '.submit()" TITLE="AutoDJ Neustart. Hier klicken zum neustarten!" onClick="return confirm(\'Wollen Sie den AutoDJ ' . $data['portbase'] . ' wirklich neustarten?\')"><img src="./images/restart.gif"></a></td>
									<td>
									<a href="content.php?include=autodj&id=' . $data['id'] . '&action=stop" TITLE="AutoDJ Stop. Hier klicken zum stoppen!" onClick="return confirm(\'Wollen Sie den AutoDJ ' . $data['portbase'] . ' wirklich stoppen?\')"><img src="./images/stop.gif"></a>';

                                    if ($user_level != 'dj'){
									echo '<a href="content.php?include=music&id=' . $data['id'] . '&action=edit" TITLE="Upload & Playliste konfigurieren"><img src="./images/playlist.gif"></a>
									
									<a href="content.php?include=dj&id=' . $data['id'] . '&action=edit" TITLE="DJ konfigurieren"><img src="./images/dj.png"></a>
									<a href="content.php?include=autodj&id=' . $data['id'] . '&action=edit" TITLE="AutoDJ konfigurieren"><img src="./images/edit.gif"></a></td>';
	

									
									
                                    }

                        echo '
									</tr>
									</form>';
                    }
                }
            }
            
            ?>
            
        </tbody>
    </table>
    <ul class="paginator">
        <?php
        if (mysql_num_rows($select) == 0) {
        }
        else {
            $page = mysql_num_rows(mysql_query("SELECT * FROM servers WHERE owner='" . $loginun . "'"));
            $i = 0;
            $page = mysql_num_rows(mysql_query("SELECT * FROM servers"));
            while ($page > "0") {
                echo "<li><a href=\"content.php?include=autodj&page=servers&p=";
                if (($p / $limit) == $i) {
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
} else {
 
 if ($setting['os'] == 'linux') {
$fileban = getcwd() . "/temp/" . $formedit_port ."/logs/banfile.ban";

}

$ban;
chmod($fileban, 0777);
if(is_dir( "/temp/" . $formedit_port ."/logs/banfile.ban")){ chmod( "/temp/" . $formedit_port ."/logs/banfile.ban",0777); }
         $gzp = fopen($fileban,"a");
         fwrite($gzp, $ban);
         fclose($gzp);
         
if ($setting['os'] == 'linux') {
$filerip = getcwd() . "/temp/" . $formedit_port ."/logs/ripfile.rip"; 

}

$rip;
chmod($filerip, 0777);
if(is_dir( "/temp/" . $formedit_port ."/logs/ripfile.rip")){ chmod( "/temp/" . $formedit_port ."/logs/ripfile.rip",0777); }
         $gzp = fopen($filerip,"a");
         fwrite($gzp, $rip);
         fclose($gzp);


if ($setting['os'] == 'linux') {
$filexml = getcwd() . "/temp/" . $formedit_port . "/calendar/calendar.xml";
}

unlink($filexml);

$xml .= "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n";
$xml .= "<eventlist>\r\n";
$xml .= "<event type=\"dj\">\r\n";
$xml .= "<dj archive=\"".$formedit_djpriority_1."\">".$formedit_djlogin_1."</dj>\r\n";
$xml .= "<calendar />\r\n";
$xml .= "</event>\r\n";
$xml .= "<event type=\"dj\">\r\n";
$xml .= "<dj archive=\"".$formedit_djpriority_2."\">".$formedit_djlogin_2."</dj>\r\n";
$xml .= "<calendar />\r\n";
$xml .= "</event>\r\n";
$xml .= "<event type=\"dj\">\r\n";
$xml .= "<dj archive=\"".$formedit_djpriority_3."\">".$formedit_djlogin_3."</dj>\r\n";
$xml .= "<calendar />\r\n";
$xml .= "</event>\r\n";
$xml .= "<event type=\"dj\">\r\n";
$xml .= "<dj archive=\"".$formedit_djpriority_4."\">".$formedit_djlogin_4."</dj>\r\n";
$xml .= "<calendar />\r\n";
$xml .= "</event>\r\n";
$xml .= "<event type=\"dj\">\r\n";
$xml .= "<dj archive=\"".$formedit_djpriority_5."\">".$formedit_djlogin_5."</dj>\r\n";
$xml .= "<calendar />\r\n";
$xml .= "</event>\r\n";
$xml .= "<event type=\"dj\">\r\n";
$xml .= "<dj archive=\"".$formedit_djpriority_6."\">".$formedit_djlogin_6."</dj>\r\n";
$xml .= "<calendar />\r\n";
$xml .= "</event>\r\n";
$xml .= "<event type=\"dj\">\r\n";
$xml .= "<dj archive=\"".$formedit_djpriority_7."\">".$formedit_djlogin_7."</dj>\r\n";
$xml .= "<calendar />\r\n";
$xml .= "</event>\r\n";
$xml .= "<event type=\"dj\">\r\n";
$xml .= "<dj archive=\"".$formedit_djpriority_8."\">".$formedit_djlogin_8."</dj>\r\n";
$xml .= "<calendar />\r\n";
$xml .= "</event>\r\n";
$xml .= "<event type=\"dj\">\r\n";
$xml .= "<dj archive=\"".$formedit_djpriority_9."\">".$formedit_djlogin_9."</dj>\r\n";
$xml .= "<calendar />\r\n";
$xml .= "</event>\r\n";
$xml .= "<event type=\"dj\">\r\n";
$xml .= "<dj archive=\"".$formedit_djpriority_10."\">".$formedit_djlogin_10."</dj>\r\n";
$xml .= "<calendar />\r\n";
$xml .= "</event>\r\n";
$xml .= "<event type=\"dj\">\r\n";
$xml .= "<dj archive=\"".$formedit_djpriority_11."\">".$formedit_djlogin_11."</dj>\r\n";
$xml .= "<calendar />\r\n";
$xml .= "</event>\r\n";
$xml .= "<event type=\"dj\">\r\n";
$xml .= "<dj archive=\"".$formedit_djpriority_12."\">".$formedit_djlogin_12."</dj>\r\n";
$xml .= "<calendar />\r\n";
$xml .= "</event>\r\n";
$xml .= "<event type=\"dj\">\r\n";
$xml .= "<dj archive=\"".$formedit_djpriority_13."\">".$formedit_djlogin_13."</dj>\r\n";
$xml .= "<calendar />\r\n";
$xml .= "</event>\r\n";
$xml .= "<event type=\"dj\">\r\n";
$xml .= "<dj archive=\"".$formedit_djpriority_14."\">".$formedit_djlogin_14."</dj>\r\n";
$xml .= "<calendar />\r\n";
$xml .= "</event>\r\n";
$xml .= "<event type=\"dj\">\r\n";
$xml .= "<dj archive=\"".$formedit_djpriority_15."\">".$formedit_djlogin_15."</dj>\r\n";
$xml .= "<calendar />\r\n";
$xml .= "</event>\r\n";
$xml .= "<event type=\"dj\">\r\n";
$xml .= "<dj archive=\"".$formedit_djpriority_16."\">".$formedit_djlogin_16."</dj>\r\n";
$xml .= "<calendar />\r\n";
$xml .= "</event>\r\n";
$xml .= "<event type=\"dj\">\r\n";
$xml .= "<dj archive=\"".$formedit_djpriority_17."\">".$formedit_djlogin_17."</dj>\r\n";
$xml .= "<calendar />\r\n";
$xml .= "</event>\r\n";
$xml .= "<event type=\"dj\">\r\n";
$xml .= "<dj archive=\"".$formedit_djpriority_18."\">".$formedit_djlogin_18."</dj>\r\n";
$xml .= "<calendar />\r\n";
$xml .= "</event>\r\n";
$xml .= "<event type=\"dj\">\r\n";
$xml .= "<dj archive=\"".$formedit_djpriority_19."\">".$formedit_djlogin_19."</dj>\r\n";
$xml .= "<calendar />\r\n";
$xml .= "</event>\r\n";
$xml .= "<event type=\"dj\">\r\n";
$xml .= "<dj archive=\"".$formedit_djpriority_20."\">".$formedit_djlogin_20."</dj>\r\n";
$xml .= "<calendar />\r\n";
$xml .= "</event>\r\n";
$xml .= "<event type=\"dj\">\r\n";
$xml .= "<dj archive=\"".$formedit_djpriority_21."\">".$formedit_djlogin_21."</dj>\r\n";
$xml .= "<calendar />\r\n";
$xml .= "</event>\r\n";
$xml .= "<event type=\"dj\">\r\n";
$xml .= "<dj archive=\"".$formedit_djpriority_22."\">".$formedit_djlogin_22."</dj>\r\n";
$xml .= "<calendar />\r\n";
$xml .= "</event>\r\n";
$xml .= "<event type=\"dj\">\r\n";
$xml .= "<dj archive=\"".$formedit_djpriority_23."\">".$formedit_djlogin_23."</dj>\r\n";
$xml .= "<calendar />\r\n";
$xml .= "</event>\r\n";
$xml .= "<event type=\"dj\">\r\n";
$xml .= "<dj archive=\"".$formedit_djpriority_24."\">".$formedit_djlogin_24."</dj>\r\n";
$xml .= "<calendar />\r\n";
$xml .= "</event>\r\n";
$xml .= "<event type=\"dj\">\r\n";
$xml .= "<dj archive=\"".$formedit_djpriority_25."\">".$formedit_djlogin_25."</dj>\r\n";
$xml .= "<calendar />\r\n";
$xml .= "</event>\r\n";
$xml .= "<event type=\"dj\">\r\n";
$xml .= "<dj archive=\"".$formedit_djpriority_26."\">".$formedit_djlogin_26."</dj>\r\n";
$xml .= "<calendar />\r\n";
$xml .= "</event>\r\n";
$xml .= "<event type=\"dj\">\r\n";
$xml .= "<dj archive=\"".$formedit_djpriority_27."\">".$formedit_djlogin_27."</dj>\r\n";
$xml .= "<calendar />\r\n";
$xml .= "</event>\r\n";
$xml .= "<event type=\"dj\">\r\n";
$xml .= "<dj archive=\"".$formedit_djpriority_28."\">".$formedit_djlogin_28."</dj>\r\n";
$xml .= "<calendar />\r\n";
$xml .= "</event>\r\n";
$xml .= "<event type=\"dj\">\r\n";
$xml .= "<dj archive=\"".$formedit_djpriority_29."\">".$formedit_djlogin_29."</dj>\r\n";
$xml .= "<calendar />\r\n";
$xml .= "</event>\r\n";
$xml .= "<event type=\"dj\">\r\n";
$xml .= "<dj archive=\"".$formedit_djpriority_30."\">".$formedit_djlogin_30."</dj>\r\n";
$xml .= "<calendar />\r\n";
$xml .= "</event>\r\n";
$xml .= "</eventlist>";
$xml;
chmod($filexml, 777);
if(is_dir("/temp/" . $formedit_port . "/calendar/calendar.xml")){ chmod("/temp/" . $formedit_port . "/calendar/calendar.xml",0777); } 
$gz = fopen($filexml,"a");
fwrite($gz, $xml);
fclose($gz);


?>

<h2><?php echo $messages["288"];?> <?php echo $formedit_port;?></h2>
<div class="contact_top_menu">
    <div class="tool_top_menu">
        <div class="main_shorttool"><?php echo $messages["289"];?></div>
        <div class="main_righttool">
            <h2><?php echo $messages["290"];?></h2>

            <p><?php echo $messages["291"];?></p>
        </div>
    </div>
    <form method="post" action="content.php?include=autodj&id=<?php echo $_GET['id'];?>&action=edit">
        <fieldset>
            <legend><?php echo $messages["292"];?></legend>
            <input class="submit" type="submit" name="submit" value="<?php echo $messages["329"];?>"/>
            <input class="submit" type="reset" value="<?php echo $messages["330"];?>"
                   onclick="document.location='content.php?include=autodj';"/>
            <div class="input_field">
                <label for="a"><?php echo $messages["293"];?></label>
                <input class="mediumfield" name="ip" type="text" value="<?php echo $setting['host_add'];?>"
                       disabled="disabled"/>
                <span class="field_desc"><?php echo $messages["294"];?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo $messages["295"];?></label>
                <input class="mediumfield" name="port" type="text" value="<?php echo $formedit_port;?>"
                       disabled="disabled"/>
                <span class="field_desc"><?php echo $messages["296"];?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo $messages["297"];?></label>
                <input class="mediumfield" name="pass" type="text" value="<?php echo $formedit_pass;?>"
                       disabled="disabled"/>
                <span class="field_desc"><?php echo $messages["298"];?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo $messages["299"];?></label>
                <input class="mediumfield" name="bitr" type="text" value="<?php echo $formedit_bitr;?>"
                       disabled="disabled"/>
                <span class="field_desc"><?php echo "Bitrate des Streams";?></span>
            </div>
            <div class="input_field">
                <label for="a15"><?php echo $messages["319"];?></label>
                <select class="formselect_loca" name="publ">
                    <option
                        value="1"<?php if ($formedit_publ == '1') echo " selected=\"selected\"";?>><?php echo $messages["dd7"]; ?></option>
                    <option
                        value="0"<?php if ($formedit_publ == '0') echo " selected=\"selected\"";?>><?php echo $messages["dd8"]; ?></option>
                </select>
                <span class="field_desc"><?php echo $messages["320"];?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo "Radio Slogan";?></label>
                <input class="mediumfield" name="titl" type="text" value="<?php echo $formedit_titl;?>"/>
                <span class="field_desc"><?php echo "Radio Slogan";?></span>
            </div>
            <div class="input_field">
                <label for="a6"><?php echo $messages["303"];?></label>
                <input class="mediumfield" name="surl" type="text" value="<?php echo $formedit_surl;?>"/>
                <span class="field_desc"><?php echo $messages["304"];?></span>
            </div>
            <div class="input_field">
                <label for="a7"><?php echo $messages["305"];?></label>
                <select class="formselect_loca" name="genr">
                <option value="Alternative"<?php if ($formedit_genr == 'Alternative') echo " selected=\"selected\"";?>><?php echo "Alternative"; ?></option>
                <option value="Fox"<?php if ($formedit_genr == 'Fox') echo " selected=\"selected\"";?>><?php echo "Fox"; ?></option>
                <option value="Schlager"<?php if ($formedit_genr == 'Schlager') echo " selected=\"selected\"";?>><?php echo "Schlager"; ?></option>
                <option value="Jazz"<?php if ($formedit_genr == 'Jazz') echo " selected=\"selected\"";?>><?php echo "Jazz"; ?></option>
                <option value="Dance"<?php if ($formedit_genr == 'Dance') echo " selected=\"selected\"";?>><?php echo "Dance"; ?></option>
                <option value="Disco"<?php if ($formedit_genr == 'Disco') echo " selected=\"selected\"";?>><?php echo "Disco"; ?></option>
                <option value="House"<?php if ($formedit_genr == 'House') echo " selected=\"selected\"";?>><?php echo "House"; ?></option>
                <option value="RnB"<?php if ($formedit_genr == 'RnB') echo " selected=\"selected\"";?>><?php echo "RnB"; ?></option>
                <option value="Rab"<?php if ($formedit_genr == 'Rab') echo " selected=\"selected\"";?>><?php echo "Rab"; ?></option>
                <option value="PoP"<?php if ($formedit_genr == 'PoP') echo " selected=\"selected\"";?>><?php echo "PoP"; ?></option>
                <option value="Dance PoP"<?php if ($formedit_genr == 'Dance PoP') echo " selected=\"selected\"";?>><?php echo "Dance PoP"; ?></option>
                <option value="World PoP"<?php if ($formedit_genr == 'World PoP') echo " selected=\"selected\"";?>><?php echo "World PoP"; ?></option>
                <option value="Rock"<?php if ($formedit_genr == 'Rock') echo " selected=\"selected\"";?>><?php echo "Rock"; ?></option>
                <option value="Techno"<?php if ($formedit_genr == 'Techno') echo " selected=\"selected\"";?>><?php echo "Techno"; ?></option>
                <option value="Querbeet"<?php if ($formedit_genr == 'Querbeet') echo " selected=\"selected\"";?>><?php echo "Querbeet"; ?></option>
                <option value="World"<?php if ($formedit_genr == 'World') echo " selected=\"selected\"";?>><?php echo "World"; ?></option>
                <option value="The 70s"<?php if ($formedit_genr == 'The 70s') echo " selected=\"selected\"";?>><?php echo "The 70s"; ?></option>
                <option value="The 80s"<?php if ($formedit_genr == 'The 80s') echo " selected=\"selected\"";?>><?php echo "The 80s"; ?></option>
                <option value="The 90s"<?php if ($formedit_genr == 'The 90s') echo " selected=\"selected\"";?>><?php echo "The 90s"; ?></option>
                <option value="Mixed"<?php if ($formedit_genr == 'Mixed') echo " selected=\"selected\"";?>><?php echo "Mixed"; ?></option>
                <option value="Mixe"<?php if ($formedit_genr == 'Mixe') echo " selected=\"selected\"";?>><?php echo "Mixe"; ?></option>
                <option value="Funradio-AutoDJ"<?php if ($formedit_genr == 'Funradio-AutoDJ') echo " selected=\"selected\"";?>><?php echo "Funradio-AutoDJ"; ?></option>
                </select>
                <span class="field_desc"><?php echo $messages["306"];?></span>
            </div>
            <div class="input_field">
                <label for="a8"><?php echo $messages["307"];?></label>
                <select class="formselect_loca" name="shuf">
                    <option
                        value="1"<?php if ($formedit_shuf == '1') echo " selected=\"selected\"";?>><?php echo $messages["dd1"]; ?></option>
                    <option
                        value="0"<?php if ($formedit_shuf == '0') echo " selected=\"selected\"";?>><?php echo $messages["dd2"]; ?></option>
                </select>
                <span class="field_desc"><?php echo $messages["308"];?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "Songanzeige";?></label>
                <select class="formselect_loca" name="displaymetadatapattern">
                <option value="%u"<?php if ($formedit_displaymetadatapattern == '%u') echo " selected=\"selected\"";?>><?php echo "Aus (Stream url)"; ?></option>
                <option value="%R"<?php if ($formedit_displaymetadatapattern == '%R') echo " selected=\"selected\"";?>><?php echo "Interpret"; ?></option>
                <option value="%N"<?php if ($formedit_displaymetadatapattern == '%N') echo " selected=\"selected\"";?>><?php echo "Titel"; ?></option>
                <option value="%R [-] %N"<?php if ($formedit_displaymetadatapattern == '%R [-] %N') echo " selected=\"selected\"";?>><?php echo "Interpret - Titel"; ?></option>
                <option value="%R [-] %N [-] %Y"<?php if ($formedit_displaymetadatapattern == '%R [-] %N [-] %Y') echo " selected=\"selected\"";?>><?php echo "Interpret - Titel - Jahr"; ?></option>
                </select>
                <span class="field_desc"><?php echo "Interpret - Titel";?></span>
            </div> 
            <div class="input_field">
                <label for="a13"><?php echo "Bandbreite";?></label>
                <select class="formselect_loca" name="samp">
        <option value="48000"<?php if ($formedit_samp == '48000') echo " selected=\"selected\"";?>>48000 Hz
        </option>
        <option value="44100"<?php if ($formedit_samp == '44100') echo " selected=\"selected\"";?>>44100 Hz
        </option>
        <option value="32000"<?php if ($formedit_samp == '32000') echo " selected=\"selected\"";?>>32000 Hz
        </option>
        <option value="24000"<?php if ($formedit_samp == '24000') echo " selected=\"selected\"";?>>24000 Hz
        </option>
        <option value="22025"<?php if ($formedit_samp == '22025') echo " selected=\"selected\"";?>>22025 Hz
        </option>
        <option value="16000"<?php if ($formedit_samp == '16000') echo " selected=\"selected\"";?>>16000 Hz
        </option>
        <option value="12000"<?php if ($formedit_samp == '12000') echo " selected=\"selected\"";?>>12000 Hz
        </option>
        <option value="11025"<?php if ($formedit_samp == '11025') echo " selected=\"selected\"";?>>11025 Hz
        </option>
        <option value="8000"<?php if ($formedit_samp == '8000') echo " selected=\"selected\"";?>>8000 Hz
        </option>
       </select>
                <span class="field_desc"><?php echo $messages["316"];?></span>
            </div>
            <div class="input_field">
                <label for="a5"><?php echo $messages["321"];?></label>
                               <select class="formselect_loca" name="chan">
               <option value="1"<?php if ($formedit_chan == '1') echo " selected=\"selected\"";?>><?php echo "Mono"; ?></option>
               <option value="2"<?php if ($formedit_chan == '2') echo " selected=\"selected\"";?>><?php echo "Stereo"; ?></option>
               </select>
                <span class="field_desc"><?php echo $messages["322"];?></span>
            </div>                        
            <div class="input_field">
               <label for="a19"><?php echo "Audio Format";?></label>
               <select class="formselect_loca" name="encoder">
               <option value="mp3"<?php if ($formedit_encoder == 'mp3') echo " selected=\"selected\"";?>><?php echo $messages["sct19"]; ?></option>
               <option value="aacp"<?php if ($formedit_encoder == 'aacp') echo " selected=\"selected\"";?>><?php echo $messages["sct20"]; ?></option>
               </select>
               <br>
               <label for="a19"><?php echo $messages["sct1"];?></label>
               <input class="mediumfield" name="encoder" type="text" value="<?php echo "Sie Senden mit dem ".$formedit_encoder." Format";?>"disabled="disabled"/>
               <span class="field_desc"><?php echo "Sendeformat MP3 / AACPlus";?></span>
            </div>
            <div class="input_field">
                <label for="a20"><?php echo $messages["sct2"];?></label>
                <select class="formselect_loca" name="mp3quality">
                <option value="0"<?php if ($formedit_mp3quality == '0') echo " selected=\"selected\"";?>><?php echo "Schnell (bevorzugt)"; ?></option>
                <option value="1"<?php if ($formedit_mp3quality == '1') echo " selected=\"selected\"";?>><?php echo "High Quality"; ?></option>
                </select>
                <span class="field_desc"><?php echo "Qualit&auml;t";?></span>
            </div>
            <div class="input_field">
                <label for="a21"><?php echo $messages["sct3"];?></label>
                 <select class="formselect_loca" name="mp3mode">
                  <option value="0"<?php if ($formedit_mp3mode == '0') echo " selected=\"selected\"";?>><?php echo "CBR"; ?></option>
                  </select>
                  <span class="field_desc"><?php echo "MP3Mode";?></span>
            </div>
               
            <div class="input_field">
                <label for="a18"><?php echo $messages["sct10"];?></label>
                <select class="formselect_loca" name="xfade">
                  <option value="2"<?php if ($formedit_xfade == '2') echo " selected=\"selected\"";?>><?php echo "kein xFade"; ?></option>
                  <option value="4"<?php if ($formedit_xfade == '4') echo " selected=\"selected\"";?>><?php echo "2 Sekunden"; ?></option>
                  <option value="6"<?php if ($formedit_xfade == '6') echo " selected=\"selected\"";?>><?php echo "4 Sekunden"; ?></option>
                  <option value="8"<?php if ($formedit_xfade == '8') echo " selected=\"selected\"";?>><?php echo "6 Sekunden"; ?></option>
                  </select>
                <span class="field_desc"><?php echo "Ein- und Ausblenden";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo $messages["sct11"];?></label>
                <select class="formselect_loca" name="xfadethreshol">
                  <option value="20"<?php if ($formedit_xfadethreshol == '20') echo " selected=\"selected\"";?>><?php echo "min. 20 Sekunden"; ?></option>
                  <option value="40"<?php if ($formedit_xfadethreshol == '40') echo " selected=\"selected\"";?>><?php echo "min. 40 Sekunden"; ?></option>
                  <option value="60"<?php if ($formedit_xfadethreshol == '60') echo " selected=\"selected\"";?>><?php echo "min. 60 Sekunden"; ?></option>
                  </select>
                <span class="field_desc"><?php echo "Titell&auml;nge Ein- und Ausblendung";?></span>
            </div>
            <div class="input_field">
                <label for="a16"><?php echo $messages["323"];?></label>
                <input class="mediumfield" name="maim" type="text" value="<?php echo $formedit_maim;?>"/>
                <span class="field_desc"><?php echo $messages["324"];?></span>
            </div>
            <div class="input_field">
                <label for="a17"><?php echo $messages["325"];?></label>
                <input class="mediumfield" name="micq" type="text" value="<?php echo $formedit_micq;?>"/>
                <span class="field_desc"><?php echo $messages["326"];?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo $messages["327"];?></label>
                <input class="mediumfield" name="mirc" type="text" value="<?php echo $formedit_mirc;?>"/>
                <span class="field_desc"><?php echo $messages["328"];?></span>
            </div>       
    
        
            
            <input class="submit" type="submit" name="submit" value="<?php echo $messages["329"];?>"/>
            <input class="submit" type="reset" value="<?php echo $messages["330"];?>"
                   onclick="document.location='content.php?include=autodj';"/>
        </fieldset>
    </form>
   
</div>
<?php } ?>