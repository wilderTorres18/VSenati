<x-app-layout>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="mt-10 sm:mt-0">

                  <div class="md:grid md:grid-cols-2 md:gap-6">
                    <div class="mt-5 md:col-span-2 md:mt-0">
                      <div class="bg-gray-50 py-3 ">
                        <span class="pl-3">Editar ipos de trabajo</span>
                      </div>
                      <form method="POST" action="{{ route('default-jobs.update', $default->id) }}" role="form" enctype="multipart/form-data">
                          {{ method_field('PATCH') }}
                          @csrf

                          @include('default-jobs.form')

                      </form>
                    </div>
              </div>
          </div>
      </div>
  </section>
</x-app-layout>
