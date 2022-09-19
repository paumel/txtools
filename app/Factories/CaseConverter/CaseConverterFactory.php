<?php

namespace App\Factories\CaseConverter;

use App\Constants\CaseConverterTypes;
use App\Interfaces\Factories\CaseConverterInterface;

class CaseConverterFactory
{
    /**
     * @param string $type
     *
     * @return CaseConverterInterface
     */
    public function make(string $type): CaseConverterInterface
    {
        return match ($type) {
            CaseConverterTypes::SENTENCE => new SentenceConverter(),
            CaseConverterTypes::LOWER => new LowerConverter(),
            CaseConverterTypes::UPPER => new UpperConverter(),
            CaseConverterTypes::CAPITALIZED => new CapitalizedConverter(),
            CaseConverterTypes::ALTERNATING => new AlternatingConverter(),
            CaseConverterTypes::INVERSE => new InverseConverter(),
        };
    }
}
