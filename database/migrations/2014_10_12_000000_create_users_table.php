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
            $table->id();
            $table->unsignedBigInteger('parrent_id')->nullable();
            $table->foreign('parrent_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('account_type')->nullable();
            $table->foreign('account_type')->references('id')->on('user_types')->onDelete('cascade');
            $table->boolean('is_admin')->default(false);
            $table->string('phone');
            $table->string('name');
            $table->string('email')->unique();
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
