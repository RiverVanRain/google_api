<?php

$entity = elgg_get_plugin_from_id('google_api');

echo elgg_view_field([
	'#type' => 'text',
	'#label' => elgg_echo('settings:api_key'),
	'#help' => elgg_echo('settings:api_key:help'),
	'name' => 'params[api_key]',
	'value' => $entity->api_key ? : '',
]);

echo elgg_view_field([
	'#type' => 'hidden',
	'name' => 'plugin_id',
	'value' => 'google_api',
]);

$footer = elgg_view_field([
	'#type' => 'submit',
	'value' => elgg_echo('save'),
]);

elgg_set_form_footer($footer);