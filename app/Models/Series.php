<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;
    protected $fillable = ['nome'];
    protected $with = ['seasons'];


    public function seasons() {
        return $this->hasMany(Season::class, 'series_id');//hasMany = tem muitas - A série tem muitas temporadas= Season
    }
    
    public static function booted() {
        self::addGlobalScope('ordered', function (builder $queryBuilder){
            $queryBuilder->orderBy('nome');
        });
    }

}
