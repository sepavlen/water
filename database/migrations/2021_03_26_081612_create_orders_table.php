<?php

use App\src\entities\Machine;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('machine_id');
            $table->foreign('machine_id')->references('id')->on(Machine::tableName())->onDelete('cascade');
            $table->string('machine_unique_number');
            $table->float('put_amount')->nullable();
            $table->float('sold_amount')->nullable();
            $table->float('water_paid')->nullable();
            $table->float('water_given')->nullable();
            $table->index('machine_id');
            $table->index('machine_unique_number');
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
        Schema::dropIfExists('orders');
    }
}
