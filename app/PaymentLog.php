<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentLog extends Model
{
     protected $fillable = [
         'name',
         'course',
         'approved_by',
         'total_price',
         'payments_date'
     ];

     public function usercourse()
     {
         return $this->belongsTo('App\UsersCourse','usercourse_id');
     }
}
