<?php

namespace App\Constants;

class CounterTypes
{
    /** @var string CHARACTERS */
    public const CHARACTERS = 'Characters';

    /** @var string WORDS */
    public const WORDS = 'Words';

    /** @var string LETTERS */
    public const LETTERS = 'Letters';

    /**
     * @return string[]
     */
    public static function getAll(): array
    {
        return [self::CHARACTERS, self::WORDS, self::LETTERS];
    }
}
