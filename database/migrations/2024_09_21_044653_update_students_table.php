<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->string('last_name')->after('id');
            $table->string('first_name')->after('last_name');
            $table->string('middle_initial')->after('first_name');
            $table->string('email')->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('name')->after('id');
            $table->dropColumn('last_name');
            $table->dropColumn('first_name');
            $table->dropColumn('middle_initial');
            $table->string('email')->dropUnique()->change();
            // $table->dropUnique('students_email_unique');
        });
    }
};
