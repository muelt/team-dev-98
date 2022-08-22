<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    //テーブル名
    protected $table = 'trips';

    //可変項目
    protected $fillable =
    [
        'user_id','date','title','prefecture','cities','category','img'
    ];
}
