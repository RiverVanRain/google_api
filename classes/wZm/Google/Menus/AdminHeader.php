<?php
/**
 * Google API
 * @author Nikolai Shcherbin
 * @package Plugin
 * @license GNU Affero General Public License version 3
 * @copyright (c) Nikolai Shcherbin 2021
 * @link https://wzm.me
**/
namespace wZm\Google\Menus;

class AdminHeader {
	public function __invoke(\Elgg\Event $event) {
		$menu = $event->getValue();
		/* @var $menu \Elgg\Collections\Collection */

		$menu->add(\ElggMenuItem::factory([
			'name' => 'google',
			'text' => elgg_echo('admin:google'),
			'href' => false,
		]));
		
		$menu->add(\ElggMenuItem::factory([
			'name' => 'google:api_key',
			'text' => elgg_echo('admin:google:api_key'),
			'href' => 'admin/google/api_key',
			'parent_name' => 'google',
		]));
		
		$menu->add(\ElggMenuItem::factory([
			'name' => 'google:import',
			'text' => elgg_echo('admin:google:import'),
			'href' => 'admin/google/import',
			'parent_name' => 'google',
		]));

		return $menu;
	}
}