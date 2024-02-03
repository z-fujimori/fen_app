<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('name'); //店舗名
            $table->string('logo_image')->nullable(); //ロゴ画像
            $table->string('address'); //住所
            $table->double('lat'); //緯度経度
            $table->double('lng');
            $table->double('dist'); //距離
            $table->string('genre'); //ジャンル
            $table->string('access'); //アクセス
            $table->string('url')->nullable(); //お店のURL
            $table->string('image_pc')->nullable(); //pc用の画像
            $table->string('image_mobile')->nullable(); //スマホ用の画像
            $table->string('open',400); //営業時間
            $table->string('close')->nullable(); //休業日
            $table->integer('time'); //登録された時間
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
        Schema::dropIfExists('shops');
    }
};
