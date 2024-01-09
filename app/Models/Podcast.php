<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Podcast
 *
 * @property $id
 * @property $name
 * @property $frequency
 * @property $category
 * @property $user
 * @property $synopsis
 * @property $path
 * @property $image
 * @property $media
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Podcast extends Model
{

    static $rules = [
        'name' => 'required',
        'synopsis' => 'required',
        'image' => 'required',
        'media' => 'required',
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'synopsis', 'path', 'image', 'media'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($station) {
            $station->path = $station->path ?? '/uploads/Podcasts/';
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

    public function stations()
    {
        return $this->belongsToMany(Station::class, 'podcast_stations');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'podcast_categories');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'podcast_users');
    }
}
