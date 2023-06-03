
  <div class="overflow-hidden shadow sm:rounded-md">
    <div class="bg-white px-4 py-5 sm:p-6">
      <div class="grid grid-cols-6 gap-6">


        <div class="col-span-6 sm:col-span-3">
          <label for="first-name" class="block text-sm font-medium text-gray-700">Vehiculo</label>
          <select name="vehiculo" autocomplete="" class="mt-1 block w-48 rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
            @foreach ($vehicles as $id => $vehicle)


              @if($job->vehicle_id==$id){
                  <option value="{{$id}}" selected>{{$vehicle}}</option>
              }
              @else{
                <option value="{{$id}}">{{$vehicle}}</option>
              }
              @endif
            }


            @endforeach
          </select>
        </div>

        <div class="col-span-6 sm:col-span-3">
          <label for="first-name" class="block text-sm font-medium text-gray-700">Tipo de trabajo</label>
          <select name="tipo" autocomplete="" class="mt-1 block w-48 rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
            @foreach ($defaults as $id => $default)

              @if($job->default_job_id==$id){
                  <option value="{{$id}}" selected>{{$default}}</option>
              }
              @else{
                <option value="{{$id}}">{{$default}}</option>
              }
              @endif
            }


            @endforeach
          </select>
        </div>

        <div class="col-span-6 sm:col-span-3">
          <label for="first-name" class="block text-sm font-medium text-gray-700">Descripcion</label>
        <textarea name="descripcion" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" rows="5" cols="40">{{$job->descripcion_detalles ? $job->descripcion_detalles : '' }}</textarea>
        </div>


        <div class="col-span-6 sm:col-span-3">
          <label for="country" class="block text-sm font-medium text-gray-700">Monto</label>
          <input type="text" value="{{($payment->monto ?? false) ? $payment->monto : '' }}" name="monto" autocomplete="given-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">

        </div>
        <div class="col-span-6 sm:col-span-3">
          <label for="first-name" class="block text-sm font-medium text-gray-700">Metodo de pago</label>
          <select name="metodo" autocomplete="" class="mt-1 block w-48 rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
            @foreach ($methods as $id => $method)


              @if(($payment->payment_method_id ?? false)==$id){
                  <option value="{{$id}}" selected>{{$method}}</option>
              }
              @else{
                <option value="{{$id}}">{{$method}}</option>
              }
              @endif
            }


            @endforeach
          </select>
        </div>

        <div class="col-span-6 sm:col-span-3">
        @include('jobs.datepicker')
        </div>
        <br>
        <br>


      </div>
    </div>
    <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
      <button type="submit" class="inline-flex justify-center rounded-md border border-transparent py-2 px-4 text-sm font-medium text-white shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" style="background-color: rgb(224,42,35);">Guardar</button>
    </div>
  </div>
