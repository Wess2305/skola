<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactMessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role === 'student';
    }

    public function rules(): array
    {
        return [
            'teacher_id' => ['required', 'exists:users,id'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ];
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $teacherId = $this->input('teacher_id');

            if ($teacherId && \App\Models\User::query()->where('id', $teacherId)->where('role', 'teacher')->doesntExist()) {
                $validator->errors()->add('teacher_id', 'Please select a valid teacher.');
            }
        });
    }
}
