<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Trip extends Model
{
    use HasFactory, Sluggable;

    //テーブル名
    protected $table = 'trips';

    //可変項目
    protected $guarded = ['id'];

    protected $with = ['category', 'author'];

    public function category()
    {
        return $this->belongsTo(Category::class);  
    }

    
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');  
    }


    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class);  
    }

    public function tripdetails()
    {
        return $this->hasMany(TripDetail::class);  
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
