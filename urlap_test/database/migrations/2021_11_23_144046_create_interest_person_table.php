<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterestPersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interest_person', function (Blueprint $table) {
            $table->unsignedBigInteger('interest_id');
            $table->unsignedBigInteger('person_id');

            $table->foreign('interest_id')
                ->references('id')
                ->on('interests')
                ->cascadeOnDelete();

            $table->foreign('person_id')
                ->references('id')
                ->on('people')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interest_person');
    }
}
