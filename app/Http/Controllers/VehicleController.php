<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $buscar=$request->get('buscar');
      $vehicles = DB::table('vehicles')
                      ->select('id','placa','modelo','color')
                      ->where('placa','LIKE','%'.$buscar.'%')
                      ->orWhere('modelo','LIKE','%'.$buscar.'%')
                      ->orWhere('color','LIKE','%'.$buscar.'%')
                      ->paginate(10);
      //$vehicles = Vehicle::paginate(10);

        return view('vehicles.index', compact('vehicles','buscar'));
            //->with('i', (request()->input('page', 1) - 1) * $vehicles->perPage());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $vehicle = new Vehicle();
      return view('vehicles.create', compact('vehicle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      request()->validate(Vehicle::$rules);
      if(request()->file('vehicle_photo')){

        $imagen=request()->file('vehicle_photo')->store('public/vehicle-photos');

        $url=Storage::url($imagen);

        $vehicle=Vehicle::create(['placa'=>request()->placa,'modelo'=>request()->modelo,'color'=>request()->color,'vehicle_photo' => $url]);

      }
      else{
        $vehicle = Vehicle::create($request->all());
      }


      return redirect()->route('vehicles.index')
          ->with('success', 'Vehicle created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $vehicle = Vehicle::find($id);

      return view('vehicles.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $vehicle = Vehicle::find($id);

      return view('vehicles.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $vehicle = Vehicle::find($id);
      request()->validate(Vehicle::$rules);


      if(request()->file('vehicle_photo')){
          if($vehicle->vehicle_photo){
            $url=str_replace('storage','public',$vehicle->vehicle_photo);

            Storage::delete($url);

            $imagen=request()->file('vehicle_photo')->store('public/vehicle-photos');

            $url=Storage::url($imagen);

            $vehicle->update(['placa'=>request()->placa,'modelo'=>request()->modelo,'color'=>request()->color,
            'vehicle_photo' => $url]);
          }
          else{
            $imagen=request()->file('vehicle_photo')->store('public/vehicle-photos');

            $url=Storage::url($imagen);

            $vehicle->update(['placa'=>request()->placa,'modelo'=>request()->modelo,'color'=>request()->color,
            'vehicle_photo' => $url]);
          }

      }


      else{
        $vehicle->update($request->all());

      }

      return redirect()->route('vehicles.index')
          ->with('success', 'Vehicle updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $vehicle = Vehicle::find($id);
      $url=str_replace('storage','public',$vehicle->vehicle_photo);

      Storage::delete($url);

      $vehicle->delete();



      return redirect()->route('vehicles.index')
          ->with('success', 'Vehicle deleted successfully');
    }
}
