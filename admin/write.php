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

include("admin_header.php");
$lngfile = admin_language_file("main", $xoopsConfig['language']);
if($lngfile != ""){
 include($lngfile);
}

$type  = $_REQUEST['type'];
$check = $_REQUEST['check'];

if($type == "config"){
 $file  = XOOPS_ROOT_PATH."/modules/radio/config.inc.php";
 $allow  = $_REQUEST['allow'];
 $fdata  = '<'.'?'.'p'.'h'.'p'.'

// '._allow_users.'
$allow_users = "'.$allow.'";

?'.'>';
 $create = file_create($file, $fdata);
 if($create == "1"){
  echo(_fail_create_cnf);
  echo("<br />");
  echo(get_opt_link(_go_back, "back", "index"));
 }else{
  echo(_succes_create_cnf);
  echo("<br />");
  echo(get_opt_link(_go_back, "back", "index"));
 }
}elseif($type == "stream"){
 $file   = XOOPS_ROOT_PATH.'/modules/radio/streams/'.check_free_stream().'.stream';
 $name   = $_REQUEST['name'];
 $url    = $_REQUEST['url'];
 $video  = $_REQUEST['video'];
 $width  = $_REQUEST['width'];
 $height = $_REQUEST['height'];
 if($video == "0"){
  $fdata  = '<'.'?'.'p'.'h'.'p'.'

// '._webstr_name.'
$name  = "'.$name.'";

// '._webstr_url.'
$url   = "'.$url.'";

// '._is_video.'
$video = "'.$video.'";

?'.'>';
 }elseif($video == "1"){
  $fdata  = '<'.'?'.'p'.'h'.'p'.'

// '._webstr_name.'
$name   = "'.$name.'";

// '._webstr_url.'
$url    = "'.$url.'";

// '._is_video.'
$video  = "'.$video.'";

// '._width.'
$width  = "'.$width.'";

// '._height.'
$height = "'.$height.'";

?'.'>';
 }
 $create = file_create($file, $fdata);
 if($create == "1"){
  echo(_fail_create_str);
  echo("<br />");
  echo(get_opt_link(_go_back, "stream", "index"));
 }else{
  echo(_succes_create_str);
  echo("<br />");
  echo(get_opt_link(_go_back, "stream", "index"));
 }
}
include("admin_footer.php");
?>
