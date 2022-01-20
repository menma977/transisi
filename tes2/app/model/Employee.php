<?php

namespace App\model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Employee
 *
 * @property int id
 * @property string name
 * @property string email
 * @property int company_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Employee extends Model
{
  protected $fillable = [
    'name',
    'email',
    'company_id',
  ];

  protected $hidden = [
    'id',
    'company_id',
  ];

  public function company(): BelongsTo
  {
    return $this->belongsTo(Companies::class);
  }
}
