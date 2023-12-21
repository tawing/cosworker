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
        Schema::create('pendings', function (Blueprint $table) {
            $table->id('penstatus_id');
            $table->foreignId('users_id')->constrained('users', 'users_id');
            $table->foreignId('employee_id')->constrained('employees', 'employee_id');
            $table->date('date');
            $table->string('training', 50);
            $table->integer('mandays');
            $table->date('startdate1');
            $table->date('enddate1');
            $table->date('startdate2');
            $table->date('enddate2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendings');
    }
};
