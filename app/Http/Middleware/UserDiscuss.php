<?php

namespace App\Http\Middleware;

use App\Discussion;
use Closure;
use Illuminate\Support\Facades\Auth;

class UserDiscuss
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = $request->route('id');
        $ds = Discussion::find($id);

        if($ds->user_id === Auth::id()){
            return $next($request);
        }

        return redirect()->route('home');

    }
}
