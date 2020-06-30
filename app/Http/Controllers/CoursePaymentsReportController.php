<?php

namespace App\Http\Controllers;

use App\PaymentLog;
use App\PlayedVideo;
use App\UsersCourse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class CoursePaymentsReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('superadmin');
    }

    public function index()
    {
        $report =  PaymentLog::all();
        return view('admin.usercourse.paymentreports')->with('report',$report);
    }

    public function search_report(Request $r){
        if($r->cari){
            $cari = $r->cari;
            $report =
                PaymentLog::where('name','LIKE','%'.$cari.'%')
                    ->orWhere('course','LIKE','%'.$cari.'%')
                    ->orWhere('approved_by','LIKE','%'.$cari.'%')
                    ->orWhere('total_price','LIKE','%'.$cari.'%')
                    ->get();
            return view('admin.usercourse.paymentreports')->with('report',$report);
        }
        if ($r->pilih == 1)
        {
            $r = PaymentLog::whereBetween('payments_date',[$r->date_start , $r->date_end])->get();
            $pdf = PDF::loadView('admin.usercourse.pdfversion',['r'=>$r]);
            $pdf->setPaper('A4','landscape');
            return $pdf->stream();
        }
        if ($r->pilih == 2)
        {
            $report = PaymentLog::whereBetween('payments_date',[$r->date_start , $r->date_end])->get();
            return view('admin.usercourse.paymentreports')->with('report',$report);
        }
        if ($r->pilih == 3)
        {
            $r = PaymentLog::all();
            $pdf = PDF::loadView('admin.usercourse.pdfversion',['r'=>$r]);
            $pdf->setPaper('A4','landscape');
            return $pdf->stream();
        }

    }
}
