<?php

namespace App\Factories\CaseConverter;

use App\Interfaces\Factories\CaseConverterInterface;
use Illuminate\Support\Str;

class InverseConverter implements CaseConverterInterface
{
    /**
     * @inheritdoc
     */
    public function convert(string $string): string
    {
        $newString = '';

        foreach (mb_str_split($string) as $key => $char) {
            $newString .= $this->isLower($char) ? Str::upper($char) : Str::lower($char);
        }

        return $newString;
    }

    /**
     * @param string $char
     *
     * @return bool
     */
    private function isLower(string $char): bool
    {
        return $char === Str::lower($char);
    }
}
