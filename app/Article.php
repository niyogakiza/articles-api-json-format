<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    /**
     * @return BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(People::class);
    }

    /**
     * @return HasMany
     */

    public function comments ()
    {
        return $this->hasMany(Comment::class);
    }
}
