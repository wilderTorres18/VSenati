<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Employee_role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
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
        $employees = DB::table('employees')
                        ->leftJoin('employee_roles', 'employees.employee_role_id', '=', 'employee_roles.id')
                        ->select('employees.id','employees.nombre','employees.DNI','employees.fecha_finalizacion','employee_roles.rol_empleados')
                        ->orWhere('employees.id','LIKE','%'.$buscar.'%')
                        ->orWhere('employees.nombre','LIKE','%'.$buscar.'%')
                        ->orWhere('employees.DNI','LIKE','%'.$buscar.'%')
                        ->orWhere('employee_roles.rol_empleados','LIKE','%'.$buscar.'%')
                        ->orderBy('employees.id', 'asc')
                        ->get();

      }else{
        $employees = DB::table('employees')
                        ->leftJoin('employee_roles', 'employees.employee_role_id', '=', 'employee_roles.id')
                        ->select('employees.id','employees.nombre','employees.DNI','employees.fecha_finalizacion','employee_roles.rol_empleados')
                        ->paginate(10);
      }


      return view("employees.index", compact('employees','buscar'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $employee   = new Employee();
      $user = new User();

      $roles = Employee_role::pluck('rol_empleados','id');


      return view("employees.create", compact('employee','user','roles'));

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
      'nombre' => 'required',
      'rol' => 'required',
      'dni' => 'required',
      'email' => 'required',
      'fcontrato' => 'required',
      ]);

      $fechai=preg_replace('/^(\d{2})-(\d{2})-(\d{4})$/','$3-$2-$1',request()->fcontrato);

      $password='$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';

      if(request()->HabFeF){
        $fechaf=preg_replace('/^(\d{2})-(\d{2})-(\d{4})$/','$3-$2-$1',request()->ffinal);
      }
      else{
        $fechaf=null;
      }

      $rol =Employee_role::find(request()->rol);

      if($rol->rol_empleados === 'Administrador'){
        $user_role=1;
      }
      else{
        $user_role=2;
      }

      $employee=Employee::create(['nombre'=>request()->nombre,'employee_role_id'=>request()->rol,'DNI'=>request()->dni,'celular'=>request()->celular,'fecha_contrato'=>$fechai,'fecha_finalizacion'=>$fechaf]);

      $user=User::create(['name'=>request()->nombre,'email'=>request()->email,'password'=>$password,'employee_id'=>$employee->id,'user_role_id'=>$user_role]);

      return redirect()->route('employees.index')
          ->with('success', 'Empleado created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $employee = Employee::find($id);

      $rol = Employee_role::find($employee->employee_role_id);
      $user = User::where('employee_id',$id)->first();


      return view('employees.show', compact('employee','rol','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $employee = Employee::find($id);

      $user = User::where('employee_id',$id)->first();
      $roles = Employee_role::pluck('rol_empleados','id');



      return view('employees.edit', compact('employee','user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $employee = Employee::find($id);
      $user = User::where('employee_id',$id)->first();

      request()->validate([
      'nombre' => 'required',
      'rol' => 'required',
      'dni' => 'required',
      'email' => 'required',
      'fcontrato' => 'required',
      ]);

      $fechai=preg_replace('/^(\d{2})-(\d{2})-(\d{4})$/','$3-$2-$1',request()->fcontrato);

      $password='$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';

      if(request()->HabFeF){
        $fechaf=preg_replace('/^(\d{2})-(\d{2})-(\d{4})$/','$3-$2-$1',request()->ffinal);
      }
      else{
        $fechaf=null;
      }

      $rol =Employee_role::find(request()->rol);

      if($rol->rol_empleados === 'Administrador'){
        $user_role=1;
      }
      else{
        $user_role=2;
      }


      $employee->update(['nombre'=>request()->nombre,'employee_role_id'=>request()->rol,'DNI'=>request()->dni,'celular'=>request()->celular,'fecha_contrato'=>$fechai,'fecha_finalizacion'=>$fechaf]);

      $user->update(['name'=>request()->nombre,'email'=>request()->email,'password'=>$password,'employee_id'=>$employee->id,'user_role_id'=>$user_role]);

        return redirect()->route('employees.index')
            ->with('success', 'Empleado updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
      $employee = Employee::find($id);
      $user = User::where('employee_id',$id)->first();

      $employee->delete();
      $user->delete();

      return redirect()->route('employees.index')
          ->with('success', 'Empleado deleted successfully');
    }
}
