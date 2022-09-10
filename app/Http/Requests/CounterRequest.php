<?php

namespace App\Http\Requests;

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
     * @return array
     */
    public function rules(): array
    {
        return [
            'type' => Rule::in(['characters', 'letters', 'words']),
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
