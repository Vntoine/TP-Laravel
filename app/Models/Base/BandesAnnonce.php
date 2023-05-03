<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Film;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BandesAnnonce
 * 
 * @property int $id
 * @property string $link
 * @property int $duree
 * @property int $film_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Film $film
 *
 * @package App\Models\Base
 */
class BandesAnnonce extends Model
{
	protected $table = 'bandes_annonces';

	protected $casts = [
		'duree' => 'int',
		'film_id' => 'int'
	];

	public function film()
	{
		return $this->belongsTo(Film::class);
	}
}
