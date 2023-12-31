<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectPhases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_phases', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text("name")->comment('Имя проекта');
            $table->text("comment")->comment('Комментарий');
            $table->bigInteger("status")->comment('Статус проекта');
            $table->timestamp('time_frome')->nullable()->comment('Время начала');
            $table->timestamp('time_to')->nullable()->comment('Время завершения');
            $table->bigInteger("project_id")->comment('Проект');
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
