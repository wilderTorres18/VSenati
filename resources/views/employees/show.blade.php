<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

  <main class="mt-10">

      <div class="mb-4 md:mb-0 w-full mx-auto relative">
        <div class="px-4 lg:px-0">
          <h2 class="text-2xl font-semibold text-gray-800 ">
            {{$employee->nombre}}
          </h2>
          <a
            href="{{ route('employees.index') }}"
            class="py-2 text-red-600 inline-flex items-center justify-center mb-2"
          >
            Regresar
          </a>
        </div>
        <div class="object-center">
        <img src="{{$user->profile_photo_path ? asset('storage/'.$user->profile_photo_path) :'https://img.freepik.com/vector-premium/personajes-dibujos-animados-mecanico_123591-19.jpg'}}" class="w-1/4 object-cover lg:rounded" style="height: 28em;"/>
       </div>
      </div>

      <div class="flex flex-col lg:flex-row lg:space-x-12">

        <div class="px-4 lg:px-0 mt-12 text-gray-700 text-lg leading-relaxed w-full lg:w-3/4">
          <p class="pb-4"><strong>Rol de empleado:</strong>
          {{ $rol->rol_empleados }}</p>

          <p class="pb-4"><strong>Fecha de contrato:</strong>
            {{ $employee->fecha_contrato }}</p>

          <p class="pb-4"><strong>Fecha de finalizacion:</strong>
            {{ $employee->fecha_finalizacion ? $employee->fecha_finalizacion : 'Aun activo' }}</p>

          <p class="pb-4"><strong>DNI:</strong>
          {{ $employee->DNI }}</p>

          <p class="pb-4"><strong>Celular:</strong>
          {{ $employee->celular }}</p>


        </div>

      </div>
    </main>
  </div>
  </div>


</x-app-layout>
