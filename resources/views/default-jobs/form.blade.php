
  <div class="overflow-hidden shadow sm:rounded-md">
    <div class="bg-white px-4 py-5 sm:p-6">
      <div class="grid grid-cols-6 gap-6">
        <div class="col-span-6 sm:col-span-3">
          <label for="first-name" class="block text-sm font-medium text-gray-700">Tipo de trabajo</label>
          <input type="text" value="{{$default->tipo_trabajo ? $default->tipo_trabajo : '' }}" name="tipo_trabajo"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>

        <div class="col-span-6 sm:col-span-3">
          <label for="country" class="block text-sm font-medium text-gray-700">Descripción</label>
          <input type="text" value="{{$default->descripcion ? $default->descripcion : '' }}" name="descripcion" autocomplete="" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">

        </div>




      </div>
    </div>
    <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
      <button type="submit" class="inline-flex justify-center rounded-md border border-transparent py-2 px-4 text-sm font-medium text-white shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" style="background-color: rgb(224,42,35);">Guardar</button>
    </div>
  </div>
