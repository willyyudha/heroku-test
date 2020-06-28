<?php

namespace App\Http\Middleware;

use App\Quiz;
use App\UserQuiz;
use App\Video;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckCompletionQuiz
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
        $id_video = $request->route('id');
        $check_previous = Video::where('id', '<', $id_video)->max('id');
        $checkquiz = Quiz::where('video_id',$id_video)->first();

        if($checkquiz != null)
        {
            $check_userquiz = UserQuiz::where('quiz_id',$checkquiz->id)->where('user_id',Auth::id())->first();
            if($check_userquiz == null)
            {
                $user_quiz = new UserQuiz();
                $user_quiz->quiz_id = $checkquiz->id;
                $user_quiz->user_id = Auth::id();
                $user_quiz->file = null;
                $user_quiz->status = 0;
                $user_quiz->completion_date = null;
                $user_quiz->save();
            }
            return $next($request);
        }
        else
        {
            if($check_previous !== null){
                $quiz = Quiz::where('video_id',$check_previous)->first();
                if($quiz == null)
                {
                        return $next($request);
                }
                if($quiz !== null)
                {
                    $user_quiz = UserQuiz::where('user_id',Auth::id())->where('quiz_id',$quiz->id)->first();
                    if($user_quiz->status == 0)
                    {
                        return redirect()->back();
                    }
                    if($user_quiz->status == 1)
                    {
                        return $next($request);
                    }
                }
                return $next($request);
            }
        }
        return $next($request);
    }
}
