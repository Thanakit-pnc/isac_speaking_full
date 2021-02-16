<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpeakingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('speakings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('std_id');
            $table->integer('round');
            $table->integer('part');
            $table->string('topic');
            $table->enum('status', ['sent', 'pending', 'success']);
            $table->string('score')->nullable();
            $table->text('fluency_and_coherence')->nullable();
            $table->text('lexical_resource')->nullable();
            $table->text('grammar_range_and_acc')->nullable();
            $table->text('pronunciation')->nullable();
            $table->integer('th_id')->nullable();
            $table->dateTime('due_date');
            $table->dateTime('th_sent_date')->nullable();
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
        Schema::dropIfExists('speakings');
    }
}
