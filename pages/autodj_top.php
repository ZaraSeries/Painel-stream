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

$settingsq = mysql_query("SELECT * FROM settings WHERE id='0'") or die($messages["g5"]);
foreach (mysql_fetch_array($settingsq) as $key => $pref) {
    if (!is_numeric($key)) {
        $setting[$key] = stripslashes($pref);
    } 
}

$limit = $setting['display_limit'];
if (!isset($_GET['p'])) {
    $p = 0;
}
else {
    $p = $_GET['p'] * $limit;
}
$l = $p + $limit;
$select = mysql_query("SELECT * FROM servers WHERE owner='" . $loginun . "' ORDER BY id ASC LIMIT $p,$limit");

if ($_GET['action'] == "restart") {
            $pid = mysql_query("SELECT autopid FROM servers WHERE id='" . $_GET['id'] . "'");
            if (mysql_result($pid, 0) == "") {
              //  $errors[] = "<h2>" . $messages["334"] . "</h2>";
            }
            else {
    if ($setting["os"] == "linux") {
                    if ($setting["shellset"] == 'ssh2'){
                        $connection = ssh2_connect('localhost', $setting['ssh_port']);
                        ssh2_auth_password($connection, ''.base64_decode($setting['ssh_user']).'', ''.base64_decode($setting['ssh_pass']).'');
                        $ssh2_exec_com = ssh2_exec($connection, 'kill '.mysql_result($pid,0));
                        sleep(2);
                    }
                }
                }
            }



