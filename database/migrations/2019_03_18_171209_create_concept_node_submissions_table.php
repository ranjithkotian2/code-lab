<?php

use App\Models\ConceptNodeSubmission;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConceptNodeSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concept_node_submissions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string(ConceptNodeSubmission\Entity::CONCEPT_NODE_ID);
            $table->string(ConceptNodeSubmission\Entity::USER_ID);
            $table->boolean(ConceptNodeSubmission\Entity::COMPLETED);
            $table->text(ConceptNodeSubmission\Entity::CODE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('concept_node_submissions');
    }
}
