<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use App\Jobs\ExportStudentsJob;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\QueryException;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('name', 'asc')->paginate(20);
        return view('students.index', compact('students'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Added Successfully');
    }

    public function export()
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
        // return (new StudentsExport)->download('students.xlsx'); // Exportable
        // return new StudentsExport(); // Responsable
        // ExportStudentsJob::dispatch();
    }

    public function import(Request $request)
    {
        $request->validate([
            'excel' => 'required|file|mimes:xlsx',
        ]);

        try {
            Excel::import(new StudentsImport, $request->file('excel'));
            return redirect()->back()->with('success', 'Uploaded successfully.');

        } catch (Exception $e) {
            Log::error('Database error during import: ' . $e->getMessage()); // Log the error for debugging purposes
            return view('error-page');
        }
    }

    public function delete(Student $student)
    {
        // Student::truncate();

        $student->delete();

        return redirect()->back()->with('success', 'Deleted successfully.');
    }
}