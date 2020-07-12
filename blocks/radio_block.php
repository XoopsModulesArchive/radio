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

function radio_show()
{
        include(XOOPS_ROOT_PATH."/modules/radio/config.inc.php");
        $block = array();
        $block['lang_choice'] = _choice;
        $block['lang_url']    = _url;
        $block['lang_name']   = _name;
        $block['lang_listen'] = _listen;
        $block['lang_error']  = _error;
        $block['allow_users'] = $allow_users;
        return $block;
}

?>
