<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\ConceptNode\Entity;

class CreateConceptNodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concept_node', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->integer(Entity::DELETED_AT)
                  ->nullable();
            $table->text(Entity::DESCRIPTION)
                  ->nullable();
            $table->text(Entity::PROBLEM_STATEMENT)
                  ->nullable();
            $table->string(Entity::VIDEO_URL)
                  ->nullable();
            $table->text(Entity::TEST_CASES)
                  ->nullable();
            $table->string(Entity::TYPE)
                  ->nullable();
            $table->text(Entity::PROVIDED_CODE)
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
        Schema::dropIfExists('concept_node');
    }
}
