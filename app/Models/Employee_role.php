<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Employee_role extends Model
{
    use HasFactory;
    protected $fillable = [
        'rol_empleados',
        'descripcion',
        'pago',
    ];
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

}
