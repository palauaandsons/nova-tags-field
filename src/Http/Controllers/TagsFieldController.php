<?php

namespace PalauaAndSons\TagsField\Http\Controllers;

use Cartalyst\Tags\IlluminateTag as Tag;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TagsFieldController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = Tag::query();

        if ($request->has('filter.containing')) {
            $query->where('name', 'like', '%'.strtolower($request['filter']['containing']).'%');
        }

        if ($request->has('limit')) {
            $query->limit($request['limit']);
        }

        return $query->get()->map(fn (Tag $tag) => $tag->name);
    }
}
