<?php
/**
 * Google API
 * @author Nikolai Shcherbin
 * @package Plugin
 * @license GNU Affero General Public License version 3
 * @copyright (c) Nikolai Shcherbin 2021
 * @link https://wzm.me
**/

echo elgg_view_field([
	'#type' => 'file',
	'#label' => elgg_echo('google:api:import:json'),
	'#help' => elgg_echo('google:api:import:json:help'),
	'name' => 'json',
	'accept' => 'application/json',
	'required' => true,
]);

$footer = elgg_view_field([
	'#type' => 'submit',
	'value' => elgg_echo('google:api:import'),
]);

elgg_set_form_footer($footer);
