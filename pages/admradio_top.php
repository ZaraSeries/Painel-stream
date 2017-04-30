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

if ($_GET['new'] == "server") {
    $portexist = mysql_query("SELECT * FROM servers WHERE portbase='" . $_POST['portbase'] . "'");
    if (mysql_num_rows($portexist) > 0) {
        $nextportq = mysql_query("SELECT portbase FROM servers order by portbase DESC");
        $newport = mysql_result($nextportq, 0) + 2;
        $notifi[] = "<h2>Port " . $_POST['portbase'] . " " . $messages["169"] . ": " . $newport . "</h2>";
        $_POST['portbase'] = $newport;
    }
    if (is_numeric($_POST['portbase'])) {

        if (mysql_query("INSERT INTO servers (
		owner,
	    maxuser,
	    portbase,
	    bitrate,
	    adminpassword,
	    password,
	    djport_1,
	    sitepublic,
	    logfile,
	    realtime,
	    screenlog,
	    showlastsongs,
	    tchlog,
	    weblog,
	    w3cenable,
	    w3clog,
	    banfile,
	    ripfile,
	    srcip,
	    destip,
	    yport,
	    namelookups,
	    relayport,
	    relayserver,
	    autodumpusers,
	    autodumpsourcetime,
	    contentdir,
	    introfile,
	    titleformat,
	    urlformat,
	    publicserver,
	    allowrelay,
	    allowpublicrelay,
	    metainterval,
	    webspace,
	    serverip,
	    serverport,
	    streamtitle,
	    streamurl,
	    shuffle,
	    samplerate,
	    channels,
	    genre,
	    public,
	    autopid,
	    djbroadcasts,
        calendarfile) VALUES('" . $_POST['owner'] . "', '" . $_POST['maxuser'] . "', '" . $_POST['portbase'] . "', '" . $_POST['bitrate'] . "', '" . $_POST['adminpassword'] . "', '" . $_POST['password'] . "', '" . $_POST['djport_1'] . "', '" . $_POST['sitepublic'] . "', '" . getcwd() ."/temp/" . $_POST['portbase'] . "/logs/sc_" . $_POST['portbase'] . ".log', '" . $_POST['realtime'] . "', '" . $_POST['screenlog'] . "', '" . $_POST['showlastsongs'] . "', '" . $_POST['tchlog'] . "', '" . $_POST['weblog'] . "', '" . $_POST['w3cenable'] . "', '" . getcwd() ."/temp/" . $_POST['portbase'] . "/logs/w3c/sc_" . $_POST['portbase'] . ".log', '" . getcwd() ."/temp/" . $_POST['portbase'] . "/logs/banfile.ban', '" . getcwd() ."/temp/" . $_POST['portbase'] . "/logs/ripfile.rip', '" . $_POST['srcip'] . "', '" . $_POST['destip'] . "', '" . $_POST['yport'] . "', '" . $_POST['namelookups'] . "', '" . $_POST['relayport'] . "', '" . $_POST['relayserver'] . "', '" . $_POST['autodumpusers'] . "', '" . $_POST['autodumpsourcetime'] . "', '" . $_POST['contentdir'] . "', '" . $_POST['introfile'] . "', '" . $_POST['titleformat'] . "', '".$_POST['urlformat']."', '" . $_POST['publicserver'] . "', '" . $_POST['allowrelay'] . "', '" . $_POST['allowpublicrelay'] . "', '" . $_POST['metainterval'] . "', '" . ($_POST['webspace'] * 1024) . "', '127.0.0.1', '" . $_POST['portbase'] . "', 'The Best Radio', 'http://" . $setting['host_add'] . "', '1', '44100', '2', 'PoP', 'default', '" . $_POST['autopid'] . "', '" . getcwd() . "/temp/" . $_POST['portbase'] . "/recorded" . $_POST['djbroadcasts'] . "', '" . getcwd() ."/temp/" . $_POST['portbase'] . "/calendar/calendar.xml" . $_POST['calendarfile'] . "')")
        ) {
            $old = umask(0);
            @mkdir("./uploads/" . $_POST['portbase'] . "", 0777);
            @mkdir("./temp/" . $_POST['portbase'] . "", 0777);
            @mkdir("./temp/" . $_POST['portbase'] . "/conf", 0777);
            @mkdir("./temp/" . $_POST['portbase'] . "/recorded", 0777);
            @mkdir("./temp/" . $_POST['portbase'] . "/logs", 0777);
            @mkdir("./temp/" . $_POST['portbase'] . "/logs/w3c", 0777);
            @mkdir("./temp/" . $_POST['portbase'] . "/calendar", 0777);
            
            sleep(1);
            @mkdir("./temp/" . $_POST['portbase'] . "/playlist", 0777);
            umask($old);
            $correc[] = "<h2>" . $messages["170"] . "</h2>";
        } else {
            $errors[] = "<h2>" . $messages["171"] . "</h2>";
        }
    }
    else {
        $errors[] = "<h2>" . $messages["172"] . "</h2>";
    }
}



