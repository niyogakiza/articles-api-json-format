<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class People extends Model
{
    /**
     * @return HasMany
     */
    public function articles ()
    {
        return $this->hasMany(Article::class);
    }
}
