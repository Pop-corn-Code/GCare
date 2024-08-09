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
        Schema::table('symptoms', function (Blueprint $table) {
            $table->renameColumn('notes', 'symptom_description');
            $table->renameColumn('date', 'symptom_onset')->comment('The day from when the symptom starts');
            $table->renameColumn('severity', 'symptom_severity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('symptoms', function (Blueprint $table) {
            $table->renameColumn('symptom_description', 'notes');
            $table->renameColumn('symptom_onset', 'date')->comment('The day from when the symptom starts');
            $table->renameColumn('symptom_severity', 'severity');
        });
    }
};
