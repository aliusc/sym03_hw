<?php


namespace App\AgeCalculation;


class AgeCalculationManager
{

    /** @var AgeCalculator */
    private $ageCalculator;

    /** @var AdultChecker */
    private $adultChecker;

    public function __construct(AgeCalculator $ageCalculator, AdultChecker $adultChecker)
    {
        $this->setAgeCalculator($ageCalculator);
        $this->setAdultChecker($adultChecker);
    }

    /**
     * @param AgeCalculator $ageCalculator
     */
    private function setAgeCalculator(AgeCalculator $ageCalculator): void
    {
        if ($this->ageCalculator === null) {
            $this->ageCalculator = $ageCalculator;
        }
    }

    /**
     * @param AdultChecker $adultChecker
     */
    private function setAdultChecker(AdultChecker $adultChecker): void
    {
        if ($this->adultChecker === null) {
            $this->adultChecker = $adultChecker;
        }
    }

    /**
     * @param string $birthDate
     * @return int
     */
    public function calculateAge(string $birthDate)
    {
        return $this->ageCalculator->calculateAge($birthDate);
    }

    /**
     * @param int $age
     * @return bool
     */
    public function adultCheck(int $age)
    {
        return $this->adultChecker->checkIsAdult($age);
    }
}