<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('owner');
            $table->integer('target_id');
            $table->string('title');
            $table->string('success_indicator');
            $table->string('location');
            $table->string('remarks');
            $table->string('plan_b');
            $table->string('support_request');
            $table->string('support_from_whom');
            $table->string('support_how_much');
            $table->string('support_when_needed');
            $table->timestamp('target_start')->nullable();
            $table->timestamp('target_end')->nullable();
            $table->timestamp('actual_start')->nullable();
            $table->timestamp('actual_end')->nullable();
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
        Schema::dropIfExists('activities');
    }
}
