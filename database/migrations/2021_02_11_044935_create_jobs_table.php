<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
      
            $table->integer('user_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->text('title')->nullable();
            $table->text('slug')->nullable();
            $table->text('description')->nullable();
            $table->text('roles')->nullable();
            $table->integer('category_id')->nullable();
            $table->text('position')->nullable();
            $table->text('address')->nullable();
            $table->text('type')->nullable();
            $table->integer('status')->nullable();
            $table->date('last_date')->nullable();


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
        Schema::dropIfExists('jobs');
    }
}
