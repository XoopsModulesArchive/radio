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

include("functions.php");

$language  = $_GET['lang'];
$radiostr  = $_GET['stream'];
$radiostrt = $_GET['streamt'];
$width     = $_GET['width'];
$height    = $_GET['height'];
$error     = $_GET['error'];

$swidth  = $width+40;
$sheight = $height+110;

echo'
<script>
 window.innerHeight = '.$sheight.';
 window.innerWidth = '.$swidth.';
 self.resizeTo('.$swidth.','.$sheight.');
</script>
';
$radio = base64_decode($radiostr);

if($radio == ""){
 $error = "1";
}

if($radiostrt != ""){
 $radiot = stripslashes($radiostrt);
}else{
 $radiot = "Radio";
 $error = "2";
}

popupheader($radiot);

if($error == "1"){
 radio_error("ERROR", "Could not find stream!");
}else{
 radioembed($radio, $width, $height);
}

if($error == "2"){
 radio_error("WARNING", "Could not find stream name!");
}

popupfooter();
?>
