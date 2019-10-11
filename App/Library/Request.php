<?php

namespace App\Library;

class Request
{

    public static function get($key, $value = false)
    {
        $value = self::sanitizeString($value);
        return (!empty($_GET[$key])) ? $_GET[$key] : $value;
    }

    public static function post($key, $value = false)
    {
        return (!empty($_POST[$key])) ? $_POST[$key] : $value;
    }

    private static function sanitizeString($value)
    {
        $value = ltrim($value);
        return filter_var($value, FILTER_SANITIZE_STRING);
    }

}
