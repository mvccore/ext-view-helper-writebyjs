<?php

/**
 * MvcCore
 *
 * This source file is subject to the BSD 3 License
 * For the full copyright and license information, please view
 * the LICENSE.md file that are distributed with this source code.
 *
 * @copyright	Copyright (c) 2016 Tom Flídr (https://github.com/mvccore/mvccore)
 * @license		https://mvccore.github.io/docs/mvccore/5.0.0/LICENCE.md
 */

namespace MvcCore\Ext\Views\Helpers;

/**
 * Responsibility - prevent sensitive content against spam bots and convert content into JS `<script>document.write(String.fromCharCode(...));`</script>.
 * - All characters in given string has to be in `UTF-8` encoding.
 * - Every character, text content or html tag, doesn't matter, is converted to `UTF-8`
 *   index and all indexes are placed into `<script>document.write(String.fromCharCode(...));</script>`
 *   to print original html or text content by javascript to be visible for Googlebot.
 */
class WriteByJsHelper
{
	/**
	 * MvcCore Extension - View Helper - Assets - version:
	 * Comparison by PHP function version_compare();
	 * @see http://php.net/manual/en/function.version-compare.php
	 */
	const VERSION = '5.0.0-alpha';

	/**
	 * Any plaint text or any html content.
	 * @param string $string
	 * @return string
	 */
	public function WriteByJs ($string) {
		$resultStringArr = [];
		for ($i = 0, $l = strlen($string); $i < $l; $i++) {
			$char = mb_substr($string, $i, 1, 'UTF-8');
			if (mb_check_encoding($char, 'UTF-8')) {
				$ret = mb_convert_encoding($char, 'UTF-32BE', 'UTF-8');
				$resultStringArr[] = hexdec(bin2hex($ret));
			}
		}
		$utf8Indexes = implode(',', $resultStringArr);
		$utf8Indexes = trim($utf8Indexes, ',');
		while (substr($utf8Indexes, strlen($utf8Indexes) - 2, 2) == ',0') {
			$utf8Indexes = substr($utf8Indexes, 0, strlen($utf8Indexes) - 2);
		}
		return '<script>document.write(String.fromCharCode(' . $utf8Indexes . '));</script>';
	}
}
