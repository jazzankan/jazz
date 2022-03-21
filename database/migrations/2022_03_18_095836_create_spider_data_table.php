<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spider_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organizer_id')->constrained();
            $table->unsignedTinyInteger('warning');
            $table->text('headstring');
            $table->date('fixdate');
            $table->string('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spider_data');
    }
};
