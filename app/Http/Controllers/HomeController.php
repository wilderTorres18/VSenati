<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Employee;
use App\Models\Machinery;
use App\Models\Job;
use App\Models\Payment;
use App\Models\Payment_method;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index(){

  //
  }
    public function redirect(){


      $role=Auth::user()->user_role_id;

      if($role=='1')
      {
        $vehicles = Vehicle::pluck('placa','id');
        $employees = Employee::pluck('nombre','id');
        $jobs = Job::pluck('fecha','id');
        $payments = Payment::all();
        $pay=null;
        foreach($payments as $payment){
          $pay+=$payment->monto;
        }

        return view('admin.dashboard',compact('vehicles','employees','jobs','payments','pay'));
      }
      else{
        $nombre=Auth::user()->name;
        return view('dashboard',compact('nombre'));
      }


    }
}
