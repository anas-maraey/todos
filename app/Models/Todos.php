<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todos extends Model
{
    protected $fillable = ['title', 'done', 'user_id'];
    protected $table = 'todos';

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
