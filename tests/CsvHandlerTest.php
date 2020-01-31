<?php

namespace App\tests;

use App\Services\CsvHandler;
use League\Csv\Reader;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class CsvHandlerTest extends WebTestCase
{
    protected $csvPath = 'stock.csv';

    public function csvProvider(): string
    {
        return Reader::createFromPath($this->csvPath);
    }

    public function testConvertToArray()
    {
        self::bootKernel();
        $csvHandler = self::$kernel->getContainer()->get(CsvHandler::class);
        $this->assertTrue(is_array($csvHandler->convertToArray($this->csvPath)->getCsvData()));
        return $csvHandler;
    }
}