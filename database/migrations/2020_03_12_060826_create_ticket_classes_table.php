<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_classes', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('seq');
            $table->string('name', 100);
            $table->smallInteger('ticket_type_id');
            $table->tinyInteger('rental_type_id');
            $table->smallInteger('original_price');
            $table->smallInteger('discount_price');
            $table->tinyInteger('number_per_package');
            $table->timestamp('available_from');
            $table->timestamp('available_to');
            $table->timestamp('on_sale_from');
            $table->timestamp('on_sale_to');
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
        Schema::dropIfExists('ticket_classes');
    }
}
