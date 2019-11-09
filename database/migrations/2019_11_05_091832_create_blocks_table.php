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
            $table->enum('type', ['heading', 'text', 'image', 'note', 'code']);
            $table->text('heading_content')->nullable();
            $table->enum('heading_level', [1, 2, 3])->nullable();
            $table->text('text_content')->nullable();
            $table->string('image_path')->nullable();
            $table->enum('image_arrangement', ['full', 'centered'])->nullable();
            $table->text('image_content')->nullable();
            $table->text('note_content')->nullable();
            $table->string('code_language')->nullable();
            $table->text('code_content')->nullable();
            $table->integer('position')->nullable();
            $table->timestamps();

            $table->bigInteger('post_id')->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blocks');
    }
}
