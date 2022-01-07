<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersMachinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_machines', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('machine_id')->constrained()->onDelete('CASCADE');
//            $table->unique(['user_id','machine_id']);

            $table->engine = "InnoDB";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_machines');
    }
}
