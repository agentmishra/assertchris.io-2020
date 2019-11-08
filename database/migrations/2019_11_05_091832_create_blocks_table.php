<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlocksTable extends Migration
{
    public function up()
    {
        Schema::create('blocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type', ['heading', 'text']);
            $table->text('heading_content')->nullable();
            $table->enum('heading_level', [1, 2, 3])->default(1);
            $table->text('text_content')->nullable();
            $table->integer('position')->default(1);
            $table->timestamps();

            $table->bigInteger('post_id')->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blocks');
    }
}
