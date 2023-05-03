<?php

namespace App\Models;

use App\Models\Base\Article as BaseArticle;

class Article extends BaseArticle
{
	protected $fillable = [
		'titre',
		'corps',
		'date_redaction',
		'date_deb',
		'date_fin',
		'publie',
		'user_id'
	];
}
