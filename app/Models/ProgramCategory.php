<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramCategory extends Model
{
    protected $table = 'program_categories';

    protected $fillable = [
        'program_id',
        'category_id',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

