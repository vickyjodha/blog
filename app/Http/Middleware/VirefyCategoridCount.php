<?php

namespace App\Http\Middleware;

use Closure;
use App\categorie;
class VirefyCategoridCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    { if(Categorie::all()->count()<=0){
        return redirect(route('categories.create'))->with('error','You need to add Categories to be able to Create a Post.');
    }
        return $next($request);
    }
}
