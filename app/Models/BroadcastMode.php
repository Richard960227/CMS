<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BroadcastMode
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class BroadcastMode extends Model
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

    public function broadcasts()
    {
        return $this->hasMany(Broadcast::class, 'program_broadcasts');
    }
}
