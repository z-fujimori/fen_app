<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;

class UserLog extends Model
{
    use Prunable;

    /**
     * 削除対処のモデルを取得
     *
     * @return \Illuminate\Database\Eloquent\Shop
     */
    public function prunable()
    {
        // ６ヶ月前のレコードを取得する
        return static::where('created_at', '<=', now()->subDays(2));
    }
}