#!/usr/bin/php -q
<?php
$pfad="$cwd";
if (!include("".$pfad."database.php"))
    die("database.php could not be loaded!");
if ($db_host == "" || !isset($db_host))
    die("please reinstall this panel");




$connection = mysql_connect($db_host, $db_username, $db_password) or die("database could not be connected");
$db = mysql_select_db($database) or die("database could not be selected");
$sql = "SELECT portbase, bitrate, pid FROM servers";
$servers_query = mysql_query($sql) or die("Anfrage nicht erfolgreich");
$sql = "SELECT host_add, os, dir_to_cpanel, ssh_user, ssh_pass, ssh_port, shellset FROM settings";
$settings_query = mysql_query($sql) or die("Anfrage nicht erfolgreich");
$settings = mysql_fetch_array($settings_query);



    while ($ser = mysql_fetch_array($servers_query)){

$maxbit = substr($ser['bitrate'], 0, -3);




$fp = @fsockopen($settings['host_add'], $ser['portbase'], $errno, $errstr, 30);
                if($fp) {
                fputs($fp,"GET /7.html HTTP/1.0\r\nUser-Agent: XML Reader(Mozilla Compatible)\r\n\r\n");
                while(!feof($fp)) {
                $dataset = fgets($fp, 1000);
                }
                fclose($fp);
                $dataset1 = $dataset;
                $headerinfo = ereg_replace("<body>.*","",$dataset);
                $dataset = ereg_replace(".*<body>", "", $dataset);
                $dataset = ereg_replace("</body>.*", ",", $dataset);
                $entries = explode(",",$dataset);
                $listener=$entries[0];
                $status=$entries[1];
                $listenerpeak = $entries[2];
                $maxlisteners=$entries[3];
                $totallisteners=$entries[4];
                $bitrate=$entries[5];
                $songtitel=$entries[6];

if ($bitrate>$maxbit) {


$timestamp = time();
$datum = date("d.m.Y - H:i:s", $timestamp);

$fp = fopen($pfad."files/linux/bitratecontrol.log","a+");
fputs($fp,$datum." - Port ".$ser['portbase']." beendet!!!  Bitrate Erlaubt:".$maxbit."kb/s   Bitrate gesendet:".$bitrate."kb/s\n");
fclose($fp);

















if ($settings["shellset"] == 'ssh2'){                 

if(!($con = ssh2_connect("localhost", $settings['ssh_port']))){
    echo "fail: unable to establish connection\n";
} else {
                        
  
                            ssh2_auth_password($con, ''.base64_decode($settings['ssh_user']).'', ''.base64_decode($settings['ssh_pass']).'');
                            $ssh2_exec_com = ssh2_exec($con, 'kill '.$ser['pid']);
                            sleep(1);

}




}


if ($settings["shellset"] == 'shellexec'){   


$output = shell_exec("kill ".$ser['pid']." ");





}
}


}


    }

    
?>



