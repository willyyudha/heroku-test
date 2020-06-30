<?php

namespace App\Http\Controllers;

use App\CoursePackage;
use App\PaymentLog;
use App\Task;
use App\UsersCourse;
use Carbon\Carbon;
use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PayCourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function notpayed_index()
    {
        $usercourse = UsersCourse::where('payment_status' , 0)->get();
        return view('admin.payments.notpayed')->with('uc' , $usercourse);
    }

    public function havepayed_index()
    {
        $usercourse = UsersCourse::where('payment_status' , 1)->get();
        return view('admin.payments.havepayed')->with('uc' , $usercourse);
    }

    public function search_notpayed(Request $r)
    {
        $cari = $r->cari;
        $usercourse = UsersCourse::where('payment_status' , 0)
            ->whereHas('user',function ($usercourse) use ($cari){
                $usercourse->where('full_name','LIKE','%'.$cari.'%');
            })
            ->orWhereHas('package',function ($usercourse) use ($cari){
            $usercourse
                ->where('title','LIKE','%'.$cari.'%')
                ->orWhere('price','LIKE','%'.$cari.'%')
                ->orWhereHas('channel',function ($usercourse) use ($cari){
                    $usercourse
                        ->where('title','LIKE','%'.$cari.'%');
                });
        })->get();

        $count = $usercourse->count();
        Session::forget('Sukses');
        Session::flash('Cari',$count.' data ditemukan');
        return view('admin.payments.notpayed')->with('uc' , $usercourse);
    }

    public function search_havepayed(Request $r)
    {
        $cari = $r->cari;
        $usercourse = UsersCourse::where('payment_status' , 1)
            ->whereHas('user',function ($usercourse) use ($cari){
                $usercourse->where('full_name','LIKE','%'.$cari.'%');
            })
            ->orWhereHas('package',function ($usercourse) use ($cari){
            $usercourse
                ->where('title','LIKE','%'.$cari.'%')
                ->orWhere('price','LIKE','%'.$cari.'%')
                ->orWhereHas('channel',function ($usercourse) use ($cari){
                    $usercourse
                        ->where('title','LIKE','%'.$cari.'%');
                });
        })->get();

        $count = $usercourse->count();
        Session::flash('Cari', $count.' data ditemukan');
        return view('admin.payments.havepayed')->with('uc' , $usercourse);
    }

    public function havepayed($id)
    {
        $gettime =  Carbon::now();
        $usercourse = UsersCourse::find($id);
        $paymentlog = new PaymentLog();

        $paymentdate = date("Y-m-d",strtotime($gettime->toDateString()));
        $expireddate = date("Y-m-d",strtotime("+".$usercourse->package->month_expired." month", strtotime($gettime->toDateString())));

        $usercourse->payment_status = 1;
        $usercourse->start_date = date("Y-m-d",strtotime($gettime->toDateString()));
        $usercourse->expired_date = $expireddate;
        $usercourse->save();

        $paymentlog->name = $usercourse->user->full_name;
        $paymentlog->course = $usercourse->package->title;
        $paymentlog->approved_by = Auth::user()->full_name;
        $paymentlog->total_price = $usercourse->package->price;
        $paymentlog->payments_date = $paymentdate;
        $paymentlog->save();


        Session::flash('Sukses' , 'Status dirubah menjadi sudah lunas');
        return redirect()->route('notpayment.index');

    }

    public function deletepayed($id)
    {
        $usercourse = UsersCourse::find($id);
        $payments_log = PaymentLog::where('name',$usercourse->user->full_name)->where('course',$usercourse->package->title)->first();
		if($payments_log !== null)
		{
			$payments_log->delete();
		}
        $usercourse->payment_status = 0;
        $usercourse->save();

        Session::flash('Sukses' , 'Berhasil merubah status menjadi belum lunas');
        return redirect()->route('havepayment.index');
    }

    public function deletenotpayed($id)
    {
        $task = Task::where('usercourse_id',$id)->first();
        $task->delete();
        $usercourse = UsersCourse::find($id);
        $usercourse->delete();

        Session::flash('Sukses' , 'Berhasil menghapus');
        return redirect()->route('notpayment.index');
    }
}
