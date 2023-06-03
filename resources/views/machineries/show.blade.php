<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

  <main class="mt-10">

      <div class="mb-4 md:mb-0 w-full mx-auto relative">
        <div class="px-4 lg:px-0">
          <h2 class="text-2xl font-semibold text-gray-800 ">
            Detalles de {{$machinery->nombre}}
          </h2>
          <a
            href="{{ route('machineries.index') }}"
            class="py-2 text-red-600 inline-flex items-center justify-center mb-2"
          >
            Regresar
          </a>
        </div>
        <div class="object-center">
        <img src="{{$machinery->machinery_photo ? asset($machinery->machinery_photo) :'https://curiosfera-historia.com/wp-content/uploads/Historia-de-las-maquinas.jpg'}}" class="w-1/4 object-cover lg:rounded" style="height: 28em;"/>
       </div>
      </div>

      <div class="flex flex-col lg:flex-row lg:space-x-12">

        <div class="px-4 lg:px-0 mt-12 text-gray-700 text-lg leading-relaxed w-full lg:w-3/4">
          <p class="pb-4"><strong>ID:</strong>
          {{ $machinery->id }}</p>

          <p class="pb-4"><strong>Valor:</strong>
            S/{{ $machinery->valor }}</p>

          <p class="pb-4"><strong>Fecha:</strong>
          {{ $machinery->fecha_compra }}</p>



        </div>

      </div>
    </main>
  </div>
  </div>


</x-app-layout>
