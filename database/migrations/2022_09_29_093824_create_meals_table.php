<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//あまり気にする必要はないでしょう。 Migration クラスを extends（継承）したクラスを生成しています。
class CreateMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     //up() はマイグレーションが実行されたときに呼ばれます。
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->date('date');
            $table->string('kind');
            $table->string('content');
            $table->integer('calorie');
            $table->timestamps();
            
            //外部キー制約
            
            
            //業務ではモデルの中で設定している。(SQLの時点でガチガチに設定したくない為)
            
            //$table->foreign(外部キー制約を設定するカラム名)->references(参照されるカラム名)-ｓｓ>on(参照されるテーブル名);
            $table->foreign('user_id')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     //down() はマイグレーションがロールバックされたときに呼ばれます。
    public function down()
    {
        Schema::dropIfExists('meals');
    }
}
