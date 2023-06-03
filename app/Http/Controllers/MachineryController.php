<?php

namespace App\Http\Controllers;

use App\Models\Machinery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MachineryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $buscar=$request->get('buscar');

        $machineries = DB::table('machineries')
                        ->select('id','nombre','valor','fecha_compra')
                        ->where('nombre','LIKE','%'.$buscar.'%')
                        ->orWhere('valor','LIKE','%'.$buscar.'%')
                        ->orWhere('fecha_compra','LIKE','%'.$buscar.'%')
                        ->paginate(10);

        return view("machineries.index", compact('machineries','buscar'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $machinery = new Machinery();
      return view("machineries.create", compact('machinery'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      request()->validate(Machinery::$rules);
      $fecha=preg_replace('/^(\d{2})-(\d{2})-(\d{4})$/','$3-$2-$1',request()->fecha);

        //$fecha=date(request()->fecha)->format('YYYY-MM-DD');
      if(request()->file('machinery_photo')){
        $imagen=request()->file('machinery_photo')->store('public/machinery-photos');

        $url=Storage::url($imagen);



        $machinery=Machinery::create(['nombre'=>request()->nombre,'valor'=>request()->valor,'fecha_compra'=>$fecha,'machinery_photo' => $url]);
      }
      else{
        $machinery=Machinery::create(['nombre'=>request()->nombre,'valor'=>request()->valor,'fecha_compra'=>$fecha]);

      }


      return redirect()->route('machineries.index')
          ->with('success', 'Machinery created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Machinery  $machinery
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $machinery = Machinery::find($id);

      return view('machineries.show', compact('machinery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Machinery  $machinery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $machinery = Machinery::find($id);

      return view('machineries.edit', compact('machinery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Machinery  $machinery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $machinery = Machinery::find($id);
      request()->validate(Machinery::$rules);
      $fecha=preg_replace('/^(\d{2})-(\d{2})-(\d{4})$/','$3-$2-$1',request()->fecha);


      if(request()->file('machinery_photo')){
          if($machinery->machinery_photo){
            $url=str_replace('storage','public',$machinery->machinery_photo);

            Storage::delete($url);

            $imagen=request()->file('machinery_photo')->store('public/vehicle-photos');

            $url=Storage::url($imagen);

            $machinery->update(['nombre'=>request()->nombre,'valor'=>request()->valor,'fecha_compra'=>$fecha,
            'machinery_photo' => $url]);
          }
          else{
            $imagen=request()->file('machinery_photo')->store('public/vehicle-photos');

            $url=Storage::url($imagen);

            $machinery->update(['nombre'=>request()->nombre,'valor'=>request()->valor,'fecha_compra'=>$fecha,
            'machinery_photo' => $url]);
            }


        }
        else{
          $machinery->update(['nombre'=>request()->nombre,'valor'=>request()->valor,'fecha_compra'=>$fecha]);
        }
        return redirect()->route('machineries.index')
            ->with('success', 'Machinery updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Machinery  $machinery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $machinery = Machinery::find($id);
      if($machinery->machinery_photo){
        $url=str_replace('storage','public',$machinery->machinery_photo);

        Storage::delete($url);
      }


      $machinery->delete();



      return redirect()->route('machineries.index')
          ->with('success', 'Machinery deleted successfully');
    }
}
