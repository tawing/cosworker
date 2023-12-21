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
            $table->foreignId('educ_id')->constrained('educations', 'educ_id');
            $table->string('firstname', 30);
            $table->string('middlename', 30);
            $table->string('lastname', 30);
            $table->string('ressuffix', 10)->nullable();
            $table->string('educ', 100)->nullable();
            $table->string('eligibility');
            $table->date('birthdate');
            $table->string('gender', 20);
            $table->string('address', 100);
            $table->string('contact_no', 15);
            $table->string('email');
            $table->string('marital_status', 10);
            $table->string('tin_no', 20);
            $table->string('agencyemp_no', 15);
            $table->integer('activate')->default(1);
            $table->integer('deactivate')->default(0);
            $table->integer('blacklist')->default(0);
            $table->string('name_ext', 10)->nullable();
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
