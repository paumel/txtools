<?php

namespace App\Factories\Counter;

use App\Constants\CounterTypes;
use App\Interfaces\Factories\CounterInterface;

class CounterFactory
{
    /**
     * @param string $type
     *
     * @return CounterInterface
     */
    public function make(string $type): CounterInterface
    {
        return match ($type) {
            CounterTypes::CHARACTERS => new CharactersCounter(),
            CounterTypes::LETTERS => new LettersCounter(),
            CounterTypes::WORDS => new WordsCounter(),
        };
    }
}
