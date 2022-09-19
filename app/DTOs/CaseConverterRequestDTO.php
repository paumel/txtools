<?php

namespace App\DTOs;

class CaseConverterRequestDTO
{
    private string $string;

    private string $type;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->setString($data['string']);
        $this->setType($data['type']);
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getString(): string
    {
        return $this->string;
    }

    /**
     * @param string $string
     */
    public function setString(string $string): void
    {
        $this->string = $string;
    }
}
