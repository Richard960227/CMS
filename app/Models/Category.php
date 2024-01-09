<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Category extends Model
{

  static $rules = [
    'name' => 'required',
  ];

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['name'];

  public function programs()
  {
    return $this->belongsToMany(Program::class);
  }

  public function podcasts()
  {
    return $this->belongsToMany(Podcast::class);
  }
}
