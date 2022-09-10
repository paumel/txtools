<?php

namespace App\Factories\Counter;

use App\Interfaces\Factories\CounterInterface;
use Illuminate\Support\Str;

class CharactersCounter implements CounterInterface
{
    /**
     * @inheritdoc
     */
    public function count(string $string): int
    {
        return Str::length($string);
    }
}
