<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('creator_id')->unsigned();
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('university_id');
            $table->string('title');
            $table->longText('description');
            $table->string('target_amount');
            $table->string('cover_image');
            $table->string('document');
            $table->string('campaign_status')->default('0');
            $table->integer('approved_by')->unsigned()->nullable();
            $table->foreign('approved_by')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('campaigns');
    }
}
