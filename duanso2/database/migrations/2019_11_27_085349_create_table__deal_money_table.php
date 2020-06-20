<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDealMoneyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DealMoney', function (Blueprint $table) {
            //uns .
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->boolean('type');
            $table->double('money');
            $table->text('description');
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('casase');

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
        Schema::dropIfExists('DealMoney');
    }
}
