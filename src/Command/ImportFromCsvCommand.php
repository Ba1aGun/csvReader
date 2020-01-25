<?php
namespace App\Command;

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
        $output->writeln('test success');
        return 0;
    }

}