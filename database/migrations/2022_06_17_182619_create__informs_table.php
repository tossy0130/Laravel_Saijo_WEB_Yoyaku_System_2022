<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Informs', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('sentence_number')->nullable(false)->length(10); // 文章番号
            $table->integer('annai_type')->nullable(false)->length(1); // 案内種別
            $table->string('annai_title'); // 表題

            $table->date('start_date'); // 開始日付
            $table->date('end_date');   // 終了日付
            $table->time('start_time'); // 開始時刻
            $table->time('end_time');   // 終了時刻

            $table->string('annai_test', 400); // 案内文章
            $table->integer('touroku_person')->length(4); // 登録担当
            $table->string('touroku_Terminal', 15); // 登録端末

            $table->integer('kousin_person')->length(4); // 更新担当
            $table->string('kousin_Terminal', 4); // 更新端末

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
        Schema::dropIfExists('Informs');
    }
}
