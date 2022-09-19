<?php

namespace App\Http\Requests;

use App\Constants\CaseConverterTypes;
use App\DTOs\CounterRequestDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CaseConverterRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'type' => Rule::in(CaseConverterTypes::getAll()),
            'string' => ['required', 'min:1'],
        ];
    }

    /**
     * @return CounterRequestDTO
     */
    public function getDTO(): CounterRequestDTO
    {
        return new CounterRequestDTO($this->validated());
    }
}
