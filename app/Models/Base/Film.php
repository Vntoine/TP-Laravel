<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BandesAnnonce;
use App\Models\DatesSortie;
use App\Models\Genre;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Film
 * 
 * @property int $id
 * @property string $titre
 * @property int $year
 * @property string|null $synopsis
 * @property int $duree
 * @property float $notation
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property BandesAnnonce $bandes_annonce
 * @property Collection|DatesSortie[] $dates_sorties
 * @property Collection|Genre[] $genres
 *
 * @package App\Models\Base
 */
class Film extends Model
{
	use SoftDeletes;
	protected $table = 'films';

	protected $casts = [
		'year' => 'int',
		'duree' => 'int',
		'notation' => 'float'
	];

	public function bandes_annonce()
	{
		return $this->hasOne(BandesAnnonce::class);
	}

	public function dates_sorties()
	{
		return $this->hasMany(DatesSortie::class);
	}

	public function genres()
	{
		return $this->belongsToMany(Genre::class)
					->withPivot('id', 'principal')
					->withTimestamps();
	}
}
