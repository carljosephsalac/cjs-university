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
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class StudentController extends Controller
{
    public function index() : View
    {
        // remove the student name in search input
        session()->forget('student_name');

        session(['course' => 'all', 'year' => 'all']);

        $students = Student::orderByRaw("FIELD(course, 'BSIT', 'BSCS', 'BSIS', 'CompE') ASC")
            ->orderBy('year', 'asc')
            ->orderBy('last_name', 'asc')
            ->paginate(20);

        return view('students.index', compact('students'));
    }

    public function store(Request $request) : RedirectResponse
    {
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

    public function update(Student $student, Request $request) : RedirectResponse
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

    public function delete(Student $student) : RedirectResponse
    {
        // Student::truncate();

        $student->delete();

        return redirect()->back()->with('success', 'Deleted successfully.');
    }

    public function export() : BinaryFileResponse
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
        // return (new StudentsExport)->download('students.xlsx'); // Exportable
        // return new StudentsExport(); // Responsable
        // ExportStudentsJob::dispatch();
    }

    public function import(Request $request) : RedirectResponse|View
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

    public function get(string $course, string $year) : View
    {
        // remove the student name in search input
        session()->forget('student_name');

        session(['course' => $course, 'year' => $year]);

        $query = Student::where('course', $course)
                ->orderBy('year', 'asc')
                ->orderBy('last_name', 'asc');

        if ($year !== 'all') $students = $query->where('year', $year);

        $students = $query->paginate(20);

        return view('students.index', compact('students'));
    }

    public function search(Request $request) : View
    {
        $validated = $request->validate(['student_name' => 'required']);

        // store student_name in session to persist in search input
        session(['student_name' => $validated['student_name']]);

        $studentName = session('student_name');

        $students = Student::where('last_name', 'LIKE', "%$studentName%" )
            ->orWhere('first_name', 'LIKE', "%$studentName%")
            ->orderByRaw("FIELD(course, 'BSIT', 'BSCS', 'BSIS', 'CompE') ASC")
            ->orderBy('year', 'asc')
            ->orderBy('last_name', 'asc')
            ->paginate(20);

        // Append the search parameter to the pagination links
        $students->appends(['student_name' => $studentName]);

        return view('students.index', compact('students'));
    }
}
