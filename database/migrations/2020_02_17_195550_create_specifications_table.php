<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->text('description');
            $table->string('priority');
            $table->string('due_date');
            $table->string('authorisor');
            $table->string('status');
            $table->text('reason_for_decline')->nullable();
            $table->integer('authorisations');//0 means approved, -1 meand declined
            $table->boolean('authorised_by_assets');
            $table->boolean('ready_for_collection');
            $table->boolean('collected');
            $table->string('QrCode');
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
        Schema::dropIfExists('specifications');
    }
}
