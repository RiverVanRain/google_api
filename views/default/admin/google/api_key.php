<?php
/**
 * Google API
 * @author Nikolai Shcherbin
 * @package Plugin
 * @license GNU Affero General Public License version 3
 * @copyright (c) Nikolai Shcherbin 2021
 * @link https://wzm.me
**/

$form_vars = [
	'class' => 'elgg-form-settings',
];

echo elgg_view_form('admin/google/api_key', $form_vars);
