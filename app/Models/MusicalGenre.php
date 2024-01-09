<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MusicalGenre
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MusicalGenre extends Model
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

}
