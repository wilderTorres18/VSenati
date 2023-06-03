<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gross_profit_per_day extends Model
{
    use HasFactory;
    protected $fillable = [
        'monto',
        'fecha',
    ];
}
