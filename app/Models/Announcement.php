<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Announcement
 *
 * @property $id
 * @property $name
 * @property $start
 * @property $end
 * @property $header
 * @property $body
 * @property $footer
 * @property $link
 * @property $path
 * @property $image
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Announcement extends Model
{
    
    static $rules = [
		'name' => 'required',
		'start' => 'required',
		'end' => 'required',
        'header' => 'required',
		'body' => 'required',
		'footer' => 'required',
		'link' => 'required',
		'image' => 'required',
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','start','end','header','body', 'footer', 'link','path','image'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($announcement) {
            $announcement->path = $announcement->path ?? '/uploads/Announcements/';
        });
    }

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return asset('storage'). $this->path . $this->image . '.jpg';
    }

}
