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

?>
<h2><?php echo $messages["bt1"]; ?></h2>
<div class="contact_top_menu">
<div class="tool_top_menu">
    <div class="main_shorttool"><?php echo $messages["bt2"]; ?></div>
    <div class="main_righttool">
        <h2><?php echo "Bitrate Control";?></h2>

        <p><?php echo $messages["bt3"]; ?></p>

        <p>&nbsp;</p>
    </div>
</div>
<table width="100%"align="center" valign="center"><tr><td width="50%">

<?php
if ($setting["os"] == "linux") {

       if ($setting["shellset"] == 'ssh2'){                 


if ($connection = ssh2_connect('localhost', $setting['ssh_port'])) {
                            ssh2_auth_password($connection, ''.base64_decode($setting['ssh_user']).'', ''.base64_decode($setting['ssh_pass']).'');
$stream = ssh2_exec($connection, 'pgrep bitratecloop.sh');
stream_set_blocking($stream,true);
$buffer = fread($stream,1024);


if ($buffer) {
echo "<big><big><b>Bitrate Control aktiviert</b></big></big></td><td width='50%'><center><a href='content.php?include=bitratecontrol&action=stop' TITLE='Bitrate Control deaktivieren'><img src='./images/bcstop.png'></a></center>";
}
else
{




echo "<big><big><b>Bitrate Control deaktiviert</b></big></big></td><td width='50%'><center><a href='content.php?include=bitratecontrol&action=start' TITLE='Bitrate Contol aktivieren'><img src='./images/bcstart.png'></center>";






}


} else {
echo "fail: unable to establish connection\n";
}
echo '</td></tr></table>';

}






       if ($setting["shellset"] == 'shellexec'){                 

                       
$proz = shell_exec("pgrep bitratecloop.sh");
if ($proz) {
echo "<big><big><b>Bitrate Control ist aktiviert</b></big></big></td><td width='50%'><center><a href='content.php?include=bitratecontrol&action=stop' TITLE='Bitrate Contol deaktivieren'><img src='./images/bcstop.png'></a></center>";
} else {
echo "<big><big><b>Bitrate Control ist deaktiviert</b></big></big></td><td width='50%'><center><a href='content.php?include=bitratecontrol&action=start' TITLE='Bitrate Contol aktivieren'><img src='./images/bcstart.png'></center>";
}
echo '</td></tr></table>';

}



echo "<br><hr><center><big><b>Log</b></big></center><hr><a href='content.php?include=bitratecontrol&action=dellog' TITLE='Logfile l&ouml;schen'";
echo ' onClick="return confirm(\'Wollen Sie die Logdatei wirklich l&ouml;schen?\')"';
echo "><img src='images/del.gif'></a><br><big>";
$log = fopen("files/linux/bitratecontrol.log","r");
while(!feof($log))
   {
   $zeile = fgets($log,1024);
   echo $zeile."<br>";
   }
fclose($log);
echo "</big>";









}


















?>



