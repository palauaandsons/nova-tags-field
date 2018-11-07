<?php

namespace PalauaAndSons\TagsField\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authorize
{
    public function handle(Request $request, Closure $next): Response
    {
        //TODO: see if this is necessary

        return $next($request);
    }
}
