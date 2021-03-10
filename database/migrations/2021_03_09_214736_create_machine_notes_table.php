<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachineNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machine_notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('machine_id')->nullable(false);
            $table->text('contacts')->nullable();
            $table->text('address')->nullable();
            $table->decimal('rent_price')->nullable();
            $table->text('rent_description')->nullable();
            $table->foreign('machine_id')
                ->references('id')
                ->on('machines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('machine_notes');
    }
}
