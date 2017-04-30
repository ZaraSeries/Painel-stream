<?PHP


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
                $errors[] = "<h2>" . $messages["334"] . "</h2>";
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
                    if (!is_numeric($field) && $field != "id" && $field != "owner" && $field != "maxuser" && $field != "portbase" && $field != "adminpassword" && $field != "sitepublic" && $field != "realtime" && $field != "screenlog" && $field != "songhistory" && $field != "tchlog" && $field != "weblog" && $field != "w3cenable" && $field != "w3clog" && $field != "srcip" && $field != "destip" && $field != "yport" && $field != "namelookups" && $field != "relayport" && $field != "relayserver" && $field != "autodumpusers" && $field != "autodumpsourcetime" && $field != "contentdir" && $field != "introfile" && $field != "titleformat" && $field != "publicserver" && $field != "allowrelay" && $field != "allowpublicrelay" && $field != "metainterval" && $field != "abuse" && $field != "pid" && $field != "autopid" && $field != "webspace" && $field != "streamauthhash_1" && $field != "streamid_1" && field != "streampath_1" && $field != "streamauthhash_2" && $field != "streamid_2" && field != "streampath_2" && $field != "logfile" && $field != "banfile" && field != "ripfile" && $field != "yp2" && $field != "uvox2sourcedebug" && field != "urlformat") {
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
               $sqlquery_autodjupdate = mysql_query("UPDATE servers SET calendarrewrite='" . mysql_real_escape_string($_POST['calendarrewrite']) . "',djcapture='" . mysql_real_escape_string($_POST['djcapture']) . "',djlogin_1='" . mysql_real_escape_string($_POST['djlogin_1']) . "',djpassword_1='" . mysql_real_escape_string($_POST['djpassword_1']) . "',djlogin_2='" . mysql_real_escape_string($_POST['djlogin_2']) . "',djpassword_2='" . mysql_real_escape_string($_POST['djpassword_2']) . "',djlogin_3='" . mysql_real_escape_string($_POST['djlogin_3']) . "',djpassword_3='" . mysql_real_escape_string($_POST['djpassword_3']) . "',djlogin_4='" . mysql_real_escape_string($_POST['djlogin_4']) . "',djpassword_4='" . mysql_real_escape_string($_POST['djpassword_4']) . "',djlogin_5='" . mysql_real_escape_string($_POST['djlogin_5']) . "',djpassword_5='" . mysql_real_escape_string($_POST['djpassword_5']) . "',djlogin_6='" . mysql_real_escape_string($_POST['djlogin_6']) . "',djpassword_6='" . mysql_real_escape_string($_POST['djpassword_6']) . "',djlogin_7='" . mysql_real_escape_string($_POST['djlogin_7']) . "',djpassword_7='" . mysql_real_escape_string($_POST['djpassword_7']) . "',djlogin_8='" . mysql_real_escape_string($_POST['djlogin_8']) . "',djpassword_8='" . mysql_real_escape_string($_POST['djpassword_8']) . "',djlogin_9='" . mysql_real_escape_string($_POST['djlogin_9']) . "',djpassword_9='" . mysql_real_escape_string($_POST['djpassword_9']) . "',djlogin_10='" . mysql_real_escape_string($_POST['djlogin_10']) . "',djpassword_10='" . mysql_real_escape_string($_POST['djpassword_10']) . "',djlogin_11='" . mysql_real_escape_string($_POST['djlogin_11']) . "',djpassword_11='" . mysql_real_escape_string($_POST['djpassword_11']) . "',djlogin_12='" . mysql_real_escape_string($_POST['djlogin_12']) . "',djpassword_12='" . mysql_real_escape_string($_POST['djpassword_12']) . "',djlogin_13='" . mysql_real_escape_string($_POST['djlogin_13']) . "',djpassword_13='" . mysql_real_escape_string($_POST['djpassword_13']) . "',djlogin_14='" . mysql_real_escape_string($_POST['djlogin_14']) . "',djpassword_14='" . mysql_real_escape_string($_POST['djpassword_14']) . "',djlogin_15='" . mysql_real_escape_string($_POST['djlogin_15']) . "',djpassword_15='" . mysql_real_escape_string($_POST['djpassword_15']) . "',djlogin_16='" . mysql_real_escape_string($_POST['djlogin_16']) . "',djpassword_16='" . mysql_real_escape_string($_POST['djpassword_16']) . "',djlogin_17='" . mysql_real_escape_string($_POST['djlogin_17']) . "',djpassword_17='" . mysql_real_escape_string($_POST['djpassword_17']) . "',djlogin_18='" . mysql_real_escape_string($_POST['djlogin_18']) . "',djpassword_18='" . mysql_real_escape_string($_POST['djpassword_18']) . "',djlogin_19='" . mysql_real_escape_string($_POST['djlogin_19']) . "',djpassword_19='" . mysql_real_escape_string($_POST['djpassword_19']) . "',djlogin_20='" . mysql_real_escape_string($_POST['djlogin_20']) . "',djpassword_20='" . mysql_real_escape_string($_POST['djpassword_20']) . "',djlogin_21='" . mysql_real_escape_string($_POST['djlogin_21']) . "',djpassword_21='" . mysql_real_escape_string($_POST['djpassword_21']) . "',djlogin_22='" . mysql_real_escape_string($_POST['djlogin_22']) . "',djpassword_22='" . mysql_real_escape_string($_POST['djpassword_22']) . "',djlogin_23='" . mysql_real_escape_string($_POST['djlogin_23']) . "',djpassword_23='" . mysql_real_escape_string($_POST['djpassword_23']) . "',djlogin_24='" . mysql_real_escape_string($_POST['djlogin_24']) . "',djpassword_24='" . mysql_real_escape_string($_POST['djpassword_24']) . "',djlogin_25='" . mysql_real_escape_string($_POST['djlogin_25']) . "',djpassword_25='" . mysql_real_escape_string($_POST['djpassword_25']) . "',djlogin_26='" . mysql_real_escape_string($_POST['djlogin_26']) . "',djpassword_26='" . mysql_real_escape_string($_POST['djpassword_26']) . "',djlogin_27='" . mysql_real_escape_string($_POST['djlogin_27']) . "',djpassword_27='" . mysql_real_escape_string($_POST['djpassword_27']) . "',djlogin_28='" . mysql_real_escape_string($_POST['djlogin_28']) . "',djpassword_28='" . mysql_real_escape_string($_POST['djpassword_28']) . "',djlogin_29='" . mysql_real_escape_string($_POST['djlogin_29']) . "',djpassword_29='" . mysql_real_escape_string($_POST['djpassword_29']) . "',djlogin_30='" . mysql_real_escape_string($_POST['djlogin_30']) . "',djpassword_30='" . mysql_real_escape_string($_POST['djpassword_30']) . "',djpriority_1='" . mysql_real_escape_string($_POST['djpriority_1']) . "',djpriority_2='" . mysql_real_escape_string($_POST['djpriority_2']) . "',djpriority_3='" . mysql_real_escape_string($_POST['djpriority_3']) . "',djpriority_4='" . mysql_real_escape_string($_POST['djpriority_4']) . "',djpriority_5='" . mysql_real_escape_string($_POST['djpriority_5']) . "',djpriority_6='" . mysql_real_escape_string($_POST['djpriority_6']) . "',djpriority_7='" . mysql_real_escape_string($_POST['djpriority_7']) . "',djpriority_8='" . mysql_real_escape_string($_POST['djpriority_8']) . "',djpriority_9='" . mysql_real_escape_string($_POST['djpriority_9']) . "',djpriority_10='" . mysql_real_escape_string($_POST['djpriority_10']) . "',djpriority_11='" . mysql_real_escape_string($_POST['djpriority_11']) . "',djpriority_12='" . mysql_real_escape_string($_POST['djpriority_12']) . "',djpriority_13='" . mysql_real_escape_string($_POST['djpriority_13']) . "',djpriority_14='" . mysql_real_escape_string($_POST['djpriority_14']) . "',djpriority_15='" . mysql_real_escape_string($_POST['djpriority_15']) . "',djpriority_16='" . mysql_real_escape_string($_POST['djpriority_16']) . "',djpriority_17='" . mysql_real_escape_string($_POST['djpriority_17']) . "',djpriority_18='" . mysql_real_escape_string($_POST['djpriority_18']) . "',djpriority_19='" . mysql_real_escape_string($_POST['djpriority_19']) . "',djpriority_20='" . mysql_real_escape_string($_POST['djpriority_20']) . "',djpriority_21='" . mysql_real_escape_string($_POST['djpriority_21']) . "',djpriority_22='" . mysql_real_escape_string($_POST['djpriority_22']) . "',djpriority_23='" . mysql_real_escape_string($_POST['djpriority_23']) . "',djpriority_24='" . mysql_real_escape_string($_POST['djpriority_24']) . "',djpriority_25='" . mysql_real_escape_string($_POST['djpriority_25']) . "',djpriority_26='" . mysql_real_escape_string($_POST['djpriority_26']) . "',djpriority_27='" . mysql_real_escape_string($_POST['djpriority_27']) . "',djpriority_28='" . mysql_real_escape_string($_POST['djpriority_28']) . "',djpriority_29='" . mysql_real_escape_string($_POST['djpriority_29']) . "',djpriority_30='" . mysql_real_escape_string($_POST['djpriority_30']) . "' WHERE id='" . $_GET['id'] . "' AND portbase='" . mysql_result($radioport, 0) . "'");
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
                $formedit_djcapture = $editsqlrow["djcapture"];
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
