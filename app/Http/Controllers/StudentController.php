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
        session(['course' => 'all', 'year' => 'all']);

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
            'email' => 'required|email|unique:students,email',
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

        return back()->with('success', 'Added Successfully');
    }

    public function update(Student $student, Request $request)
    {
        $validated = $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'middle_initial' => 'required',
            'email' => 'required|email|unique:students,email,' . $student->id,
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

        return back()->with('success', 'Updated successfully.');
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
            // Log the error for debugging purposes
            Log::error('Database error during import: ' . $e->getMessage());
            return view('error-page');
        }
    }

    public function getStudents($course, $year)
    {
        session(['course' => $course, 'year' => $year]);

        if($year === 'all') {
            $students = Student::where('course', $course)
                ->orderBy('year', 'asc')
                ->orderBy('last_name', 'asc')
                ->paginate(20);
        } else {
            $students = Student::where('course', $course)
                ->where('year', $year)
                ->orderBy('year', 'asc')
                ->orderBy('last_name', 'asc')
                ->paginate(20);
        }

        return view('students.index', compact('students'));
    }
}
