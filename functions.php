<?php
###############################################################################
##   Copyright (C) 2009  Dylian Melgert                                      ##
##                                                                           ##
##      This program is free software: you can redistribute it and/or modify ##
##      it under the terms of the GNU General Public License as published by ##
##      the Free Software Foundation, either version 3 of the License, or    ##
##      (at your option) any later version.                                  ##
##                                                                           ##
##      This program is distributed in the hope that it will be useful,      ##
##      but WITHOUT ANY WARRANTY; without even the implied warranty of       ##
##      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the        ##
##      GNU General Public License for more details.                         ##
##                                                                           ##
##      You should have received a copy of the GNU General Public License    ##
##      along with this program.  If not, see <http://www.gnu.org/licenses/>.##
###############################################################################

if($admin == "1"){
 include("../../../mainfile.php");
}else{
 include("../../mainfile.php");
}

// Get the needed admin language file
function admin_language_file($file, $language){
 if (file_exists(XOOPS_ROOT_PATH."/modules/radio/language/".$language."/admin/".$file.".php")) {
  $lngfile = XOOPS_ROOT_PATH."/modules/radio/language/".$language."/admin/".$file.".php";
 } elseif (file_exists(XOOPS_ROOT_PATH."/modules/radio/language/english/admin/".$file.".php")) {
  $lngfile = XOOPS_ROOT_PATH."/modules/radio/language/english/admin/".$file.".php";
 }
 return $lngfile;
}

// Create a link with given data
function get_opt_link($txt, $type, $page){
 $url = XOOPS_URL."/modules/radio/admin/".$page.".php?opt=".$type;
 $opt_link = '<a href="'.$url.'" target="_self">'.$txt.'</a><br />';
 return $opt_link;
}

// The header of the radio popup
function popupheader($title){
 echo'
 <html>
  <header>
   <title>'.$title.'</title>
   <link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="'.XOOPS_URL.'/xoops.css" />
   <link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="'.XOOPS_URL.'/modules/radio/popup.css" />
  </header>
  <body>
   <center>
    <table id"radio" border="0" width="100%">
 ';
}

// The footer of the radio popup
function popupfooter(){
 echo'
   </table>
   </center>
  </body>
 </html>
 ';
}

// The embed code for media player
function radioembed($url, $width, $height){
 echo '
 <tr align="center">
 <td>
  <object id="NSPlay" width="'.$width.'" height="'.$height.'" classid="clsid:22D6F312-B0F6-11D0-94AB-0080C74C7E95" codebase="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=5,1,52,701" standby="Loading Microsoft Windows Media Player components..." type="application/x-oleobject" align="center">
   <param name="AudioStream" value="-1">
   <param name="AutoSize" value="0">
   <param name="AutoStart" value="-1">
   <param name="AnimationAtStart" value="-1">
   <param name="AllowScan" value="-1">
   <param name="AllowChangeDisplaySize" value="-1">
   <param name="AutoRewind" value="0">
   <param name="Balance" value="0">
   <param name="BaseURL" value>
   <param name="BufferingTime" value="5">
   <param name="CaptioningID" value>
   <param name="ClickToPlay" value="-1">
   <param name="CursorType" value="0">
   <param name="CurrentPosition" value="-1">
   <param name="CurrentMarker" value="0">
   <param name="DefaultFrame" value>
   <param name="DisplayBackColor" value="0">
   <param name="DisplayForeColor" value="16777215">
   <param name="DisplayMode" value="0">
   <param name="DisplaySize" value="4">
   <param name="Enabled" value="-1">
   <param name="EnableContextMenu" value="-1">
   <param name="EnablePositionControls" value="-1">
   <param name="EnableFullScreenControls" value="0">
   <param name="EnableTracker" value="-1">
   <param name="Filename" value="'.$url.'">
   <param name="InvokeURLs" value="-1">
   <param name="Language" value="-1">
   <param name="Mute" value="0">
   <param name="PlayCount" value="1">
   <param name="PreviewMode" value="0">
   <param name="Rate" value="1">
   <param name="SAMILang" value>
   <param name="SAMIStyle" value>
   <param name="SAMIFileName" value>
   <param name="SelectionStart" value="-1">
   <param name="SelectionEnd" value="-1">
   <param name="SendOpenStateChangeEvents" value="-1">
   <param name="SendWarningEvents" value="-1">
   <param name="SendErrorEvents" value="-1">
   <param name="SendKeyboardEvents" value="0">
   <param name="SendMouseClickEvents" value="0">
   <param name="SendMouseMoveEvents" value="0">
   <param name="SendPlayStateChangeEvents" value="-1">
   <param name="ShowCaptioning" value="0">
   <param name="ShowControls" value="-1">
   <param name="ShowAudioControls" value="-1">
   <param name="ShowDisplay" value="0">
   <param name="ShowGotoBar" value="0">
   <param name="ShowPositionControls" value="0">
   <param name="ShowStatusBar" value="-1">
   <param name="ShowTracker" value="0">
   <param name="TransparentAtStart" value="0">
   <param name="VideoBorderWidth" value="0">
   <param name="VideoBorderColor" value="0">
   <param name="VideoBorder3D" value="0">
   <param name="Volume" value="100">
   <param name="WindowlessVideo" value="0"><embed type="application/x-mplayer2" pluginspage="http://www.microsoft.com/Windows/Downloads/Contents/Products/MediaPlayer/" filename="'.$url.'" src="'.$url.'" showcontrols="1" showdisplay="0" showstatusbar="0" width="'.$width.'" height="'.$height.'" align="center">
  </object>
 </td>
 </tr>
 ';
}

