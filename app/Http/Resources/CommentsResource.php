<?php


namespace App\Http\Resources;

use App\People;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;
use function foo\func;

class CommentsResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => CommentResource::collection($this->collection),
        ];
    }

    public function with($request)
    {
        $included = $this->collection->map(
                function ($article) {
                    return $article->author;
                }
            )->unique();
        return [
            'links'   => [
                'self'  => route('comments.index'),
            ],
            'included'  => $this->withIncluded($included),
        ];
    }

    private function withIncluded(Collection $included)
    {
        return $included->map(
            function ($included) {
                if($included instanceof People) {
                    return new PeopleResource($included);
                }
            }
        );
    }

}
