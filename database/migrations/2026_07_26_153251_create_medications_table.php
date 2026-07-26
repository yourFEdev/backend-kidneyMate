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
        Schema::create('medications', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('medicine_name');

            $table->string('dosage');

            $table->string('instruction')->nullable();

            $table->time('schedule_time');

            $table->enum('frequency', [
                'daily',
                'weekly',
                'monthly',
                'as_needed'
            ])->default('daily');

            $table->date('start_date')->nullable();

            $table->date('end_date')->nullable();

            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medications');
    }
};
