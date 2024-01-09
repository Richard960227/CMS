<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramStation extends Model
{
    protected $table = 'program_stations';

    protected $fillable = [
        'program_id',
        'frequency_id',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function station()
    {
        return $this->belongsTo(Station::class);
    }
}
