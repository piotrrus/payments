<?php

namespace App\Library;

/**
 * Description of Formatter
 *
 * @author piotrek
 */
class Formatter
{

    public function dateFormat(string $date)
    {
        return date('Y-d-m', strtotime($date));
    }

    public function formatToUtf(string $text)
    {
        return iconv("windows-1250", "UTF-8", $text);
    }

}
