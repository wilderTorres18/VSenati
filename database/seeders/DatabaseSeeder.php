<?php

namespace Database\Seeders;
use App\Models\Employee;
use App\Models\Default_job;
use App\Models\Job;
use App\Models\Employee_role;
use App\Models\Payment_method;
use App\Models\User_role;
use App\Models\Vehicle;
use App\Models\Payment;
use App\Models\User;
use App\Models\Machinery;
use App\Models\Machinery_maintenance;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //Tipos de trabajo
        Default_job::create(["tipo_trabajo"=>"Balanceo","descripcion"=>"Balanceo de llantas con plomos"]);
        Default_job::create(["tipo_trabajo"=>"Aliniamiento","descripcion"=>"Aliniminiamiento del timon"]);
        Default_job::create(["tipo_trabajo"=>"Undercoating","descripcion"=>"Cubrir la parte de abajo para evitar el oxido"]);
        Default_job::create(["tipo_trabajo"=>"Correcion","descripcion"=>"No quedo bien el primer trabajo y lo coregimos gratis"]);

        //Roles de empleados
        Employee_role::create(['rol_empleados'=>'Ayudante','descripcion'=>'Practicantes a cargo de un maestro','pago'=>'propina']);
        Employee_role::create(['rol_empleados'=>'Maestro','descripcion'=>'Dirige un pequeño grupo de empleado','pago'=>'porcentaje']);
        Employee_role::create(['rol_empleados'=>'Administrador','descripcion'=>'Control total del sistema','pago'=>'']);

        //Metodos de pago
        Payment_method::create(['metodos'=>'Efectivo']);
        Payment_method::create(['metodos'=>'Yape','codigo_numero'=>'955133618']);
        Payment_method::create(['metodos'=>'Transferencia-bcp','codigo_numero'=>'46441645791444']);

        //rol de usuarios
        User_role::create(['rol_usuario'=>'Admin','descripcion'=>'Puede hacer cambios en todas las tablas']);
        User_role::create(['rol_usuario'=>'Empleado','descripcion'=>'Solo puede apuntar y consultar trabajos, ademas ver su paga']);

        //vehiculos
        Vehicle::factory()->count(500)->create();

        //usuarios y al mismo tiempo empleados

        User::factory()->count(5)->create();
        User::create(['name'=>'Admin',
        'email'=>'admin@correo.com',
        'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password,
        'user_role_id'=>1]);

        //pagos y trabajos
        Payment::factory()->count(800)->create();

        //Maquinarias
        Machinery::factory()->count(10)->create();

        //Mantenimietos maquinarias
        Machinery_maintenance::factory()->count(30)->create();


    }
}
