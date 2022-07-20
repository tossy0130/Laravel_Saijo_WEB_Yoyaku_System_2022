<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarekisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Warekis', function (Blueprint $table) {
            $table->increments('id'); // ID

            $table->string('gengou', 10);   // 元号
            $table->string('ryakusyou', 2); // 略称
            $table->date('start_date');     // 開始日付

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Warekis');
    }
}
