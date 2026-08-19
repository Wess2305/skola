<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactMessageRequest;
use App\Models\ContactMessage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ContactMessageController extends Controller
{
    public function create()
    {
        $teachers = User::query()->where('role', 'teacher')->orderBy('name')->get();

        return view('student.contact', [
            'teachers' => $teachers,
        ]);
    }

    public function store(StoreContactMessageRequest $request)
    {
        ContactMessage::create([
            'student_id' => Auth::id(),
            'teacher_id' => $request->input('teacher_id'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ]);

        return redirect()->route('student.contact')->with('success', 'Your question has been sent anonymously.');
    }

    public function inbox()
    {
        $teacher = Auth::user();

        $messages = ContactMessage::query()
            ->where('teacher_id', $teacher->id)
            ->latest()
            ->get(['id', 'subject', 'message', 'created_at']);

        return view('teacher.messages', [
            'messages' => $messages,
        ]);
    }
}
