<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

  <main class="mt-10">

      <div class="mb-4 md:mb-0 w-full mx-auto relative">
        <div class="px-4 lg:px-0">
          <h2 class="text-2xl font-semibold text-gray-800 ">
            Trabajo Nº{{$job->id}}
          </h2>
          <a
            href="{{ route('jobs.index') }}"
            class="py-2 text-red-600 inline-flex items-center justify-center mb-2"
          >
            Regresar
          </a>
        </div>
        <div class="object-center">
        <img src="{{$vehicle->vehicle_photo ? asset($vehicle->vehicle_photo) :'https://img.freepik.com/vector-premium/taller-carros-mecanica-carro-elevado_18591-64292.jpg?w=2000'}}" class="w-1/4 object-cover lg:rounded" style="height: 28em;"/>
       </div>
      </div>

      <div class="flex flex-col lg:flex-row lg:space-x-12">

        <div class="px-4 lg:px-0 mt-12 text-gray-700 text-lg leading-relaxed w-full lg:w-3/4">
          <p class="pb-4"><strong>Vehiculo trabajado:</strong>
          {{ $vehicle->placa }}</p>

          <p class="pb-4"><strong>Tipo de trabajo:</strong>
          {{ $default->tipo_trabajo }}</p>

          <p class="pb-4"><strong>Detalles sobre trabajo:</strong>
          {{ $job->descripcion_detalles }}</p>

          <p class="pb-4"><strong>Empleado responsable:</strong>
            {{ ($employee->nombre ?? false) ? $employee->nombre : 'Desconocido'  }}</p>

          <p class="pb-4"><strong>Ultima modificacion hecha por:</strong>
            {{ ($employee_upd->nombre ?? false) ? $employee_upd->nombre : 'Nadie'  }}</p>

          <p class="pb-4"><strong>Pago:</strong>
            S/{{ $payment->monto }}</p>

          <p class="pb-4"><strong>Metodo de pago:</strong>
          {{ $method->metodos }}</p>



        </div>

      </div>
    </main>
  </div>
  </div>


</x-app-layout>
