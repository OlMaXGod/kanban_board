<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhaseParticipants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phase_participants', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
<<<<<<< HEAD
            $table->bigInteger("phase_id")->comment('фаза проекта');
            $table->bigInteger("project_id")->comment('Проект');
            $table->text("subtask")->comment('название подзадачи');
            $table->text("comment")->comment('описание подзадачи');
            $table->bigInteger("participant_id")->comment('Участник проекта');
            $table->timestamp('time_frome')->nullable()->comment('Время начала');
            $table->timestamp('time_to')->nullable()->comment('Время завершения');
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
        Schema::dropIfExists('phase_participants');
    }
}
