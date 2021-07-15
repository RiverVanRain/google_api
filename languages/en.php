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
	// general
	'admin:google' => 'Google API',
	'admin:google:api_key' => 'API key',
	'settings:api_key' => 'Google API key',
	'settings:api_key:help' => '<a href="https://cloud.google.com/docs/authentication/api-keys#creating_an_api_key">How to create Google API key</a>',
	'admin:google:import' => 'Import JSON key',
	'google:api:import' => 'Import',
	'google:api:import:json' => 'Import Google JSON credentials',
	'google:api:import:json:help' => '<a href="https://cloud.google.com/docs/authentication/getting-started#creating_a_service_account">How to get Google JSON credentials</a>',
	
	'google:api:import:invalid_json' => 'Unable to read JSON from uploaded file',
	'google:api:import:error' => 'Import was completed, but %s errors have occurred',
	'google:api:import:success' => 'Import was successful',
	'google:api:import:result' => '%s : %s',
];