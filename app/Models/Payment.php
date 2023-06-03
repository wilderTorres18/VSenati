<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;
use App\Models\Payment_method;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'monto',
        'job_id',
        'payment_method_id',
        'fecha_pago',
    ];
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
    public function payment_method()
    {
        return $this->belongsTo(Payment_method::class);
    }
}
