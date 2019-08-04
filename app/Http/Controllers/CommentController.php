<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Resources\CommentResource;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * @return CommentResource
     */
    public function index()
    {
        return new CommentResource(Comment::with(['author'])->paginate());
    }

    public function show(Comment $comment)
    {
        CommentResource::withoutWrapping();

        return new CommentResource($comment);
    }
}
