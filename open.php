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

$debug = "0";

include("functions.php");

$strname   = $_GET['predefstream'];
$radiostr  = $_GET['stream'];
$radiostrt = $_GET['streamt'];

if($strname != "---"){
  $streamt = $strname;
  $stream  = base64_encode(get_streamurl($strname, $debug));
  $conf    = get_streamvideo_conf($strname, $debug);
}else{
 $streamt        = $radiostrt;
 $stream         = base64_encode($radiostr);
 $conf           = array();
 $conf['video']  = "0";
 $conf['width']  = "200";
 $conf['height'] = "50";
}

if($debug == "1"){
 echo("Media VARIABLES:<br />");
 echo('<strong>$strname   = </strong>"'.$strname.'";<br />');
 echo('<strong>$radiostr  = </strong>"'.$radiostr.'";<br />');
 echo('<strong>$radiostrt = </strong>"'.$radiostrt.'";<br />');
 echo('<strong>$streamt   = </strong>"'.$streamt.'";<br />');
 echo('<strong>$stream    = </strong>"'.$stream.'";<br />');
}else{
header('location: popup.php?streamt='.$streamt.'&stream='.$stream.'&video='.$conf['video'].'&width='.$conf['width'].'&height='.$conf['height'].'&error=0');
}

?>
