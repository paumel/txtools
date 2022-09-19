<?php

namespace App\Factories\CaseConverter;

use App\Interfaces\Factories\CaseConverterInterface;
use Illuminate\Support\Str;

class AlternatingConverter implements CaseConverterInterface
{
    /**
     * @inheritdoc
     */
    public function convert(string $string): string
    {
        $newString = '';

        foreach (mb_str_split($string) as $key => $char) {
            $newString .= ($key % 2) === 0 ? Str::lower($char) : Str::upper($char);
        }

        return $newString;
    }
}
