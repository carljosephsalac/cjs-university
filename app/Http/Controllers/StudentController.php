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
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Averages;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderByRaw("FIELD(course, 'BSIT', 'BSCS', 'BSIS', 'CompE') ASC")
            ->orderBy('year', 'asc') // Order by year (ascending)
            ->orderBy('last_name', 'asc') // Further order by name within each course
            ->paginate(20);

        return view('students.index', compact('students'));
    }

    public function store(Request $request)
    {
        session(['store' => 'store']);

        $validated = $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'middle_initial' => 'required',
            'email' => 'required|email',
            'course' => 'required',
            'year' => 'required',
            'prelim' => 'nullable|numeric',
            'midterm' => 'nullable|numeric',
            'finals' => 'nullable|numeric',
        ]);

        if ($request->filled(['prelim', 'midterm', 'finals'])) {
            $validated['average'] = round(($request->prelim + $request->midterm + $request->finals) / 3, 2);
        } else {
            $validated['average'] = null;
        }

        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Added Successfully');
    }

    public function update(Student $student, Request $request)
    {
        $validated = $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'middle_initial' => 'required',
            'email' => 'required|email',
            'course' => 'required',
            'year' => 'required',
            'prelim' => 'nullable|numeric',
            'midterm' => 'nullable|numeric',
            'finals' => 'nullable|numeric',
        ]);

        if ($request->filled(['prelim', 'midterm', 'finals'])) {
            $validated['average'] = round(($request->prelim + $request->midterm + $request->finals) / 3, 2);
        } else {
            $validated['average'] = null;
        }

        $student->update($validated);

        return redirect()->back()->with('success', 'Updated successfully.');
    }

    public function delete(Student $student)
    {
        // Student::truncate();

        $student->delete();

        return redirect()->back()->with('success', 'Deleted successfully.');
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
}
