<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MusicGenre extends Model
{
    protected $table = 'music_genres';

    protected $fillable = [
        'music_id',
        'musical_genre_id',
    ];

    public function music()
    {
        return $this->belongsTo(Music::class);
    }

    public function musicalGenre()
    {
        return $this->belongsTo(MusicalGenre::class);
    }
}
