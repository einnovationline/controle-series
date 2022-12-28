<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;
    protected $fillable = ['number'];
        
    public function series() {
        return $this->belongsTo(Series::class);//belognsTo = pertence a uma série
    }
    
        public function episodes() {
        return $this->hasMany(Episode::class);//hasMany = tem muitas - A série tem muitas episódios= Season
    }
    
}
