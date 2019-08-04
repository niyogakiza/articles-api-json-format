<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type' => 'articles',
            'id'   => (string)$this->id,
            'attributes'  => [
                'title'  => $this->title,
            ],
            'relationShips' => new ArticleRelationshipResource($this),
            'links'         => [
                'self'  => route('articles.show', ['article' => $this->id]),
            ]
        ];
    }
}
