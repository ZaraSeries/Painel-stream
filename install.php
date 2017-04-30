<?php
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


include "./pages/messages/german.php";


if (isset($_POST['sql_dns'])) {
    if (!$connection = mysql_connect($_POST['sql_dns'], $_POST['sql_user'], $_POST['sql_pass'])) {
        $errors[] = "<h2>" . $messages["i1"] . "</h2>";
    }
    else {
        if (!$db = mysql_select_db($_POST['sql_daba'])) {
            $errors[] = "<h2>" . $messages["i1"] . "</h2>";
        }
        else {
            //DATABASE.php anlegen
            $dbconfig = '<?php
            $db_host = "' . $_POST['sql_dns'] . '";
            $db_username = "' . $_POST['sql_user'] . '";
            $db_password = "' . $_POST['sql_pass'] . '";
            $database = "' . $_POST['sql_daba'] . '";
            ';
            $datei = fopen("database.php", "w");
            fwrite($datei, $dbconfig);


            if (!mysql_query("CREATE TABLE IF NOT EXISTS `headlines` ( `id` int(11) NOT NULL auto_increment, `username` varchar(100) NOT NULL default '', `title` varchar(100) NOT NULL default '', `text` text NOT NULL, PRIMARY KEY  (`id`)) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ")) {
                $errors[] = "<h2>MySQL: headlines could not be created!</h2>";
            }

            if (!mysql_query("CREATE TABLE IF NOT EXISTS `news` ( `id` int(11) NOT NULL auto_increment, `titel` varchar(255) NOT NULL default '', `text` text NOT NULL, PRIMARY KEY  (`id`) ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ")
            ) {
                $errors[] = "<h2>" . $messages["i2"] . "</h2>";
            }


            if (!mysql_query("CREATE TABLE IF NOT EXISTS `notices` ( `id` int(11) NOT NULL auto_increment, `username` varchar(100) NOT NULL default '', `reason` varchar(100) NOT NULL default '', `message` varchar(10240) NOT NULL, `ip` varchar(100) NOT NULL default '', `time` varchar(100) NOT NULL default '', PRIMARY KEY  (`id`) ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ")
            ) {
                $errors[] = "<h2>" . $messages["i2"] . "</h2>";
            }

            if (!mysql_query("CREATE TABLE IF NOT EXISTS `servers` ( `id` int(11) NOT NULL auto_increment, `owner` varchar(100) NOT NULL default '', `maxuser` varchar(100) NOT NULL default '', `portbase` int(11) NOT NULL default '0', `bitrate` varchar(100) NOT NULL default '', `password` varchar(100) NOT NULL default 'testing', `adminpassword` varchar(100) NOT NULL default '', `sitepublic` varchar(100) NOT NULL default '1', `logfile` varchar(400) NOT NULL default '../temp/{port}/logs/sc_{port}.log', `realtime` varchar(100) NOT NULL default '1', `screenlog` varchar(100) NOT NULL default '0', `showlastsongs` varchar(100) NOT NULL default '10', `tchlog` varchar(100) NOT NULL default 'no', `weblog` varchar(100) NOT NULL default 'no', `w3cenable` varchar(100) NOT NULL default 'no', `w3clog` varchar(400) NOT NULL default '../temp/{port}/w3c/sc_w3c.log', `banfile` varchar(400) NOT NULL default '../temp/{port}/logs/banfile.ban', `ripfile` varchar(400) NOT NULL default '../temp/{port}/logs/ripfile.rip', `yp2` varchar(100) NOT NULL default '1', `uvox2sourcedebug` varchar(100) NOT NULL default '1', `srcip` varchar(100) NOT NULL default 'ANY', `destip` varchar(100) NOT NULL default 'ANY', `yport` varchar(100) NOT NULL default '80', `namelookups` varchar(100) NOT NULL default '0', `relayport` varchar(100) NOT NULL default '0', `relayserver` varchar(100) NOT NULL default 'empty', `autodumpusers` varchar(100) NOT NULL default '0', `autodumpsourcetime` varchar(100) NOT NULL default '30', `contentdir` varchar(100) NOT NULL default '', `introfile` varchar(100) NOT NULL default '', `titleformat` varchar(100) NOT NULL default '', `urlformat` varchar(400) NOT NULL default 'http://', `publicserver` varchar(100) NOT NULL default 'default', `allowrelay` varchar(100) NOT NULL default 'Yes', `allowpublicrelay` varchar(100) NOT NULL default 'Yes', `metainterval` varchar(100) NOT NULL default '8192', `abuse` int(11) NOT NULL default '0', `pid` varchar(100) NOT NULL default '', `autopid` varchar(100) NOT NULL, `webspace` varchar(100) NOT NULL, `serverip` varchar(100) NOT NULL default '127.0.0.1', `serverport` varchar(100) NOT NULL, `streamtitle` varchar(100) NOT NULL, `streamurl` varchar(400) NOT NULL, `shuffle` int(1) NOT NULL default '1', `samplerate` varchar(100) NOT NULL, `channels` int(1) NOT NULL default '2', `genre` varchar(100) NOT NULL, `public` int(1) NOT NULL default '1', `aim` varchar(100) NOT NULL, `icq` varchar(100) NOT NULL, `irc` varchar(100) NOT NULL, `encoder` varchar(100) NOT NULL default 'aacp', `mp3quality` varchar(100) NOT NULL default '0', `mp3mode` varchar(100) NOT NULL default '0', `calendarrewrite` varchar(100) NOT NULL default '0', `calendarfile` varchar(400) NOT NULL default '../temp/{port}/calendar/calendar.xml', `outprotocol` varchar(100) NOT NULL default '1', `log` varchar(100) NOT NULL default '0', `displaymetadatapattern` varchar(100) NOT NULL default '%R [-] %N', `useMetadata` varchar(100) NOT NULL default '1', `xfade` varchar(100) NOT NULL default '4', `xfadethreshol` varchar(100) NOT NULL default '20', `uvoxradiometadata` varchar(100) NOT NULL default '0', `uvoxnewmetadata` varchar(100) NOT NULL default '1', `djcapture` varchar(100) NOT NULL default '0', `djport_1` varchar(100) NOT NULL default '21000', `djlogin_1` varchar(100) NOT NULL default 'dj_test', `djpassword_1` varchar(100) NOT NULL default 'thisis', `djlogin_2` varchar(100) NOT NULL default 'dj_test2', `djpassword_2` varchar(100) NOT NULL default 'thisis', `djlogin_3` varchar(100) NOT NULL default '', `djpassword_3` varchar(100) NOT NULL default '', `djlogin_4` varchar(100) NOT NULL default '', `djpassword_4` varchar(100) NOT NULL default '', `djlogin_5` varchar(100) NOT NULL default '', `djpassword_5` varchar(100) NOT NULL default '', `djlogin_6` varchar(100) NOT NULL default '', `djpassword_6` varchar(100) NOT NULL default '', `djlogin_7` varchar(100) NOT NULL default '', `djpassword_7` varchar(100) NOT NULL default '', `djlogin_8` varchar(100) NOT NULL default '', `djpassword_8` varchar(100) NOT NULL default '', `djlogin_9` varchar(100) NOT NULL default '', `djpassword_9` varchar(100) NOT NULL default '', `djlogin_10` varchar(100) NOT NULL default '', `djpassword_10` varchar(100) NOT NULL default '', `djlogin_11` varchar(100) NOT NULL default '', `djpassword_11` varchar(100) NOT NULL default '', `djlogin_12` varchar(100) NOT NULL default '', `djpassword_12` varchar(100) NOT NULL default '', `djlogin_13` varchar(100) NOT NULL default '', `djpassword_13` varchar(100) NOT NULL default '', `djlogin_14` varchar(100) NOT NULL default '', `djpassword_14` varchar(100) NOT NULL default '', `djlogin_15` varchar(100) NOT NULL default '', `djpassword_15` varchar(100) NOT NULL default '', `djlogin_16` varchar(100) NOT NULL default '', `djpassword_16` varchar(100) NOT NULL default '', `djlogin_17` varchar(100) NOT NULL default '', `djpassword_17` varchar(100) NOT NULL default '', `djlogin_18` varchar(100) NOT NULL default '', `djpassword_18` varchar(100) NOT NULL default '', `djlogin_19` varchar(100) NOT NULL default '', `djpassword_19` varchar(100) NOT NULL default '', `djlogin_20` varchar(100) NOT NULL default '', `djpassword_20` varchar(100) NOT NULL default '', `djlogin_21` varchar(100) NOT NULL default '', `djpassword_21` varchar(100) NOT NULL default '', `djlogin_22` varchar(100) NOT NULL default '', `djpassword_22` varchar(100) NOT NULL default '', `djlogin_23` varchar(100) NOT NULL default '', `djpassword_23` varchar(100) NOT NULL default '', `djlogin_24` varchar(100) NOT NULL default '', `djpassword_24` varchar(100) NOT NULL default '', `djlogin_25` varchar(100) NOT NULL default '', `djpassword_25` varchar(100) NOT NULL default '', `djlogin_26` varchar(100) NOT NULL default '', `djpassword_26` varchar(100) NOT NULL default '', `djlogin_27` varchar(100) NOT NULL default '', `djpassword_27` varchar(100) NOT NULL default '', `djlogin_28` varchar(100) NOT NULL default '', `djpassword_28` varchar(100) NOT NULL default '', `djlogin_29` varchar(100) NOT NULL default '', `djpassword_29` varchar(100) NOT NULL default '', `djlogin_30` varchar(100) NOT NULL default '', `djpassword_30` varchar(100) NOT NULL default '', `djpriority_1` varchar(1) NOT NULL default '0', `djpriority_2` varchar(1) NOT NULL default '0', `djpriority_3` varchar(1) NOT NULL default '0', `djpriority_4` varchar(1) NOT NULL default '0', `djpriority_5` varchar(1) NOT NULL default '0', `djpriority_6` varchar(1) NOT NULL default '0', `djpriority_7` varchar(1) NOT NULL default '0', `djpriority_8` varchar(1) NOT NULL default '0', `djpriority_9` varchar(1) NOT NULL default '0', `djpriority_10` varchar(1) NOT NULL default '0', `djpriority_11` varchar(1) NOT NULL default '0', `djpriority_12` varchar(1) NOT NULL default '0', `djpriority_13` varchar(1) NOT NULL default '0', `djpriority_14` varchar(1) NOT NULL default '0', `djpriority_15` varchar(1) NOT NULL default '0', `djpriority_16` varchar(1) NOT NULL default '0', `djpriority_17` varchar(1) NOT NULL default '0', `djpriority_18` varchar(1) NOT NULL default '0', `djpriority_19` varchar(1) NOT NULL default '0', `djpriority_20` varchar(1) NOT NULL default '0', `djpriority_21` varchar(1) NOT NULL default '0', `djpriority_22` varchar(1) NOT NULL default '0', `djpriority_23` varchar(1) NOT NULL default '0', `djpriority_24` varchar(1) NOT NULL default '0', `djpriority_25` varchar(1) NOT NULL default '0', `djpriority_26` varchar(1) NOT NULL default '0', `djpriority_27` varchar(1) NOT NULL default '0', `djpriority_28` varchar(1) NOT NULL default '0', `djpriority_29` varchar(1) NOT NULL default '0', `djpriority_30` varchar(1) NOT NULL default '0', `djbroadcasts` varchar(400) NOT NULL default '../temp/{port}/record', `unlockkeyname` varchar(100) NOT NULL default 'Ronny Shippo21', `unlockkeycode` varchar(100) NOT NULL default '482QP-480TU-J4MFD-VF4YK', PRIMARY KEY  (`id`)) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ")
            ) {
                $errors[] = "<h2>" . $messages["i3"] . "</h2>";
            }

            if (!mysql_query("CREATE TABLE IF NOT EXISTS `settings` ( `id` int(11) NOT NULL default '0', `title` varchar(50) NOT NULL, `slogan` varchar(50) NOT NULL default '', `display_limit` int(11) NOT NULL default '100', `host_add` varchar(100) NOT NULL default '192.168.0.1', `os` varchar(100) NOT NULL default 'linux', `dir_to_cpanel` varchar(100) NOT NULL default '', `scs_config` varchar(1) NOT NULL default '1', `adj_config` varchar(1) NOT NULL default '1', `php_mp3` varchar(50) NOT NULL default '20', `php_exe` varchar(50) NOT NULL default '250', `update_check` varchar(1) NOT NULL default '0', `login_captcha` varchar(1) NOT NULL default '0', `ssh_user` varchar(256) NOT NULL, `ssh_pass` varchar(256) NOT NULL, `ssh_port` varchar(11) NOT NULL default '22', `language` varchar(256) NOT NULL,`shellset` varchar(20) NOT NULL default 'ssh2',`server_news` varchar(1) NOT NULL, PRIMARY KEY  (`id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 ")
            ) {
                $errors[] = "<h2>" . $messages["i4"] . "</h2>";
            }

            if (!mysql_query("CREATE TABLE IF NOT EXISTS `users` ( `id` int(11) NOT NULL auto_increment, `username` varchar(100) NOT NULL default '', `user_password` varchar(50) NOT NULL default '', `md5_hash` varchar(100) NOT NULL default '', `user_level` varchar(100) NOT NULL default '', `user_email` varchar(200) NOT NULL default '', `contact_number` varchar(15) NOT NULL, `mobile_number` varchar(15) NOT NULL, `account_notes` text NOT NULL, `name` varchar(50) NOT NULL default '', `surname` varchar(50) NOT NULL default '', `age` varchar(3) NOT NULL, `dj_of_user` varchar(5) NOT NULL, PRIMARY KEY  (`id`) ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ")
            ) {
                $errors[] = "<h2>" . $messages["i5"] . "</h2>";
            }

            if (!mysql_query("REPLACE INTO `notices` (`id`, `username`, `reason`, `message`, `ip`, `time`) VALUES (78,
			'Shoutcast Admin', 'Welcome - German Welcome Test Message',
			'" . $messages["i0"] . "', '127.0.0.1', '')")
            ) {
                $errors[] = "<h2>" . $messages["i6"] . "</h2>";
            }
            if (isset($_POST['server_os']) && $_POST['server_os'] == "linux") {
                $dir_new = $_POST['server_dir'] . "/";
            }
            if (!mysql_query("REPLACE INTO `settings` (`id`, `title`, `slogan`, `display_limit`, `host_add`, `os`, `dir_to_cpanel`, `scs_config`, `adj_config`, `php_mp3`, `php_exe`, `update_check`, `login_captcha`, `ssh_user`, `ssh_pass`, `ssh_port`, `language`,`shellset`, `server_news`) VALUES (0, '" . $_POST['server_title'] . "', 'Public', 10, '" . $_POST['server_dns'] . "', 'linux', '" . dirname(__FILE__) . "/', '1', '1', '20', '250', '0', '0', '" . base64_encode($_POST['server_sshuser']) . "', '" . base64_encode($_POST['server_sshpass']) . "', '" . $_POST['server_sshport'] . "', '" . $_POST['server_lang'] . "', '" . $_POST['server_shell'] . "',1)")) {
                $errors[] = "<h2>" . $messages["i7"] . "</h2>";
            }

            if (!mysql_query("REPLACE INTO `users` (`id`, `username`,`user_password`,`md5_hash`, `user_level`, `user_email`, `contact_number`, `mobile_number`, `account_notes`, `name`, `surname`, `age`) VALUES (1, '" . $_POST['user'] . "', '" . $_POST['pass'] . "', '" . md5($_POST['user'] . $_POST['pass']) . "', 'Super Administrator', 'admin@domain.com', 'none', '0', 'Default Administrator', 'Max', 'Mustermann', 'non') ")) {
                $errors[] = "<h2>" . $messages["i8"] . "</h2>";
            }

            if (isset($_POST['allow_usage_statistics'])) {
                $fileHandle = fopen('.isAllowedToSendUsageStatistics', 'w');
                fclose($fileHandle);
            }

        }
    }
}
$cwd = str_replace("\\", "/", getcwd());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
    <title><?php echo $messages["g0"];?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="./css/install.css"/>
