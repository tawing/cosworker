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
        Schema::create('employees', function (Blueprint $table) {
            $table->id('employee_id');
            $table->foreign('educ_id')->constrained('educations', 'educ_id');
            $table->string('firstname', 30);
            $table->string('middlename', 30);
            $table->string('lastname', 30);
            $table->string('ressuffix', 10);
            $table->string('educ', 100);
            $table->string('eligibility', 30);
            $table->date('bday');
            $table->string('sex', 10);
            $table->string('address', 100);
            $table->string('contactno', 15);
            $table->string('email', 30);
            $table->string('mstatus', 10);
            $table->string('tinno', 20);
            $table->string('agencyempno', 15);
            $table->integer('activate', 2);
            $table->integer('deactivate', 2);
            $table->int('blacklist', 2);
            $table->string('name_ext', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
