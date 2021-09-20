<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddParentIdToSenderIDSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sender_i_d_s', function (Blueprint $table) {
            $table->unsignedBigInteger('parent_id');
            $table->foreign('parent_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sender_i_d_s', function (Blueprint $table) {
            $table->dropColumn('parent_id');
        });
    }
}
