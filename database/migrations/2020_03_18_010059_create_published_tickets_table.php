<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublishedTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('published_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_class_id');
            $table->string('user_id_purchaser');
            $table->timestamp('purchased_at');
            $table->string('user_id_owner');
            $table->string('tel');
            $table->timestamp('used_at');
            $table->string('branch_id_used_at');
            $table->tinyInteger('download_status');
            $table->timestamp('downloaded_at');
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
        Schema::dropIfExists('published_tickets');
    }
}
