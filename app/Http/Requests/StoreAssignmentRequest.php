<?php

namespace App\Http\Requests;

use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;

class StoreAssignmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role === 'teacher';
    }

    public function rules(): array
    {
        return [
            'course_id' => ['required', 'exists:courses,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'due_date' => ['required', 'date'],
            'attachment' => ['nullable', 'file', 'max:20480', 'mimes:jpg,jpeg,png,pdf,doc,docx,zip'],
        ];
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $course = Course::find($this->input('course_id'));

            if ($course && $course->teacher_id !== auth()->id()) {
                $validator->errors()->add('course_id', 'You can only create assignments for your own courses.');
            }
        });
    }
}
