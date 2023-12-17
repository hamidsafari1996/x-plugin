<?php
/*
Plugin Name: X Addon
Plugin URI: #
Description: A plugin for creating news ticker and shortcode usability. 
Version: 1.0
Author: Hamid Safari
Author URI: #
License: A "Slug" license name e.g. GPL2
*/

define('x_addon_version','1.0.0');
define('x_addon_plugin_name','x_addon');

require_once 'class/class-base.php';
global $X_ADDON;
$X_ADDON = new X_ADDON();