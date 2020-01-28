<?php


namespace App\Filters\CsvFilter\Filters;


use App\Filters\CsvFilter\Interfaces\FilterInterface;

class DiscontinuedFilter implements FilterInterface
{
    const DISCONTINUED_TRUE = 'yes';

    public function execute(array $data)
    {
        foreach ($data as $key => $row){
            if($row['Discontinued'] == self::DISCONTINUED_TRUE){
                $data[$key]['discontinued_date'] = 1;
            }
        }

        return ['data' => $data];
    }
}