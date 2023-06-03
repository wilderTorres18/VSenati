<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;

class Default_job extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipo_trabajo',
        'descripcion',
    ];
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

}
