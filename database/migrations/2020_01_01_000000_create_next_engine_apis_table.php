<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateNextEngineApisTable
 */
class CreateNextEngineApisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'next_engine_apis',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('user_id')->unique()->nullable()->comment();
                $table->string('pic_mail_address')->unique()->nullable();
                $table->string('password')->nullable();
                $table->string('client_id');
                $table->string('client_secret');
                $table->string('uid')->nullable();
                $table->string('state')->nullable();
                $table->string('redirect_uri');
                $table->string('access_token')->nullable();
                $table->string('refresh_token')->nullable();
                $table->dateTime('access_token_end_date')->nullable();
                $table->dateTime('refresh_token_end_date')->nullable();
                $table->timestamps();

                if (Schema::hasTable('users')) {
                    $table->foreign('user_id')->references('id')->on('users');
                }
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('next_engine_apis');
    }
}
