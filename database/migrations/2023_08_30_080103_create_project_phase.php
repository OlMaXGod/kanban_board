<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectPhase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_phase', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text("name")->comment('Имя проекта');
            $table->text("comment")->comment('Комментарий');
            $table->timestamp('time_frome')->nullable()->comment('Время начала');
            $table->timestamp('time_to')->nullable()->comment('Время завершения');
            $table->bigInteger("project_id")->comment('Проект');
            $table->bigInteger("participant_id")->comment('Участник проекта');
            $table->bigInteger("who_changed")->comment('Кто совершил последнее изменение');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_phase');
    }
}
