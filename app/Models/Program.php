<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Program
 *
 * @property $id
 * @property $name
 * @property $frequency
 * @property $category
 * @property $user
 * @property $synopsis
 * @property $path
 * @property $image
 * @property $banner
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Program extends Model
{

    static $rules = [
        'name' => 'required',
        'synopsis' => 'required',
        'image' => 'required',
        'banner' => 'required',
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'synopsis', 'path', 'image', 'banner'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($program) {
            $program->path = $program->path ?? '/uploads/Programs/';
        });
    }

    protected $appends = ['image_url', 'banner_url'];

    public function getImageUrlAttribute()
    {
        return url('storage') . $this->path . 'Image/' . $this->image . '.svg';
    }

    public function getBannerUrlAttribute()
    {
        return url('storage') . $this->path . 'Banner/' . $this->banner . '.jpg';
    }

    public function stations()
    {
        return $this->belongsToMany(Station::class, 'program_stations');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'program_categories');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'program_users');
    }

    public function audioLibraries()
    {
        return $this->hasMany(audioLibrary::class, 'program_audioLibraries');
    }
    
    public function broadcasts()
    {
        return $this->hasMany(Broadcast::class, 'program_broadcasts');
    }
}