<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MusicGenre extends Model
{
    protected $table = 'music_interpreters';

    protected $fillable = [
        'music_id',
        'interpreter_id',
    ];

    public function music()
    {
        return $this->belongsTo(Music::class);
    }

    public function interpreter()
    {
        return $this->belongsTo(Interpreter::class);
    }
}
