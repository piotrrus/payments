<?php

namespace App\Library;

use App\Interfaces\FilesInterface;

class XmlFile implements FilesInterface
{

    private $format;

    public function __construct()
    {
        $this->format = new Formatter();
    }

    /**
     * return 
     * @param type $file
     * @return array
     */
    public function getFile($file)
    {
        $row = 1;
        $err = 0;
        $importedData = [];
        return $importedData;
    }

}
