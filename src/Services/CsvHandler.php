<?php


namespace App\Services;


use App\Entity\TblProductData;
use App\Filters\CsvFilter\CsvFilter;
use App\Filters\CsvFilter\Filters\CostFilter;
use App\Filters\CsvFilter\Filters\DiscontinuedFilter;
use Doctrine\ORM\EntityManagerInterface;
use League\Csv\Reader;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CsvHandler
{
    protected $csvData;

    protected $filteredData = [];

    protected $errors = [];

    protected $entityManager;

    protected $validator;

    public function __construct(EntityManagerInterface $entityManager,  ValidatorInterface $validator)
    {
        $this->entityManager = $entityManager;
        $this->validator = $validator;
    }

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

    public function filterData(): self
    {
        $filteredData = (new CsvFilter(
            new CostFilter(function ($arg) {
                return $arg > 5;
            }),
            new CostFilter(function ($arg) {
                return $arg < 1000;
            }),
            new DiscontinuedFilter()
        ))
            ->setData($this->csvData)
            ->executeFilters();

        $this->setFilteredData($filteredData->getData());

        $this->setErrors($filteredData->getErrors());

        return $this;
    }

    public function saveDataToDataBase($data): self
    {
        foreach ($data as $row) {
            $discontinuedDate = (!empty($row['discontinued_date']) && $row['discontinued_date'] == 1)
                ? new \DateTime('now')
                : null;

            $productData = new TblProductData();
            $productData->setStrProductCode($row['Product Code']);
            $productData->setStrProductName($row['Product Name']);
            $productData->setStrProductDesc($row['Product Description']);
            $productData->setIntStockLevel((int)$row['Stock']);
            $productData->setDecPrice($row['Cost in GBP']);
            $productData->setDtmAdded(new \DateTime('now'));
            $productData->setDtmDiscontinued($discontinuedDate);

            $errors = $this->validator->validate($productData);
            if (count($errors) > 0) {
                $this->setErrors(['message' => 'cant save' . $row['Product Code']]);
            } else {
                $this->entityManager->persist($productData);

                $this->entityManager->flush();
            }
        }
        return $this;
    }

    public function getCsvData(): array
    {
        return $this->csvData;
    }

    public function getFilteredData(): array
    {
        return $this->filteredData;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function setErrors($errors): self
    {
        $this->errors = array_merge($this->errors, $errors);
        return $this;
    }

    public function setFilteredData($data): self
    {
        $this->filteredData = array_merge($this->filteredData, $data);
        return $this;
    }

}