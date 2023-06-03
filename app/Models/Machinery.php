<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Machinery_maintenance;

class Machinery extends Model
{
    use HasFactory;

    static $rules = [
		'nombre' => 'required',
		'valor' => 'required',
    'fecha' => 'required',
    'machinery_photo'=> 'image|max:2048'
    ];

    protected $fillable = [
        'id',
        'nombre',
        'fecha_compra',
        'valor',
        'machinery_photo'

    ];
    public function machinery_maintenances()
    {
        return $this->hasMany(Machinery_maintenance::class,'machinery_id','id');
    }
}
