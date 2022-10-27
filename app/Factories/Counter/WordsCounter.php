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
        preg_match_all('/[\pL\pN]+/u', $string, $matches);
        
        return count($matches[0]);
    }
}
