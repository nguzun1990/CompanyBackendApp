<?php
namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ImportCompaniesCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('import:companies')
            ->setDescription('Import company from CSV file')
            ->addArgument(
                'filePath',
                InputArgument::OPTIONAL,
                'Who do you want to greet?'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $importService = $this->getContainer()->get('import_service');
        $filePath = $input->getArgument('filePath');
        

        $output->writeln($importService->importCompanies($filePath));
    }
}