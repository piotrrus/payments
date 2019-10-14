<?php

namespace App\Library;

use App\Library\Formatter;
use App\Interfaces\FilesInterface;

class CsvFile implements FilesInterface
{

    const DATE_COLUMMN = 0;
    const ACCOUNT_COLUMMN = 1;
    const CLIENT_COLUMMN = 2;
    const PUROPSE_COLUMMN = 3;

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

        if (($handle = fopen($file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                for ($c = 0; $c <= count($data) - 1; $c++) {
                    $upperData = strtoupper($data[$c]);
                    $utfText = $this->format->formatToUtf($upperData);

                    if ($c == self::DATE_COLUMMN) {
                        $firstCol = explode('|', $utfText);
                        $importedData[$row]['date'] = $this->getDate($utfText);
                        $importedData[$row]['amount'] = $this->getValue($utfText);
                    } else if ($c == self::ACCOUNT_COLUMMN) {
                        $importedData[$row]['account'] = $this->getAccount($utfText);
                    } else if ($c == self::CLIENT_COLUMMN) {
                        $client = explode(' ', $this->getClient($utfText));
                        $importedData[$row]['name'] = $client[0];
                        $importedData[$row]['surname'] = $client[1];
                    } else if ($c == self::PUROPSE_COLUMMN) {
                        $importedData[$row]['payment_purpose'] = $this->getPurpose($utfText);
                    }
                }
                $row++;
            }
            fclose($handle);
        }
        return $importedData;
    }

    private function getAccount(string $utfText)
    {
        $dataArray = explode(':', $utfText);
        return trim($dataArray[1]);
    }

    private function getDate(string $utfText)
    {
        $dataArray = explode('|', $utfText);
        return $this->format->dateFormat($dataArray[1]);
    }

    private function getClient(string $utfText)
    {
        $dataArray = explode(':', $utfText);
        $client = explode(' ', $dataArray[1]);
        $surname = trim($client[2]);
        if ($client[3]) {
            $surname .= trim($client[3]);
        }
        return trim($client[1]) . ' ' . trim($client[2]);
    }

    private function getValue(string $utfText)
    {
        $dataArray = explode('|', $utfText);
        return trim($dataArray[3]);
    }

    private function getPurpose(string $utfText)
    {
        $dataArray = explode(':', $utfText);
        return trim($dataArray[1]);
    }

}
