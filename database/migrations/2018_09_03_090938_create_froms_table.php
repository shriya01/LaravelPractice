<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFromsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->bigInteger('number')->default(0);
            $table->bigInteger('minlength')->default(0);
            $table->bigInteger('maxlength')->default(0);
            $table->bigInteger('minvalue')->default(0);
            $table->bigInteger('maxvalue')->default(0);
            $table->bigInteger('range')->default(20);
            $table->string('url')->default('');
            $table->string('filename')->default('');
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
        Schema::dropIfExists('froms');
    }
}
