<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Film;
use App\Models\Genre;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FilmGenre
 * 
 * @property int $id
 * @property int $film_id
 * @property int $genre_id
 * @property bool $principal
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Film $film
 * @property Genre $genre
 *
 * @package App\Models\Base
 */
class FilmGenre extends Model
{
	protected $table = 'film_genre';

	protected $casts = [
		'film_id' => 'int',
		'genre_id' => 'int',
		'principal' => 'bool'
	];

	public function film()
	{
		return $this->belongsTo(Film::class);
	}

	public function genre()
	{
		return $this->belongsTo(Genre::class);
	}
}
