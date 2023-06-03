
  <div class="overflow-hidden shadow sm:rounded-md">
    <div class="bg-white px-4 py-5 sm:p-6">
      <div class="grid grid-cols-6 gap-6">




        <select name="maquina" autocomplete="" class="mt-1 block w-48 rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
          @foreach ($machineries as $id => $machinery)


            @if($machinery_maintenance->machinery_id==$id){
                <option value="{{$id}}" selected>{{$machinery}}</option>
            }
            @else{
              <option value="{{$id}}">{{$machinery}}</option>
            }
            @endif
          }
        

          @endforeach
        </select>

        <div class="col-span-6 sm:col-span-3">
          <label for="first-name" class="block text-sm font-medium text-gray-700">Descripcion</label>
        <textarea name="descripcion" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" rows="5" cols="40">{{$machinery_maintenance->descripcion ? $machinery_maintenance->descripcion : '' }}</textarea>
        </div>


        <div class="col-span-6 sm:col-span-3">
          <label for="country" class="block text-sm font-medium text-gray-700">Costo de mantenimiento</label>
          <input type="text" value="{{$machinery_maintenance->costo ? $machinery_maintenance->costo : '' }}" name="costo" autocomplete="given-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">

        </div>

        <div class="col-span-6 sm:col-span-3">
        @include('machineries-mant.datepicker')
        </div>
        <br>
        <br>


      </div>
    </div>
    <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
      <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Guardar</button>
    </div>
  </div>
