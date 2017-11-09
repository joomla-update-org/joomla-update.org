<?php defined('__EXEC') or die; 

/* Servers */

$servers = [
	[
		'name' => 'Joomla! 3.x Core Stable',
		'zip' => true,
		'url' => 'https://update.joomla.org/core/sts/list_sts.xml'
	],
	[
		'name' => 'Joomla! 3.x Core Test',
		'zip' => true,
		'url' => 'https://update.joomla.org/core/test/list_test.xml'
	],
	[
		'name' => 'Joomla! Update component',
		'zip' => true,
		'url' => 'https://update.joomla.org/core/extensions/com_joomlaupdate.xml'
	],
	[
		'name' => 'Joomla! Installer - Install from Web',
		'zip' => true,
		'url' => 'https://appscdn.joomla.org/webapps/jedapps/webinstaller.xml'
	],
	[
		'name' => 'Joomla! 3.x translations',
		'zip' => false,
		'url' => 'https://update.joomla.org/language/translationlist_3.xml'
	]
];
