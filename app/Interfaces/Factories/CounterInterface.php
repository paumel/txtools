<?php

namespace App\Interfaces\Factories;

interface CounterInterface
{
    /**
     * @param string $string
     *
     * @return int
     */
    public function count(string $string): int;
}
