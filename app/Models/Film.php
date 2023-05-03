<?php

namespace App\Models;

use App\Models\Base\Film as BaseFilm;

class Film extends BaseFilm
{
	protected $fillable = [
		'titre',
		'year',
		'synopsis',
		'duree',
		'notation'
	];

	public function genrePrincipal()
    {   
        return $this->belongsToMany(Genre::class)
                    ->wherePivot('principal',true);
    } 

}
