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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->unsignedBigInteger('transaction_id');
            $table->unsignedBigInteger('game_id');
            $table->integer('Quantity');
            $table->timestamps();

            $table->foreign('transaction_id')->references('transaction_id')->on('transaction_headers')
            ->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('game_id')->references('id')->on('games')
            ->onUpdate('CASCADE')->onDelete('CASCADE');

            $table->primary(['transaction_id' , 'game_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_details');
    }
};
