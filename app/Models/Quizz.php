<?php

namespace App\Models;

use App\Models\Base\Quizz as BaseQuizz;

class Quizz extends BaseQuizz
{
	protected $fillable = [
		'film',
		'lieux',
		'photo',
		'year'
	];
}
