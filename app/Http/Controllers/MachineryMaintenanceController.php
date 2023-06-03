<?php

namespace App\Http\Controllers;

use App\Models\Machinery_maintenance;
use App\Models\Machinery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MachineryMaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $buscar=$request->get('buscar');

      $machinery_maintenances = DB::table('machinery_maintenances')
                      ->leftJoin('machineries', 'machinery_maintenances.machinery_id', '=', 'machineries.id')
                      ->select('machinery_maintenances.id','machinery_maintenances.descripcion','machinery_maintenances.fecha_reparacion','machinery_maintenances.costo','machineries.nombre')
                      ->orWhere('fecha_reparacion','LIKE','%'.$buscar.'%')
                      ->orWhere('costo','LIKE','%'.$buscar.'%')
                      ->orWhere('machineries.nombre','LIKE','%'.$buscar.'%')
                      ->paginate(10);

      return view("machineries-mant.index", compact('machinery_maintenances','buscar'));

  }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $machinery_maintenance = new Machinery_maintenance();

      $machineries = Machinery::pluck('nombre','id');

      return view("machineries-mant.create", compact('machinery_maintenance','machineries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      request()->validate(Machinery_maintenance::$rules);

      $fecha=preg_replace('/^(\d{2})-(\d{2})-(\d{4})$/','$3-$2-$1',request()->fecha);

      $machinery_maintenance=Machinery_maintenance::create(['descripcion'=>request()->descripcion,'costo'=>request()->costo,'fecha_reparacion'=>$fecha,'machinery_id'=>request()->maquina]);

      return redirect()->route('machineries-mant.index')
          ->with('success', 'Machinery created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Machinery_maintenance  $machinery_maintenance
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $machinery_maintenance = Machinery_maintenance::find($id);
      $machinery = Machinery::find($machinery_maintenance->machinery_id);

      return view('machineries-mant.show', compact('machinery_maintenance','machinery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Machinery_maintenance  $machinery_maintenance
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $machinery_maintenance = Machinery_maintenance::find($id);

      $machineries = Machinery::pluck('nombre','id');

      return view('machineries-mant.edit', compact('machinery_maintenance','machineries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Machinery_maintenance  $machinery_maintenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $Machinery_maintenance = Machinery_maintenance::find($id);

      request()->validate(Machinery_maintenance::$rules);

      $fecha=preg_replace('/^(\d{2})-(\d{2})-(\d{4})$/','$3-$2-$1',request()->fecha);

      $Machinery_maintenance->update(['descripcion'=>request()->descripcion,'costo'=>request()->costo,'fecha_reparacion'=>$fecha,'machinery_id'=>request()->maquina]);

        return redirect()->route('machineries-mant.index')
            ->with('success', 'Machinery updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Machinery_maintenance  $machinery_maintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $Machinery_maintenance = Machinery_maintenance::find($id);

      $Machinery_maintenance->delete();

      return redirect()->route('machineries-mant.index')
          ->with('success', 'Machinery deleted successfully');
    }
}
