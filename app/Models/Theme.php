<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    public function Article()
    {
        return $this->hasMany(Article::class);
    }
}
