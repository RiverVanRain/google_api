<?php
/**
 * Google API
 * @author Nikolai Shcherbin
 * @package Plugin
 * @license GNU Affero General Public License version 3
 * @copyright (c) Nikolai Shcherbin 2021
 * @link https://wzm.me
**/
namespace wZm\Google;

use Elgg\HooksRegistrationService\Hook;

class SetupAdminMenu {
	public function __invoke(Hook $hook) {
		$menu = $hook->getValue();
		/* @var $menu \Elgg\Collections\Collection */

		$menu->add(\ElggMenuItem::factory([
			'name' => 'google',
			'text' => elgg_echo('admin:google'),
			'section' => 'develop',
			'context' => ['admin'],
		]));
		
		$menu->add(\ElggMenuItem::factory([
			'name' => 'google:api_key',
			'text' => elgg_echo('admin:google:api_key'),
			'href' => 'admin/google/api_key',
			'section' => 'develop',
			'context' => ['admin'],
			'parent_name' => 'google',
		]));
		
		$menu->add(\ElggMenuItem::factory([
			'name' => 'google:import',
			'text' => elgg_echo('admin:google:import'),
			'href' => 'admin/google/import',
			'section' => 'develop',
			'context' => ['admin'],
			'parent_name' => 'google',
		]));

		return $menu;
	}
}