<?php

namespace App\Http\Middleware;

use App\UsersCourse;
use Closure;
use Illuminate\Support\Facades\Auth;

class PaymentStatus
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
        $uc = UsersCourse::find($id);

        if($uc == null)
        {
            return redirect()->route('mycourse',['id'=>Auth::id()]);
        }
        if($uc->user->id !== Auth::id()){
            return redirect()->route('home');
        }

        return $next($request);
    }
}
