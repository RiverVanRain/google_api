Google API
===============================
![Elgg 4.0](https://img.shields.io/badge/Elgg-4.0-green.svg?style=flat-square)

Google API, Client and Services for Elgg

## Developers

* Google JSON key dir:

```php

elgg_get_data_path() . 'google/google_key.json';

```

[How to get Google JSON credentials](https://cloud.google.com/docs/authentication/getting-started#creating_a_service_account)

* Google API Aliases

```php

$classMap = [
    'Google\\Client' => 'Google_Client',
    'Google\\Service' => 'Google_Service',
    'Google\\AccessToken\\Revoke' => 'Google_AccessToken_Revoke',
    'Google\\AccessToken\\Verify' => 'Google_AccessToken_Verify',
    'Google\\Model' => 'Google_Model',
    'Google\\Utils\\UriTemplate' => 'Google_Utils_UriTemplate',
    'Google\\AuthHandler\\Guzzle6AuthHandler' => 'Google_AuthHandler_Guzzle6AuthHandler',
    'Google\\AuthHandler\\Guzzle7AuthHandler' => 'Google_AuthHandler_Guzzle7AuthHandler',
    'Google\\AuthHandler\\Guzzle5AuthHandler' => 'Google_AuthHandler_Guzzle5AuthHandler',
    'Google\\AuthHandler\\AuthHandlerFactory' => 'Google_AuthHandler_AuthHandlerFactory',
    'Google\\Http\\Batch' => 'Google_Http_Batch',
    'Google\\Http\\MediaFileUpload' => 'Google_Http_MediaFileUpload',
    'Google\\Http\\REST' => 'Google_Http_REST',
    'Google\\Task\\Retryable' => 'Google_Task_Retryable',
    'Google\\Task\\Exception' => 'Google_Task_Exception',
    'Google\\Task\\Runner' => 'Google_Task_Runner',
    'Google\\Collection' => 'Google_Collection',
    'Google\\Service\\Exception' => 'Google_Service_Exception',
    'Google\\Service\\Resource' => 'Google_Service_Resource',
    'Google\\Exception' => 'Google_Exception',
];

```

### Usage

Add Google API key and import Google JSON credentials.

Now you can use Google services.

Here is an example for Google Service Sheets:

```php

	// Get the API client and construct the service object.
	$api_key = elgg_get_plugin_setting('api_key','google_api');
	
	// Initialize Google Client
	$client = new \Google_Client();
	$client->setDeveloperKey($api_key);
	$client->setApplicationName('my_app');
	$client->setScopes(\Google_Service_Sheets::SPREADSHEETS);
	$client->setAccessType('offline');	
	
	// Authorize Google Client
	$data = elgg_get_data_path() . 'google/google_key.json';
	$client->setAuthConfig(json_decode($data, true));
	
	// Initialize Google service
	$service = new \Google_Service_Sheets($client);
	
```