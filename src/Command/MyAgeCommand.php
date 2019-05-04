<?php


namespace App\Command;

use DateInterval;
use DateTime;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class MyAgeCommand extends Command
{
    protected static $defaultName = 'app:age:calculator';

    protected function configure()
    {
        $this
            ->setDescription('Calculates age of person')
            ->addArgument('birthDate', InputArgument::OPTIONAL, 'Date of birth in format yyyy-mm-dd')
            ->addOption('adult', null, InputOption::VALUE_NONE, 'Checks is person 18 years old or not');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        if (empty($input->getArgument('birthDate')) ||
            !preg_match('/[0-9]{4}-[0-9]{2}-[0-9]{2}/', $input->getArgument('birthDate'))
        ) {
            $io->error('No correct date of birth was provided. Run command with --help to set correct parameters.');
        } else {
            $age = $this->calculateAge($input->getArgument('birthDate'));
            $io->note('I am ' . $age->y . ' years old');

            if ($input->getOption('adult')) {
                if ($age->y < 18) {
                    $io->warning('Am I an adult ?   ----  NO !!!');
                } else {
                    $io->success('Am I an adult ?   ----  YES !!!');
                }
            }
        }
    }

    private function calculateAge(string $age): DateInterval
    {
        $birthDate = new DateTime($age);
        return $birthDate->diff(new DateTime());
    }
}
