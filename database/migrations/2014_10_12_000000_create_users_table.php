<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',64);
//            $table->string('weibo_id')->nullable();
            $table->string('wechat_id',28)->nullable();
//            $table->string('qq_id')->nullable();
            $table->string('avatar')->default('avatar.png');
            $table->string('email',64)->unique();
            $table->decimal('balance')->default(0.00);
            $table->boolean('vip')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
