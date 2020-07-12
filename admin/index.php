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

include ('admin_header.php');
include(admin_language_file("main", $xoopsConfig['language']));

$opt = $_GET['opt'];

// If opt (option) is "stream" (Manage streams) create the stream manager
if($opt == "stream"){
 create_stream_list_delete(_delete);
 echo('<br /><h4>'._add_stream.'</h4>');
 create_stream_form(_strname, _strurl, _submit, _yes, _no, _is_video, _width, _height, _only_video);
 $loaded = "1";
}

// If opt (option) is "config" (Change configuration) create the config form
if($opt == "config"){
 create_config_form(_allow_users, _yes, _no, _submit);
 $loaded = "1";
}

/*if($opt == "chmod"){
 $path = XOOPS_ROOT_PATH.'/modules/radio/streams';
  if ($dh = opendir($path)) {
  while (($file = readdir($dh)) !== false) {
   chmod($path.'/'.$file,0777);
  }
 closedir($dh);
 $loaded = "1";
}*/

// If opt (option) is "strdelete" (Delete stream) delete the selected stream
if($opt == "strdelete"){
 if($_GET['sure'] == "1"){
 $delerror = delete_stream($_GET['strname']);
  if($delerror == "1"){
   radio_error(_error, _deletestre);
   echo("<br />");
   echo(get_opt_link(_go_back, "stream", "index"));
  }else{
   radio_error("", _deletestrs);
   echo("<br />");
   echo(get_opt_link(_go_back, "stream", "index"));
  }
 }else{
  echo('<strong>'._check_deletestr.'</strong>');
  echo("<br />");
  echo('<a href="'.XOOPS_URL.'/modules/radio/admin/index.php?opt=strdelete&strname='.$_GET['strname'].'&sure=1"target="_self">'._sure_deletestr.'</a>');
  echo('&nbsp;'._or.'&nbsp;');
  echo(get_opt_link(_go_back, "stream", "index"));
 }
 $loaded = "1";
}

// If none of the above options is loaded create choice links
if($loaded != "1"){
 echo(get_opt_link(_createstr, "stream", "index"));
 echo(get_opt_link(_createcnf, "config", "index"));
}

include ('admin_footer.php');
?>
