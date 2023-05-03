<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Film;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Genre
 * 
 * @property int $id
 * @property string $nom
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Film[] $films
 *
 * @package App\Models\Base
 */
class Genre extends Model
{
	use SoftDeletes;
	protected $table = 'genres';

	public function films()
	{
		return $this->belongsToMany(Film::class)
					->withPivot('id', 'principal')
					->withTimestamps();
	}
}
