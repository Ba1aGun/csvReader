<?php
namespace App\Filters\CsvFilter;

use App\Filters\CsvFilter\Interfaces\FilterInterface;

class CsvFilter
{
    protected $filters;

    protected $data;

    protected $errors = [];

    public function __construct(FilterInterface ...$filters)
    {
        $this->filters = $filters;
    }

    public function executeFilters(): self
    {
        foreach ($this->filters as $filter){
            $response = $filter->execute($this->getData());
            $this->setData($response['data']);
            $this->setErrors($response['errors']);
        }
        return $this;
    }

    public function setData(array $data): self
    {
        $this->data = $data;
        return $this;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setErrors(array $errors): self
    {
        $this->errors = array_merge($this->errors, $errors);
        return $this;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}