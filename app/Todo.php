<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
        'todo', 'completed', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
