<x-app-layout>

  <div  style="padding: 0px 400px 0px;background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(https://lh5.googleusercontent.com/p/AF1QipNXVAOdR1qYExiLHFDNoDmcxWy0IS6KvdiDgdfN=w1080-k-no); background-repeat: no-repeat; background-size: cover;">

    @for ($i = 0; $i < 12; $i++)
    <br>
    @endfor
    <div style="padding: 100px 0px 100px;background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));">
      <center><h1 class="text-white " style="font-size: 6rem;line-height: 1;">Bienvenido a S.N.A</h1></center>
      <center><h1 class="text-white " style="font-size: 6rem;line-height: 1;">{{$nombre}}</h1></center>
      <center><p class="text-white">Podra registar y modificar trabajos y vehiculos</p></center>
    </div>

    @for ($i = 0; $i < 12; $i++)
    <br>
    @endfor
  </div>
</x-app-layout>
