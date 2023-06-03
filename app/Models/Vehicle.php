<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;

class Vehicle extends Model
{
    use HasFactory;

    static $rules = [
		'placa' => 'required',
		'modelo' => 'required',
    'vehicle_photo'=> 'image|max:2048'
    ];

    protected $perPage = 20;

    protected $fillable = [
        'placa',
        'modelo',
        'color',
        'vehicle_photo'
    ];
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
