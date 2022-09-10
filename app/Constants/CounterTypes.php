<?php

namespace App\Constants;

class CounterTypes
{
    /** @var string CHARACTERS */
    public const CHARACTERS = 'characters';

    /** @var string WORDS */
    public const WORDS = 'words';

    /** @var string LETTERS */
    public const LETTERS = 'letters';

    /**
     * @return string[]
     */
    public static function getAll(): array
    {
        return [self::CHARACTERS, self::WORDS, self::LETTERS];
    }
}
