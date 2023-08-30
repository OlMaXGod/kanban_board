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
            $table->bigInteger("phase_id")->comment('Проект');
            $table->bigInteger("participant_id")->comment('Участник проекта');
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
