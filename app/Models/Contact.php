<?php

namespace App\Models;

use App\Models\Base\Contact as BaseContact;

class Contact extends BaseContact
{
	protected $fillable = [
		'pseudo',
		'objet',
		'message',
		'mail'
	];
}
