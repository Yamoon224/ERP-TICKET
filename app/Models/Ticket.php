<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Bill
 * 
 * @property int $id
 * @property Carbon $expired_at
 * @property string|null $reason
 * @property int $city_from
 * @property int $city_to
 * @property int $department_from
 * @property int $department_to
 * @property Carbon $created_at
 * @property int $created_by
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * 
 * @property City $city
 * @property User $user
 * @property Department $department
 *
 * @package App\Models
 */
class Ticket extends Model
{
	use SoftDeletes;

	protected $casts = [
		'expired_at' => 'datetime',
		'created_by' => 'int'
	];

	protected $guarded = [];

	public function creator()
	{
		return $this->belongsTo(User::class, 'created_by');
	}

	public function line()
	{
		return $this->belongsTo(Line::class);
	}
}
