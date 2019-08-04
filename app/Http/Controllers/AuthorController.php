<?php

namespace App\Http\Controllers;

use App\Http\Resources\PeopleResource;
use App\People;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * @param People $author
     * @return PeopleResource
     */
    public function show(People $author)
    {
        PeopleResource::withoutWrapping();
        return new PeopleResource($author);
    }
}
