<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    /**
     * @return BelongsTo
     */

    public function author()
    {
        return $this->belongsTo(People::class);
    }

    /**
     * @return BelongsTo
     */

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
