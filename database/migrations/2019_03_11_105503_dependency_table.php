<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Dependencies;

class DependencyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependency', function (Blueprint $table) {
            $table->increments(Dependencies\Entity::ID);
            $table->timestamps();
            $table->string(Dependencies\Entity::CONCEPT_NODE_ID);
            $table->string(Dependencies\Entity::DEPENDENCY_NODE_ID);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dependency', function (Blueprint $table) {
            //
        });
    }
}
