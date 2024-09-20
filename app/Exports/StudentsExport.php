<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\Support\Responsable;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class StudentsExport implements FromCollection, Responsable, WithHeadings, WithStyles, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    /**
    * It's required to define the fileName within
    * the export class when making use of Responsable.
    */
    private $fileName = 'students.xlsx';

    /**
    * Optional Writer Type
    */
    private $writerType = Excel::XLSX;

    /**
    * Optional headers
    */
    private $headers = [
        'Content-Type' => 'text/csv',
    ];

    public function collection()
    {
        return Student::select('name', 'email', 'course', 'year', 'prelim', 'midterm', 'finals', 'average')
                  ->orderBy('name', 'asc')
                  ->get();
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Course',
            'Year',
            'Prelim',
            'Midterm',
            'Finals',
            'Average'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text and center aligned.
            1 => [
                'font' => ['bold' => true],
            ],

            // // Style all data rows to center align
            // 'A1:C' . $sheet->getHighestRow() => [
            //     'alignment' => [
            //         'horizontal' => Alignment::HORIZONTAL_CENTER,
            //     ],
            // ],
        ];
    }
}
