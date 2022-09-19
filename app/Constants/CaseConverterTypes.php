<?php

namespace App\Constants;

class CaseConverterTypes
{
    /** @var string SENTENCE */
    public const SENTENCE = 'sentence';

    /** @var string LOWER */
    public const LOWER = 'lower';

    /** @var string UPPER */
    public const UPPER = 'upper';

    /** @var string CAPITALIZED */
    public const CAPITALIZED = 'capitalized';

    /** @var string ALTERNATING */
    public const ALTERNATING = 'alternating';

    /** @var string TITLE */
    public const TITLE = 'title';

    /** @var string INVERSE */
    public const INVERSE = 'inverse';

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
            self::TITLE,
            self::INVERSE,
        ];
    }
}
