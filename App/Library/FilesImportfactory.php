<?php

namespace App\Library;

use App\Library\CsvFile;
use App\Library\XmlFile;

class FilesImportFactory
{

    /**
     *
     * @param string $assort
     * @return form class model
     */
    public function getFileType(string $fileType)
    {
        switch ($fileType) {
            case 'dat':
            case 'csv':
                $file = new CsvFile();
                break;
            case 'xml':
                $file = new XmlFile();
                break;
        }
        return $file;
    }

}
