<?php

namespace App\model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Companies
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $logo
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Companies extends Model
{
  protected $with = ['employees'];
  protected $fillable = [
    'name',
    'email',
    'logo',
  ];

  public function employees(): HasMany
  {
    return $this->hasMany(Employee::class, "company_id", "id");
  }
}
