<?php

namespace App\Http\Facades;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;

class Lang
{
	public static $trans = null;

	public static function init($locale) {
		// 组织语言
        $loader = new FileLoader(new Filesystem(), 'D:\www\be.doopp.com\resources\lang');
        //
        self::$trans = new Translator($loader, $locale);
	}

	public static function get($key, array $replace = [], $locale = null, $fallback = true) {
		//
		return self::$trans->get($key, $replace, $locale, $fallback);
	}
}