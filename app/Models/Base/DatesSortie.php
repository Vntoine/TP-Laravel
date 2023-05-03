<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Film;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DatesSortie
 * 
 * @property int $id
 * @property Carbon $date_sortie
 * @property string $pays
 * @property int $film_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Film $film
 *
 * @package App\Models\Base
 */
class DatesSortie extends Model
{
	protected $table = 'dates_sortie';

	protected $casts = [
		'date_sortie' => 'date',
		'film_id' => 'int'
	];

	public function film()
	{
		return $this->belongsTo(Film::class);
	}
}
