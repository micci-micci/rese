<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('reservations');

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('password', 255);
            $table->string('email', 255)->unique();
            $table->timestamps();
        });

        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->timestamps();
        });

        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->string('image_url')->nullable();
            // $table->unsignedBigInteger('area_id');
            // $table->unsignedBigInteger('category_id');
            $table->timestamps();

            $table->foreignId('area_id')
                    ->constrained()
                    ->onDelete('cascade');

            $table->foreignId('category_id')
                    ->constrained()
                    ->onDelete('cascade');

            // $table->foreign('area_id')
            //         ->referrances('id')
            //         ->on('areas')
            //         ->onDelete('cascade');
            // $table->foreign('category_id')
            //         ->referrances('id')
            //         ->on('categories')
            //         ->onDelete('cascade');
        });

        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('time');
            $table->integer('number');
            $table->timestamps();
            // $table->unsignedBigInteger('user_id');
            // $table->unsignedBigInteger('restaurant_id');

            $table->foreignId('user_id')
                    ->constrained()
                    ->onDelete('cascade');

            $table->foreignId('restaurant_id')
                    ->constrained()
                    ->onDelete('cascade');

                    // $table->foreign('user_id')
            //         ->referrances('id')
            //         ->on('users')
            //         ->onDelete('cascade');
            // $table->foreign('restaurant_id')
            //         ->referrances('id')
            //         ->on('restaurants')
            //         ->onDelete('cascade');
        });

        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // $table->unsignedBigInteger('user_id');
            // $table->unsignedBigInteger('restaurant_id');

            $table->foreignId('user_id')
                    ->constrained()
                    ->onDelete('cascade');

            $table->foreignId('restaurant_id')
                    ->constrained()
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rese');
    }
}
