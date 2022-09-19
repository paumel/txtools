<?php

namespace App\Interfaces\Factories;

interface CaseConverterInterface
{
    /**
     * @param string $string
     *
     * @return string
     */
    public function convert(string $string): string;
}
