<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Task\Entity;

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
            $table->increments('id');
            $table->timestamps();
            $table->string(Entity::CONCEPT_NODE_ID);
            $table->integer(Entity::DELETED_AT)
                  ->nullable();
            $table->text(Entity::PROBLEM_STATEMENT)
                  ->nullable();
            $table->text(Entity::DESCRIPTION)
                  ->nullable();
            $table->text(Entity::TEST_CASES)
                  ->nullable();
            $table->text(Entity::PROVIDED_CODE)
                  ->nullable();
            $table->text(Entity::DEFAULT_CODE)
                  ->nullable();
            $table->text(Entity::EXPECTED_OUTPUT)
                  ->nullable();
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
