
  <div class="overflow-hidden shadow sm:rounded-md">
    <div class="bg-white px-4 py-5 sm:p-6">
      <div class="grid grid-cols-6 gap-6">


        <div class="col-span-6 sm:col-span-3">
          <label for="country" class="block text-sm font-medium text-gray-700">Nombre</label>
          <input type="text" value="{{$employee->nombre ? $employee->nombre : '' }}" name="nombre" autocomplete="given-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
        </div>

        <div class="col-span-6 sm:col-span-3">
          <label for="first-name" class="block text-sm font-medium text-gray-700">Rol</label>
          <select name="rol" autocomplete="" class="mt-1 block w-48 rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" >
            @foreach ($roles as $id => $rol)


              @if($employee->employee_role_id==$id){
                  <option value="{{$id}}" selected>{{$rol}}</option>
              }
              @else{
                <option value="{{$id}}">{{$rol}}</option>
              }
              @endif
            }


            @endforeach
          </select>
        </div>

        <div class="col-span-6 sm:col-span-3">
          <label for="first-name" class="block text-sm font-medium text-gray-700">DNI</label>
        <input minlength="8" maxlength="8" type="text" value="{{$employee->DNI ? $employee->DNI : '' }}" name="dni" autocomplete="" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
        </div>


        <div class="col-span-6 sm:col-span-3">
          <label for="country" class="block text-sm font-medium text-gray-700">Numero celular movil (opcional)</label>
          <input minlength="9" maxlength="9" type="text" value="{{$employee->celular ? $employee->celular : '' }}" name="celular" autocomplete="" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>

        <div class="col-span-6 sm:col-span-3">
          <label for="country" class="block text-sm font-medium text-gray-700">Email</label>
          <input type="email" value="{{$user->email ? $user->email : '' }}" name="email" autocomplete="" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
        </div>

        <div class="col-span-6 sm:col-span-3">

        @include('employees.datepickerI')
      </div>
      <br>
        <div class="col-span-6 sm:col-span-3">

          @include('employees.datepickerF')


        </div>
        <br>
        <br>
      </div>
    </div>
    <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
      <button type="submit" class="inline-flex justify-center rounded-md border border-transparent py-2 px-4 text-sm font-medium text-white shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" style="background-color: rgb(224,42,35);">Guardar</button>
    </div>
  </div>
