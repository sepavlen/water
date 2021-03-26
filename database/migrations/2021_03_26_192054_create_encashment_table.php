<?php

use App\src\entities\Machine;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncashmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encashment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('machine_id');
            $table->foreign('machine_id')->references('id')->on(Machine::tableName())->onDelete('cascade');
            $table->string('machine_unique_number');
            $table->integer('b1')->nullable()->default(0);
            $table->integer('b2')->nullable()->default(0);
            $table->integer('b3')->nullable()->default(0);
            $table->integer('b4')->nullable()->default(0);
            $table->integer('b5')->nullable()->default(0);
            $table->integer('b6')->nullable()->default(0);
            $table->integer('c1')->nullable()->default(0);
            $table->integer('c2')->nullable()->default(0);
            $table->integer('c3')->nullable()->default(0);
            $table->integer('c4')->nullable()->default(0);
            $table->integer('c5')->nullable()->default(0);
            $table->integer('c6')->nullable()->default(0);
            $table->integer('total')->nullable(0);
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
        Schema::dropIfExists('encashment');
    }
}
