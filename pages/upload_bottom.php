
<h2><?php echo $messages["525"];?> <?php echo $port?></h2>

    <div class="tool_top_menu">
        <div class="main_shorttool"><?php echo $messages["526"];?></div>
        <div class="main_righttool">
            <h2><?php echo $messages["527"];?></h2>
            <p><?php echo $messages["528"];?></p>
            <p>&nbsp;</p>
        </div>
    </div>
    <form method="post" action="content.php?include=upload&portbase=<?php echo $port?>" enctype="multipart/form-data">
        <fieldset>
            <legend><?php echo $messages["529"];?> <?php echo $port?></legend>
            <input class="submit" type="reset" value="<?php echo $messages["330"];?>"
                   onclick="document.location='content.php?include=music'" TITLE='Upload Playlist'";"/>
            <table cellpadding="0" cellspacing="0" class="upload_table">
                <thead>
                <tr>
                    <th><?php echo $messages["530"];?></th>
                    <th><?php echo $messages["531"];?></th>
                    <th colspan="4"><?php echo $messages["532"];?></th>
                </tr>
                </thead>
                <tbody>
                <tr class="upload_table">
                    <td class="subnav_child"><?php echo $messages["533"];?></td>
                    <td class="upload_table"><?php echo "".round(($data['webspace']/1024), 2)." MB";?></td>
                    <td class="upload_table"><?php echo "".round(($actual_dir_size/1024), 2)." MB";?></td>

                    <?php
                    
                    $freesize = $data['webspace']-$actual_dir_size;
                    $freesize=$freesize*1024;
                    echo '<td><div class="upload_table_show" style="background-position:';
                    $negative_background_pos = ($actual_dir_size/$data['webspace'])*180;
                    echo '-'.$negative_background_pos.'px 0px;"></div></td>';
                    ?>
                </tr>

                <tr class="upload_table">
                    <td class="subnav_child"><?php echo $messages["536"];?></td>
                    <td colspan="3" class="upload_table">MP3</td>
                </tr>
                <tr class="upload_table">
                    <td class="subnav_child"><?php echo $messages["537"];?></td>
                    <td colspan="3" class="upload_table"><?php echo $port;?></td>
                </tr>
				</tbody>
            </table>
             <tr>
        <td> 
            
           <div id="demo1" style="width:575px;"></div>

            <script type="text/javascript">   
                          var freesize=<?php echo $freesize;?>;
                $('#demo1').ajaxupload({
                    url:'upload.php',
                    remotePath:'./uploads/<?php echo $_GET['portbase']; ?>',
                    dropArea:'#drophere',
                    maxConnections: '8',
                    allowExt: ['mp3']['MP3'],
                  

                    finish:function(filelist)
                               
                    {
                        setTimeout("location.reload(true);", 5000);
                    }

                });
            </script>


        </td>
    </tr>
            <div id="uploadbox"></div>
        </fieldset>
    </form>
    <ul class="paginator">
        <?php
        static $counter;
        $counter=0;
        $recursive=false;

        while (($datei = readdir($dirlistdir)) !== false) {
            if(($datei!=".") and ($datei!="..")) {
                $counter = (is_dir("./uploads/".$port."/".$datei)) ? num_files("./uploads/".$port."/".$datei, $recursive, $counter) : $counter+1;
            }
        }
        closedir($dirlistdir);
        $pagessubcount = ceil($counter/250);    // 250 = Titel pro Seite
        if ($offset == 1) {
            echo "<li><a href=\"content.php?include=upload&portbase=".$port."&filecount=".($offset)."\">".$messages["545"]."</a></li>";
        }
        else {
            echo "<li><a href=\"content.php?include=upload&portbase=".$port."&filecount=".($offset-1)."\">".$messages["545"]."</a></li>";
        }
        for ($pagessubcountfor=0; $pagessubcountfor <= $pagessubcount; $pagessubcountfor += 1) {
            if ($pagessubcountfor!==0) {
                echo "<li";
                if ($offset==$pagessubcountfor) {
                    echo " class=\"current\"";
                }
                echo"><a href=\"content.php?include=upload&portbase=".$port."&filecount=".$pagessubcountfor."\">".$pagessubcountfor."</a></li>";
            }
        }
        if ($offset == $pagessubcount) {
            echo "<li><a href=\"content.php?include=upload&portbase=".$port."&filecount=".($offset)."\">".$messages["546"]."</a></li>";
        }
        else {
            echo "<li><a href=\"content.php?include=upload&portbase=".$port."&filecount=".($offset+1)."\">".$messages["546"]."</a></li>";
        }
        ?>
    </ul>
    <br />
    <table cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th><?php echo $messages["541"];?></th>
            <th><?php echo $messages["542"];?></th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php
        for($i=$listing_start;$i<=$listing_end;$i++) {
            if (!isset($dirlisting[$i])) {
                continue;
            }

if (($dirlisting[$i]!=".") and ($dirlisting[$i]!="..") and ($dirlisting[$i]!="")) {
    $fnr = $i-1;
    $thisfilename = substr($dirlisting[$i], 0, 55);                                if(strlen($dirlisting[$i]) > 55 ) $thisfilename = $thisfilename."...";
    echo "<tr>
        <td>$fnr. $thisfilename</td>
								<td>".round((filesize("./uploads/".$port."/".$dirlisting[$i])/1024), 2)." KB (".round((filesize("./uploads/".$port."/".$dirlisting[$i])/1024/1024), 2)." MB)</td>
								<td><a class=\"delete\" href=\"content.php?include=upload&portbase=".$port."&delete=".base64_encode($dirlisting[$i])."\">".$messages["543"]."</a>
								<a class=\"selector\" href=\"content.php?include=upload&portbase=".$port."&download=".base64_encode($dirlisting[$i])."\">".$messages["544"]."</a></td>
								</tr>";
            }
        }
        ?>
        
        </tbody>
    </table>

 
