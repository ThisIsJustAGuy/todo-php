<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TodoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'content' => ['required', 'max:500'],
            'user_id' => ['required', Rule::exists('users', 'id')]
        ];
    }
}
