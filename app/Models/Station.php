<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Station
 *
 * @property $id
 * @property $name
 * @property $frequency
 * @property $frequency_link
 * @property $path
 * @property $image
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Station extends Model
{
    
    static $rules = [
		'name' => 'required',
		'frequency_link' => 'required',
        'description' => 'required',
		'image' => 'required',
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','frequency', 'description', 'frequency_link', 'path', 'image'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($station) {
            $station->path = $station->path ?? '/uploads/Frequencies/';
        });
    }

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return url('storage'). $this->path . $this->image . '.jpg';
    }

    public function programs()
    {
        return $this->belongsToMany(Program::class);
    }

    public function podcasts()
    {
        return $this->belongsToMany(Podcast::class);
    }

}
