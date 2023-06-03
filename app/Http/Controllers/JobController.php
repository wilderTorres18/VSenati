<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Vehicle;
use App\Models\Employee;
use App\Models\Payment;
use App\Models\Payment_method;
use App\Models\Default_job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $buscar=$request->get('buscar');

      if($buscar){
        $jobs = DB::table('jobs')
                        ->leftJoin('employees', 'jobs.employee_id', '=', 'employees.id')
                        ->leftJoin('default_jobs', 'jobs.default_job_id', '=', 'default_jobs.id')
                        ->leftJoin('vehicles', 'jobs.vehicle_id', '=', 'vehicles.id')
                        ->select('jobs.id','jobs.descripcion_detalles','jobs.fecha','employees.nombre','default_jobs.tipo_trabajo','vehicles.placa')
                        ->orWhere('jobs.id','LIKE','%'.$buscar.'%')
                        ->orWhere('jobs.fecha','LIKE','%'.$buscar.'%')
                        ->orWhere('employees.nombre','LIKE','%'.$buscar.'%')
                        ->orWhere('default_jobs.tipo_trabajo','LIKE','%'.$buscar.'%')
                        ->orWhere('vehicles.placa','LIKE','%'.$buscar.'%')
                        ->orderBy('jobs.fecha', 'asc')
                        ->get();

      }else{
        $jobs = DB::table('jobs')
                        ->leftJoin('employees', 'jobs.employee_id', '=', 'employees.id')
                        ->leftJoin('default_jobs', 'jobs.default_job_id', '=', 'default_jobs.id')
                        ->leftJoin('vehicles', 'jobs.vehicle_id', '=', 'vehicles.id')
                        ->select('jobs.id','jobs.descripcion_detalles','jobs.fecha','employees.nombre','default_jobs.tipo_trabajo','vehicles.placa')
                        ->paginate(10);
      }


      return view("jobs.index", compact('jobs','buscar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $job   = new Job();

        $vehicles = Vehicle::pluck('placa','id');
        $employees = Employee::pluck('nombre','id');
        $defaults = Default_job::pluck('tipo_trabajo','id');
        $methods = Payment_method::pluck('metodos','id');

        return view("jobs.create", compact('job','vehicles','employees','defaults','methods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      request()->validate([
  		'vehiculo' => 'required',
  		'tipo' => 'required',
      'monto' => 'required',
      'metodo' => 'required',
      'fecha' => 'required',
      'machinery_photo'=> 'image|max:2048'
      ]);

      $fecha=preg_replace('/^(\d{2})-(\d{2})-(\d{4})$/','$3-$2-$1',request()->fecha);

      $empleado_id=Auth::user()->employee_id;

      $job=Job::create(['descripcion_detalles'=>request()->descripcion,'employee_id'=>$empleado_id,'fecha'=>$fecha,'default_job_id'=>request()->tipo,'vehicle_id'=>request()->vehiculo]);

      $payment=Payment::create(['monto'=>request()->monto,'fecha_pago'=>$fecha,'job_id'=>$job->id,'payment_method_id'=>request()->metodo]);

      return redirect()->route('jobs.index')
          ->with('success', 'job created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $job = Job::find($id);

      $vehicle = Vehicle::find($job->vehicle_id);
      $employee = Employee::find($job->employee_id);
      if($job->employee_Upd_id ?? false){
        $employee_upd = Employee::find($job->employee_Upd_id);
      }
      else{
        $employee_upd= null;
      }


      $default = Default_job::find($job->default_job_id);
      $payment = Payment::where('job_id',$id)->first();
      $method = Payment_method::find($payment->payment_method_id);

      return view('jobs.show', compact('job','vehicle','employee','default','payment','method','employee_upd'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $job = Job::find($id);

      $vehicles = Vehicle::pluck('placa','id');
      $employees = Employee::pluck('nombre','id');
      $defaults = Default_job::pluck('tipo_trabajo','id');
      $payment = Payment::where('job_id',$id)->first();
      $methods = Payment_method::pluck('metodos','id');

      return view('jobs.edit', compact('job','vehicles','employees','defaults','payment','methods'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $job = Job::find($id);
      $payment = Payment::where('job_id',$id)->first();
      $empleado_id=Auth::user()->employee_id;

      request()->validate([
  		'vehiculo' => 'required',
  		'tipo' => 'required',
      'monto' => 'required',
      'metodo' => 'required',
      'fecha' => 'required',
      'machinery_photo'=> 'image|max:2048'
      ]);

      $fecha=preg_replace('/^(\d{2})-(\d{2})-(\d{4})$/','$3-$2-$1',request()->fecha);

      $job->update(['descripcion_detalles'=>request()->descripcion,'employee_Upd_id'=>$empleado_id,'fecha'=>$fecha,'default_job_id'=>request()->tipo,'vehicle_id'=>request()->vehiculo]);

      $payment->update(['monto'=>request()->monto,'fecha_pago'=>$fecha,'job_id'=>$job->id,'payment_method_id'=>request()->metodo]);

        return redirect()->route('jobs.index')
            ->with('success', 'Trabajo updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $job = Job::find($id);
      $payment = Payment::where('job_id',$id)->first();

      $job->delete();
      $payment->delete();

      return redirect()->route('jobs.index')
          ->with('success', 'job deleted successfully');
    }
}
