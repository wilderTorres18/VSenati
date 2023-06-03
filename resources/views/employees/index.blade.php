<x-app-layout>
  <div class="py-12" style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),url(https://lh5.googleusercontent.com/p/AF1QipPzcYPvSr4DoZNBEVOZpglcfJpLFmIa-dXD1PjX=w1080-k-no); background-repeat: no-repeat; background-size: cover;">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));">
        <br>
        <div class="text-right">
          <x-btn>
              <a href="{{ route('employees.create') }}">
                {{ __('Registar empleados') }}
              </a>
          </x-btn>
        </div>
        <form action="{{route('employees.index')}}" method="get">
        <label for="first-name" class="block text-sm font-medium text-gray-700">Barra de Busqueda</label>
        <input type="text" value="{{$buscar}}" name="buscar" id="buscar" autocomplete="" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        <br>
        <x-btn type="submit" >Buscar</x-btn>
        </form>
        <br>
        @if(!$buscar)
              {!! $employees->links('pagination::tailwind') !!}
          @endif
              <table class="min-w-full w-full divide-y divide-gray-300">
                  <thead class="" style="background-color: rgb(158,29,25 )">
                      <tr>
                          <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-6">#</th>
                          <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white">nombre</th>
                          <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">DNI</th>
                          <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Rol</th>
                          <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-white">Status</th>
                          <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                          </th>
                      </tr>
                  </thead>
                  <tbody class="divide-y divide-gray-200 bg-white">
                    @if(count($employees)<=0)
                      <tr>
                          <td colspan="6"> No hay resultados </td>
                      </tr>
                    @else
                    @foreach ($employees as $employee)
                      <tr>
                          <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold  sm:pl-6" style="background-color: rgb(224,42,35);color: rgb(255,255,255);">{{$employee->id}}</td>
                          <td class="whitespace-nowrap px-3 py-4 text-sm" style="background-color: rgb(224,42,35);color: rgb(255,255,255);">{{$employee->nombre}}</td>
                          <td class="whitespace-nowrap px-3 py-4 text-sm">
                              {{$employee->DNI}}
                          </td>
                          <td class="whitespace-nowrap px-3 py-4 text-sm" style="background-color: rgb(255,237,237);">
                              {{$employee->rol_empleados}}
                          </td>
                          @if(!$employee->fecha_finalizacion)
                            <td class="whitespace-nowrap px-3 py-4 text-sm">
                                <span class="flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </td>
                          @else
                            <td class="whitespace-nowrap px-3 py-4 text-sm">
                                <span class="flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </td>
                          @endif
                          <td class="py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                            <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">
                              <div class="inline-block text-left" x-data="{ menu: false }">
                                  <button x-on:click="menu = ! menu" type="button" class="flex items-center text-gray-400 hover:text-gray-600 focus:outline-none" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                      <span class="sr-only"></span>
                                      <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                      <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                      </svg>
                                  </button>
                                  <div x-show="menu" x-on:click.away="menu = false" class="origin-top-right absolute right-32 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                      <div class="" role="none">
                                          <a href="{{ route('employees.show',$employee->id) }}" class="text-gray-500 font-medium hover:text-gray-900 hover:bg-gray-50 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">
                                              Mostrar
                                          </a>
                                      </div>
                                      <div class="" role="none">
                                          <a href="{{ route('employees.edit', $employee->id) }}" class="text-gray-500 font-medium hover:text-gray-900 hover:bg-gray-50 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">
                                              Editar
                                          </a>
                                      </div>
                                      @csrf

                                      <div class="" role="none">
                                          @method('DELETE')
                                          <button type="submit" class="text-gray-500 font-medium hover:text-gray-900 hover:bg-gray-50 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">
                                              Eliminar
                                          </button>
                                      </div>

                                  </div>
                              </div>
                            </form>
                          </td>
                      </tr>
                    @endforeach
                    @endif

                  </tbody>
              </table>
              <br>
      </div>
    </div>

</x-app-layout>
