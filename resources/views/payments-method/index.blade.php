<x-app-layout>
  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="mt-10 sm:mt-0">

                  <div class="md:grid md:grid-cols-2 md:gap-6">
                    <div class="mt-5 md:col-span-2 md:mt-0">
                      <form action="#" method="POST">
                        <div class="overflow-hidden shadow sm:rounded-md">
                          <div class="bg-white px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                              <div class="col-span-6 sm:col-span-3">
                                <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                                <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                              </div>

                              <div class="col-span-6 sm:col-span-3">
                                <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                                <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                              </div>

                              <div class="col-span-6 sm:col-span-3">
                                <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                                <select id="country" name="country" autocomplete="country-name" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                  <option>United States</option>
                                  <option>Canada</option>
                                  <option>Mexico</option>
                                </select>
                              </div>




                            </div>
                          </div>
                          <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <br>
              <br>
              <br>
              <br>
              <label for="first-name" class="block text-sm font-medium text-gray-700">Buscar</label>
              <select id="columna" name="columna" autocomplete="" class="mt-1 block w-48 rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                <option>Placa</option>
                <option>Color</option>
                <option>Tipo</option>
              </select>
              <input type="text" name="buscar" id="buscar" autocomplete="" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">

              <br>
              <table class="min-w-full w-full divide-y divide-gray-300">
                  <thead class="bg-gray-50">
                      <tr>
                          <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">#</th>
                          <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">User</th>
                          <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
                          <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Status</th>
                          <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                              <span class="sr-only">Actions</span>
                          </th>
                      </tr>
                  </thead>
                  <tbody class="divide-y divide-gray-200 bg-white">
                      <tr>
                          <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900 sm:pl-6">1</td>
                          <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Norma Nova</td>
                          <td class="whitespace-nowrap px-3 py-4 text-sm">
                              norma@example.com
                          </td>
                          <td class="whitespace-nowrap px-3 py-4 text-sm">
                              <span class="flex justify-center">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                      <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                  </svg>
                              </span>
                          </td>
                          <td class="py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                              <div class="inline-block text-left" x-data="{ menu: false }">
                                  <button x-on:click="menu = ! menu" type="button" class="flex items-center text-gray-400 hover:text-gray-600 focus:outline-none" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                      <span class="sr-only"></span>
                                      <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                      <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                      </svg>
                                  </button>
                                  <div x-show="menu" x-on:click.away="menu = false" class="origin-top-right absolute right-32 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                      <div class="" role="none">
                                          <a href="#" class="text-gray-500 font-medium hover:text-gray-900 hover:bg-gray-50 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">
                                              Detalle
                                          </a>
                                      </div>
                                      <div class="" role="none">
                                          <a href="#" class="text-gray-500 font-medium hover:text-gray-900 hover:bg-gray-50 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">
                                              Editar
                                          </a>
                                      </div>
                                  </div>
                              </div>
                          </td>
                      </tr>

                      <tr>
                          <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900 sm:pl-6">2</td>
                          <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Oscar Tellez</td>
                          <td class="whitespace-nowrap px-3 py-4 text-sm">
                              oscar@example.com
                          </td>
                          <td class="whitespace-nowrap px-3 py-4 text-sm">
                              <span class="flex justify-center">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                      <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                  </svg>
                              </span>
                          </td>
                          <td class="py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                              <div class="inline-block text-left" x-data="{ menu: false }">
                                  <button x-on:click="menu = ! menu" type="button" class="flex items-center text-gray-400 hover:text-gray-600 focus:outline-none" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                      <span class="sr-only"></span>
                                      <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                      <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                      </svg>
                                  </button>
                                  <div x-show="menu" x-on:click.away="menu = false" class="origin-top-right absolute right-32 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                      <div class="" role="none">
                                          <a href="#" class="text-gray-500 font-medium hover:text-gray-900 hover:bg-gray-50 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">
                                              Detalle
                                          </a>
                                      </div>
                                      <div class="" role="none">
                                          <a href="#" class="text-gray-500 font-medium hover:text-gray-900 hover:bg-gray-50 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">
                                              Editar
                                          </a>
                                      </div>
                                  </div>
                              </div>
                          </td>
                      </tr>
                  </tbody>
              </table>
        </div>
    </div>
</x-app-layout>
