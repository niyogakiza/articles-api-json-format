<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
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
            'relationShips' => new ArticlesRelationshipResource($this),
            'links'         => [
                'self'  => route('articles.show', ['article' => $this->id]),
            ]
        ];
    }
}
