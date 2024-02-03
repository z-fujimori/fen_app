<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', //店舗名
        'logo_image', //ロゴ画像
        'address', //住所
        'lat', //緯度経度
        'lng',
        'dist', //目的地までの距離
        'genre', //ジャンル
        'access', //アクセス
        'url', //お店のURL
        'image_pc', //pc用の画像
        'image_mobile', //スマホ用の画像
        'open', //営業時間
        'close', //休業日
        'time', //登録された時間
    ];

    public function limitget(int $limit_count=20){
        return $this->paginate($limit_count);
    }
}
