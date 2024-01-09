<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramUser extends Model
{
    protected $table = 'program_users';

    protected $fillable = [
        'program_id',
        'user_id',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