if (isset($_GET['id'])) {
    $radioport = mysql_query("SELECT portbase FROM servers WHERE id='" . $_GET['id'] . "' AND owner='" . $loginun . "'");
    if (mysql_num_rows($radioport) == 0) {
        header('Location: content.php?include=music&error=sc_trans_access');
        die ();
    }
    $autopid_check_sql = mysql_query("SELECT autopid FROM servers WHERE id='" . $_GET['id'] . "' AND owner='" . $loginun . "'");
    if (mysql_num_rows($autopid_check_sql) == 0) {
        header('Location: content.php?include=music&error=sc_trans_access');
        die ();
    }
    if (mysql_result($autopid_check_sql, 0) != "9999999") {
        if ($_GET['action'] == "restart") {
            $connection = @fsockopen($setting['host_add'], mysql_result($radioport, 0), $errno, $errstr, 1)  or $php_err .= "server doa";
            if ($connection) {
                fputs($connection, "GET /7.html HTTP/1.0\r\nUser-Agent: XML Getter (Mozilla Compatible)\r\n\r\n");
                while (!feof($connection))
                    $page .= fgets($connection, 1000);
                fclose($connection);
                $page = ereg_replace(".*<body>", "", $page);
                $page = ereg_replace("</body>.*", ",", $page);
                $numbers = explode(",", $page);
            }
            if (($numbers[1] == "1") || (!isset($_POST['pllist']))) {
                if ($numbers[1] == "1") {
                    $errors[] = "<h2>" . $messages["331"] . "</h2>";
                }
                if (!isset($_POST['pllist'])) {
                    $errors[] = "<h2>" . $messages["332"] . "</h2>";
                }
            }
            else {
                $serverdata = mysql_query("SELECT * FROM servers WHERE id='" . $_GET['id'] . "' AND portbase='" . mysql_result($radioport, 0) . "'");
                $ini_content = "";
                $ini_content .= "playlistfile=" . $setting['dir_to_cpanel'] . "temp/" . mysql_result($radioport, 0) . "/playlist/" . strip_tags(str_replace('/', '', $_POST['pllist'])) . "\n";
                foreach (mysql_fetch_array($serverdata) as $field => $value) {
                    if (!is_numeric($field) && $field != "id" && $field != "owner" && $field != "maxuser" && $field != "portbase" && $field != "adminpassword" && $field != "sitepublic" && $field != "realtime" && $field != "screenlog" && $field != "showlastsongs" && $field != "tchlog" && $field != "weblog" && $field != "w3cenable" && $field != "w3clog" && $field != "srcip" && $field != "destip" && $field != "yport" && $field != "namelookups" && $field != "relayport" && $field != "relayserver" && $field != "autodumpusers" && $field != "autodumpsourcetime" && $field != "contentdir" && $field != "introfile" && $field != "titleformat" && $field != "publicserver" && $field != "allowrelay" && $field != "allowpublicrelay" && $field != "metainterval" && $field != "abuse" && $field != "pid" && $field != "autopid" && $field != "webspace" && $field != "streamauthhash_1" && $field != "streamid_1" && field != "streampath_1" && $field != "streamauthhash_2" && $field != "streamid_2" && field != "streampath_2" && $field != "logfile" && $field != "banfile" && field != "ripfile" && $field != "yp2" && $field != "uvox2sourcedebug" && field != "urlformat")  {
                        $ini_content .= $field . "=" . $value . "\n";
                    }
                }
                if ($setting['os'] == 'linux') {
                    $filename = "temp/" . mysql_result($radioport, 0) . "/conf/sc_trans.conf";
                }
                $handle = fopen($filename, "w");
                chmod($filename, 0777);
                if (fwrite($handle, $ini_content) === FALSE) {
                    return false;
                }
                fclose($handle);
                if ($setting['os'] == 'linux') {

                    if ($setting["shellset"] == 'ssh2'){
                        $connection = ssh2_connect('localhost', $setting['ssh_port']);
                        ssh2_auth_password($connection, ''.base64_decode($setting['ssh_user']).'', ''.base64_decode($setting['ssh_pass']).'');
                        $ssh2_exec_com = ssh2_exec($connection, $setting["dir_to_cpanel"].'files/linux/sc_trans.bin '.$setting["dir_to_cpanel"].$filename.' </dev/null 2>/dev/null >/dev/null & echo $!');
                        sleep(4);
                        $pid = stream_get_contents($ssh2_exec_com);
                        if (!$pid || $pid == "") {
                            mysql_query("INSERT INTO notices (username,reason,message,ip) VALUES('".$loginun."','Server failure','The server with id ".mysql_real_escape_string($_GET['view'])." cannot start on port ".$serverdata['portbase']."','".$_SERVER['REMOTE_ADDR']."')");
                            echo "Could not start server, please contact administration using the contact form on your left";
                            echo "".$filename."";
                        }

                    }elseif($setting["shellset"] == 'shellexec'){
                        $pid = shell_exec("nohup " . $setting['dir_to_cpanel'] . "files/linux/sc_trans.bin " . $setting['dir_to_cpanel'] . $filename . " > /dev/null & echo $!");
                        sleep(4);
                    }
                    if (!$pid || $pid == "") {
                        mysql_query("INSERT INTO notices (username,reason,message,ip) VALUES('" . $loginun . "','Server failure','The server with id " . mysql_real_escape_string($_GET['view']) . " cannot start on port " . mysql_real_escape_string($serverdata['portbase']) . "','" . $_SERVER['REMOTE_ADDR'] . "')");
                        echo "Could not start server, please contact administration using the contact form on your left";
                        echo "" . $filename . "";
                    }
                }
                mysql_query("UPDATE servers SET autopid='$pid' WHERE id='" . $_GET['id'] . "'");
                $correc[] = "<h2>" . $messages["333"] . "</h2>";
                if ($setting["adj_config"] == "0") {
                    //unlink($filename);
                }
            }
        }
        elseif ($_GET['action'] == "stop") {
            $pid = mysql_query("SELECT autopid FROM servers WHERE id='" . $_GET['id'] . "'");
            if (mysql_result($pid, 0) == "") {
                $errors[] = "<h2>" . $messages["334"] . "</h2>";
            }
            else {
                if ($setting["os"] == "linux") {
                    if ($setting["shellset"] == 'ssh2'){
                        $connection = ssh2_connect('localhost', $setting['ssh_port']);
                        ssh2_auth_password($connection, ''.base64_decode($setting['ssh_user']).'', ''.base64_decode($setting['ssh_pass']).'');
                        $ssh2_exec_com = ssh2_exec($connection, 'kill '.mysql_result($pid,0));
                        sleep(2);
                    }elseif($setting["shellset"] == 'shellexec'){
                        $output = shell_exec("kill " . mysql_result($pid, 0));
                        sleep(2);
                    }
                }
                $notifi[] = "<h2>" . $messages["335"] . "</h2>";
            }
        }
        elseif ($_GET['action'] == "edit") {
            if (isset($_POST['submit'])) {
               $sqlquery_autodjupdate = mysql_query("UPDATE servers SET streamtitle='" . mysql_real_escape_string($_POST['titl']) . "',streamurl='" . mysql_real_escape_string($_POST['surl']) . "',genre='" . mysql_real_escape_string($_POST['genr']) . "',shuffle='" . mysql_real_escape_string($_POST['shuf']) . "',samplerate='" . mysql_real_escape_string($_POST['samp']) . "',public='" . mysql_real_escape_string($_POST['publ']) . "',channels='" . mysql_real_escape_string($_POST['chan']) . "',aim='" . mysql_real_escape_string($_POST['maim']) . "',icq='" . mysql_real_escape_string($_POST['micq']) . "',irc='" . mysql_real_escape_string($_POST['mirc']) . "',encoder='" . mysql_real_escape_string($_POST['encoder']) . "',mp3quality='" . mysql_real_escape_string($_POST['mp3quality']) . "',mp3mode='" . mysql_real_escape_string($_POST['mp3mode']) . "',displaymetadatapattern='" . mysql_real_escape_string($_POST['displaymetadatapattern']) . "',xfade='" . mysql_real_escape_string($_POST['xfade']) . "',xfadethreshol='" . mysql_real_escape_string($_POST['xfadethreshol']) . "' WHERE id='" . $_GET['id'] . "' AND portbase='" . mysql_result($radioport, 0) . "'");
               $correc[] = "<h2>" . $messages["336"] . " " . mysql_result($radioport, 0) . " " . $messages["336_pre"] . "</h2>";
               }

                $editsql = mysql_query("SELECT * FROM servers WHERE id='" . $_GET['id'] . "' AND portbase='" . mysql_result($radioport, 0) . "'");
                while ($editsqlrow = mysql_fetch_array($editsql)) {
                $formedit_port = $editsqlrow["portbase"];
                $formedit_pass = $editsqlrow["password"];
                $formedit_bitr = $editsqlrow["bitrate"];
                $formedit_titl = $editsqlrow["streamtitle"];
                $formedit_surl = $editsqlrow["streamurl"];
                $formedit_genr = $editsqlrow["genre"];
                $formedit_shuf = $editsqlrow["shuffle"];
                $formedit_samp = $editsqlrow["samplerate"];
                $formedit_publ = $editsqlrow["public"];
                $formedit_chan = $editsqlrow["channels"];
                $formedit_maim = $editsqlrow["aim"];
                $formedit_micq = $editsqlrow["icq"];
                $formedit_mirc = $editsqlrow["irc"];
                $formedit_encoder = $editsqlrow["encoder"];
                $formedit_mp3quality = $editsqlrow["mp3quality"];
                $formedit_mp3mode = $editsqlrow["mp3mode"];
                $formedit_calendarrewrite = $editsqlrow["calendarrewrite"];
                $formedit_outprotocol = $editsqlrow["outprotocol"];
                $formedit_displaymetadatapattern = $editsqlrow["displaymetadatapattern"];
                $formedit_xfade = $editsqlrow["xfade"];
                $formedit_xfadethreshol = $editsqlrow["xfadethreshol"];
                $formedit_djport_1 = $editsqlrow["djport_1"];
                $formedit_djlogin_1 = $editsqlrow["djlogin_1"];
                $formedit_djpassword_1 = $editsqlrow["djpassword_1"];
                $formedit_djpriority_1 = $editsqlrow["djpriority_1"];
                $formedit_djlogin_2 = $editsqlrow["djlogin_2"];
                $formedit_djpassword_2 = $editsqlrow["djpassword_2"];
                $formedit_djpriority_2 = $editsqlrow["djpriority_2"];
                $formedit_djlogin_3 = $editsqlrow["djlogin_3"];
                $formedit_djpassword_3 = $editsqlrow["djpassword_3"];
                $formedit_djpriority_3 = $editsqlrow["djpriority_3"];
                $formedit_djlogin_4 = $editsqlrow["djlogin_4"];
                $formedit_djpassword_4 = $editsqlrow["djpassword_4"];
                $formedit_djpriority_4 = $editsqlrow["djpriority_4"];
                $formedit_djlogin_5 = $editsqlrow["djlogin_5"];
                $formedit_djpassword_5 = $editsqlrow["djpassword_5"];
                $formedit_djpriority_5 = $editsqlrow["djpriority_5"];
                $formedit_djlogin_6 = $editsqlrow["djlogin_6"];
                $formedit_djpassword_6 = $editsqlrow["djpassword_6"];
                $formedit_djpriority_6 = $editsqlrow["djpriority_6"];
                $formedit_djlogin_7 = $editsqlrow["djlogin_7"];
                $formedit_djpassword_7 = $editsqlrow["djpassword_7"];
                $formedit_djpriority_7 = $editsqlrow["djpriority_7"];
                $formedit_djlogin_8 = $editsqlrow["djlogin_8"];
                $formedit_djpassword_8 = $editsqlrow["djpassword_8"];
                $formedit_djpriority_8 = $editsqlrow["djpriority_8"];
                $formedit_djlogin_9 = $editsqlrow["djlogin_9"];
                $formedit_djpassword_9 = $editsqlrow["djpassword_9"];
                $formedit_djpriority_9 = $editsqlrow["djpriority_9"];
                $formedit_djlogin_10 = $editsqlrow["djlogin_10"];
                $formedit_djpassword_10 = $editsqlrow["djpassword_10"];
                $formedit_djpriority_10 = $editsqlrow["djpriority_10"];
                $formedit_djlogin_11 = $editsqlrow["djlogin_11"];
                $formedit_djpassword_11 = $editsqlrow["djpassword_11"];
                $formedit_djpriority_11 = $editsqlrow["djpriority_11"];
                $formedit_djlogin_12 = $editsqlrow["djlogin_12"];
                $formedit_djpassword_12 = $editsqlrow["djpassword_12"];
                $formedit_djpriority_12 = $editsqlrow["djpriority_12"];
                $formedit_djlogin_13 = $editsqlrow["djlogin_13"];
                $formedit_djpassword_13 = $editsqlrow["djpassword_13"];
                $formedit_djpriority_13 = $editsqlrow["djpriority_13"];
                $formedit_djlogin_14 = $editsqlrow["djlogin_14"];
                $formedit_djpassword_14 = $editsqlrow["djpassword_14"];
                $formedit_djpriority_14 = $editsqlrow["djpriority_14"];
                $formedit_djlogin_15 = $editsqlrow["djlogin_15"];
                $formedit_djpassword_15 = $editsqlrow["djpassword_15"];
                $formedit_djpriority_15 = $editsqlrow["djpriority_15"];
                $formedit_djlogin_16 = $editsqlrow["djlogin_16"];
                $formedit_djpassword_16 = $editsqlrow["djpassword_16"];
                $formedit_djpriority_16 = $editsqlrow["djpriority_16"];
                $formedit_djlogin_17 = $editsqlrow["djlogin_17"];
                $formedit_djpassword_17 = $editsqlrow["djpassword_17"];
                $formedit_djpriority_17 = $editsqlrow["djpriority_17"];
                $formedit_djlogin_18 = $editsqlrow["djlogin_18"];
                $formedit_djpassword_18 = $editsqlrow["djpassword_18"];
                $formedit_djpriority_18 = $editsqlrow["djpriority_18"];
                $formedit_djlogin_19 = $editsqlrow["djlogin_19"];
                $formedit_djpassword_19 = $editsqlrow["djpassword_19"];
                $formedit_djpriority_19 = $editsqlrow["djpriority_19"];
                $formedit_djlogin_20 = $editsqlrow["djlogin_20"];
                $formedit_djpassword_20 = $editsqlrow["djpassword_20"];
                $formedit_djpriority_20 = $editsqlrow["djpriority_20"];
                $formedit_djlogin_21 = $editsqlrow["djlogin_21"];
                $formedit_djpassword_21 = $editsqlrow["djpassword_21"];
                $formedit_djpriority_21 = $editsqlrow["djpriority_21"];
                $formedit_djlogin_22 = $editsqlrow["djlogin_22"];
                $formedit_djpassword_22 = $editsqlrow["djpassword_22"];
                $formedit_djpriority_22 = $editsqlrow["djpriority_22"];
                $formedit_djlogin_23 = $editsqlrow["djlogin_23"];
                $formedit_djpassword_23 = $editsqlrow["djpassword_23"];
                $formedit_djpriority_23 = $editsqlrow["djpriority_23"];
                $formedit_djlogin_24 = $editsqlrow["djlogin_24"];
                $formedit_djpassword_24 = $editsqlrow["djpassword_24"];
                $formedit_djpriority_24 = $editsqlrow["djpriority_24"];
                $formedit_djlogin_25 = $editsqlrow["djlogin_25"];
                $formedit_djpassword_25 = $editsqlrow["djpassword_25"];
                $formedit_djpriority_25 = $editsqlrow["djpriority_25"];
                $formedit_djlogin_26 = $editsqlrow["djlogin_26"];
                $formedit_djpassword_26 = $editsqlrow["djpassword_26"];
                $formedit_djpriority_26 = $editsqlrow["djpriority_26"];
                $formedit_djlogin_27 = $editsqlrow["djlogin_27"];
                $formedit_djpassword_27 = $editsqlrow["djpassword_27"];
                $formedit_djpriority_27 = $editsqlrow["djpriority_27"];
                $formedit_djlogin_28 = $editsqlrow["djlogin_28"];
                $formedit_djpassword_28 = $editsqlrow["djpassword_28"];
                $formedit_djpriority_28 = $editsqlrow["djpriority_28"];
                $formedit_djlogin_29 = $editsqlrow["djlogin_29"];
                $formedit_djpassword_29 = $editsqlrow["djpassword_29"];
                $formedit_djpriority_29 = $editsqlrow["djpriority_29"];
                $formedit_djlogin_30 = $editsqlrow["djlogin_30"];
                $formedit_djpassword_30 = $editsqlrow["djpassword_30"];
                $formedit_djpriority_30 = $editsqlrow["djpriority_30"];
                $formedit_djbroadcasts = $editsqlrow["djbroadcasts"];
                 
            }
        }
    }
    else {
        $errors[] = "<h2>" . $messages["337"] . "</h2>";
    }
}


