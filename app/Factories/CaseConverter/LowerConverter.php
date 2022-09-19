<?php

namespace App\Factories\CaseConverter;

use App\Interfaces\Factories\CaseConverterInterface;
use Illuminate\Support\Str;

class LowerConverter implements CaseConverterInterface
{
    /**
     * @inheritdoc
     */
    public function convert(string $string): string
    {
        return Str::lower($string);
    }
}
