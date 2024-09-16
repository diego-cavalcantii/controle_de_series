<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;


class Series extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'poster', 'genero_id','avaliacao','assistido',];


    public function generos() {
        return $this->belongsTo(Genero::class,'genero_id');
    }

    protected static function booted()
    {
        self::addGlobalScope('orderByName', function (Builder $builder) {
            $builder->orderBy('nome', 'asc');
        });
    }

}
