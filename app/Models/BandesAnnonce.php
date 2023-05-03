<?php

namespace App\Models;

use App\Models\Base\BandesAnnonce as BaseBandesAnnonce;

class BandesAnnonce extends BaseBandesAnnonce
{
	protected $fillable = [
		'link',
		'duree',
		'film_id'
	];
}
