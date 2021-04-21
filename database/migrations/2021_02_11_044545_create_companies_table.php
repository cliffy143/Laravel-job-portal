<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->text('cname')->nullable();
            $table->text('slug')->nullable();
            $table->text('address')->nullable();
            $table->text('phone')->nullable();
            $table->text('website')->nullable();
            $table->text('logo')->nullable();
            $table->text('cover_photo')->nullable();
            $table->text('slogan')->nullable();
            $table->text('description')->nullable();

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
        Schema::dropIfExists('companies');
    }
}
