<?php

namespace App\Http\Requests;

use App\Constants\CounterTypes;
use App\DTOs\CounterRequestDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CounterRequest extends FormRequest
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
            'type' => Rule::in(CounterTypes::getAll()),
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
