<?php

namespace App\Constants;

class CaseConverterTypes
{
    /** @var string SENTENCE */
    public const SENTENCE = 'Sentence';

    /** @var string LOWER */
    public const LOWER = 'Lower';

    /** @var string UPPER */
    public const UPPER = 'Upper';

    /** @var string CAPITALIZED */
    public const CAPITALIZED = 'Capitalized';

    /** @var string ALTERNATING */
    public const ALTERNATING = 'Alternating';

    /** @var string INVERSE */
    public const INVERSE = 'Inverse';

    /**
     * @return string[]
     */
    public static function getAll(): array
    {
        return [
            self::SENTENCE,
            self::LOWER,
            self::UPPER,
            self::CAPITALIZED,
            self::ALTERNATING,
            self::INVERSE,
        ];
    }
}
