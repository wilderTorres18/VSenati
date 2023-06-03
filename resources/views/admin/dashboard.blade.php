<x-app-layout>

  <div class="py-12" style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),url(https://lh5.googleusercontent.com/p/AF1QipNXVAOdR1qYExiLHFDNoDmcxWy0IS6KvdiDgdfN=w1080-k-no); background-repeat: no-repeat; background-size: cover;">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));" >
        <br>
        <center><h1 class="text-white text-2xl" >Bienvenido administrador</h1></center>
          <br>

                  <!-- Component Start -->
                	<div class="grid lg:grid-cols-3 md:grid-cols-2 gap-6 w-full max-w-6xl">

                		<!-- Tile 1 -->
                		<div class="flex items-center p-4 bg-white rounded">
                			<div class="flex flex-shrink-0 items-center justify-center bg-green-200 h-16 w-16 rounded">
                				<svg class="w-6 h-6 fill-current text-green-700"  xmlns="https://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                				  <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                				</svg>
                			</div>
                			<div class="flex-grow flex flex-col ml-4">
                				<span class="text-xl font-bold">S/ {{$pay}}</span>
                				<div class="flex items-center justify-between">
                					<span class="text-gray-500">Ganancias del año</span>
                					<span class="text-green-500 text-sm font-semibold ml-2">+12.6%</span>
                				</div>
                			</div>
                		</div>

                		<!-- Tile 2 -->
                		<div class="flex items-center p-4 bg-white rounded">
                			<div class="flex flex-shrink-0 items-center justify-center bg-red-200 h-16 w-16 rounded">
                				<svg class="w-6 h-6 fill-current text-red-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                				  <path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                				</svg>
                			</div>
                			<div class="flex-grow flex flex-col ml-4">
                				<span class="text-xl font-bold">{{count($jobs)}}</span>
                				<div class="flex items-center justify-between">
                					<span class="text-gray-500">Trabajos en el año</span>
                					<span class="text-red-500 text-sm font-semibold ml-2">-8.1%</span>
                				</div>
                			</div>
                		</div>

                		<!-- Tile 3 -->
                		<div class="flex items-center p-4 bg-white rounded">
                			<div class="flex flex-shrink-0 items-center justify-center bg-green-200 h-16 w-16 rounded">
                				<svg class="w-6 h-6 fill-current text-green-700"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                				  <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                				</svg>
                			</div>
                			<div class="flex-grow flex flex-col ml-4">
                				<span class="text-xl font-bold">{{count($vehicles)}}</span>
                				<div class="flex items-center justify-between">
                					<span class="text-gray-500">Autos registrados en el año</span>
                					<span class="text-green-500 text-sm font-semibold ml-2">+28.4%</span>
                				</div>
                			</div>
                		</div>

                	</div>
                	<!-- Component End  -->
                  <br>
                  <br>
                  <br>
                  <x-datepicker>
                  </x-datepicker>
                  <x-select />
                  <br>

                  <x-btn type="button" id="filtrar" >
                    Filtrar
                  </x-btn>
<br>
<br>

          <div class="shadow-lg rounded-lg overflow-hidden">
            <div class="py-3 px-5 bg-gray-50">Line chart</div>
            <canvas class="p-10" id="chartLine"></canvas>
            <br>
          </div>

          <!-- Required chart.js -->
          <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


          <!-- Chart line -->
          <script>

          const updateChartData =(chartId,data,labels)=>{
            const chart= Chart.getChart(chartId);
            chart.data.datasets[0].data=data;
            chart.data.labels=labels;
            chart.update();
          }
          const esBisiesto = (year) => {
                return (year % 400 === 0) ? true :
                			(year % 100 === 0) ? false :
                				year % 4 === 0;
              };

          var semana=[];
          var mes=[];
          var año=[];

          var Pagos=(<?php echo json_encode($payments);?>);



          const Fecha = document.getElementById('fecha');


          const Rango = document.getElementById('rango');

          const Filtrar = document.getElementById('filtrar');

          {{--dd($payments[0]->fecha_pago)--}}
          {{--dd(date_format(date_create($payments[0]->fecha_pago), 'Y'))--}}//año
          {{--dd(date_format(date_create($payments[0]->fecha_pago), 'm'))--}}//mes
          {{--dd(date_format(date_create($payments[0]->fecha_pago), 'N'))--}}//dia de la semana
          {{--dd(date_format(date_create($payments[0]->fecha_pago), 'j'))--}}//dia del mes

            Filtrar.addEventListener('click', (event) => {

              var Ufecha= new Date(parseInt(Fecha.value.replace(/^(\d{2})-(\d{2})-(\d{4})$/g,'$3')),parseInt(Fecha.value.replace(/^(\d{2})-(\d{2})-(\d{4})$/g,'$2'))-1,parseInt(Fecha.value.replace(/^(\d{2})-(\d{2})-(\d{4})$/g,'$1')));
              var DS= Ufecha.getDay();
              var DM= Ufecha.getDate();
              var M= Ufecha.getMonth()+1;
              var A= Ufecha.getFullYear();
              var pridiasem=new Date(Ufecha);
              var ultdiasem=new Date(Ufecha);
              var semanal;
              var Lun=new Date(Ufecha);
              var Mar=new Date(Ufecha);
              var Mie=new Date(Ufecha);
              var Jue=new Date(Ufecha);
              var Vie=new Date(Ufecha);
              var Sab=new Date(Ufecha);
              var Dom=new Date(Ufecha);
              var montlun=0;
              var montmar=0;
              var montmie=0;
              var montjue=0;
              var montvie=0;
              var montsab=0;
              var montdom=0;

              var pridiaaño;
              var ultdiaaño;
              var En;
              var Fe;
              var Ma;
              var Ab;
              var My;
              var Jn;
              var Jl;
              var Ag;
              var Se;
              var Oc;
              var No;
              var Di;
              let DIA_EN_MILISEGUNDOS = 24 * 60 * 60 * 1000;

              var MontEn=0;

              var MontFe=0;

              var MontMa=0;

              var MontAb=0;

              var MontMy=0;

              var MontJn=0;

              var MontJl=0;

              var MontAg=0;

              var MontSe=0;

              var MontOc=0;

              var MontNo=0;

              var MontDi=0;





              switch (Rango.value) {

                case 'semana':
                    switch (DS) {
                      case 1:
                        pridiasem.setDate(Ufecha.getDate()-1)
                        ultdiasem.setDate(Ufecha.getDate()+7)

                        Lun.setDate(Ufecha.getDate());
                        Mar.setDate(Ufecha.getDate()+1);
                        Mie.setDate(Ufecha.getDate()+2);
                        Jue.setDate(Ufecha.getDate()+3);
                        Vie.setDate(Ufecha.getDate()+4);
                        Sab.setDate(Ufecha.getDate()+5);
                        Dom.setDate(Ufecha.getDate()+6);

                      break;
                      case 2:
                      pridiasem.setDate(Ufecha.getDate()-2)
                      ultdiasem.setDate(Ufecha.getDate()+6)

                      Lun.setDate(Ufecha.getDate()-1);
                      Mar.setDate(Ufecha.getDate());
                      Mie.setDate(Ufecha.getDate()+1);
                      Jue.setDate(Ufecha.getDate()+2);
                      Vie.setDate(Ufecha.getDate()+3);
                      Sab.setDate(Ufecha.getDate()+4);
                      Dom.setDate(Ufecha.getDate()+5);

                      break;
                      case 3:
                      pridiasem.setDate(Ufecha.getDate()-3)
                      ultdiasem.setDate(Ufecha.getDate()+5)

                      Lun.setDate(Ufecha.getDate()-2);
                      Mar.setDate(Ufecha.getDate()-1);
                      Mie.setDate(Ufecha.getDate());
                      Jue.setDate(Ufecha.getDate()+1);
                      Vie.setDate(Ufecha.getDate()+2);
                      Sab.setDate(Ufecha.getDate()+3);
                      Dom.setDate(Ufecha.getDate()+4);



                      break;
                      case 4:
                      pridiasem.setDate(Ufecha.getDate()-4)
                      ultdiasem.setDate(Ufecha.getDate()+4)

                      Lun.setDate(Ufecha.getDate()-3);
                      Mar.setDate(Ufecha.getDate()-2);
                      Mie.setDate(Ufecha.getDate()-1);
                      Jue.setDate(Ufecha.getDate());
                      Vie.setDate(Ufecha.getDate()+1);
                      Sab.setDate(Ufecha.getDate()+2);
                      Dom.setDate(Ufecha.getDate()+3);


                      break;
                      case 5:
                      pridiasem.setDate(Ufecha.getDate()-5)
                      ultdiasem.setDate(Ufecha.getDate()+3)

                      Lun.setDate(Ufecha.getDate()-4);
                      Mar.setDate(Ufecha.getDate()-3);
                      Mie.setDate(Ufecha.getDate()-2);
                      Jue.setDate(Ufecha.getDate()-1);
                      Vie.setDate(Ufecha.getDate());
                      Sab.setDate(Ufecha.getDate()+1);
                      Dom.setDate(Ufecha.getDate()+2);

                      break;
                      case 6:
                      pridiasem.setDate(Ufecha.getDate()-6)
                      ultdiasem.setDate(Ufecha.getDate()+2)

                      Lun.setDate(Ufecha.getDate()-5);
                      Mar.setDate(Ufecha.getDate()-4);
                      Mie.setDate(Ufecha.getDate()-3);
                      Jue.setDate(Ufecha.getDate()-2);
                      Vie.setDate(Ufecha.getDate()-1);
                      Sab.setDate(Ufecha.getDate());
                      Dom.setDate(Ufecha.getDate()+1);

                      break;
                      case 7:
                      pridiasem.setDate(Ufecha.getDate()-7)
                      ultdiasem.setDate(Ufecha.getDate()+1)

                      Lun.setDate(Ufecha.getDate()-6);
                      Mar.setDate(Ufecha.getDate()-5);
                      Mie.setDate(Ufecha.getDate()-4);
                      Jue.setDate(Ufecha.getDate()-3);
                      Vie.setDate(Ufecha.getDate()-2);
                      Sab.setDate(Ufecha.getDate()-1);
                      Dom.setDate(Ufecha.getDate());

                      break;
                    }

                    semanal = Pagos.filter(n => n.fecha_pago > pridiasem.toISOString().substr(0,10).replace(/^(\d{1,2})\/(\d{1,2})\/(\d{4})$/, '$3-$2-$1') && n.fecha_pago < ultdiasem.toISOString().substr(0,10).replace(/^(\d{1,2})\/(\d{1,2})\/(\d{4})$/, '$3-$2-$1'))

                    var pagoslun=Pagos.filter(n => n.fecha_pago == Lun.toISOString().substr(0,10).replace(/^(\d{1,2})\/(\d{1,2})\/(\d{4})$/, '$3-$2-$1') )
                    var pagosmar=Pagos.filter(n => n.fecha_pago == Mar.toISOString().substr(0,10).replace(/^(\d{1,2})\/(\d{1,2})\/(\d{4})$/, '$3-$2-$1') )
                    var pagosmie=Pagos.filter(n => n.fecha_pago == Mie.toISOString().substr(0,10).replace(/^(\d{1,2})\/(\d{1,2})\/(\d{4})$/, '$3-$2-$1'))
                    var pagosjue=Pagos.filter(n => n.fecha_pago == Jue.toISOString().substr(0,10).replace(/^(\d{1,2})\/(\d{1,2})\/(\d{4})$/, '$3-$2-$1') )
                    var pagosvie=Pagos.filter(n => n.fecha_pago == Vie.toISOString().substr(0,10).replace(/^(\d{1,2})\/(\d{1,2})\/(\d{4})$/, '$3-$2-$1'))
                    var pagossab=Pagos.filter(n => n.fecha_pago == Sab.toISOString().substr(0,10).replace(/^(\d{1,2})\/(\d{1,2})\/(\d{4})$/, '$3-$2-$1') )
                    var pagosdom=Pagos.filter(n => n.fecha_pago == Dom.toISOString().substr(0,10).replace(/^(\d{1,2})\/(\d{1,2})\/(\d{4})$/, '$3-$2-$1') )

                    console.log(pridiasem.toISOString().substr(0,10).replace(/^(\d{1,2})\/(\d{1,2})\/(\d{4})$/, '$3-$2-$1'));
                    console.log(ultdiasem.toISOString().substr(0,10).replace(/^(\d{1,2})\/(\d{1,2})\/(\d{4})$/, '$3-$2-$1'));



                    pagoslun.forEach((pago) => {
                      montlun += pago.monto
                    });
                    pagosmar.forEach((pago) => {
                      montmar += pago.monto
                    });
                    pagosmie.forEach((pago) => {
                      montmie += pago.monto
                    });
                    pagosjue.forEach((pago) => {
                      montjue += pago.monto
                    });
                    pagosvie.forEach((pago) => {
                      montvie += pago.monto
                    });
                    pagossab.forEach((pago) => {
                      montsab += pago.monto
                    });
                    pagosdom.forEach((pago) => {
                      montdom += pago.monto
                    });




                    dd= [montlun.toFixed(2), montmar.toFixed(2), montmie.toFixed(2),montjue.toFixed(2), montvie.toFixed(2), montsab.toFixed(2), montdom.toFixed(2),0];
                    labels=["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado","Domingo"];
                    updateChartData('chartLine', dd, labels);
                  break;

                case 'año':
                    console.log(Fecha.value);
                    pridiaaño= (A-1).toString() + "-" + "12" + "-" + "31";
                    ultdiaaño= (A+1).toString() + "-" +"00" + "-" + "01";

                    anio=Pagos.filter(n => n.fecha_pago > pridiaaño && n.fecha_pago < ultdiaaño);

                    En=anio.filter(n => n.fecha_pago >= A.toString() + "-" + "01" + "-" + "01" && n.fecha_pago <= A.toString() + "-" + "01" + "-" + "31");

                    (esBisiesto(A))? Fe=anio.filter(n => n.fecha_pago >= A.toString() + "-" + "02" + "-" + "01" && n.fecha_pago <= A.toString() + "-" + "02" + "-" + "31") : Fe=anio.filter(n => n.fecha_pago >= A.toString() + "-" + "02" + "-" + "01" && n.fecha_pago <= A.toString() + "-" + "02" + "-" + "30");

                    Ma=anio.filter(n => n.fecha_pago >= A.toString() + "-" + "03" + "-" + "01" && n.fecha_pago <= A.toString() + "-" + "03" + "-" + "31");

                    Ab=anio.filter(n => n.fecha_pago >= A.toString() + "-" + "04" + "-" + "01" && n.fecha_pago <= A.toString() + "-" + "04" + "-" + "30");

                    My=anio.filter(n => n.fecha_pago >= A.toString() + "-" + "05" + "-" + "01" && n.fecha_pago <= A.toString() + "-" + "05" + "-" + "31");

                    Jn=anio.filter(n => n.fecha_pago >= A.toString() + "-" + "06" + "-" + "01" && n.fecha_pago <= A.toString() + "-" + "06" + "-" + "30");

                    Jl=anio.filter(n => n.fecha_pago >= A.toString() + "-" + "07" + "-" + "01" && n.fecha_pago <= A.toString() + "-" + "07" + "-" + "31");

                    Ag=anio.filter(n => n.fecha_pago >= A.toString() + "-" + "08" + "-" + "01" && n.fecha_pago <= A.toString() + "-" + "08" + "-" + "31");

                    Se=anio.filter(n => n.fecha_pago >= A.toString() + "-" + "09" + "-" + "01" && n.fecha_pago <= A.toString() + "-" + "09" + "-" + "30");

                    Oc=anio.filter(n => n.fecha_pago >= A.toString() + "-" + "10" + "-" + "01" && n.fecha_pago <= A.toString() + "-" + "10" + "-" + "31");

                    No=anio.filter(n => n.fecha_pago >= A.toString() + "-" + "11" + "-" + "01" && n.fecha_pago <= A.toString() + "-" + "11" + "-" + "30");

                    Di=anio.filter(n => n.fecha_pago >= A.toString() + "-" + "12" + "-" + "01" && n.fecha_pago <= A.toString() + "-" + "12" + "-" + "31");

                    En.forEach((pago) => {
                      MontEn += pago.monto
                    });

                    Fe.forEach((pago) => {
                      MontFe += pago.monto
                    });

                    Ma.forEach((pago) => {
                      MontMa += pago.monto
                    });

                    Ab.forEach((pago) => {
                      MontAb += pago.monto
                    });

                    My.forEach((pago) => {
                      MontMy += pago.monto
                    });

                    Jn.forEach((pago) => {
                      MontJn += pago.monto
                    });

                    Jl.forEach((pago) => {
                      MontJl += pago.monto
                    });

                    Ag.forEach((pago) => {
                      MontAg += pago.monto
                    });

                    Se.forEach((pago) => {
                      MontSe += pago.monto
                    });

                    Oc.forEach((pago) => {
                      MontOc += pago.monto
                    });

                    No.forEach((pago) => {
                      MontNo += pago.monto
                    });

                    Di.forEach((pago) => {
                      MontDi += pago.monto
                    });

                    dd= [MontEn.toFixed(2),MontFe.toFixed(2),MontMa.toFixed(2), MontAb.toFixed(2),MontMy.toFixed(2),MontJn.toFixed(2),MontJl.toFixed(2),MontAg.toFixed(2),MontSe.toFixed(2),MontOc.toFixed(2),MontNo.toFixed(2),MontDi.toFixed(2),0];
                    labels=["Enero", "Febrero", "Marzo", "Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
                    updateChartData('chartLine', dd, labels);

                  break;

                }

          });

          var dd;
          var labels = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado","Domingo"];
          const data = {
            labels: labels,
            datasets: [
              {
                label: "Ganancias",
                backgroundColor: "hsl(0, 100%, 100%)",
                borderColor: "hsl(4, 76%, 55%)",
                data: [0, 0, 0, 0, 0, 0, 0],
              },
            ],
          };

          const configLineChart = {
            type: "line",
            data,
            options: {}

          };





          var chartLine = new Chart(
            document.getElementById("chartLine"),
            configLineChart
          );

          </script>
 </div>
</div>
</x-app-layout>
