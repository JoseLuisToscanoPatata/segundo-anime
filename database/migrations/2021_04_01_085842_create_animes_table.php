<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animes', function (Blueprint $table) {
            $table->id(); 
            $table->string('title');
            $table->double('rating')->default(0);
            $table->text('synopsis')->nullable();
            $table->integer('episodes')->default(0);
            $table->integer('episodeLength')->default(0);
            $table->enum('ageRating',['G','PG','R','R18'])->nullable();
            $table->enum('subType',['ONA','OVA','TV','movie','music','special'])->nullable();
            $table->string("trailer")->nullable();
            $table->enum('status',['current','finished','tba']);
            $table->string("startDate")->nullable();
            $table->string("endDate")->nullable();
            $table->integer('ratingCount')->default(0);
            $table->integer('userCount')->default(0);
            $table->string('cover',255)->nullable();
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
        Schema::dropIfExists('animes');
    }
}
