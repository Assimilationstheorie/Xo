<?php
namespace App\Http\View;

use Exception;

interface View
{
	/**
	 * Get page html content
	 *
	 * @param array $data Array with  data, objects
	 * @return string Page html
	 */
	static function Html(array $data): string;
}