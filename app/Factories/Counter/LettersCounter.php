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
        return count(array_filter(str_split($string), 'ctype_alpha'));
    }
}
