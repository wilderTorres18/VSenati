<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Default_job;
use App\Models\Vehicle;
use App\Models\Payment;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'descripcion_detalles',
        'default_job_id',
        'vehicle_id',
        'fecha',
        'employee_Upd_id'
    ];
    public function default_job()
    {
        return $this->belongsTo(Default_job::class);
    }
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

}
