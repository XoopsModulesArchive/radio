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

$modversion['name']        = "Radio";
$modversion['version']     = "2.2.1";
$modversion['description'] = "Creates a block where your users can listen to a radio stream";
$modversion['author']      = "Dylian Melgert";
$modversion['credits']     = "XD Soft (http://www.dylian.eu)";
$modversion['help']        = "Not needed";
$modversion['license']     = "licence.txt";
$modversion['official']    = "0";
$modversion['image']       = "logo.png";
$modversion['dirname']     = "radio";
$modversion['weight']      = "0";

// Menu
$modversion['hasMain'] = 1;

// Admin things
$modversion['hasAdmin']   = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu']  = "admin/menu.php";

// Blocks
$modversion['blocks'][1]['file'] = "radio_block.php";
$modversion['blocks'][1]['name'] = "Radio";
$modversion['blocks'][1]['description'] = "Shows radio choice";
$modversion['blocks'][1]['show_func'] = "radio_show";
$modversion['blocks'][1]['template'] = 'radio.html';

?>
