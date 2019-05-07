<?php


namespace App\AgeCalculation;


use DateTime;
use Exception;

class AgeCalculator
{

    /**
     * @param string $age
     * @return int
     */
    public function calculateAge(string $age): int
    {
        try {
            $birthDate = new DateTime($age);
            $age = $birthDate->diff(new DateTime())->y;
        }
        catch (Exception $exception) {
            $age = 0;
        }

        return $age;
    }
}