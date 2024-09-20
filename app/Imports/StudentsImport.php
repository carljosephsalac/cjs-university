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
        return Student::updateOrCreate( // The updateOrCreate() method requires two arguments
            /**
            * The first argument is an associative array that defines the "unique" condition.
            * For example, ['name' => $row['name']] will try to find a record where the name matches.
            * If a matching record is found, it will update the specified fields.
            * If no matching record is found, it will create a new record
            */
            ['name' => $row['name']],
            /**
            * The second argument is an associative array that contains the columns to be updated or inserted.
            * All the fields like email, course, year, etc., are included here.
            */
            [
                'email' => $row['email'],
                'course' => $row['course'],
                'year' => $row['year'],
                'prelim' => $row['prelim'],
                'midterm' => $row['midterm'],
                'finals' => $row['finals'],
                'average' => $row['average']
            ],
        );
    }
}
