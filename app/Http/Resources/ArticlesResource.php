<?php

namespace App\Http\Resources;

use App\Comment;
use App\People;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class ArticlesResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data'  => ArticleResource::collection($this->collection),
        ];
    }

    public function with($request)
    {
        $comments = $this->collection->flatMap(
            function ($article) {
                return $article->comments;
            }
        );
        $authors = $this->collection->map(
            function ($article) {
                return $article->author;
            }
        );

        $included = $authors->merge($comments)->unique('id');

        return [
            'links'     => [
                'self'  => route('articles.index'),
            ],
            'included'  => $this->withIncluded($included)
        ];
    }

    private function withIncluded(Collection $included)
    {
        return $included->map(
            function ($included) {
                if ($included instanceof People) {
                    return  new PeopleResource($included);
                }

                if($included instanceof Comment) {
                    return new CommentResource($included);
                }
            }
        );
    }
}
