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

use Elgg\Traits\Di\ServiceFacade;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class GoogleClient {
	
	use ServiceFacade;
	
	public static function name() {
		return 'google';
	}

	/**
	 * Configure the client
	 */
	public function setup() {
		$client = new \Google_Client();
		$data = elgg_get_data_path() . 'google/google_key.json';
		$client->setAuthConfig(json_decode($data, true));
	}
	
	/**
	 * Import JSON key
	 */
	public function import(array $data) {
		// save JSON file
		$json = json_encode($data);
		
		$dir = elgg_get_data_path() . 'google/';
		if (!is_dir($dir)) {
			mkdir($dir, 0755, true);
		}

		$filepath = "{$dir}google_key.json";

		$fh = fopen($filepath, 'w');
		fwrite($fh, $json);
		fclose($fh);

		$response = BinaryFileResponse::create($filepath, 200, [
			'Content-Type' => 'application/json; charset=UTF-8',
		], true, 'attachment');

		$response->sendContent();
		
		// save plugin settings
		$error = 0;

		$plugin = elgg_get_plugin_from_id('google_api');
		
		if (!empty($data)) {
			foreach ($data as $key => $value) {
				$new_value = null;
				if (is_scalar($value) || is_bool($value)) {
					$new_value = $value;
				} else if (is_array($value) && isset($value['value'])) {
					if (is_scalar($value['value']) || is_bool($value['value'])) {
						$new_value = $value['value'];
					} else if (is_array($value['value'])) {
						$serialization = elgg_extract('serialization', $value, 'serialize');
						$new_value = $serialization($value['value']);
					}
				}

				if (is_null($new_value)) {
					register_error('Google API (set setting): Can not parse new value for "' . $key . '"');
					$error++;
					continue;
				}

				if (!$plugin->setSetting($key, $new_value)) {
					register_error('Google API (set setting): Unable to set new value for "' . $key . '"');
					$error++;
				}
			}
		}
		
		return $error;
	}
	
	/**
	 * Get a Google_Client object first to handle auth and api calls
	 */
	public function app($name, array $scopes, $access) {
		$client = new \Google_Client();
		$client->setApplicationName($name);
		$client->setScopes($scopes);
		$client->setAccessType($access);
	}

	/**
	 * {@inheritdoc}
	 */
	public function __get($name) {
		return $this->$name;
	}
}