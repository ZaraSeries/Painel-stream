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

// Anfang Server Restart
	 		if (isset($_GET['action']) && $_GET['action']=="restart") {
			$radioport = mysql_query("SELECT portbase FROM servers WHERE id='".$_GET['view']."' AND owner='".$loginun."'");
			if (mysql_num_rows($radioport)==0) {
				$errors[] = "<h2>".$messages["175"]."</h2>";
			}
			else {
	$connection = @fsockopen($setting['host_add'], mysql_result($radioport,0), $errno, $errstr, 1);
			if (!$connection) {
			}
			else {
				$pid = mysql_query("SELECT pid FROM servers WHERE id='".$_GET['view']."'");
				if (mysql_result($pid,0)=="") {
					$errors[] = "<h2>".$messages["176"]."</h2>";
				}
				else {
					
					if ($setting["os"]=="linux") {
						$connection = ssh2_connect('localhost', $setting['ssh_port']);
						ssh2_auth_password($connection, ''.base64_decode($setting['ssh_user']).'', ''.base64_decode($setting['ssh_pass']).'');
						$ssh2_exec_com = ssh2_exec($connection, 'kill '.mysql_result($pid,0));
						sleep(1);
					}
				}
			}
			$connection = @fsockopen($setting['host_add'], mysql_result($radioport,0), $errno, $errstr, 1)  or $php_err .= "server doa";
			if ($connection) {
				$notifi[] = "<h2>".$messages["177"]."</h2>";
			}
			else {
					$serverdata = mysql_query("SELECT * FROM servers WHERE id='".$_GET['view']."' AND portbase='".mysql_result($radioport,0)."'");
					$ini_content = "";
					foreach(mysql_fetch_array($serverdata) as $field => $value) {
						if (!is_numeric($field) && $value !="" && $field != "id" && $field != "owner" && $field != "sitepublic" && $field != "abuse" && $field != "pid" && $field != "autopid" && $field != "webspace" && $field != "serverip" && $field != "serverport" && $field != "streamtitle"  && $field != "streamurl" && $field != "shuffle" && $field != "samplerate" && $field != "channels" && $field != "genre" && $field != "quality" && $field != "crossfademode" && $field != "crossfadelength" && $field != "public" && $field != "aim" && $field != "icq" && $field != "irc" && $field != "encoder" && $field != "mp3quality" && $field != "mp3mode" && $field != "calendarrewrite" && $field != "calendarfile" && $field != "outprotocol" && $field != "screenlog" && $field != "xfade" && $field != "xfadethreshol" && $field != "djport_1" && $field != "djlogin_1" && $field != "djpassword_1" && $field != "djlogin_2" && $field != "djpassword_2" && $field != "djlogin_3" && $field != "djpassword_3" && $field != "djlogin_4" && $field != "djpassword_4" && $field != "djlogin_5" && $field != "djpassword_5" && $field != "djlogin_6" && $field != "djpassword_6" && $field != "djlogin_7" && $field != "djpassword_7" && $field != "djlogin_8" && $field != "djpassword_8" && $field != "djlogin_9" && $field != "djpassword_9" && $field != "djlogin_10" && $field != "djpassword_10" && $field != "djlogin_11" && $field != "djpassword_11" && $field != "djlogin_12" && $field != "djpassword_12" && $field != "djlogin_13" && $field != "djpassword_13" && $field != "djlogin_14" && $field != "djpassword_14" && $field != "djlogin_15" && $field != "djpassword_15" && $field != "djlogin_16" && $field != "djpassword_16" && $field != "djlogin_17" && $field != "djpassword_17" && $field != "djlogin_18" && $field != "djpassword_18" && $field != "djlogin_19" && $field != "djpassword_19" && $field != "djlogin_20" && $field != "djpassword_20" && $field != "djlogin_21" && $field != "djpassword_21" && $field != "djlogin_22" && $field != "djpassword_22" && $field != "djlogin_23" && $field != "djpassword_23" && $field != "djlogin_24" && $field != "djpassword_24" && $field != "djlogin_25" && $field != "djpassword_25" && $field != "djlogin_26" && $field != "djpassword_26" && $field != "djlogin_27" && $field != "djpassword_27" && $field != "djlogin_28" && $field != "djpassword_28" && $field != "djlogin_29" && $field != "djpassword_29" && $field != "djlogin_30" && $field != "djpassword_30" && $field != "djpriority_1" && $field != "djpriority_2"&& $field != "djpriority_3" && $field != "djpriority_4" && $field != "djpriority_5" && $field != "djpriority_6" && $field != "djpriority_7" && $field != "djpriority_8" && $field != "djpriority_9" && $field != "djpriority_10" && $field != "djpriority_11" && $field != "djpriority_12" && $field != "djpriority_13" && $field != "djpriority_14" && $field != "djpriority_15" && $field != "djpriority_16" && $field != "djpriority_17" && $field != "djpriority_18" && $field != "djpriority_19" && $field != "djpriority_20" && $field != "djpriority_21" && $field != "djpriority_22" && $field != "djpriority_23" && $field != "djpriority_24" && $field != "djpriority_25" && $field != "djpriority_26" && $field != "djpriority_27" && $field != "djpriority_28" && $field != "djpriority_29" && $field != "djpriority_30" && $field != "djbroadcasts") {
							$ini_content .= $field."=".$value."\n";
						}
					}
					if ($setting['os'] == 'linux') {
						$filename = "temp/" . mysql_result($radioport, 0) . "/conf/sc_serv.conf";
					}
					if (!$handle = fopen($filename, 'w')) {
					    chmod($filename, 0777);
						$errors[] = "<h2>".$messages["178"]."</h2>";
						fclose($handle);
					}
					elseif (fwrite($handle, $ini_content) === FALSE) {
						$errors[] = "<h2>".$messages["179"]."</h2>";
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
	 
// Ende Server Restart

if (isset($_GET['view'])) {
    $serverq = mysql_query("SELECT * FROM servers WHERE id='" . $_GET['view'] . "'");
    $serverdata = mysql_fetch_array($serverq);
    if (mysql_num_rows($serverq) == 0 || $serverdata['owner'] != $loginun && ($userdata['user_level'] != "Super Administrator")) {
        $errors[] = "<h2>" . $messages["511"] . "</h2>";
    }
    else {
        if (isset($_GET['action']) && $_GET['action'] == "start") {

            // Ermöglicht das Starten der Streams von Usern als Admin  -> If zur Sicherheit eingebaut!
            if ($_SESSION['user_level'] == 'Super Administrator'){
                $radioport = mysql_query("SELECT portbase FROM servers WHERE id='" . $_GET['view'] . "'");
            }else{
                $radioport = mysql_query("SELECT portbase FROM servers WHERE id='" . $_GET['view'] . "' AND owner='" . $loginun . "'");
            }






            if (mysql_num_rows($radioport) == 0) {
                $errors[] = "<h2>" . $messages["512"] . "</h2>";
            }
            else {
                $connection = @fsockopen($setting['host_add'], mysql_result($radioport, 0), $errno, $errstr, 1)  or $php_err .= "server doa";
                if ($connection) {
                    $notifi[] = "<h2>" . $messages["513"] . "</h2>";
                }
                else {
                    $serverdata = mysql_query("SELECT * FROM servers WHERE id='" . $_GET['view'] . "' AND portbase='" . mysql_result($radioport, 0) . "'");
                    $ini_content = "";
                    foreach (mysql_fetch_array($serverdata) as $field => $value) {
                        if (!is_numeric($field) && $value != "" && $field != "id" && $field != "owner" && $field != "sitepublic" && $field != "abuse" && $field != "pid" && $field != "autopid" && $field != "webspace" && $field != "serverip" && $field != "serverport" && $field != "streamtitle" && $field != "streamurl" && $field != "shuffle" && $field != "samplerate" && $field != "channels" && $field != "genre" && $field != "public" && $field != "aim" && $field != "icq" && $field != "irc" && $field != "encoder" && $field != "mp3quality" && $field != "mp3mode" && $field != "calendarrewrite" && $field != "calendarfile" && $field != "outprotocol" && $field != "screenlog" && $field != "xfade" && $field != "xfadethreshol" && $field != "djport_1" && $field != "djlogin_1" && $field != "djpassword_1" && $field != "djport_2" && $field != "djlogin_2" && $field != "djpassword_2" && $field != "djlogin_3" && $field != "djpassword_3" && $field != "djlogin_4" && $field != "djpassword_4" && $field != "djlogin_5" && $field != "djpassword_5" && $field != "djlogin_6" && $field != "djpassword_6" && $field != "djlogin_7" && $field != "djpassword_7" && $field != "djlogin_8" && $field != "djpassword_8" && $field != "djlogin_9" && $field != "djpassword_9" && $field != "djlogin_10" && $field != "djpassword_10" && $field != "djlogin_11" && $field != "djpassword_11" && $field != "djlogin_12" && $field != "djpassword_12" && $field != "djlogin_13" && $field != "djpassword_13" && $field != "djlogin_14" && $field != "djpassword_14" && $field != "djlogin_15" && $field != "djpassword_15" && $field != "djlogin_16" && $field != "djpassword_16" && $field != "djlogin_17" && $field != "djpassword_17" && $field != "djlogin_18" && $field != "djpassword_18" && $field != "djlogin_19" && $field != "djpassword_19" && $field != "djlogin_20" && $field != "djpassword_20" && $field != "djlogin_21" && $field != "djpassword_21" && $field != "djlogin_22" && $field != "djpassword_22" && $field != "djlogin_23" && $field != "djpassword_23" && $field != "djlogin_24" && $field != "djpassword_24" && $field != "djlogin_25" && $field != "djpassword_25" && $field != "djlogin_26" && $field != "djpassword_26" && $field != "djlogin_27" && $field != "djpassword_27" && $field != "djlogin_28" && $field != "djpassword_28" && $field != "djlogin_29" && $field != "djpassword_29" && $field != "djlogin_30" && $field != "djpassword_30" && $field != "djpriority_1" && $field != "djpriority_2"&& $field != "djpriority_3" && $field != "djpriority_4" && $field != "djpriority_5" && $field != "djpriority_6" && $field != "djpriority_7" && $field != "djpriority_8" && $field != "djpriority_9" && $field != "djpriority_10" && $field != "djpriority_11" && $field != "djpriority_12" && $field != "djpriority_13" && $field != "djpriority_14" && $field != "djpriority_15" && $field != "djpriority_16" && $field != "djpriority_17" && $field != "djpriority_18" && $field != "djpriority_19" && $field != "djpriority_20" && $field != "djpriority_21" && $field != "djpriority_22" && $field != "djpriority_23" && $field != "djpriority_24" && $field != "djpriority_25" && $field != "djpriority_26" && $field != "djpriority_27" && $field != "djpriority_28" && $field != "djpriority_29" && $field != "djpriority_30" && $field != "djbroadcasts") {
                            $ini_content .= $field . "=" . $value . "\n";
                        }
                    }
                    
                    if ($setting['os'] == 'linux') {
                        $filename = "temp/" . mysql_result($radioport, 0) . "/conf/sc_serv.conf";
                    }
                    if (!$handle = fopen($filename, 'a')) {
                        $errors[] = "<h2>" . $messages["514"] . "</h2>";
                        fclose($handle);
                    }
                    elseif (fwrite($handle, $ini_content) === FALSE) {
                        $errors[] = "<h2>" . $messages["515"] . "</h2>";
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