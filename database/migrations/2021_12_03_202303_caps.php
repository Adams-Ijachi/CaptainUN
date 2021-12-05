<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Caps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('caps', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->boolean('is_approved')->default(0);
            $table->string('url')->nullable();
            $table->foreignId('user_id')->constrained();
            // avg_rating
            $table->float('avg_rating')->default(0);



            // type of cap enum (1-5)
            $table->enum('type', ['company', 'country']);
            $table->softDeletes();
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
        //
        Schema::dropIfExists('caps');
    }
}
