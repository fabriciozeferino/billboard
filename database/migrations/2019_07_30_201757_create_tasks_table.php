<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('owner_id');
            $table->text('title')->nullable();
            $table->boolean('completed')->default(false);

            $table->timestamps();
            $table->softDeletes();

            $table->index(['id', 'project_id', 'owner_id']);

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('restrict');
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
