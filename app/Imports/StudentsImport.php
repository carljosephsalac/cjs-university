<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        // Initialize the 'average' field as null
        $average = null;

        // Check if prelim, midterm, and finals are all filled and numeric
        if (isset($row['prelim'], $row['midterm'], $row['finals'])
            && is_numeric($row['prelim'])
            && is_numeric($row['midterm'])
            && is_numeric($row['finals'])) {

            // Calculate the average
            $average = round(($row['prelim'] + $row['midterm'] + $row['finals']) / 3, 2);
        }

        return Student::updateOrCreate( // The updateOrCreate() method requires two arguments
            /**
            * The first argument is an associative array that defines the "unique" condition.
            * For example, ['email' => $row['email']] will try to find a record where the email matches.
            * If a matching record is found, it will update the specified fields.
            * If no matching record is found, it will create a new record
            */
            ['email' => $row['email']],
            /**
            * The second argument is an associative array that contains the columns to be updated or inserted.
            * All the fields like email, course, year, etc., are included here.
            */
            [
                'last_name' => $row['last_name'],
                'first_name' => $row['first_name'],
                'middle_initial' => $row['middle_initial'],
                'course' => $row['course'],
                'year' => $row['year'],
                'prelim' => $row['prelim'],
                'midterm' => $row['midterm'],
                'finals' => $row['finals'],
                'average' => $average
            ],
        );
    }
}