// Display error messages
function radio_error($error, $desc){

 echo '<strong>'.$error.': '.$desc.'</strong>';
}

// Create the select box content for the radio block
function create_streamselect(){
 $ready    = "0";
 $streamnr = "1";
 while($ready == "0"){
  $streamfile = XOOPS_ROOT_PATH.'/modules/radio/streams/'.$streamnr.'.stream';
  if(file_exists($streamfile)) {
   include($streamfile);
   echo('<option>'.$name.'</option>');
   $streamnr++;
  }else{
   $ready = "1";
  }
 }
}

// Get stream url
function get_streamurl($stream, $debug){
 $ready    = "0";
 $streamnr = "1";
 while($ready == "0"){
  $streamfile = XOOPS_ROOT_PATH.'/modules/radio/streams/'.$streamnr.'.stream';
  if(file_exists($streamfile)) {
   include($streamfile);
   if($name == $stream){
    $strurl = $url;
    $ready = "1";
   }else{
    $streamnr++;
   }
  }else{
   $ready = "1";
  }
 }
 if($debug == "1"){
 echo("GET_URL VARIABLES:<br />");
 echo('<strong>$ready      = </strong>"'.$ready.'";<br />');
 echo('<strong>$streamnr   = </strong>"'.$streamnr.'";<br />');
 echo('<strong>$streamfile = </strong>"'.$streamfile.'";<br />');
 echo('<strong>$url        = </strong>"'.$url.'";<br />');
 echo('<strong>$strurl     = </strong>"'.$strurl.'";<br />');
 }
 return $strurl;
}

// Check te number of the latest stream
function check_free_stream(){
 $ready    = "0";
 $streamnr = "1";
 while($ready == "0"){
  $streamfile = XOOPS_ROOT_PATH.'/modules/radio/streams/'.$streamnr.'.stream';
  if(file_exists($streamfile)) {
   $streamnr++;
  }else{
   $ready = "1";
  }
 }
 return $streamnr;
}

// Create a file with the given data
function file_create($file, $data){
 if($fh = fopen($file, 'w')){
  fwrite($fh, $data);
  fclose($fh);
  chmod($file, 0777);
  $error = "0";
 }else{
  $error = "1";
 }
 return $error;
}

function create_stream_form($strname, $strurl, $submit, $yes, $no, $is_video, $width, $height, $only_video){
 echo('<form method="post" action="write.php">');
 echo('<input name="type" type="hidden" value="stream">');
 echo($strname.'&nbsp:&nbsp<input name="name" type="text" size="20"><br />');
 echo($strurl.'&nbsp:&nbsp<input name="url" type="text" size="20"><br />');
 echo('-----<br />');
 echo($is_video.'<br />'.$yes.' :<input name="video" value="1" type="radio"> | '.$no.' :<input name="video" value="0" type="radio"><br /><br />');
 echo('<strong>'.$only_video.'</strong><br />');
 echo($width.'&nbsp:&nbsp<input name="width" type="text" size="20"><br />');
 echo($height.'&nbsp:&nbsp<input name="height" type="text" size="20"><br />');
 echo('<input type="submit" value="'.$submit.'">');
 echo('</form>');
}

function create_config_form($allow_users, $yes, $no, $submit){
 echo('<form method="post" action="write.php">');
 echo('<input name="type" type="hidden" value="config">');
 echo($allow_users.'<br />'.$yes.' :<input name="allow" value="1" type="radio"> | '.$no.' :<input name="allow" value="0" type="radio"><br />');
 echo('<input type="submit" value="'.$submit.'">');
 echo('</form>');
}
// Create a select box with delete button
function create_stream_list_delete($_delete){
 $ready    = "0";
 $streamnr = "1";
 echo('<form method="get" action="index.php">');
 echo('<input type="hidden" name="opt" value="strdelete">');
 echo('<select name="strname" size="1">');
 while($ready == "0"){
  $streamfile = XOOPS_ROOT_PATH.'/modules/radio/streams/'.$streamnr.'.stream';
  if(file_exists($streamfile)) {
   include($streamfile);
   echo('<option>'.$name.'</option>');
   $streamnr++;
  }else{
   $ready = "1";
  }
 }
 echo('</select><input type="submit" value="'.$_delete.'">');
 echo('</form>');
}

// Delete stream file
function delete_stream($stream){
 $ready    = "0";
 $streamnr = "1";
 while($ready == "0"){
  $streamfile = XOOPS_ROOT_PATH.'/modules/radio/streams/'.$streamnr.'.stream';
  if(file_exists($streamfile)) {
   include($streamfile);
   if($name == $stream){
    $ready = "1";
   }else{
    $streamnr++;
   }
  }else{
   $ready = "1";
  }
 }
 if(unlink($streamfile)){
  $error = "0";
 }else{
  $error = "1";
 }
 return $error;
}
// Check if the stream is a video
function get_streamvideo_conf($stream, $debug){
 $ready    = "0";
 $streamnr = "1";
 while($ready == "0"){
  $streamfile = XOOPS_ROOT_PATH.'/modules/radio/streams/'.$streamnr.'.stream';
  if(file_exists($streamfile)) {
   include($streamfile);
   if($name == $stream){
    if($video == 1){
     $conf = array();
     $conf['video']  = $video;
     $conf['width']  = $width;
     $conf['height'] = $height;
    }else{
     $conf = array();
     $conf['video']  = $video;
     $conf['width']  = "200";
     $conf['height'] = "50";
    }
    $ready = "1";
   }else{
    $streamnr++;
   }
  }else{
   $ready = "1";
  }
 }
 return $conf;
}

?>