if ($setting['os'] == 'linux') {
$fileban = getcwd() . "/temp/" . $_POST['portbase'] ."/logs/banfile.ban";

}

$ban;
chmod($fileban, 0777);
if(is_dir( "/temp/" . $_POST['portbase'] ."/logs/banfile.ban")){ chmod( "/temp/" . $_POST['portbase'] ."/logs/banfile.ban",0777); }
         $gzp = fopen($fileban,"w");
         fwrite($gzp, $ban);
         fclose($gzp);
         
if ($setting['os'] == 'linux') {
$filerip = getcwd() . "/temp/" . $_POST['portbase'] ."/logs/ripfile.rip"; 

}

$rip;
chmod($filerip, 0777);
if(is_dir( "/temp/" . $_POST['portbase'] ."/logs/ripfile.rip")){ chmod( "/temp/" . $_POST['portbase'] ."/logs/ripfile.rip",0777); }
         $gzp = fopen($filerip,"w");
         fwrite($gzp, $rip);
         fclose($gzp);         
         


if ($setting['os'] == 'linux') {
$filepls1 = getcwd() ."/temp/" . $_POST['portbase'] ."/playlist/demoplaylist.lst";
$demo .= "".getcwd() ."/demo/Kalimba.mp3\r\n";
$demo .= "".getcwd() ."/demo/Sleep_Away.mp3\r\n";
}
$demo;
chmod($filepls1, 0777);
if(is_dir( "/temp/" . $_POST['portbase'] ."/playlist/demoplaylist.lst")){ chmod( "/temp/" . $_POST['portbase'] ."/playlist/demoplaylist.lst",0777); }
$gzd = fopen($filepls1,"w");
fwrite($gzd, $demo);
fclose($gzd);


if ($setting['os'] == 'linux') {
$filepls = getcwd() . "/temp/" . $_POST['portbase'] ."/playlist/record.lst";
unlink($filepls);
$pls .= "".getcwd() ."/temp/" . $_POST['portbase'] ."/recorded/*.mp3\r\n";
}

$pls;
chmod($filepls, 0100);
if(is_dir( "/temp/" . $_POST['portbase'] ."/playlist/recorded.lst")){ chmod( "/temp/" . $_POST['portbase'] ."/playlist/recorded.lst",0100); }
         $gzp = fopen($filepls,"a");
         fwrite($gzp, $pls);
         fclose($gzp);
         
         
if ($setting['os'] == 'linux') {
$fileindex = getcwd() ."/temp/" . $_POST['portbase'] ."/index.php";
$index .="<?PhP\r\n";
$index .= "Header('Location: ../index.php'); \r\n";
$index .= "?> \r\n";
}
$index;
chmod($fileindex, 0777);
if(is_dir( "/temp/" . $_POST['portbase'] ."/index.php")){ chmod( "/temp/" . $_POST['portbase'] ."/index.php",0777); }
$gzd = fopen($fileindex,"w");
fwrite($gzd, $index);
fclose($gzd);         
         
if ($setting['os'] == 'linux') {
$filehtaccess = getcwd() ."/temp/" . $_POST['portbase'] ."/.htaccess";
$htaccess .="DirectoryIndex index.php ../index.php\r\n";
}
$htaccess;
chmod($filehtaccess, 0777);
if(is_dir( "/temp/" . $_POST['portbase'] ."/.htaccess")){ chmod( "/temp/" . $_POST['portbase'] ."/.htaccess",0777); }
$gzd = fopen($filehtaccess,"w");
fwrite($gzd, $htaccess);
fclose($gzd);     





if ($_GET['new'] == "update") {
    $fields = "";
    $values = "";
    foreach ($_POST as $key => $value) {
        if ($key == "webspace") {
            $value = ($value * 1024);
        }

        if ($key != "submit" && $value != "" && $key != "id") {
            $fields .= $key . "='" . $value . "', ";
            $lastfield = $key;
            $lastvalue = $value;
        }
    }
    $fields = explode($lastfield, $fields);
    $fields = $fields['0'] . $lastfield . "='" . $lastvalue . "'";


    if (mysql_query("UPDATE servers SET $fields WHERE id='" . $_GET['view'] . "'")) {
        $correc[] = "<h2>" . $messages["173"] . "</h2>";
    }
    else {
        $errors[] = "<h2>" . $messages["174"] . "</h2>";
    }
}

