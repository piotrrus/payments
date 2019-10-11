<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Library;

/**
 * Description of ClearString
 *
 * @author piotrek
 */
class ClearString
{

    /**
     * remove spaces and no letters signs 
     * convert to win-1250
     * @param string $strx
     * @return type
     */
    public function clearString(string $text)  //USUWANIE ZNAKOW Z TEKSTU
    {
        
        $text = formatToUtf($text);
        $text = trim(preg_replace('/\s\s+/', ' ', $text));
        $text = preg_replace('/[\xA0]/', '', $text);

        //$onlycleared = str_replace($vowels, "", $text);
        return $text;   //$onlycleared;
    }



}
