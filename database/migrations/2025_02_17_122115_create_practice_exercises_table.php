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
        Schema::create('practice_exercises', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('practiceCategory_id');
            $table->foreign('practiceCategory_id')
          ->references('id')
          ->on('practice_categories')
          ->onDelete('cascade');
            $table->string('name'); // e.g. bah, beh, bih, etc.
            $table->string('media_file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practice_exercises');
    }
};
