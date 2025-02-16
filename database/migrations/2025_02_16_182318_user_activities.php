<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('user_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('exercise_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');  // Reference to Category
            $table->foreignId('day_id')->constrained()->onDelete('cascade');        // Reference to Day
            $table->foreignId('set_id')->constrained()->onDelete('cascade');        // Reference to Set
            $table->string('media_file')->nullable();                               // To store media submitted by user
            $table->timestamp('submitted_at')->nullable();                          // Date when user submitted
            $table->boolean('marked_as_done')->default(false);                      // Mark if the activity is done
            $table->boolean('marked_as_evaluated')->default(false);                 // To track evaluation status
            $table->text('evaluation')->nullable();                                 // Nullable initially, updated when evaluated
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('user_activities');
    }
};
