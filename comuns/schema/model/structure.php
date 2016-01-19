<?php

// Barra Superior ---------------------------------
$topbar = array ();
$topbar[0] = array (
	'name'   => 'Home', 'url'    => 'sumari/index.php', 'icon'   => 'glyphicon-home'
	);
$topbar[1] = array (
	'name'   => 'Treball compartit',  'url'    => 'calendari/index.php', 'icon'   => 'glyphicon-user'
	);
$topbar[2] = array (
	'name'   => 'Messaging',  'url'    => BASE_DIR.'messaging/do-index/', 'icon'   => 'glyphicon-envelope'
	);
$topbar[3] = array (
	'name'   => 'Manual',  'url'    => 'professor/index.php', 'icon'   => 'glyphicon-question-sign'
	);

$subactions = array();
$subactions[0] = array ( 'name'   => 'Change Password',  'url'    => BASE_DIR.'login.php?do=changepwd',  'icon'   => 'glyphicon-cog' );
$subactions[1] = array ( 'name'   => 'Generate Password File',  'url'    => 'files/index.php',  'icon'   => 'glyphicon-cog' );
$subactions[2] = array ( 'name'   => 'Config Links',  'url'    => 'files/index.php',  'icon'   => 'glyphicon-cog' );
$subactions[2] = array ( 'name'   => 'Logout',  'url'    => 'files/index.php',  'icon'   => 'glyphicon-off' );

$topbar[4] = array (
	'name'   => 'Settings',  'url'    => 'files/index.php',  'icon'   => 'glyphicon-cog', 'subactions' => $subactions
	);


// Barra Lateral ---------------------------------
$sidebar = array ();
$sidebar[0] = array (
	'name'   => 'Home', 'url'    => BASE_DIR.'home/do-index/', 'module' => 'home', 'icon'   => 'glyphicon-home'
	);
$sidebar[1] = array (
	'name'   => 'Calendar',  'url'    => BASE_DIR.'calendar/do-index/', 'module' => 'calendar', 'icon'   => 'glyphicon-calendar'
	);
$sidebar[2] = array (
	'name'   => 'Comunication',  'url'    => BASE_DIR.'comunication/do-index/', 'module' => 'comunication', 'icon'   => 'glyphicon-send'
	);
$sidebar[3] = array (
	'name'   => 'Professor',  'url'    => BASE_DIR.'professor/do-index/', 'module' => 'professor', 'icon'   => 'glyphicon-tint'
	);
$sidebar[4] = array (
	'name'   => 'Files',  'url'    => BASE_DIR.'files/do-index/', 'module' => 'files', 'icon'   => 'glyphicon-file'
	);
$sidebar[5] = array (
	'name'   => 'Management',  'url'    => BASE_DIR.'management/do-index/', 'module' => 'management', 'icon'   => 'glyphicon-tags'
	);
$sidebar[6] = array (
	'name'   => 'Administration',  'url'    => BASE_DIR.'administration/do-index/', 'module' => 'admin', 'icon'   => 'glyphicon-wrench'
	);


// Assignem variables a la class SCHEMA!
Schema::SetParam('sidebar', $sidebar);
Schema::SetParam('topbar', $topbar);

// Alliberem memòria:
unset ( $sidebar );
unset ( $topbar );
unset ( $subactions );