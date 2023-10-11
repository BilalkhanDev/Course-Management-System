<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'contact',
        'cnic',
        'email',
        'user_id',
        'image',
        'added_by',
    ];
    public function course(){
        return $this->hasOne( Course::class );
    }
}
