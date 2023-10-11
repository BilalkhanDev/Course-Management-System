<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'category_id',
        'trainer_id',
        'description',
        'meeting_link',
        'meeting_date',
        'meeting_time',
        'image',
        'added_by',
    ];
    public function category(){
        return $this->hasOne( Category::class,'id','category_id' );
    }
    public function trainer(){
        return $this->hasOne( Trainer::class,'id','trainer_id' );
    }
    public function lectures(){
        return $this->hasMany( Lecture::class );
    }
}
