<?php


namespace App\AgeCalculation;


class AdultChecker
{
    /**
     * @param int $years
     * @return bool
     */
    public function checkIsAdult(int $years) : bool
    {
        return $years >= 18;
    }
}