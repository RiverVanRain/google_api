<?php

namespace wZm\Google\Actions;

use Elgg\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImportSettings {

	public function __invoke(Request $request) {
		$file = elgg_get_uploaded_file('json');

		if ($file instanceof UploadedFile && $file->isValid()) {
			$contents = @file_get_contents($file->getPathname());
			$json = @json_decode($contents, true);
		}

		if (empty($json)) {
			$error = elgg_echo('google:api:import:invalid_json');

			return elgg_error_response($error);
		}

		$svc = elgg()->google;
		$errors = $svc->import($json);

		if ($errors) {
			return elgg_error_response(elgg_echo('google:api:import:error', [$errors]));
		}

		elgg_clear_caches();

		return elgg_ok_response('', elgg_echo('google:api:import:success'));
	}
}