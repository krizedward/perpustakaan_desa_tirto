<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('codebook_id');
            $table->unsignedBigInteger('member_id');
            $table->string('action');
            $table->timestamps();
            $table->softDeletes()->nullable();

            $table->foreign('codebook_id')
            ->references('id')
            ->on('code_books')
            ->onDelete('cascade');

            $table->foreign('member_id')
            ->references('id')
            ->on('members')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrows');
    }
}
