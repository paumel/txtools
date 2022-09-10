<?php

namespace App\Factories\Counter;

use App\Interfaces\Factories\CounterInterface;
use Illuminate\Support\Str;

class WordsCounter implements CounterInterface
{
    /**
     * @inheritdoc
     */
    public function count(string $string): int
    {
        return Str::wordCount($string);
    }
}
