<?php

namespace App\Library;

use App\Library\Formatter;

class CsvFile
{

    const DATE_COLUMMN = 0;
    const ACCOUNT_COLUMMN = 1;
    const CLIENT_COLUMMN = 2;

    private $format;

    public function __construct()
    {
        $this->format = new Formatter();
    }

    public function getCsvFile($csvFile)
    {
        $row = 1;
        $err = 0;
        $importedData = [];

        if (($handle = fopen($csvFile, "r")) !== FALSE) {

            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                for ($c = 0; $c <= count($data) - 1; $c++) {
                    $upperData = strtoupper($data[$c]);
                    $utfText = $this->format->formatToUtf($upperData);

                    if ($c == self::DATE_COLUMMN) {
                        $firstCol = explode('|', $utfText);
                        $importedData[$row]['date'] = $this->getDate($utfText);
                        $importedData[$row]['value'] = $this->getValue($utfText);
                    } else if ($c == self::ACCOUNT_COLUMMN) {
                        $importedData[$row]['account'] = $this->getAccount($utfText);
                    } else if ($c == self::CLIENT_COLUMMN) {
                        $importedData[$row]['client'] = $this->getClient($utfText);
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
        return trim($client[1]) . ' ' . trim($client[2]);
    }

    private function getValue(string $utfText)
    {
        $dataArray = explode('|', $utfText);
        return trim($dataArray[3]);
    }

}
