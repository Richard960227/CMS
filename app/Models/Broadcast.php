<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Broadcast
 *
 * @property $id
 * @property $program_id
 * @property $broadcast_mode_id
 * @property $start
 * @property $end
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Broadcast extends Model
{

    static $rules = [
        'program_id' => 'required',
        'broadcast_mode_id' => 'required',
        'start' => 'required',
        'end' => 'required',
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['program_id', 'broadcast_mode_id', 'start', 'end'];

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function broadcastMode()
    {
        return $this->belongsTo(BroadcastMode::class, 'broadcast_mode_id');
    }
}
