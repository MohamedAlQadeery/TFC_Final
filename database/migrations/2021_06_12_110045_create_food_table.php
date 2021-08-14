<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->string('ar_name')->unique();
            $table->string('en_name')->unique();
            $table->string('tr_name')->unique();
            $table->smallInteger('status')->default(1); //1 enable 2 disable
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->double('price');
            $table->tinyText('ar_desc')->nullable();
            $table->tinyText('en_desc')->nullable();
            $table->tinyText('tr_desc')->nullable();

            $table->smallInteger('carbs')->nullable();
            $table->smallInteger('protein')->nullable();
            $table->smallInteger('fats')->nullable();

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
        Schema::dropIfExists('food');
    }
}
