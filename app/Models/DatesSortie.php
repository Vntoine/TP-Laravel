<?php

namespace App\Models;

use App\Models\Base\DatesSortie as BaseDatesSortie;

class DatesSortie extends BaseDatesSortie
{
	protected $fillable = [
		'date_sortie',
		'pays',
		'film_id'
	];
}
