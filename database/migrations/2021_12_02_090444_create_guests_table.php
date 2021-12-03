<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agenda_id');
            $table->unsignedBigInteger('user_id');
            $table->string('gender')->default('');
            $table->string('name')->default('');
            $table->string('district')->default('');
            $table->decimal('money', 12, 2)->default(0);
            $table->string('item')->default('-');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('agenda_id')->references('id')->on('agendas');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guests');
    }
}
