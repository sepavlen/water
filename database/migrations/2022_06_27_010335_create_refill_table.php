<?php

use App\src\entities\Machine;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refill', function (Blueprint $table) {
            $table->id();
            $table->string('machine_id');
            $table->string('order_id')->index();
            $table->decimal('amount');
            $table->smallInteger('status')->default(0);
            $table->smallInteger('status_payed')->default(0);
            $table->dateTime('datetime_created')->default(now());
            $table->dateTime('datetime_payed')->nullable();
            $table->dateTime('datetime_st_payed')->nullable();
            $table->text('callback')->nullable();
            $table->foreign('machine_id')->references('unique_number')->on(Machine::tableName())->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refill');
    }
}
