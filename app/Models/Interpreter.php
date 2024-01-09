<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Interpreter
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Interpreter extends Model
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

    public function interpreters()
    {
      return $this->belongsToMany(Interpreter::class);
    }

}
