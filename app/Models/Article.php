<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function theme()
    {
        return $this->belongsTo(Theme::class , 'theme_id');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }
}
