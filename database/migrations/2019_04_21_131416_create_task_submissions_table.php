<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\TaskSubmission\Entity;

class CreateTaskSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_submissions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string(Entity::TASK_ID);
            $table->string(Entity::USER_ID);
            $table->boolean(Entity::COMPLETED);
            $table->text(Entity::CODE);
            $table->timestamp(Entity::COMPLETED_AT)
                  ->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_submissions');
    }
}
