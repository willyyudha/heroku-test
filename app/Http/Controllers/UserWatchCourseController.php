<?php

namespace App\Http\Controllers;

use App\CoursePackage;
use App\PlayedVideo;
use App\Quiz;
use App\Task;
use App\User;
use App\UserQuiz;
use App\UsersCourse;
use App\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserWatchCourseController extends Controller
{

    public function showlist($id)
    {
        $uc = UsersCourse::find($id);
        $video = Video::where('package_id' , $uc->package->id)->orderBy('step')->get();
        $final = Task::where('usercourse_id' ,'=', $id)->first();
        $pv = PlayedVideo::where('usercourse_id',$id)->get();

        $now = \Carbon\Carbon::now();
        $end_Date = Carbon::parse($uc->expired_date);
        $start_date = Carbon::parse($uc->start_date);
//      $test = $now->between($start_Date,$end_Date);
//      dd($end_Date);

        if($now->between($start_date,$end_Date) && $final->status == 0 || $final->status == 1)
        {
            $check_images = $uc->package->image > 0;
            return view('pagesiswa.course.listvideo')
                ->with('uc' , $uc)
                ->with('v' , $video)
                ->with('ci' , $check_images)
                ->with('f' , $final)
                ->with('pv',$pv);
        }
        else
        {
            $uc->payment_status = 0;
            $uc->expired_date = null;
            PlayedVideo::where('usercourse_id',$id)->delete();
//          $final->delete();
            $uc->save();

            Session::flash('Gagal','Maaf kursus anda sudah berakhir karena belum menyelesaikan dari waktu yang ditentukan');
            return redirect()->route('mycourse' , ['id'=>Auth::id()]);
        }

    }

    public function showvideo($id,$idUc)
    {
        $v = Video::find($id);
        $uc = UsersCourse::find($idUc);
        $pv = PlayedVideo::where('video_id' , $id)->where('usercourse_id' , $uc->id)->first();


        if($pv == null){
            $opv = new PlayedVideo();
            $opv->usercourse_id = $uc->id;
            $opv->video_id = $id;
            $opv->save();
        }

        $previous = Video::where('id' , '<' , $id)->where('package_id' , $v->coursepackage->id)->max('id');
        $next = Video::where('id' , '>' , $id)->where('package_id' , $v->coursepackage->id)->min('id');

//        $check_quiz = Quiz::where('video_id',$next)->first();
//        if ($check_quiz !== null)
//        {
//            $check_userquiz = UserQuiz::where('quiz_id',$check_quiz->id)->where('user_id',Auth::id())->first();
//            if($check_userquiz->status == 1)
//            {
//                $pv_Obj = new PlayedVideo();
//                if ($next !== null){
//                    $pv_Obj->video_id = $next;
//                    $pv_Obj->usercourse_id = $idUc;
//                    $pv_Obj->save();
//                }
//            }
//        }

        return view('pagesiswa.course.watchvideo')
            ->with('v' , $v)
            ->with('p' , $previous)
            ->with('n' , $next)
            ->with('uc' , $uc);
    }

}
