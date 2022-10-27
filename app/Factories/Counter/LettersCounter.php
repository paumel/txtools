<?php

namespace App\Factories\Counter;

use App\Interfaces\Factories\CounterInterface;

class LettersCounter implements CounterInterface
{
    /**
     * @inheritdoc
     */
    public function count(string $string): int
    {
        preg_match_all("/\p{L}/u", $string, $letters);
        
        return count($letters[0]);
    }
}
