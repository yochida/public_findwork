<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // topic: "",
        // register_detail: "",
        // start_date: "",
        // finish_date: "",
        // announce: "",
        // link: "",
        Schema::create('works', function (Blueprint $table) {
            $table->increments('id');
            $table->string('topic');
            $table->string('register_detail')->nullable();
            $table->date('start_date');
            $table->date('finish_date');
            $table->string('announce')->nullable();
            $table->string('link')->nullable();
            $table->string('user_id')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('works');
    }
}
