<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Article
 * 
 * @property int $id
 * @property string $titre
 * @property string $corps
 * @property Carbon $date_redaction
 * @property Carbon|null $date_deb
 * @property Carbon|null $date_fin
 * @property bool $publie
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property User $user
 *
 * @package App\Models\Base
 */
class Article extends Model
{
	use SoftDeletes;
	protected $table = 'articles';

	protected $casts = [
		'date_redaction' => 'date',
		'date_deb' => 'date',
		'date_fin' => 'date',
		'publie' => 'bool',
		'user_id' => 'int'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
