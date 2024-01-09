<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Music
 *
 * @property $id
 * @property $name
 * @property $interpreter
 * @property $genre
 * @property $year
 * @property $path
 * @property $image
 * @property $media
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Music extends Model
{

    static $rules = [
        'name' => 'required',
        'year' => 'required',
        'image' => 'required',
        'media' => 'required',
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'year', 'path', 'image', 'media'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($station) {
            $station->path = $station->path ?? '/uploads/Music/';
        });
    }

    protected $appends = ['image_url', 'media_url'];

    public function getImageUrlAttribute()
    {
        return url('storage') . $this->path . 'Image/' . $this->image . '.jpg';
    }
    public function getMediaUrlAttribute()
    {
        return url('storage') . $this->path . 'Media/' .  $this->media . '.mp3';
    }

    public function interpreters()
    {
        return $this->belongsToMany(Interpreter::class, 'music_interpreters');
    }
    public function musicalGenres()
    {
        return $this->belongsToMany(MusicalGenre::class, 'music_genres');
    }
}
