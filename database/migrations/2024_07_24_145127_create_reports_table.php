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
        Schema::create('disaster_reports', function (Blueprint $table) {
            $table->id();
            $table->string('employee_email');
            $table->string('typhoon_name');
            $table->string('affected_barangay');
            $table->date('started_date');
            $table->date('end_date');
            $table->decimal('lowest_water_level',2,2);
            $table->decimal('highest_water_level',2,2);
            $table->integer('casualties_dead');
            $table->integer('casualties_injured');
            $table->integer('dispPol_person');
            $table->integer('dispPol_families');
            $table->float('infrastracture_damaged',8,2);
            $table->float('agriculture_damaged',8,2);
            $table->float('industrial_damaged',8,2);
            $table->float('privateComercial_damaged',8,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disaster_reports');
    }
};
