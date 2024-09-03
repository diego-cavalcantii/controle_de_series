<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;
    protected $fillable = ['nome_genero'];

    public function series(){
        return $this->hasMany(Series::class,'genero_id');
    }

//    protected static function booted()
//    {
//        self::addGlobalScope('orderByName', function (Builder $builder) {
//            $builder->orderBy('nome_genero', 'asc');
//        });
//    }
}
