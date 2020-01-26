<?php


namespace App\Services;


use App\Filters\CsvFilter\CsvFilter;
use App\Filters\CsvFilter\Filters\CostFilter;
use League\Csv\Reader;

class CsvHandler
{
    protected $csvData;

    public function convertToArray(string $url): self
    {
        $reader = Reader::createFromPath($url);

        $result = [];
        foreach ($reader->fetchAssoc() as $row) {
            $result[] = $row;
        }

        $this->csvData = $result;

        return $this;
    }

    public function filterData(): array
    {
        $filteredData = (new CsvFilter(
            new CostFilter(function ($arg) {
                return $arg > 5;
            }),
            new CostFilter(function ($arg){
                return $arg < 1000;
            })
        ))
            ->setData($this->csvData)
            ->executeFilters();

        return ['data' => $filteredData->getData(), 'errors' => $filteredData->getErrors()];
    }

    public function getCsvData(){
        return $this->csvData;
    }

}