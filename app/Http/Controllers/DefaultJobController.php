<?php

namespace App\Http\Controllers;

use App\Models\Default_job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DefaultJobController extends Controller
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
        $defaults = DB::table('default_jobs')
                        ->select('id','tipo_trabajo','descripcion')
                        ->orWhere('id','LIKE','%'.$buscar.'%')
                        ->orWhere('tipo_trabajo','LIKE','%'.$buscar.'%')
                        ->get();

      }else{
        $defaults = DB::table('default_jobs')
                        ->select('id','tipo_trabajo','descripcion')
                        ->paginate(10);
      }


      return view("default-jobs.index", compact('defaults','buscar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $default   = new Default_job();


      return view("default-jobs.create", compact('default'));
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
        'tipo_trabajo' => 'required',
      ]);
      $default=Default_job::create($request->all());

      return redirect()->route('default-jobs.index')
            ->with('success', 'Tipo de trabajo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Default_job  $default_job
     * @return \Illuminate\Http\Response
     */
    public function show(Default_job $default_job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Default_job  $default_job
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $default = Default_job::find($id);


      return view('default-jobs.edit', compact('default'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Default_job  $default_job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $default = Default_job::find($id);

      request()->validate([
        'tipo_trabajo' => 'required',
      ]);

      $default->update($request->all());

      return redirect()->route('default-jobs.index')
          ->with('success', 'Tipo de trabajo updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Default_job  $default_job
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $defaults = Default_job::find($id);

        $defaults->delete();

        return redirect()->route('default-jobs.index')
            ->with('success', 'Tipo de trabajo deleted successfully');
    }
}
