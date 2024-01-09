<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramBroadcastMode extends Model
{
    protected $table = 'program_broadcast_modes';

    protected $fillable = [
        'program_id',
        'broadcast_mode_id',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function broadcastMode()
    {
        return $this->belongsTo(BroadcastMode::class);
    }

}