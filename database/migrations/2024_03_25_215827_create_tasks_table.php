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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('employee');
            $table->string('title');
            $table->text('description');
            $table->string('category');
            $table->string('sub_category');
            $table->string('evidence')->nullable();
            $table->dateTime('date_start');
            $table->dateTime('date_end');
            $table->enum('status', ['In Progress', 'Waiting Approval', 'Approved', 'Rejected'])->default('In Progress');
            $table->string('creator');
            $table->timestamps();

            $table->foreign('creator')->references('email')->on('users');
            $table->foreign('employee')->references('email')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
