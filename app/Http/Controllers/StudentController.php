<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Exports\StudentsExport;
use App\Jobs\ExportStudentsJob;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::paginate(20);
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

    public function export()
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
        // return (new StudentsExport)->download('students.xlsx'); // Exportable
        // return new StudentsExport(); // Responsable
        // ExportStudentsJob::dispatch();
    }
}