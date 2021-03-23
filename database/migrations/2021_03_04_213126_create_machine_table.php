<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->id();
            $table->string('unique_number')->unique();
            $table->integer('user_id')->nullable(false);
            $table->decimal('price')->nullable();
            $table->integer('status')->default(1)->comment('1 - Active, 2 - Blocked');
            $table->text('address')->nullable();
            $table->integer('water_up')->default(0);
            $table->integer('water_down')->default(0);
            $table->integer('max_banknotes')->default(0);
            $table->integer('max_coins')->default(0);
            $table->integer('timing_connect')->default(1);
            $table->integer('calibration')->default(0);
            $table->text('lender_contacts')->nullable();
            $table->text('lender_address')->nullable();
            $table->decimal('lender_price')->nullable();
            $table->text('lender_description')->nullable();
            $table->float('water_amount')->nullable();
            $table->dateTime('contact_time')->nullable();
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
        Schema::dropIfExists('machines');
    }
}
