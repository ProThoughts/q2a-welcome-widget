<?php

/*
	Plugin Name: Welcom Widget Plugin
	Plugin URI:
	Plugin Description: Welcome the new users.
	Plugin Version: 1.0
	Plugin Date: 2016-07-29
	Plugin Author: 38qa.net
	Plugin Author URI: http://38qa.net/
	Plugin License: GPLv2
	Plugin Minimum Question2Answer Version: 1.7
	Plugin Update Check URI:
*/

if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
	header('Location: ../../');
	exit;
}

// widget
qa_register_plugin_module('widget', 'qa-welcome-widget.php', 'qa_welcome_widget', 'Welcome Widget');
