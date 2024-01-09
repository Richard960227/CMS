<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AudioLibrary
 *
 * @property $id
 * @property $program_id
 * @property $name
 * @property $synopsis
 * @property $guests
 * @property $path
 * @property $media
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AudioLibrary extends Model
{

    static $rules = [
        'program_id' => 'required',
        'name' => 'required',
        'synopsis' => 'required',
        'media' => 'required',
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['program_id', 'name', 'synopsis', 'guests', 'path', 'media'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($audioLibrary) {

            $program = $audioLibrary->program;

            $programName = $program->name;

            $audioLibrary->path = $audioLibrary->path ?? '/uploads/audioLibrary/' . $programName;
        });
    }

    protected $appends = ['media_url'];

    public function getMediaUrlAttribute()
    {
        return url('storage') . $this->path . '/' . $this->media . '.mp3';
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
}
