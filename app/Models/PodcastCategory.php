<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PodcastCategory extends Model
{
    protected $table = 'podcast_categories';

    protected $fillable = [
        'podcast_id',
        'category_id',
    ];

    public function podcast()
    {
        return $this->belongsTo(Podcast::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
