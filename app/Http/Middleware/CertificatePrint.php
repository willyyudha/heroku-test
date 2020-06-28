<?php

namespace App\Http\Middleware;

use App\Task;
use App\UsersCourse;
use Closure;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;

class CertificatePrint
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
        $id = $request->route('iduc');
        $uc = UsersCourse::find($id);
        $task = Task::where('usercourse_id',$id)->first();

        if($task->status === 1 && $uc->user_id === Auth::id())
        {
            return $next($request);
        }

        return redirect()->route('home');
    }
}
