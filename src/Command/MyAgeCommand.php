<?php


namespace App\Command;

use App\AgeCalculation\AgeCalculationManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class MyAgeCommand extends Command
{
    protected static $defaultName = 'app:age:calculator';

    private $ageCalculationManager;

    public function __construct(AgeCalculationManager $ageCalculationManager)
    {
        $this->ageCalculationManager = $ageCalculationManager;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Calculates age of person')
            ->addArgument('birthDate', InputArgument::OPTIONAL, 'Date of birth in format yyyy-mm-dd')
            ->addOption('adult', null, InputOption::VALUE_NONE, 'Checks is person 18 years old or not');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $birthDate = $input->getArgument('birthDate');
        $adultOption = $input->getOption('adult');

        $age = $this->ageCalculationManager->calculateAge($birthDate);

        $io = new SymfonyStyle($input, $output);
        $io->note("I am $age years old");

        if ($adultOption) {
            if( $this->ageCalculationManager->adultCheck($age) ) {
                $io->success('Am I an adult ?   ----  YES !!!');
            } else {
                $io->warning('Am I an adult ?   ----  NO !!!');
            }
        }
    }
}
