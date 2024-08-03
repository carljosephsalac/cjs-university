<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::simplePaginate(20);
        return view('students.index', compact('students'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'grade' => 'numeric'
        ]);

        Student::create($validated);

        return redirect()->route('students.index')->with('added', 'Added Successfully');
    }
}