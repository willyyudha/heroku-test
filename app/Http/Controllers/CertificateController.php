<?php

namespace App\Http\Controllers;

use App\Task;
use App\UsersCourse;
//use Barryvdh\DomPDF\PDF;
//use Dompdf\Dompdf;
use Illuminate\Http\Request;
//use Dompdf\Dompdf;
use Barryvdh\DomPDF\Facade as PDF;
//use PDF;

class CertificateController extends Controller
{
    public function getcertif($id){

        $t = Task::find($id);

        $data = [
            'name' => $t->ucourse->user->full_name,
            'course' => $t->ucourse->package->title,
            'date' => date('j F, Y',strtotime( $t->completion_date))
        ];

        $pdf = PDF::loadView('pagesiswa.course.certificate',$data);
        $pdf->setPaper('A4','landscape');
        return $pdf->download($t->ucourse->user->full_name.'-'.$t->ucourse->package->title.'-Certificate.pdf');

    }


}
