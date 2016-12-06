<?php

namespace App\Facades;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Laravel\Lumen\Application;

class Lang
{
	public static $trans = null;

	public static function init($translator, $locale) {
        $translator->setLocale($locale);
        self::$trans = $translator;
	}

	public static function get($key, array $replace = [], $locale = null, $fallback = true) {
		return self::$trans->get($key, $replace, $locale, $fallback);
	}

	public static function getLocale() {
		return self::$trans->getLocale();
	}
}