<?php

namespace App\Jobs;

use App\Exports\StudentsExport;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ExportStudentsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Log::info('ExportStudentsJob is being executed.');
        // Excel::store(new StudentsExport, 'public/students.xlsx');
        // Log::info('ExportStudentsJob has completed.');
        Excel::download(new StudentsExport, 'students.xlsx');
    }
}