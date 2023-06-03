<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Machinery;

class Machinery_maintenance extends Model
{
    use HasFactory;

    static $rules = [
		'descripcion' => 'required',
		'fecha' => 'required',
    'costo' => 'required',
    'maquina'=>'required'
    ];

    protected $fillable = [
        'descripcion',
        'fecha_reparacion',
        'costo',
        'lugar',
        'machinery_id',
    ];
    public function machinery()
    {
        return $this->hasOne(Machinery::class,'id','machinery_id');
    }
}
