<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Employee_role;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'DNI',
        'celular',
        'employee_role_id',
        'fecha_contrato',
        'fecha_finalizacion'
    ];
    public function employee_role()
    {
        return $this->belongsTo(Employee_role::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
