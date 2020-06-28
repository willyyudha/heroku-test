<?php

namespace App\Http\Controllers;

use App\PaymentLog;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentReportPdfController extends Controller
{
    public function __construct()
    {
        $this->middleware('superadmin');
    }

    public function get_pdf(Request $request)
    {
        if ($request->date){
            $r = PaymentLog::whereBetween('payments_date',[$request->date , $request->date2])->get();
            $pdf = PDF::loadView('admin.usercourse.pdfversion',['r'=>$r]);
            $pdf->setPaper('A4','landscape');
            return $pdf->stream();
        }
        else{
            $r = PaymentLog::all();
            $pdf = PDF::loadView('admin.usercourse.pdfversion',['r'=>$r]);
            $pdf->setPaper('A4','landscape');
            return $pdf->stream();
        }

//         $data = [
//             'name' => $r->name,
//             'course' => $r->course,
//             'price' => $r->total_price,
//             'date' => $r->payments_date,
//             'approve_by' => $r->aprroved_by
//         ];
    }
}
