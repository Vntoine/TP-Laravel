<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Quizz
 * 
 * @property int $id
 * @property string $film
 * @property string $lieux
 * @property string $photo
 * @property int|null $year
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class Quizz extends Model
{
	protected $table = 'quizz';

	protected $casts = [
		'year' => 'int'
	];
}
