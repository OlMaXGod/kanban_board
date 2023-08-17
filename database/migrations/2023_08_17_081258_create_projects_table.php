<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text("name")->comment('Имя проекта');
            $table->text("comment")->nullable()->comment('Описание проекта');
            $table->bigInteger("type_id")->comment('Открытый проект/закрытый проект(по приглашению)');
            $table->dateTime("change_date")->comment('дата последнего изменения');
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
        Schema::dropIfExists('projects');
    }
}
