<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_participants', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger("project_id")->comment('Проект');
            $table->bigInteger("participant_id")->comment('Участник проекта');
            $table->bigInteger("role_id")->comment('Роль участника');
            $table->text("comment")->comment('Комментарий');
            $table->boolean("entry_request")->comment('Запрос на вход');
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
        Schema::dropIfExists('project_participants');
    }
}
