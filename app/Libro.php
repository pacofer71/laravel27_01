<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = ['titulo', 'sinopsis', 'pvp', 'stock', 'isbn'];


    //Scopes
    public function scopeTitulo($query, $texto)
    {
        return $query->where("titulo", "like", "%$texto%");
    }

    public function scopeSinopsis($query, $texto)
    {
        return $query->where("sinopsis", "like", "%$texto%");
    }

    public function scopePvp($query, $v)
    {
        switch ($v) {
            case 1:
                return $query->where('pvp', '<', 10);

            case 2:
                return $query->where('pvp', '>=', 10)->where('pvp', '<=', '50');
            case 3:
                return $query->where('pvp', '>', 50);
        }
    }
}
