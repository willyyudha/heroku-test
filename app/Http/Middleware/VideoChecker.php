<?php

namespace App\Http\Middleware;

use App\Video;
use App\UsersCourse;
use Closure;
use Illuminate\Support\Facades\Auth;

class VideoChecker
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
        $idvd = $request->route('id');
        $iduc = $request->route('idUc');
        $vd = Video::find($idvd);
        $cp = $vd->coursepackage;
        $uc = UsersCourse::find($iduc);

        if($uc->user_id == Auth::id() && $uc->package_id == $cp->id && $uc->payment_status == 1)
        {
            return $next($request);
        }

        return redirect()->route('home');

    }
}
