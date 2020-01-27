<?php
namespace App\Filters\CsvFilter\Filters;

use App\Filters\CsvFilter\Interfaces\FilterInterface;

class CostFilter implements FilterInterface
{
    protected const ERROR_TEXT = 'Cost is not correct.';

    protected $callback;

    protected $errors;

    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    public function execute(array $data): array
    {
        foreach ($data as $key => $row){
            $callback = $this->callback;
            if(!$callback($row['Cost in GBP'])){
                $this->errors[] = [
                    'row' => $row,
                    'message' => self::ERROR_TEXT
                ];
                unset($data[$key]);
            }
        }
        return ['data' => $data, 'errors' => $this->errors];
    }
}