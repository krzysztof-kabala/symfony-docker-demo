<?php

namespace App\Command;

use App\Entity;
use App\Service;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class AppAddDataCommand extends Command
{
    protected static $defaultName = 'app:add-data';

    /** @var Service\DataService */
    private $dataService;

    /**
     * AppAddDataCommand constructor.
     * @param Service\DataService $dataService
     */
    public function __construct(Service\DataService $dataService)
    {
        parent::__construct();

        $this->dataService = $dataService;
    }

    protected function configure()
    {
        $this
            ->setDescription('Add a data entity')
            ->addArgument('name', InputArgument::OPTIONAL, 'name of data')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $name = $input->getArgument('name');

        $this->dataService->addData($name);

        $io->success('New data has been added: ' . $name);
    }
}
