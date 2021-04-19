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
            $table->integer('episodes')->nullable()->default(0);
            $table->integer('episodeLength')->nullable()->default(0);
            $table->enum('ageRating',['G','PG','R','R18'])->nullable()->default('G');
            $table->enum('subType',['ONA','OVA','TV','movie','music','special'])->nullable();
            $table->enum('status',['current','finished','tba']);
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
