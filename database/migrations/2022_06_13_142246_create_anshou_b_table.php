<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnshouBTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anshou_b_table', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('an_gyousa_c')->nullable(false)->length(4);  // 業者コード
            $table->integer('an_anshou_number')->nullable(false)->length(4);  // 暗証番号
            $table->string('an_mail', 60); // メールアドレス
            $table->integer('an_gyou_number')->length(2); // 行番号
            $table->string('an_tantou_sikibetu_mei', 20); // 担当識別名
            $table->string('an_login_id', 20); // ログインＩＤ
            $table->string('an_password', 20); // パスワード
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
        Schema::dropIfExists('anshou_b_table');
    }
}
