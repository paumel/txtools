<?php

namespace App\Factories\CaseConverter;

use App\Interfaces\Factories\CaseConverterInterface;
use Illuminate\Support\Str;

class SentenceConverter implements CaseConverterInterface
{
    /**
     * @inheritdoc
     */
    public function convert(string $string): string
    {
        $sentences = preg_split('/([.?!]+)/', $string, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);

        $newString = '';
        foreach ($sentences as $key => $sentence) {
            $newString .= ($key & 1) === 0 ?
                Str::ucfirst(Str::lower(trim($sentence))) :
                $sentence . ' ';
        }

        return trim($newString);
    }
}