</head>
<body>
<div id="container">
<div id="header_top">
    <div class="header logo">
        <a href="#" title=""><img src="images/logo.png" alt=""/></a>
    </div>
    <div class="header top_nav">
        <span class="session"><?php echo $messages["i10"];?> <a href="http://www.streamerspanel.com" title="Sign out">cancel</a></span>
    </div>
</div>
<div id="sidebar">
    <div id="navigation">
        <div class="sidenav">
            <div class="nav_info">
                <span><?php echo $messages["i10"];?></span><br/>
                <span class="nav_info_messages"><?php echo $messages["i12"];?></span>
            </div>
            <div class="navhead_blank">

                <span><?php echo $messages["i11"];?></span>
                
            </div>
            <div class="subnav_child">
                <ul class="submenu">
                    <li><b><?php echo $messages["i172"];?></b></li>

                    <?php


                    echo "<li>".$messages["i13"]."</li>";
                    if (!extension_loaded('ssh2')) {
                        echo '<li><font color="red"></li><li><b>'.$messages["i14"].'</b></li></font> ';
                    }else{
                        echo '<li><font color="green"><b>'.$messages["i15"].'</b></font> </li>';
                    }
 
                    
 
                    if (!extension_loaded('mysql')) {
                        echo '<li><font color="red"></li><li><b>'.$messages["i16"].'</b></li></font> ';
                    }else{
                        echo '<li><font color="green"><b>'.$messages["i17"].'</b></font> </li>';
                    }
                    if ( ini_get('safe_mode') ) {
                        echo '<li><font color="red"></li><li><b>'.$messages["i18"].'</b></li></font> ';
                    } else {
                        echo '<li><font color="green"><b>'.$messages["i19"].'</b></font> </li>';
                    }
                    if ( ini_get('max_upload_size') >= "20" ) {
                        echo '<li><font color="red"></li><li><b>'.$messages["i20"].'</b></li></font> ';
                    } else {
                        echo '<li><font color="green"><b>'.$messages["i21"].'</b></font> </li>';
                    }
                    if (is_writable ('database.php') && is_readable('database.php')) {
                        echo '<li><font color="green"></li><li><b>'.$messages["i22"].'</b></li></font> ';
                    } else {
                        echo '<li><font color="red"><b>'.$messages["i23"].'</b></font> </li>';
                    }

               
                    $temp = substr(decoct( fileperms('./temp') ), 2);
                    $uploads = substr(decoct( fileperms('./uploads') ), 2);
                    

                     
                       if ($temp == "777"){
                            echo '<li><font color="green"></li><li><b>'.$messages["i26"].'</b></li></font> ';
                        }else{
                            echo '<li><font color="red"><b>'.$messages["i28"].' '.$temp.'</b></font> </li>';
                        }
                        if ($uploads == "777"){
                            echo '<li><font color="green"></li><li><b>'.$messages["i28-4"].'</b></li></font> ';
                        }else{
                            echo '<li><font color="red"><b>'.$messages["i28-5"].' '.$uploads.'</b></font> </li>';
                        }
                    

                    $server_sc =  substr(sprintf('%o', fileperms('files/linux/sc_serv.bin')), -4);                  
                    if ( $server_sc == "777"){
                        echo '<li><font color="green"></li><li><b>Dateirechte sc_serv.bin OK!</b></li></font> ';
                    } else {
                            echo ' <li><font color="red"></li><li><b>Dateirecht im Ordner "/files/linux/sc_serv.bin" überprüfen!!!</b></li></font> ';
                    }
                    
                    $trans_sc  = substr(sprintf('%o', fileperms('files/linux/sc_trans.bin')), -4);                   
                    if ( $trans_sc == "777"){
                        echo '<li><font color="green"></li><li><b>Dateirechte sc_trans.bin OK!</b></li></font> ';
                    } else {
                            echo ' <li><font color="red"></li><li><b>Dateirecht im Ordner "/files/linux/sc_trans.bin" überprüfen!!!</b></li></font> ';
                    }
                    
                    $cloop_bitratecontrol =  substr(sprintf('%o', fileperms('files/linux/bitratecloop.sh')), -4);                   
                    if ( $cloop_bitratecontrol == "777"){
                        echo '<li><font color="green"></li><li><b>Dateirechte bitratecloop.sh OK!</b></li></font> ';
                    } else {
                            echo ' <li><font color="red"></li><li><b>Dateirecht im Ordner "/files/linux/bitratecloop.sh" überprüfen!!!</b></li></font> ';
                    }
                    
                    $control_bitratecontrol = substr(sprintf('%o', fileperms('files/linux/bitratecontrol.sh')), -4);                    
                    if ( $control_bitratecontrol == "777"){
                        echo '<li><font color="green"></li><li><b>Dateirechte bitratecontrol.sh OK!</b></li></font> ';
                    } else {
                            echo ' <li><font color="red"></li><li><b>Dateirecht im Ordner "/files/linux/bitratecontrol.sh" überprüfen!!!</b></li></font> ';
                    }
                    
					$log_bitratecontrol =  substr(sprintf('%o', fileperms('files/linux/bitratecontrol.log')), -4);                    
                    if ( $log_bitratecontrol == "777"){
                        echo '<li><font color="green"></li><li><b>Dateirechte bitratecontrol.log OK!</b></li></font> ';
                    } else {
                            echo ' <li><font color="red"></li><li><b>Dateirecht im Ordner "/files/linux/bitratecontrol.log" überprüfen!!!</b></li></font> ';
                    }




                    ?>
            </div>
            <div class="navhead">
                <span><?php echo $messages["i29"];?></span>
                <span>ip und versionsinfo</span>
            </div>
            <div class="subnav">
                <table cellspacing="0" cellpadding="0" class="ip_table">
                    <tbody>
                    <tr>
                        <td class="ip_table"><?php echo $messages["i30"];?></td>
                        <td class="ip_table_under"><?PHP echo ($_SERVER['REMOTE_ADDR']);?></td>
                    </tr>
                    <tr>
                        <td class="ip_table"><?php echo $messages["i31"];?></td>
                        <td class="ip_table_under"><?PHP echo ($_SERVER['SERVER_NAME']);?></td>
                    </tr>
                    <tr>
                        <td class="ip_table"><?php echo $messages["i32"];?></td>
                        <td class="ip_table_under"><?php echo $messages["g01"];?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="primary">
    <?php
    if (count($errors) > 0 ) {
        foreach ($errors as $errors_cont)
            $errors_list .= "<div>" . $errors_cont . "</div>";
        echo ('<div class="error"><h2><center>' . $errors_list . '</center></h2></div>');
    }
    else {
        if ($_POST['sql_dns']) {
            echo '<div class="correct"><h2><center><h2><a href="index.php">' . $messages["i9"] . '</center></h2></div>';
        }
    }
    ?>
    <?PhP
    $errors = array();
    $correc = array();
    $notifi = array();
    if(count($errors) > 0) {
        foreach($errors as $errors_cont)
            $errors_list.="<div class=\"error\">".$errors_cont."</div>";
        echo ($errors_list);
    }
    if(count($notifi) > 0) {
        foreach($notifi as $notifi_cont)
            $notifi_list.="<div class=\"notifi\">".$notifi_cont."</div>";
        echo ($notifi_list);
    }
    if(count($correc) > 0) {
        foreach($correc as $correc_cont)
            $correc_list.="<div class=\"correct\">".$correc_cont."</div>";
        echo ($correc_list);
    }
    ?>
    <div id="content">

        <div class="box">
            <h2><?php echo $messages["i33"];?></h2>

            <div class="tool_top_menu">
                <div class="main_shorttool">
                    <p><?php echo $messages["i34"];?></p>
                    <ul>
                        <li><?php echo $messages["i35"];?></li>
                        <li><?php echo $messages["i36"];?></li>
                        <li><?php echo $messages["i37"];?></li>
                        <li><?php echo $messages["i38"];?></li>
                        <li><?php echo $messages["i39"];?></li>
                        <li><?php echo $messages["i40"];?></li>
                        <li><?php echo $messages["i41"];?></li>
                    </ul>
                </div>
                <div class="main_right">
                    <h2><?php echo $messages["i42"];?></h2>

                    <p><?php echo $messages["i43"];?></p>
                </div>
            </div>
            <form action="install.php" method="post">
                <fieldset>
                    <legend><?php echo $messages["i44"];?></legend>
                    <div class="input_field">
                        <label for="a"><?php echo $messages["i45"];?></label>
                        <input type="text" name="sql_dns" class="mediumfield" value="localhost"/>
                        <span class="field_desc"><?php echo $messages["i46"];?></span>
                    </div>
                    <div class="input_field">
                        <label for="a"><?php echo $messages["i47"];?></label>
                        <input name="sql_user" type="text" class="mediumfield"/>
                        <span class="field_desc"><?php echo $messages["i48"];?></span>
                    </div>
                    <div class="input_field">
                        <label for="a"><?php echo $messages["i49"];?></label>
                        <input name="sql_pass" type="password" class="mediumfield"/>
                        <span class="field_desc"><?php echo $messages["i49"];?></span>
                    </div>
                    <div class="input_field">
                        <label for="a"><?php echo $messages["i50"];?></label>
                        <input name="sql_daba" type="text" class="mediumfield"/>
                        <span class="field_desc"><?php echo $messages["i51"];?></span>
                    </div>
                </fieldset>
                <fieldset>
                    <legend><?php echo $messages["i52"];?></legend>
                    <div class="input_field">
                        <label for="a"><?php echo $messages["i53"];?></label>
                        <input name="user" type="text" class="mediumfield"/>
                        <span class="field_desc"><?php echo $messages["i54"];?></span>
                    </div>
                    <div class="input_field">
                        <label for="a"><?php echo $messages["i55"];?></label>
                        <input name="pass" type="password" class="mediumfield"/>
                        <span class="field_desc"><?php echo $messages["i56"];?></span>
                    </div>
                </fieldset>
                <fieldset>
                    <legend><?php echo $messages["i57"];?></legend>
                    <div class="input_field">
                        <label for="a"><?php echo $messages["i58"];?></label>
                        <input type="text" name="server_dir" class="mediumfield" value="<?php echo $cwd ;?>/"/>
                        <span class="field_desc"><?php echo $messages["i59"];?></span>
                    </div>
                    <div class="input_field">
                        <label for="a"><?php echo $messages["i60"];?></label>
                        <input type="text" name="server_dns" class="mediumfield"
                               value="<?php echo $_SERVER["HTTP_HOST"];?>"/>
                        <span class="field_desc"><?php echo $messages["i61"];?></span>
                    </div>
                    <div class="input_field">
                        <label for="a"><?php echo $messages["i62"];?></label>
                        <input type="text" name="server_title" class="mediumfield" value="My Radio"/>
                        <span class="field_desc"><?php echo $messages["i63"];?></span>
                    </div>
                </fieldset>
                <fieldset>
                    <legend><?php echo $messages["i64"];?></legend>
                    <div class="input_field">
                        <label for="a"><?php echo $messages["i65"];?></label>
                        <input type="text" name="server_sshuser" class="mediumfield"/>
                        <span class="field_desc"><?php echo $messages["i66"];?></span>
                    </div>
                    <div class="input_field">
                        <label for="a"><?php echo $messages["i67"];?></label>
                        <input type="password" name="server_sshpass" class="mediumfield"/>
                        <span class="field_desc"><?php echo $messages["i666"];?></span>
                    </div>
                    <div class="input_field">
                        <label for="a"><?php echo $messages["i68"];?></label>
                        <input type="text" name="server_sshport" class="smallfield" value="22"/>
                        <span class="field_desc"><?php echo $messages["i68"];?></span>
                    </div>
                    
                
                <div class="input_field">
                        <label for="a"><?php echo $messages["issh1"];?></label>
                        <select class="formselect_loca" name="server_shell">
                            <option value="ssh2"><?php echo $messages["issh2"];?></option>
                            <option value="ssh2"><?php echo $messages["issh3"];?></option>
                            <option value="shellexec"><?php echo $messages["issh4"];?></option>
                        </select>
                        <span class="field_desc"><?php echo $messages["issh5"];?></span>
                    </div>
                    <br><br><span class="field_desc"><b><font color="#FF0000"><?php echo "Nach der Installation unter Servereinstellung im Panel alle Einstellungen &uuml;berpr&uuml;fen und vornehmen!!! ";?></font></b></span>
                </fieldset>
                <fieldset>
                    <legend>Language settings</legend>
                    
                    <div class="input_field">
                        <select name="server_lang">
                            <option value="german" selected="selected">German (de) - Official Language*</option>
                            <option value="english">English (en)</option>
							<option value="portugues">Portugues (br)</option>
                        </select>
                        <span class="field_desc">Language which the panel will run with</span>
                    </div>
                </fieldset>
                <br/>
                <input class="submit" type="submit" value="Install"/>
            </form>
        </div>
    </div>
</div>
<div class="clear"></div>
<div id="footer">
    <p>StreamersAdminPanel | djcrackhome | dave | shippo21 | <a
        href="http://www.streamerspanel.com">http://www.streamerspanel.com</a> 
		</p>
</div>
</div>
</body>
</html>
