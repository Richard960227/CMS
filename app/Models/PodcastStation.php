<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PodcastStation extends Model
{
    protected $table = 'podcast_stations';

    protected $fillable = [
        'podcast_id',
        'frequency_id',
    ];

    public function program()
    {
        return $this->belongsTo(Podcast::class);
    }

    public function station()
    {
        return $this->belongsTo(Station::class);
    }
}