<?php

namespace App\tests;

use App\Services\CsvHandler;
use League\Csv\Reader;
use \PHPUnit\Framework\TestCase;


class csvHandlerTest extends TestCase
{
    protected $csvPath = 'stock.csv';

    public function csvProvider(): string
    {
        return Reader::createFromPath($this->csvPath);
    }

    public function testConvertToArray(CsvHandler $csvHandler)
    {
        $this->assertTrue(is_array($csvHandler->convertToArray($this->csvPath)->getCsvData()));
        return $csvHandler;
    }

    public function testFilters($csvArray)
    {
    }

}