<?php

namespace App\Command;

use App\Services\CsvHandler;
use App\Services\PathChecker;
use \Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ImportFromCsvCommand
 * @package App\Command
 */
class ImportFromCsvCommand extends Command
{
    protected static $defaultName = 'csv';

    protected function configure()
    {
        $this->setDescription('Import data from csv file to database')
            ->addArgument('file_path', InputArgument::REQUIRED, 'Path to csv file?');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $filePath = $input->getArgument('file_path');
        $pathChecker = new PathChecker();
        if ($pathChecker->file($filePath, 'csv')) {
            $csvHandler = new CsvHandler();
            $filteredData = $csvHandler->convertToArray($filePath)->filterData();
            $output->writeln('---------------------------------------------');
            foreach ($filteredData['errors'] as $error){
                $output->writeln('in row: '. json_encode($error['row']['Product Code']) . ' error code :'. $error['message']);
            }
            return 0;
        }

        $output->writeln('Something wrong!');
        return 0;
    }

}