<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger("id_user")->comment('ID получателя уведомления');
            $table->bigInteger("id_sender")->comment('ID отправителя уведомления');
            $table->text("text")->comment('Текст уведомления');
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
        Schema::dropIfExists('notifications');
    }
}
