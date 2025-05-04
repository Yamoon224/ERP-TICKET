<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Department
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Bill[] $bills
 * @property Collection|City[] $cities
 *
 * @package App\Models
 */
class Line extends Model
{
	use SoftDeletes;

	protected $guarded = [];

	public function tickets()
	{
		return $this->hasMany(Ticket::class, 'department_to');
	}
}
