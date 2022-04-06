<?php
/**
 * Google API
 * @author Nikolai Shcherbin
 * @package Plugin
 * @license GNU Affero General Public License version 3
 * @copyright (c) Nikolai Shcherbin 2021
 * @link https://wzm.me
**/

return [
	'plugin' => [
		'name' => 'Google API',
		'version' => '0.3.1',
		'activate_on_install' => false,
	],
	
	'bootstrap' => \wZm\Google\Bootstrap::class,
	
	'actions' => [
		//admin
		'admin/google/import' => [
			'controller' => \wZm\Google\Actions\ImportSettings::class,
			'access' => 'admin',
		],
		'admin/google/api_key' => [
			'controller' => \wZm\Google\Actions\SettingsAction::class,
			'access' => 'admin',
		],
	],
];