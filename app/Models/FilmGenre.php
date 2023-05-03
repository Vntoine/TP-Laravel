<?php

namespace App\Models;

use App\Models\Base\FilmGenre as BaseFilmGenre;

class FilmGenre extends BaseFilmGenre
{
	protected $fillable = [
		'film_id',
		'genre_id',
		'principal'
	];
}
