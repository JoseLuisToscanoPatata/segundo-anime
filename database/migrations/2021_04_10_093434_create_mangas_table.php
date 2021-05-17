<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMangasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mangas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->double('rating')->default(0);
            $table->text('synopsis')->nullable();
            $table->integer('chapters')->default(0);
             $table->enum('ageRating',['G','PG','R','R18'])->nullable();
            $table->enum('subType',['doujin','manga','manhwa','manhua','novel','oel','oneshot'])->nullable();
            $table->enum('status',['current','finished','tba']);
            $table->integer('ratingCount')->default(0);
            $table->integer('userCount')->default(0);
            $table->string('startDate')->nullable();
            $table->string('endDate')->nullable();
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
        Schema::dropIfExists('mangas');
    }
}
