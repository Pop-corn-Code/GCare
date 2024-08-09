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
        Schema::table('triggers', function (Blueprint $table) {
            $table->renameColumn('trigger_type', 'trigger_name');
            $table->renameColumn('description', 'trigger_description');
            $table->unsignedBigInteger('symptom_id');
            
            $table->foreign('symptom_id')->references('id')->on('symptoms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('triggers', function (Blueprint $table) {
            $table->renameColumn('trigger_name', 'trigger_type');
            $table->renameColumn('trigger_description', 'description');
        });
    }
};
