<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripDetail extends Model
{
    use HasFactory;

    //テーブル名
    protected $table = 'tripdetails';

    //可変項目
    protected $fillable =
    [
        'timestart','timeend','content','img','link','map'
    ];

}
