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
 if ($user_level != "Super Administrator") {

die ("Access denied");
}

if (stripos($_SERVER['PHP_SELF'], 'content.php') === false) {
    die ("You can't access this file directly...");
}

$settingsq = mysql_query("SELECT * FROM settings WHERE id='0'") or die($messages["g5"]);
foreach (mysql_fetch_array($settingsq) as $key => $pref) {
    if (!is_numeric($key)) {
        $setting[$key] = stripslashes($pref);
    }
}

 
if ($setting["os"] == "linux") {

if (isset($_GET['action']) && $_GET['action'] == "dellog") {
fopen("files/linux/bitratecontrol.log", "w+");  
fclose($handle);
}






       if ($setting["shellset"] == 'ssh2'){                 


   
    if (isset($_GET['action']) && $_GET['action'] == "stop") {


if ($connection = ssh2_connect('localhost', $setting['ssh_port'])) {
                            ssh2_auth_password($connection, ''.base64_decode($setting['ssh_user']).'', ''.base64_decode($setting['ssh_pass']).'');
$stream = ssh2_exec($connection, 'pgrep bitratecloop.sh');
stream_set_blocking($stream,true);
$buffer = fread($stream,1024);
}
if ($buffer) {
$ssh2_exec_com = ssh2_exec($connection, 'kill '.$buffer.' ');
}
}



if (isset($_GET['action']) && $_GET['action'] == "start") {

$lines = file ("files/linux/bitratecloop.sh");
$lines[1] = "pfad=\"".$setting['dir_to_cpanel']."\"\n";
$handle = fopen ("files/linux/bitratecloop.sh", "w");
fwrite($handle, implode('',$lines));
fclose($handle);
$lines = file ("files/linux/bitratecontrol.sh");
$lines[2] = "\$pfad=\"".$setting['dir_to_cpanel']."\";\n";
$handle = fopen ("files/linux/bitratecontrol.sh", "w");
fwrite($handle, implode('',$lines));
fclose($handle);

if ($connection = ssh2_connect('localhost', $setting['ssh_port'])) {
                            ssh2_auth_password($connection, ''.base64_decode($setting['ssh_user']).'', ''.base64_decode($setting['ssh_pass']).'');

$ssh2_exec_com = ssh2_exec($connection, 'cd '.$setting["dir_to_cpanel"].'files/linux && ./bitratecloop.sh &');
}
}



}
       if ($setting["shellset"] == 'shellexec'){                 



if (isset($_GET['action']) && $_GET['action'] == "stop") {


                            
$proz = shell_exec("pgrep bitratecloop.sh");

if ($proz) {
$output = shell_exec("kill ".$proz." ");
}
}



if (isset($_GET['action']) && $_GET['action'] == "start") {

$lines = file ("files/linux/bitratecloop.sh");
$lines[1] = "pfad=\"".$setting['dir_to_cpanel']."\"\n";
$handle = fopen ("files/linux/bitratecloop.sh", "w");
fwrite($handle, implode('',$lines));
fclose($handle);
$lines = file ("files/linux/bitratecontrol.sh");
$lines[2] = "\$pfad=\"".$setting['dir_to_cpanel']."\";\n";
$handle = fopen ("files/linux/bitratecontrol.sh", "w");
fwrite($handle, implode('',$lines));
fclose($handle);



$output = shell_exec("nohup ".$setting['dir_to_cpanel']."files/linux/bitratecloop.sh > /dev/null 2> /dev/null &");
}




}

} else {
die ('Diese Funktion ist leider nur f&uuml;r Linux verf&uuml;gbar');
}