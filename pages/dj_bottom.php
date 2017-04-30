<?PHP


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
    <form method="post" action="content.php?include=dj&id=<?php echo $_GET['id'];?>&action=edit">
    

        <fieldset>
            <legend><?php echo $messages["292-1"];?></legend>
            <input class="submit" type="submit" name="submit" value="<?php echo $messages["329"];?>"/>
            <input class="submit" type="reset" value="<?php echo $messages["330"];?>"
                   onclick="document.location='content.php?include=autodj';"/>
            <div class="input_field">
                <label for="a"><?php echo $messages["sct4"];?></label>
                 <select class="formselect_loca" name="calendarrewrite">
                <option value="0"<?php if ($formedit_calendarrewrite == '0') echo " selected=\"selected\"";?>><?php echo $messages["sct28"]; ?></option>
                <option value="1"<?php if ($formedit_calendarrewrite == '1') echo " selected=\"selected\"";?>><?php echo $messages["sct29"]; ?></option>
                </select>
                <span class="field_desc"><?php echo "Calendarrewite";?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo "Stream Recording";?></label>
                 <select class="formselect_loca" name="djcapture">
                <option value="0"<?php if ($formedit_djcapture == '0') echo " selected=\"selected\"";?>><?php echo $messages["sct28"]; ?></option>
                <option value="1"<?php if ($formedit_djcapture == '1') echo " selected=\"selected\"";?>><?php echo $messages["sct29"]; ?></option>
                </select>
                <span class="field_desc"><?php echo "Stream Recording";?></span>
            </div>
            <div class="input_field">
                <label for="a000"><?php echo $messages["sct21"];?></label>
                <input class="mediumfield" name="ip" type="text" value="<?php echo $setting['host_add'];?>"readonly="readonly"/>
                <span class="field_desc"><?php echo $messages["sct22"];?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ-Port";?></label>
                <input class="mediumfield" name="djport_1" type="text" value="<?php echo "$formedit_djport_1";?>"readonly="readonly"/>
                <span class="field_desc"><?php echo $messages["sct18"];?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo $messages["sct13"];?></label>
                <input class="mediumfield" name="djlogin_1" type="text" value="<?php echo $formedit_djlogin_1;?>"/>
                <span class="field_desc"><?php echo "DJ/Jukebox-Name";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo $messages["sct14"];?></label>
                <input class="mediumfield" name="djpassword_1" type="text" value="<?php echo $formedit_djpassword_1;?>"/>
                <span class="field_desc"><?php echo "DJ/Jukebox-Password";?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo $messages["sct17"];?></label>
                <input class="mediumfield" name="" type="text" value="<?php echo "".$formedit_djlogin_1.":".$formedit_djpassword_1."";?>"readonly="readonly"/>
                <span class="field_desc"><?php echo $messages["sct16"];?></span>
            </div>
           <div class="input_field">
                <label for="a18"><?php echo $messages["sct15"];?></label>
                <select class="formselect_loca" name="djpriority_1">
                <option value="0"<?php if ($formedit_djpriority_1 == '0') echo " selected=\"selected\"";?>><?php echo $messages["sct26"]; ?></option>
                <option value="1"<?php if ($formedit_djpriority_1 == '1') echo " selected=\"selected\"";?>><?php echo $messages["sct27"]; ?></option>
                <option value="3"<?php if ($formedit_djpriority_1 == '3') echo " selected=\"selected\"";?>><?php echo $messages["sct27-1"]; ?></option>
                <option value="5"<?php if ($formedit_djpriority_1 == '5') echo " selected=\"selected\"";?>><?php echo $messages["sct27-2"]; ?></option>
                <option value="9"<?php if ($formedit_djpriority_1 == '9') echo " selected=\"selected\"";?>><?php echo $messages["sct27-3"]; ?></option>
                </select>
                <span class="field_desc"><?php echo $messages["sct30"]; ?><?php echo " DJ 1";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Login2";?></label>
                <input class="mediumfield" name="djlogin_2" type="text" value="<?php echo $formedit_djlogin_2;?>"/>
                <span class="field_desc"><?php echo "DJ-Name";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Password2";?></label>
                <input class="mediumfield" name="djpassword_2" type="text" value="<?php echo $formedit_djpassword_2;?>"/>
                <span class="field_desc"><?php echo "DJ-Password";?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo "<font color='#FF0000'>Login2:Password2</font>";?></label>
                <input class="mediumfield" name="" type="text" value="<?php echo "".$formedit_djlogin_2.":".$formedit_djpassword_2."";?>"readonly="readonly"/>
                <span class="field_desc"><?php echo $messages["sct16"];?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo $messages["sct15"];?></label>
                <select class="formselect_loca" name="djpriority_2">
                <option value="1"<?php if ($formedit_djpriority_2 == '1') echo " selected=\"selected\"";?>><?php echo $messages["sct27"]; ?></option>
                <option value="3"<?php if ($formedit_djpriority_2 == '3') echo " selected=\"selected\"";?>><?php echo $messages["sct27-1"]; ?></option>
                <option value="5"<?php if ($formedit_djpriority_2 == '5') echo " selected=\"selected\"";?>><?php echo $messages["sct27-2"]; ?></option>
                <option value="9"<?php if ($formedit_djpriority_2 == '9') echo " selected=\"selected\"";?>><?php echo $messages["sct27-3"]; ?></option>
                </select>
                <span class="field_desc"><?php echo $messages["sct30"]; ?><?php echo " DJ 2";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Login3";?></label>
                <input class="mediumfield" name="djlogin_3" type="text" value="<?php echo $formedit_djlogin_3;?>"/>
                <span class="field_desc"><?php echo "DJ-Name";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Password3";?></label>
                <input class="mediumfield" name="djpassword_3" type="text" value="<?php echo $formedit_djpassword_3;?>"/>
                <span class="field_desc"><?php echo "DJ-Password";?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo "<font color='#FF0000'>Login3:Password3</font>";?></label>
                <input class="mediumfield" name="" type="text" value="<?php echo "".$formedit_djlogin_3.":".$formedit_djpassword_3."";?>"readonly="readonly"/>
                <span class="field_desc"><?php echo $messages["sct16"];?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo $messages["sct15"];?></label>
                <select class="formselect_loca" name="djpriority_3">
                <option value="1"<?php if ($formedit_djpriority_3 == '1') echo " selected=\"selected\"";?>><?php echo $messages["sct27"]; ?></option>
                <option value="3"<?php if ($formedit_djpriority_3 == '3') echo " selected=\"selected\"";?>><?php echo $messages["sct27-1"]; ?></option>
                <option value="5"<?php if ($formedit_djpriority_3 == '5') echo " selected=\"selected\"";?>><?php echo $messages["sct27-2"]; ?></option>
                <option value="9"<?php if ($formedit_djpriority_3 == '9') echo " selected=\"selected\"";?>><?php echo $messages["sct27-3"]; ?></option>
                </select>
                <span class="field_desc"><?php echo $messages["sct30"]; ?><?php echo " DJ 3";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Login4";?></label>
                <input class="mediumfield" name="djlogin_4" type="text" value="<?php echo $formedit_djlogin_4;?>"/>
                <span class="field_desc"><?php echo "DJ-Name";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Password4";?></label>
                <input class="mediumfield" name="djpassword_4" type="text" value="<?php echo $formedit_djpassword_4;?>"/>
                <span class="field_desc"><?php echo "DJ-Password";?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo "<font color='#FF0000'>Login4:Password4</font>";?></label>
                <input class="mediumfield" name="" type="text" value="<?php echo "".$formedit_djlogin_4.":".$formedit_djpassword_4."";?>"readonly="readonly"/>
                <span class="field_desc"><?php echo $messages["sct16"];?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo $messages["sct15"];?></label>
                <select class="formselect_loca" name="djpriority_4">
                <option value="1"<?php if ($formedit_djpriority_4 == '1') echo " selected=\"selected\"";?>><?php echo $messages["sct27"]; ?></option>
                <option value="3"<?php if ($formedit_djpriority_4 == '3') echo " selected=\"selected\"";?>><?php echo $messages["sct27-1"]; ?></option>
                <option value="5"<?php if ($formedit_djpriority_4 == '5') echo " selected=\"selected\"";?>><?php echo $messages["sct27-2"]; ?></option>
                <option value="9"<?php if ($formedit_djpriority_4 == '9') echo " selected=\"selected\"";?>><?php echo $messages["sct27-3"]; ?></option>
                </select>
                <span class="field_desc"><?php echo $messages["sct30"]; ?><?php echo " DJ 4";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Login5";?></label>
                <input class="mediumfield" name="djlogin_5" type="text" value="<?php echo $formedit_djlogin_5;?>"/>
                <span class="field_desc"><?php echo "DJ-Name";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Password5";?></label>
                <input class="mediumfield" name="djpassword_5" type="text" value="<?php echo $formedit_djpassword_5;?>"/>
                <span class="field_desc"><?php echo "DJ-Password";?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo "<font color='#FF0000'>Login5:Password5</font>";?></label>
                <input class="mediumfield" name="" type="text" value="<?php echo "".$formedit_djlogin_5.":".$formedit_djpassword_5."";?>"readonly="readonly"/>
                <span class="field_desc"><?php echo $messages["sct16"];?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo $messages["sct15"];?></label>
                <select class="formselect_loca" name="djpriority_5">
                <option value="1"<?php if ($formedit_djpriority_5 == '1') echo " selected=\"selected\"";?>><?php echo $messages["sct27"]; ?></option>
                <option value="3"<?php if ($formedit_djpriority_5 == '3') echo " selected=\"selected\"";?>><?php echo $messages["sct27-1"]; ?></option>
                <option value="5"<?php if ($formedit_djpriority_5 == '5') echo " selected=\"selected\"";?>><?php echo $messages["sct27-2"]; ?></option>
                <option value="9"<?php if ($formedit_djpriority_5 == '9') echo " selected=\"selected\"";?>><?php echo $messages["sct27-3"]; ?></option>
                </select>
                <span class="field_desc"><?php echo $messages["sct30"]; ?><?php echo " DJ 5";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Login6";?></label>
                <input class="mediumfield" name="djlogin_6" type="text" value="<?php echo $formedit_djlogin_6;?>"/>
                <span class="field_desc"><?php echo "DJ-Name";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Password6";?></label>
                <input class="mediumfield" name="djpassword_6" type="text" value="<?php echo $formedit_djpassword_6;?>"/>
                <span class="field_desc"><?php echo "DJ-Password";?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo "<font color='#FF0000'>Login6:Password6</font>";?></label>
                <input class="mediumfield" name="" type="text" value="<?php echo "".$formedit_djlogin_6.":".$formedit_djpassword_6."";?>"readonly="readonly"/>
                <span class="field_desc"><?php echo $messages["sct16"];?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo $messages["sct15"];?></label>
                <select class="formselect_loca" name="djpriority_6">
                <option value="1"<?php if ($formedit_djpriority_6 == '1') echo " selected=\"selected\"";?>><?php echo $messages["sct27"]; ?></option>
                <option value="3"<?php if ($formedit_djpriority_6 == '3') echo " selected=\"selected\"";?>><?php echo $messages["sct27-1"]; ?></option>
                <option value="5"<?php if ($formedit_djpriority_6 == '5') echo " selected=\"selected\"";?>><?php echo $messages["sct27-2"]; ?></option>
                <option value="9"<?php if ($formedit_djpriority_6 == '9') echo " selected=\"selected\"";?>><?php echo $messages["sct27-3"]; ?></option>
                </select>
                <span class="field_desc"><?php echo $messages["sct30"]; ?><?php echo " DJ 6";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Login7";?></label>
                <input class="mediumfield" name="djlogin_7" type="text" value="<?php echo $formedit_djlogin_7;?>"/>
                <span class="field_desc"><?php echo "DJ-Name";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Password7";?></label>
                <input class="mediumfield" name="djpassword_7" type="text" value="<?php echo $formedit_djpassword_7;?>"/>
                <span class="field_desc"><?php echo "DJ-Password";?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo "<font color='#FF0000'>Login7:Password7</font>";?></label>
                <input class="mediumfield" name="" type="text" value="<?php echo "".$formedit_djlogin_7.":".$formedit_djpassword_7."";?>"readonly="readonly"/>
                <span class="field_desc"><?php echo $messages["sct16"];?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo $messages["sct15"];?></label>
                <select class="formselect_loca" name="djpriority_7">
                <option value="1"<?php if ($formedit_djpriority_7 == '1') echo " selected=\"selected\"";?>><?php echo $messages["sct27"]; ?></option>
                <option value="3"<?php if ($formedit_djpriority_7 == '3') echo " selected=\"selected\"";?>><?php echo $messages["sct27-1"]; ?></option>
                <option value="5"<?php if ($formedit_djpriority_7 == '5') echo " selected=\"selected\"";?>><?php echo $messages["sct27-2"]; ?></option>
                <option value="9"<?php if ($formedit_djpriority_7 == '9') echo " selected=\"selected\"";?>><?php echo $messages["sct27-3"]; ?></option>
                </select>
                <span class="field_desc"><?php echo $messages["sct30"]; ?><?php echo " DJ 7";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Login8";?></label>
                <input class="mediumfield" name="djlogin_8" type="text" value="<?php echo $formedit_djlogin_8;?>"/>
                <span class="field_desc"><?php echo "DJ-Name";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Password8";?></label>
                <input class="mediumfield" name="djpassword_8" type="text" value="<?php echo $formedit_djpassword_8;?>"/>
                <span class="field_desc"><?php echo "DJ-Password";?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo "<font color='#FF0000'>Login8:Password8</font>";?></label>
                <input class="mediumfield" name="" type="text" value="<?php echo "".$formedit_djlogin_8.":".$formedit_djpassword_8."";?>"readonly="readonly"/>
                <span class="field_desc"><?php echo $messages["sct16"];?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo $messages["sct15"];?></label>
                <select class="formselect_loca" name="djpriority_8">
                <option value="1"<?php if ($formedit_djpriority_8 == '1') echo " selected=\"selected\"";?>><?php echo $messages["sct27"]; ?></option>
                <option value="3"<?php if ($formedit_djpriority_8 == '3') echo " selected=\"selected\"";?>><?php echo $messages["sct27-1"]; ?></option>
                <option value="5"<?php if ($formedit_djpriority_8 == '5') echo " selected=\"selected\"";?>><?php echo $messages["sct27-2"]; ?></option>
                <option value="9"<?php if ($formedit_djpriority_8 == '9') echo " selected=\"selected\"";?>><?php echo $messages["sct27-3"]; ?></option>
                </select>
                <span class="field_desc"><?php echo $messages["sct30"]; ?><?php echo " DJ 8";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Login9";?></label>
                <input class="mediumfield" name="djlogin_9" type="text" value="<?php echo $formedit_djlogin_9;?>"/>
                <span class="field_desc"><?php echo "DJ-Name";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Password9";?></label>
                <input class="mediumfield" name="djpassword_9" type="text" value="<?php echo $formedit_djpassword_9;?>"/>
                <span class="field_desc"><?php echo "DJ-Password";?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo "<font color='#FF0000'>Login9:Password9</font>";?></label>
                <input class="mediumfield" name="" type="text" value="<?php echo "".$formedit_djlogin_9.":".$formedit_djpassword_9."";?>"readonly="readonly"/>
                <span class="field_desc"><?php echo $messages["sct16"];?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo $messages["sct15"];?></label>
                <select class="formselect_loca" name="djpriority_9">
                <option value="1"<?php if ($formedit_djpriority_9 == '1') echo " selected=\"selected\"";?>><?php echo $messages["sct27"]; ?></option>
                <option value="3"<?php if ($formedit_djpriority_9 == '3') echo " selected=\"selected\"";?>><?php echo $messages["sct27-1"]; ?></option>
                <option value="5"<?php if ($formedit_djpriority_9 == '5') echo " selected=\"selected\"";?>><?php echo $messages["sct27-2"]; ?></option>
                <option value="9"<?php if ($formedit_djpriority_9 == '9') echo " selected=\"selected\"";?>><?php echo $messages["sct27-3"]; ?></option>
                </select>
                <span class="field_desc"><?php echo $messages["sct30"]; ?><?php echo " DJ 9";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Login10";?></label>
                <input class="mediumfield" name="djlogin_10" type="text" value="<?php echo $formedit_djlogin_10;?>"/>
                <span class="field_desc"><?php echo "DJ-Name";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Password10";?></label>
                <input class="mediumfield" name="djpassword_10" type="text" value="<?php echo $formedit_djpassword_10;?>"/>
                <span class="field_desc"><?php echo "DJ-Password";?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo "<font color='#FF0000'>Login10:Password10</font>";?></label>
                <input class="mediumfield" name="" type="text" value="<?php echo "".$formedit_djlogin_10.":".$formedit_djpassword_10."";?>"readonly="readonly"/>
                <span class="field_desc"><?php echo $messages["sct16"];?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo $messages["sct15"];?></label>
                <select class="formselect_loca" name="djpriority_10">
                <option value="1"<?php if ($formedit_djpriority_10 == '1') echo " selected=\"selected\"";?>><?php echo $messages["sct27"]; ?></option>
                <option value="3"<?php if ($formedit_djpriority_10 == '3') echo " selected=\"selected\"";?>><?php echo $messages["sct27-1"]; ?></option>
                <option value="5"<?php if ($formedit_djpriority_10 == '5') echo " selected=\"selected\"";?>><?php echo $messages["sct27-2"]; ?></option>
                <option value="9"<?php if ($formedit_djpriority_10 == '9') echo " selected=\"selected\"";?>><?php echo $messages["sct27-3"]; ?></option>
                </select>
                <span class="field_desc"><?php echo $messages["sct30"]; ?><?php echo " DJ 10";?></span>
            </div>
            <input class="submit" type="submit" name="submit" value="<?php echo "Aktualisieren der Daten";?>"/>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Login11";?></label>
                <input class="mediumfield" name="djlogin_11" type="text" value="<?php echo $formedit_djlogin_11;?>"/>
                <span class="field_desc"><?php echo "DJ-Name";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Password11";?></label>
                <input class="mediumfield" name="djpassword_11" type="text" value="<?php echo $formedit_djpassword_11;?>"/>
                <span class="field_desc"><?php echo "DJ-Password";?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo "<font color='#FF0000'>Login11:Password11</font>";?></label>
                <input class="mediumfield" name="" type="text" value="<?php echo "".$formedit_djlogin_11.":".$formedit_djpassword_11."";?>"readonly="readonly"/>
                <span class="field_desc"><?php echo $messages["sct16"];?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo $messages["sct15"];?></label>
                <select class="formselect_loca" name="djpriority_11">
                <option value="1"<?php if ($formedit_djpriority_11 == '1') echo " selected=\"selected\"";?>><?php echo $messages["sct27"]; ?></option>
                <option value="3"<?php if ($formedit_djpriority_11 == '3') echo " selected=\"selected\"";?>><?php echo $messages["sct27-1"]; ?></option>
                <option value="5"<?php if ($formedit_djpriority_11 == '5') echo " selected=\"selected\"";?>><?php echo $messages["sct27-2"]; ?></option>
                <option value="9"<?php if ($formedit_djpriority_11 == '9') echo " selected=\"selected\"";?>><?php echo $messages["sct27-3"]; ?></option>
                </select>
                <span class="field_desc"><?php echo $messages["sct30"]; ?><?php echo " DJ 11";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Login12";?></label>
                <input class="mediumfield" name="djlogin_12" type="text" value="<?php echo $formedit_djlogin_12;?>"/>
                <span class="field_desc"><?php echo "DJ-Name";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Password12";?></label>
                <input class="mediumfield" name="djpassword_12" type="text" value="<?php echo $formedit_djpassword_12;?>"/>
                <span class="field_desc"><?php echo "DJ-Password";?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo "<font color='#FF0000'>Login12:Password12</font>";?></label>
                <input class="mediumfield" name="" type="text" value="<?php echo "".$formedit_djlogin_12.":".$formedit_djpassword_12."";?>"readonly="readonly"/>
                <span class="field_desc"><?php echo $messages["sct16"];?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo $messages["sct15"];?></label>
                <select class="formselect_loca" name="djpriority_12">
                <option value="1"<?php if ($formedit_djpriority_12 == '1') echo " selected=\"selected\"";?>><?php echo $messages["sct27"]; ?></option>
                <option value="3"<?php if ($formedit_djpriority_12 == '3') echo " selected=\"selected\"";?>><?php echo $messages["sct27-1"]; ?></option>
                <option value="5"<?php if ($formedit_djpriority_12 == '5') echo " selected=\"selected\"";?>><?php echo $messages["sct27-2"]; ?></option>
                <option value="9"<?php if ($formedit_djpriority_12 == '9') echo " selected=\"selected\"";?>><?php echo $messages["sct27-3"]; ?></option>
                </select>
                <span class="field_desc"><?php echo $messages["sct30"]; ?><?php echo " DJ 12";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Login13";?></label>
                <input class="mediumfield" name="djlogin_13" type="text" value="<?php echo $formedit_djlogin_13;?>"/>
                <span class="field_desc"><?php echo "DJ-Name";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Password13";?></label>
                <input class="mediumfield" name="djpassword_13" type="text" value="<?php echo $formedit_djpassword_13;?>"/>
                <span class="field_desc"><?php echo "DJ-Password";?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo "<font color='#FF0000'>Login13:Password13</font>";?></label>
                <input class="mediumfield" name="" type="text" value="<?php echo "".$formedit_djlogin_13.":".$formedit_djpassword_13."";?>"readonly="readonly"/>
                <span class="field_desc"><?php echo $messages["sct16"];?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo $messages["sct15"];?></label>
                <select class="formselect_loca" name="djpriority_13">
                <option value="1"<?php if ($formedit_djpriority_13 == '1') echo " selected=\"selected\"";?>><?php echo $messages["sct27"]; ?></option>
                <option value="3"<?php if ($formedit_djpriority_13 == '3') echo " selected=\"selected\"";?>><?php echo $messages["sct27-1"]; ?></option>
                <option value="5"<?php if ($formedit_djpriority_13 == '5') echo " selected=\"selected\"";?>><?php echo $messages["sct27-2"]; ?></option>
                <option value="9"<?php if ($formedit_djpriority_13 == '9') echo " selected=\"selected\"";?>><?php echo $messages["sct27-3"]; ?></option>
                </select>
                <span class="field_desc"><?php echo $messages["sct30"]; ?><?php echo " DJ 13";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Login14";?></label>
                <input class="mediumfield" name="djlogin_14" type="text" value="<?php echo $formedit_djlogin_14;?>"/>
                <span class="field_desc"><?php echo "DJ-Name";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Password14";?></label>
                <input class="mediumfield" name="djpassword_14" type="text" value="<?php echo $formedit_djpassword_14;?>"/>
                <span class="field_desc"><?php echo "DJ-Password";?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo "<font color='#FF0000'>Login14:Password14</font>";?></label>
                <input class="mediumfield" name="" type="text" value="<?php echo "".$formedit_djlogin_14.":".$formedit_djpassword_14."";?>"readonly="readonly"/>
                <span class="field_desc"><?php echo $messages["sct16"];?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo $messages["sct15"];?></label>
                <select class="formselect_loca" name="djpriority_14">
                <option value="1"<?php if ($formedit_djpriority_14 == '1') echo " selected=\"selected\"";?>><?php echo $messages["sct27"]; ?></option>
                <option value="3"<?php if ($formedit_djpriority_14 == '3') echo " selected=\"selected\"";?>><?php echo $messages["sct27-1"]; ?></option>
                <option value="5"<?php if ($formedit_djpriority_14 == '5') echo " selected=\"selected\"";?>><?php echo $messages["sct27-2"]; ?></option>
                <option value="9"<?php if ($formedit_djpriority_14 == '9') echo " selected=\"selected\"";?>><?php echo $messages["sct27-3"]; ?></option>
                </select>
                <span class="field_desc"><?php echo $messages["sct30"]; ?><?php echo " DJ 14";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Login15";?></label>
                <input class="mediumfield" name="djlogin_15" type="text" value="<?php echo $formedit_djlogin_15;?>"/>
                <span class="field_desc"><?php echo "DJ-Name";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Password15";?></label>
                <input class="mediumfield" name="djpassword_15" type="text" value="<?php echo $formedit_djpassword_15;?>"/>
                <span class="field_desc"><?php echo "DJ-Password";?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo "<font color='#FF0000'>Login15:Password15</font>";?></label>
                <input class="mediumfield" name="" type="text" value="<?php echo "".$formedit_djlogin_15.":".$formedit_djpassword_15."";?>"readonly="readonly"/>
                <span class="field_desc"><?php echo $messages["sct16"];?></span>
            </div>
           <div class="input_field">
                <label for="a18"><?php echo $messages["sct15"];?></label>
                <select class="formselect_loca" name="djpriority_15">
                <option value="1"<?php if ($formedit_djpriority_15 == '1') echo " selected=\"selected\"";?>><?php echo $messages["sct27"]; ?></option>
                <option value="3"<?php if ($formedit_djpriority_15 == '3') echo " selected=\"selected\"";?>><?php echo $messages["sct27-1"]; ?></option>
                <option value="5"<?php if ($formedit_djpriority_15 == '5') echo " selected=\"selected\"";?>><?php echo $messages["sct27-2"]; ?></option>
                <option value="9"<?php if ($formedit_djpriority_15 == '9') echo " selected=\"selected\"";?>><?php echo $messages["sct27-3"]; ?></option>
                </select>
                <span class="field_desc"><?php echo $messages["sct30"]; ?><?php echo " DJ 15";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Login16";?></label>
                <input class="mediumfield" name="djlogin_16" type="text" value="<?php echo $formedit_djlogin_16;?>"/>
                <span class="field_desc"><?php echo "DJ-Name";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Password16";?></label>
                <input class="mediumfield" name="djpassword_16" type="text" value="<?php echo $formedit_djpassword_16;?>"/>
                <span class="field_desc"><?php echo "DJ-Password";?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo "<font color='#FF0000'>Login16:Password16</font>";?></label>
                <input class="mediumfield" name="" type="text" value="<?php echo "".$formedit_djlogin_16.":".$formedit_djpassword_16."";?>"readonly="readonly"/>
                <span class="field_desc"><?php echo $messages["sct16"];?></span>
            </div>
           <div class="input_field">
                <label for="a18"><?php echo $messages["sct15"];?></label>
                <select class="formselect_loca" name="djpriority_16">
                <option value="1"<?php if ($formedit_djpriority_16 == '1') echo " selected=\"selected\"";?>><?php echo $messages["sct27"]; ?></option>
                <option value="3"<?php if ($formedit_djpriority_16 == '3') echo " selected=\"selected\"";?>><?php echo $messages["sct27-1"]; ?></option>
                <option value="5"<?php if ($formedit_djpriority_16 == '5') echo " selected=\"selected\"";?>><?php echo $messages["sct27-2"]; ?></option>
                <option value="9"<?php if ($formedit_djpriority_16 == '9') echo " selected=\"selected\"";?>><?php echo $messages["sct27-3"]; ?></option>
                </select>
                <span class="field_desc"><?php echo $messages["sct30"]; ?><?php echo " DJ 16";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Login17";?></label>
                <input class="mediumfield" name="djlogin_17" type="text" value="<?php echo $formedit_djlogin_17;?>"/>
                <span class="field_desc"><?php echo "DJ-Name";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Password17";?></label>
                <input class="mediumfield" name="djpassword_17" type="text" value="<?php echo $formedit_djpassword_17;?>"/>
                <span class="field_desc"><?php echo "DJ-Password";?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo "<font color='#FF0000'>Login17:Password17</font>";?></label>
                <input class="mediumfield" name="" type="text" value="<?php echo "".$formedit_djlogin_17.":".$formedit_djpassword_17."";?>"readonly="readonly"/>
                <span class="field_desc"><?php echo $messages["sct16"];?></span>
            </div>
           <div class="input_field">
                <label for="a18"><?php echo $messages["sct15"];?></label>
                <select class="formselect_loca" name="djpriority_17">
                <option value="1"<?php if ($formedit_djpriority_17 == '1') echo " selected=\"selected\"";?>><?php echo $messages["sct27"]; ?></option>
                <option value="3"<?php if ($formedit_djpriority_17 == '3') echo " selected=\"selected\"";?>><?php echo $messages["sct27-1"]; ?></option>
                <option value="5"<?php if ($formedit_djpriority_17 == '5') echo " selected=\"selected\"";?>><?php echo $messages["sct27-2"]; ?></option>
                <option value="9"<?php if ($formedit_djpriority_17 == '9') echo " selected=\"selected\"";?>><?php echo $messages["sct27-3"]; ?></option>
                </select>
                <span class="field_desc"><?php echo $messages["sct30"]; ?><?php echo " DJ 17";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Login18";?></label>
                <input class="mediumfield" name="djlogin_18" type="text" value="<?php echo $formedit_djlogin_18;?>"/>
                <span class="field_desc"><?php echo "DJ-Name";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Password18";?></label>
                <input class="mediumfield" name="djpassword_18" type="text" value="<?php echo $formedit_djpassword_18;?>"/>
                <span class="field_desc"><?php echo "DJ-Password";?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo "<font color='#FF0000'>Login18:Password18</font>";?></label>
                <input class="mediumfield" name="" type="text" value="<?php echo "".$formedit_djlogin_18.":".$formedit_djpassword_18."";?>"readonly="readonly"/>
                <span class="field_desc"><?php echo $messages["sct16"];?></span>
            </div>
           <div class="input_field">
                <label for="a18"><?php echo $messages["sct15"];?></label>
                <select class="formselect_loca" name="djpriority_18">
                <option value="1"<?php if ($formedit_djpriority_18 == '1') echo " selected=\"selected\"";?>><?php echo $messages["sct27"]; ?></option>
                <option value="3"<?php if ($formedit_djpriority_18 == '3') echo " selected=\"selected\"";?>><?php echo $messages["sct27-1"]; ?></option>
                <option value="5"<?php if ($formedit_djpriority_18 == '5') echo " selected=\"selected\"";?>><?php echo $messages["sct27-2"]; ?></option>
                <option value="9"<?php if ($formedit_djpriority_18 == '9') echo " selected=\"selected\"";?>><?php echo $messages["sct27-3"]; ?></option>
                </select>
                <span class="field_desc"><?php echo $messages["sct30"]; ?><?php echo " DJ 18";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Login19";?></label>
                <input class="mediumfield" name="djlogin_19" type="text" value="<?php echo $formedit_djlogin_19;?>"/>
                <span class="field_desc"><?php echo "DJ-Name";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Password19";?></label>
                <input class="mediumfield" name="djpassword_19" type="text" value="<?php echo $formedit_djpassword_19;?>"/>
                <span class="field_desc"><?php echo "DJ-Password";?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo "<font color='#FF0000'>Login19:Password19</font>";?></label>
                <input class="mediumfield" name="" type="text" value="<?php echo "".$formedit_djlogin_19.":".$formedit_djpassword_19."";?>"readonly="readonly"/>
                <span class="field_desc"><?php echo $messages["sct16"];?></span>
            </div>
           <div class="input_field">
                <label for="a18"><?php echo $messages["sct15"];?></label>
                <select class="formselect_loca" name="djpriority_19">
                <option value="1"<?php if ($formedit_djpriority_19 == '1') echo " selected=\"selected\"";?>><?php echo $messages["sct27"]; ?></option>
                <option value="3"<?php if ($formedit_djpriority_19 == '3') echo " selected=\"selected\"";?>><?php echo $messages["sct27-1"]; ?></option>
                <option value="5"<?php if ($formedit_djpriority_19 == '5') echo " selected=\"selected\"";?>><?php echo $messages["sct27-2"]; ?></option>
                <option value="9"<?php if ($formedit_djpriority_19 == '9') echo " selected=\"selected\"";?>><?php echo $messages["sct27-3"]; ?></option>
                </select>
                <span class="field_desc"><?php echo $messages["sct30"]; ?><?php echo " DJ 19";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Login20";?></label>
                <input class="mediumfield" name="djlogin_20" type="text" value="<?php echo $formedit_djlogin_20;?>"/>
                <span class="field_desc"><?php echo "DJ-Name";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Password20";?></label>
                <input class="mediumfield" name="djpassword_20" type="text" value="<?php echo $formedit_djpassword_20;?>"/>
                <span class="field_desc"><?php echo "DJ-Password";?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo "<font color='#FF0000'>Login20:Password20</font>";?></label>
                <input class="mediumfield" name="" type="text" value="<?php echo "".$formedit_djlogin_20.":".$formedit_djpassword_20."";?>"readonly="readonly"/>
                <span class="field_desc"><?php echo $messages["sct16"];?></span>
            </div>
           <div class="input_field">
                <label for="a18"><?php echo $messages["sct15"];?></label>
                <select class="formselect_loca" name="djpriority_20">
                <option value="1"<?php if ($formedit_djpriority_20 == '1') echo " selected=\"selected\"";?>><?php echo $messages["sct27"]; ?></option>
                <option value="3"<?php if ($formedit_djpriority_20 == '3') echo " selected=\"selected\"";?>><?php echo $messages["sct27-1"]; ?></option>
                <option value="5"<?php if ($formedit_djpriority_20 == '5') echo " selected=\"selected\"";?>><?php echo $messages["sct27-2"]; ?></option>
                <option value="9"<?php if ($formedit_djpriority_20 == '9') echo " selected=\"selected\"";?>><?php echo $messages["sct27-3"]; ?></option>
                </select>
                <span class="field_desc"><?php echo $messages["sct30"]; ?><?php echo " DJ 20";?></span>
            </div>
            <input class="submit" type="submit" name="submit" value="<?php echo "Aktualisieren der Daten";?>"/>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Login21";?></label>
                <input class="mediumfield" name="djlogin_21" type="text" value="<?php echo $formedit_djlogin_21;?>"/>
                <span class="field_desc"><?php echo "DJ-Name";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Password21";?></label>
                <input class="mediumfield" name="djpassword_21" type="text" value="<?php echo $formedit_djpassword_21;?>"/>
                <span class="field_desc"><?php echo "DJ-Password";?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo "<font color='#FF0000'>Login21:Password21</font>";?></label>
                <input class="mediumfield" name="" type="text" value="<?php echo "".$formedit_djlogin_21.":".$formedit_djpassword_21."";?>"readonly="readonly"/>
                <span class="field_desc"><?php echo $messages["sct16"];?></span>
            </div>
           <div class="input_field">
                <label for="a18"><?php echo $messages["sct15"];?></label>
                <select class="formselect_loca" name="djpriority_21">
                <option value="1"<?php if ($formedit_djpriority_21 == '1') echo " selected=\"selected\"";?>><?php echo $messages["sct27"]; ?></option>
                <option value="3"<?php if ($formedit_djpriority_21 == '3') echo " selected=\"selected\"";?>><?php echo $messages["sct27-1"]; ?></option>
                <option value="5"<?php if ($formedit_djpriority_21 == '5') echo " selected=\"selected\"";?>><?php echo $messages["sct27-2"]; ?></option>
                <option value="9"<?php if ($formedit_djpriority_21 == '9') echo " selected=\"selected\"";?>><?php echo $messages["sct27-3"]; ?></option>
                </select>
                <span class="field_desc"><?php echo $messages["sct30"]; ?><?php echo " DJ 21";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Login22";?></label>
                <input class="mediumfield" name="djlogin_22" type="text" value="<?php echo $formedit_djlogin_22;?>"/>
                <span class="field_desc"><?php echo "DJ-Name";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Password22";?></label>
                <input class="mediumfield" name="djpassword_22" type="text" value="<?php echo $formedit_djpassword_22;?>"/>
                <span class="field_desc"><?php echo "DJ-Password";?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo "<font color='#FF0000'>Login22:Password22</font>";?></label>
                <input class="mediumfield" name="" type="text" value="<?php echo "".$formedit_djlogin_22.":".$formedit_djpassword_22."";?>"readonly="readonly"/>
                <span class="field_desc"><?php echo $messages["sct16"];?></span>
            </div>
           <div class="input_field">
                <label for="a18"><?php echo $messages["sct15"];?></label>
                <select class="formselect_loca" name="djpriority_22">
                <option value="1"<?php if ($formedit_djpriority_22 == '1') echo " selected=\"selected\"";?>><?php echo $messages["sct27"]; ?></option>
                <option value="3"<?php if ($formedit_djpriority_22 == '3') echo " selected=\"selected\"";?>><?php echo $messages["sct27-1"]; ?></option>
                <option value="5"<?php if ($formedit_djpriority_22 == '5') echo " selected=\"selected\"";?>><?php echo $messages["sct27-2"]; ?></option>
                <option value="9"<?php if ($formedit_djpriority_22 == '9') echo " selected=\"selected\"";?>><?php echo $messages["sct27-3"]; ?></option>
                </select>
                <span class="field_desc"><?php echo $messages["sct30"]; ?><?php echo " DJ 22";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Login23";?></label>
                <input class="mediumfield" name="djlogin_23" type="text" value="<?php echo $formedit_djlogin_23;?>"/>
                <span class="field_desc"><?php echo "DJ-Name";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Password23";?></label>
                <input class="mediumfield" name="djpassword_23" type="text" value="<?php echo $formedit_djpassword_23;?>"/>
                <span class="field_desc"><?php echo "DJ-Password";?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo "<font color='#FF0000'>Login23:Password23</font>";?></label>
                <input class="mediumfield" name="" type="text" value="<?php echo "".$formedit_djlogin_23.":".$formedit_djpassword_23."";?>"readonly="readonly"/>
                <span class="field_desc"><?php echo $messages["sct16"];?></span>
            </div>
           <div class="input_field">
                <label for="a18"><?php echo $messages["sct15"];?></label>
                <select class="formselect_loca" name="djpriority_23">
                <option value="1"<?php if ($formedit_djpriority_23 == '1') echo " selected=\"selected\"";?>><?php echo $messages["sct27"]; ?></option>
                <option value="3"<?php if ($formedit_djpriority_23 == '3') echo " selected=\"selected\"";?>><?php echo $messages["sct27-1"]; ?></option>
                <option value="5"<?php if ($formedit_djpriority_23 == '5') echo " selected=\"selected\"";?>><?php echo $messages["sct27-2"]; ?></option>
                <option value="9"<?php if ($formedit_djpriority_23 == '9') echo " selected=\"selected\"";?>><?php echo $messages["sct27-3"]; ?></option>
                </select>
                <span class="field_desc"><?php echo $messages["sct30"]; ?><?php echo " DJ 23";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Login24";?></label>
                <input class="mediumfield" name="djlogin_24" type="text" value="<?php echo $formedit_djlogin_24;?>"/>
                <span class="field_desc"><?php echo "DJ-Name";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Password24";?></label>
                <input class="mediumfield" name="djpassword_24" type="text" value="<?php echo $formedit_djpassword_24;?>"/>
                <span class="field_desc"><?php echo "DJ-Password";?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo "<font color='#FF0000'>Login24:Password24</font>";?></label>
                <input class="mediumfield" name="" type="text" value="<?php echo "".$formedit_djlogin_24.":".$formedit_djpassword_24."";?>"readonly="readonly"/>
                <span class="field_desc"><?php echo $messages["sct16"];?></span>
            </div>
           <div class="input_field">
                <label for="a18"><?php echo $messages["sct15"];?></label>
                <select class="formselect_loca" name="djpriority_24">
                <option value="1"<?php if ($formedit_djpriority_24 == '1') echo " selected=\"selected\"";?>><?php echo $messages["sct27"]; ?></option>
                <option value="3"<?php if ($formedit_djpriority_24 == '3') echo " selected=\"selected\"";?>><?php echo $messages["sct27-1"]; ?></option>
                <option value="5"<?php if ($formedit_djpriority_24 == '5') echo " selected=\"selected\"";?>><?php echo $messages["sct27-2"]; ?></option>
                <option value="9"<?php if ($formedit_djpriority_24 == '9') echo " selected=\"selected\"";?>><?php echo $messages["sct27-3"]; ?></option>
                </select>
                <span class="field_desc"><?php echo $messages["sct30"]; ?><?php echo " DJ 24";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Login25";?></label>
                <input class="mediumfield" name="djlogin_25" type="text" value="<?php echo $formedit_djlogin_25;?>"/>
                <span class="field_desc"><?php echo "DJ-Name";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Password25";?></label>
                <input class="mediumfield" name="djpassword_25" type="text" value="<?php echo $formedit_djpassword_25;?>"/>
                <span class="field_desc"><?php echo "DJ-Password";?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo "<font color='#FF0000'>Login25:Password25</font>";?></label>
                <input class="mediumfield" name="" type="text" value="<?php echo "".$formedit_djlogin_25.":".$formedit_djpassword_25."";?>"readonly="readonly"/>
                <span class="field_desc"><?php echo $messages["sct16"];?></span>
            </div>
           <div class="input_field">
                <label for="a18"><?php echo $messages["sct15"];?></label>
                <select class="formselect_loca" name="djpriority_25">
                <option value="1"<?php if ($formedit_djpriority_25 == '1') echo " selected=\"selected\"";?>><?php echo $messages["sct27"]; ?></option>
                <option value="3"<?php if ($formedit_djpriority_25 == '3') echo " selected=\"selected\"";?>><?php echo $messages["sct27-1"]; ?></option>
                <option value="5"<?php if ($formedit_djpriority_25 == '5') echo " selected=\"selected\"";?>><?php echo $messages["sct27-2"]; ?></option>
                <option value="9"<?php if ($formedit_djpriority_25 == '9') echo " selected=\"selected\"";?>><?php echo $messages["sct27-3"]; ?></option>
                </select>
                <span class="field_desc"><?php echo $messages["sct30"]; ?><?php echo " DJ 25";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Login26";?></label>
                <input class="mediumfield" name="djlogin_26" type="text" value="<?php echo $formedit_djlogin_26;?>"/>
                <span class="field_desc"><?php echo "DJ-Name";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Password26";?></label>
                <input class="mediumfield" name="djpassword_26" type="text" value="<?php echo $formedit_djpassword_26;?>"/>
                <span class="field_desc"><?php echo "DJ-Password";?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo "<font color='#FF0000'>Login26:Password26</font>";?></label>
                <input class="mediumfield" name="" type="text" value="<?php echo "".$formedit_djlogin_26.":".$formedit_djpassword_26."";?>"readonly="readonly"/>
                <span class="field_desc"><?php echo $messages["sct16"];?></span>
            </div>
           <div class="input_field">
                <label for="a18"><?php echo $messages["sct15"];?></label>
                <select class="formselect_loca" name="djpriority_26">
                <option value="1"<?php if ($formedit_djpriority_26 == '1') echo " selected=\"selected\"";?>><?php echo $messages["sct27"]; ?></option>
                <option value="3"<?php if ($formedit_djpriority_26 == '3') echo " selected=\"selected\"";?>><?php echo $messages["sct27-1"]; ?></option>
                <option value="5"<?php if ($formedit_djpriority_26 == '5') echo " selected=\"selected\"";?>><?php echo $messages["sct27-2"]; ?></option>
                <option value="9"<?php if ($formedit_djpriority_26 == '9') echo " selected=\"selected\"";?>><?php echo $messages["sct27-3"]; ?></option>
                </select>
                <span class="field_desc"><?php echo $messages["sct30"]; ?><?php echo " DJ 26";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Login27";?></label>
                <input class="mediumfield" name="djlogin_27" type="text" value="<?php echo $formedit_djlogin_27;?>"/>
                <span class="field_desc"><?php echo "DJ-Name";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Password27";?></label>
                <input class="mediumfield" name="djpassword_27" type="text" value="<?php echo $formedit_djpassword_27;?>"/>
                <span class="field_desc"><?php echo "DJ-Password";?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo "<font color='#FF0000'>Login27:Password27</font>";?></label>
                <input class="mediumfield" name="" type="text" value="<?php echo "".$formedit_djlogin_27.":".$formedit_djpassword_27."";?>"readonly="readonly"/>
                <span class="field_desc"><?php echo $messages["sct16"];?></span>
            </div>
           <div class="input_field">
                <label for="a18"><?php echo $messages["sct15"];?></label>
                <select class="formselect_loca" name="djpriority_27">
                <option value="1"<?php if ($formedit_djpriority_27 == '1') echo " selected=\"selected\"";?>><?php echo $messages["sct27"]; ?></option>
                <option value="3"<?php if ($formedit_djpriority_27 == '3') echo " selected=\"selected\"";?>><?php echo $messages["sct27-1"]; ?></option>
                <option value="5"<?php if ($formedit_djpriority_27 == '5') echo " selected=\"selected\"";?>><?php echo $messages["sct27-2"]; ?></option>
                <option value="9"<?php if ($formedit_djpriority_27 == '9') echo " selected=\"selected\"";?>><?php echo $messages["sct27-3"]; ?></option>
                </select>
                <span class="field_desc"><?php echo $messages["sct30"]; ?><?php echo " DJ 27";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Login28";?></label>
                <input class="mediumfield" name="djlogin_28" type="text" value="<?php echo $formedit_djlogin_28;?>"/>
                <span class="field_desc"><?php echo "DJ-Name";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Password28";?></label>
                <input class="mediumfield" name="djpassword_28" type="text" value="<?php echo $formedit_djpassword_28;?>"/>
                <span class="field_desc"><?php echo "DJ-Password";?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo "<font color='#FF0000'>Login28:Password28</font>";?></label>
                <input class="mediumfield" name="" type="text" value="<?php echo "".$formedit_djlogin_28.":".$formedit_djpassword_28."";?>"readonly="readonly"/>
                <span class="field_desc"><?php echo $messages["sct16"];?></span>
            </div>
           <div class="input_field">
                <label for="a18"><?php echo $messages["sct15"];?></label>
                <select class="formselect_loca" name="djpriority_28">
                <option value="1"<?php if ($formedit_djpriority_28 == '1') echo " selected=\"selected\"";?>><?php echo $messages["sct27"]; ?></option>
                <option value="3"<?php if ($formedit_djpriority_28 == '3') echo " selected=\"selected\"";?>><?php echo $messages["sct27-1"]; ?></option>
                <option value="5"<?php if ($formedit_djpriority_28 == '5') echo " selected=\"selected\"";?>><?php echo $messages["sct27-2"]; ?></option>
                <option value="9"<?php if ($formedit_djpriority_28 == '9') echo " selected=\"selected\"";?>><?php echo $messages["sct27-3"]; ?></option>
                </select>
                <span class="field_desc"><?php echo $messages["sct30"]; ?><?php echo " DJ 28";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Login29";?></label>
                <input class="mediumfield" name="djlogin_29" type="text" value="<?php echo $formedit_djlogin_29;?>"/>
                <span class="field_desc"><?php echo "DJ-Name";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Password29";?></label>
                <input class="mediumfield" name="djpassword_29" type="text" value="<?php echo $formedit_djpassword_29;?>"/>
                <span class="field_desc"><?php echo "DJ-Password";?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo "<font color='#FF0000'>Login29:Password29</font>";?></label>
                <input class="mediumfield" name="" type="text" value="<?php echo "".$formedit_djlogin_29.":".$formedit_djpassword_29."";?>"readonly="readonly"/>
                <span class="field_desc"><?php echo $messages["sct16"];?></span>
            </div>
           <div class="input_field">
                <label for="a18"><?php echo $messages["sct15"];?></label>
                <select class="formselect_loca" name="djpriority_29">
                <option value="1"<?php if ($formedit_djpriority_29 == '1') echo " selected=\"selected\"";?>><?php echo $messages["sct27"]; ?></option>
                <option value="3"<?php if ($formedit_djpriority_29 == '3') echo " selected=\"selected\"";?>><?php echo $messages["sct27-1"]; ?></option>
                <option value="5"<?php if ($formedit_djpriority_29 == '5') echo " selected=\"selected\"";?>><?php echo $messages["sct27-2"]; ?></option>
                <option value="9"<?php if ($formedit_djpriority_29 == '9') echo " selected=\"selected\"";?>><?php echo $messages["sct27-3"]; ?></option>
                </select>
                <span class="field_desc"><?php echo $messages["sct30"]; ?><?php echo " DJ 29";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Login30";?></label>
                <input class="mediumfield" name="djlogin_30" type="text" value="<?php echo $formedit_djlogin_30;?>"/>
                <span class="field_desc"><?php echo "DJ-Name";?></span>
            </div>
            <div class="input_field">
                <label for="a18"><?php echo "DJ Password30";?></label>
                <input class="mediumfield" name="djpassword_30" type="text" value="<?php echo $formedit_djpassword_30;?>"/>
                <span class="field_desc"><?php echo "DJ-Password";?></span>
            </div>
            <div class="input_field">
                <label for="a"><?php echo "<font color='#FF0000'>Login30:Password30</font>";?></label>
                <input class="mediumfield" name="" type="text" value="<?php echo "".$formedit_djlogin_30.":".$formedit_djpassword_30."";?>"readonly="readonly"/>
                <span class="field_desc"><?php echo $messages["sct16"];?></span>
            </div>
           <div class="input_field">
                <label for="a18"><?php echo $messages["sct15"];?></label>
                <select class="formselect_loca" name="djpriority_30">
                <option value="1"<?php if ($formedit_djpriority_30 == '1') echo " selected=\"selected\"";?>><?php echo $messages["sct27"]; ?></option>
                <option value="3"<?php if ($formedit_djpriority_30 == '3') echo " selected=\"selected\"";?>><?php echo $messages["sct27-1"]; ?></option>
                <option value="5"<?php if ($formedit_djpriority_30 == '5') echo " selected=\"selected\"";?>><?php echo $messages["sct27-2"]; ?></option>
                <option value="9"<?php if ($formedit_djpriority_30 == '9') echo " selected=\"selected\"";?>><?php echo $messages["sct27-3"]; ?></option>
                </select>
                <span class="field_desc"><?php echo $messages["sct30"]; ?><?php echo " DJ 30";?></span>
            </div>
            
            <input class="submit" type="submit" name="submit" value="<?php echo $messages["329"];?>"/>
            <input class="submit" type="reset" value="<?php echo $messages["330"];?>"
                   onclick="document.location='content.php?include=autodj';"/>
        </fieldset>
    </form>
   
</div>
<?php } ?>