if (isset($_GET['view'])) {
    $serverq = mysql_query("SELECT * FROM servers WHERE id='" . $_GET['view'] . "'");
    $serverdata = mysql_fetch_array($serverq);
    if (isset($_GET['action']) && $_GET['action'] == "start") {
        $radioport = mysql_query("SELECT portbase FROM servers WHERE id='" . $_GET['view'] . "'");
        if (mysql_num_rows($radioport) == 0) {
            $errors[] = "<h2>" . $messages["175"] . "</h2>";
        }
        else {
            $connection = @fsockopen($setting['host_add'], mysql_result($radioport, 0), $errno, $errstr, 1);
            if (!$connection) {
            }
            else {
                $pid = mysql_query("SELECT pid FROM servers WHERE id='" . $_GET['view'] . "'");
                if (mysql_result($pid, 0) == "") {
                    $errors[] = "<h2>" . $messages["176"] . "</h2>";
                }
                else {
                    
                    if ($setting["os"] == "linux") {

                         if ($messages["shell"] == 'ssh2'){
                             $connection = ssh2_connect('localhost', $setting['ssh_port']);
                             ssh2_auth_password($connection, '' . base64_decode($setting['ssh_user']) . '', '' . base64_decode($setting['ssh_pass']) . '');
                             $ssh2_exec_com = ssh2_exec($connection, 'kill ' . mysql_result($pid, 0));
                             sleep(1);
                         }elseif($messages["shell"] == 'shellexec'){
                             $output = shell_exec("kill " . mysql_result($pid, 0));
                             sleep(1);
                         }
                    }
                }
            }
            $connection = @fsockopen($setting['host_add'], mysql_result($radioport, 0), $errno, $errstr, 1)  or $php_err .= "server doa";
            if ($connection) {
                $notifi[] = "<h2>" . $messages["177"] . "</h2>";
            }
            else {
                $serverdata = mysql_query("SELECT * FROM servers WHERE id='" . $_GET['view'] . "' AND portbase='" . mysql_result($radioport, 0) . "'");
                $ini_content = "";
                foreach (mysql_fetch_array($serverdata) as $field => $value) {
                    if (!is_numeric($field) && $value != "" && $field != "id" && $field != "owner" && $field != "sitepublic" && $field != "abuse" && $field != "pid" && $field != "autopid" && $field != "webspace" && $field != "serverip" && $field != "serverport" && $field != "streamtitle" && $field != "streamurl" && $field != "shuffle" && $field != "samplerate" && $field != "channels" && $field != "genre" && $field != "public" && $field != "aim" && $field != "icq" && $field != "irc" && $field != "encoder" && $field != "mp3quality" && $field != "mp3mode" && $field != "djcapture" && $field != "calendarrewrite" && $field != "calendarfile" && $field != "outprotocol" && $field != "log" && $field != "useMetadata" && $field != "xfade" && $field != "xfadethreshol" && $field != "djport_1" && $field != "djlogin_1" && $field != "djpassword_1" && $field != "djlogin_2" && $field != "djpassword_2" && $field != "djlogin_3" && $field != "djpassword_3" && $field != "djlogin_4" && $field != "djpassword_4" && $field != "djlogin_5" && $field != "djpassword_5" && $field != "djlogin_6" && $field != "djpassword_6" && $field != "djlogin_7" && $field != "djpassword_7" && $field != "djlogin_8" && $field != "djpassword_8" && $field != "djlogin_9" && $field != "djpassword_9" && $field != "djlogin_10" && $field != "djpassword_10" && $field != "djlogin_11" && $field != "djpassword_11" && $field != "djlogin_12" && $field != "djpassword_12" && $field != "djlogin_13" && $field != "djpassword_13" && $field != "djlogin_14" && $field != "djpassword_14" && $field != "djlogin_15" && $field != "djpassword_15" && $field != "djlogin_16" && $field != "djpassword_16" && $field != "djlogin_17" && $field != "djpassword_17" && $field != "djlogin_18" && $field != "djpassword_18" && $field != "djlogin_19" && $field != "djpassword_19" && $field != "djlogin_20" && $field != "djpassword_20" && $field != "djlogin_21" && $field != "djpassword_21" && $field != "djlogin_22" && $field != "djpassword_22" && $field != "djlogin_23" && $field != "djpassword_23" && $field != "djlogin_24" && $field != "djpassword_24" && $field != "djlogin_25" && $field != "djpassword_25" && $field != "djlogin_26" && $field != "djpassword_26" && $field != "djlogin_27" && $field != "djpassword_27" && $field != "djlogin_28" && $field != "djpassword_28" && $field != "djlogin_29" && $field != "djpassword_29" && $field != "djlogin_30" && $field != "djpassword_30" && $field != "djpriority_1" && $field != "djpriority_2"&& $field != "djpriority_3" && $field != "djpriority_4" && $field != "djpriority_5" && $field != "djpriority_6" && $field != "djpriority_7" && $field != "djpriority_8" && $field != "djpriority_9" && $field != "djpriority_10" && $field != "djpriority_11" && $field != "djpriority_12" && $field != "djpriority_13" && $field != "djpriority_14" && $field != "djpriority_15" && $field != "djpriority_16" && $field != "djpriority_17" && $field != "djpriority_18" && $field != "djpriority_19" && $field != "djpriority_20" && $field != "djpriority_21" && $field != "djpriority_22" && $field != "djpriority_23" && $field != "djpriority_24" && $field != "djpriority_25" && $field != "djpriority_26" && $field != "djpriority_27" && $field != "djpriority_28" && $field != "djpriority_29" && $field != "djpriority_30" && $field != "djbroadcasts") {
                        $ini_content .= $field . "=" . $value . "\n";
                    }
                }
                if ($setting['os'] == 'linux') {
                    $filename = "temp/" . mysql_result($radioport, 0) . "/conf/sc_serv.conf";
                }
                if (!$handle = fopen($filename, 'w')) {
                    chmod($filename, 0777);
                    $errors[] = "<h2>" . $messages["178"] . "</h2>";
                    fclose($handle);
                }
                elseif (fwrite($handle, $ini_content) === FALSE) {
                    $errors[] = "<h2>" . $messages["179"] . "</h2>";
                    fclose($handle);
                }
                else {
                        if ($setting['os'] == 'linux') {

                            if ($setting["shellset"] == 'ssh2'){
                                $connection = ssh2_connect('localhost', $setting['ssh_port']);
                                ssh2_auth_password($connection, ''.base64_decode($setting['ssh_user']).'', ''.base64_decode($setting['ssh_pass']).'');
                                $ssh2_exec_com = ssh2_exec($connection, 'sudo -u '.base64_decode($setting['ssh_user']).' '.$setting["dir_to_cpanel"].'files/linux/sc_serv.bin '.$setting["dir_to_cpanel"].$filename.' </dev/null 2>/dev/null >/dev/null & echo $!');
                                sleep(4);
                                $pid = stream_get_contents($ssh2_exec_com);
                                if (!$pid || $pid == "") {
                                    mysql_query("INSERT INTO notices (username,reason,message,ip) VALUES('".mysql_real_escape_string($loginun)."','Server failure','The server with id ".mysql_real_escape_string($_GET['view'])." cannot start on port ".mysql_real_escape_string($serverdata['portbase'])."','".mysql_real_escape_string($_SERVER['REMOTE_ADDR'])."')");
                                    $errors[] = "<h2>".$messages["517"]."</h2>";
                                }

                            }elseif($setting["shellset"] == 'shellexec'){
                                $pid = shell_exec("nohup " . $setting['dir_to_cpanel'] . "files/linux/sc_serv.bin " . $setting['dir_to_cpanel'] . $filename . " > /dev/null & echo $!");
                            }

                            if (!$pid || $pid == "") {
                                mysql_query("INSERT INTO notices (username,reason,message,ip) VALUES('" . mysql_real_escape_string($loginun) . "','Server failure','The server with id " . mysql_real_escape_string($_GET['view']) . " cannot start on port " . mysql_real_escape_string($serverdata['portbase']) . "','" . mysql_real_escape_string($_SERVER['REMOTE_ADDR']) . "')");
                                $errors[] = "<h2>" . $messages["517"] . "</h2>";
                            }
                        }

                        mysql_query("UPDATE servers SET pid='$pid' WHERE id='" . $_GET['view'] . "'");
                        $correc[] = "<h2>" . $messages["518"] . "</h2>";
                        if ($setting["scs_config"] == "0") {
                        unlink($filename);
                    }
                }
            }
        }
    }
    
    //Anfang stop
	
        if (isset($_GET['action']) && $_GET['action'] == "stop") {
            $radioport = mysql_query("SELECT portbase FROM servers WHERE id='" . $_GET['view'] . "'");
            $connection = @fsockopen($setting['host_add'], mysql_result($radioport, 0), $errno, $errstr, 1);
            if (!$connection) {
                $errors[] = "<h2>" . $messages["519"] . "</h2>";
            }
            else {
                $pid = mysql_query("SELECT pid FROM servers WHERE id='" . $_GET['view'] . "'");
                if (mysql_result($pid, 0) == "") {
                    $errors[] = "<h2>" . $messages["520"] . "</h2>";
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
                    $notifi[] = "<h2>" . $messages["521"] . "</h2>";
                }
            }
        }


if (isset($_GET['manage'])) {
    if (isset($_GET['action'])) {
        $fields = "";
        $values = "";
        foreach ($_POST as $key => $value) {
            if ($key != "submit" && $value != "" && $key != "id") {
                $fields .= $key . "='" . $value . "', ";
                $lastfield = $key;
                $lastvalue = $value;
            }
        }
        $fields = explode($lastfield, $fields);
        $fields = $fields['0'] . $lastfield . "='" . $lastvalue . "'";
        if (mysql_query("UPDATE servers SET $fields WHERE id='" . $_GET['manage'] . "'")) {
            $correc[] = "<h2>" . $messages["522"] . "</h2>";
        }
        else {
            $errors[] = "<h2>" . $messages["523"] . "</h2>";
        }
    }
}
//Ende Stop	
    
    
    
    
    
    if (isset($_GET['action']) && $_GET['action'] == "delete") {








        $unlink_port_sql = mysql_query("SELECT portbase FROM servers WHERE id='" . $_GET['view'] . "'");





        $pid = mysql_query("SELECT pid FROM servers WHERE id='" . $_GET['view'] . "'");
        if (mysql_result($pid, 0) == "") {
        
         
            $errors[] = "<h2>" . $messages["182"] . "</h2>";
        
		}
        else {
            
            if ($setting["os"] == "linux") {

               
 if ($setting["shellset"] == 'ssh2'){


$connection = ssh2_connect('localhost', $setting['ssh_port']);
                            ssh2_auth_password($connection, ''.base64_decode($setting['ssh_user']).'', ''.base64_decode($setting['ssh_pass']).'');
                            $ssh2_exec_com = ssh2_exec($connection, 'kill '.mysql_result($pid, 0));
                            sleep(2);
$errors[] = "<h2>Server gestoppt</h2>";

}





                
elseif($setting["shellset"] == 'shellexec'){
                    $output = shell_exec("kill " . mysql_result($pid, 0));
                    sleep(1);
                }
            }
        }
        if (mysql_num_rows($unlink_port_sql) == 0) {
            $errors[] = "<h2>" . $messages["183"] . "</h2>";
        }
        else {
            while ($t_data = mysql_fetch_array($unlink_port_sql)) {
                $unlink_port_sql_port = $t_data['portbase'];
            }
            function delete_directory($dirname)
            {
                if (is_dir($dirname))
                    $dir_handle = opendir($dirname);
                if (!$dir_handle)
                    return false;
                while ($file = readdir($dir_handle)) {
                    if ($file != "." && $file != "..") {
                        if (!is_dir($dirname . "/" . $file))
                            @unlink($dirname . "/" . $file);
                        else
                            delete_directory($dirname . '/' . $file);
                    }
                }
                @closedir($dir_handle);
                @rmdir($dirname);
            }

            delete_directory("./uploads/" . $unlink_port_sql_port . "/");
            delete_directory("./temp/" . $unlink_port_sql_port . "/playlist/");
            delete_directory("./temp/" . $unlink_port_sql_port . "/");
            delete_directory("./temp/" . $_POST['portbase'] . "/conf", 0777);
            delete_directory("./temp/" . $unlink_port_sql_port . "/recorded", 0777);
            delete_directory("./temp/" . $_POST['portbase'] . "/logs", 0777);
            delete_directory("./temp/" . $_POST['portbase'] . "/logs/w3c", 0777);
            delete_directory("./temp/" . $unlink_port_sql_port . "/calendar", 0777);
            delete_directory("./temp/" . $unlink_port_sql_port . "/stream", 0777);
            
            if (mysql_query("DELETE FROM servers WHERE id='" . $_GET['view'] . "'")) {
                $correc[] = "<h2>" . $messages["184"] . "</h2>";
            }
            else {
                $errors[] = "<h2>" . $messages["185"] . "</h2>";
            }
        }
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
$listq = mysql_query("SELECT * FROM servers ORDER BY id ASC LIMIT $p,$limit");
if ($_GET['action'] == "update") {
    $updateget_data = mysql_query("SELECT * FROM servers WHERE id='" . $_GET['view'] . "'");
    if (mysql_num_rows($updateget_data) == 0) {
        $errors[] = "<h2>" . $messages["186"] . "</h2>";
        header('Location: edit_serv.php');
        die();
    }
}
