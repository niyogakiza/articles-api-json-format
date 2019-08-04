<?php


namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class CommentRelationshipResource extends JsonResource
{

    /**
     * CommentRelationshipResource constructor.
     * @param $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'author'  => [
                'data'  => new AuthorIdentifierResource($this->author),
            ]
        ];
    }

    public function with($request)
    {
        return [
            'links' => [
                'self'  => route('comments.index'),
            ]
        ];
    }
}
