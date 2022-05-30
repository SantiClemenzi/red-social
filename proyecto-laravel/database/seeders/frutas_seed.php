<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class frutas_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //cremos la funcion para cargar datos
        for ($i = 0; $i <= 8; $i++) {
            DB::table('frutas')->insert(array(
                'nombre' => '' . $i,
                'descripcion' => '' . $i,
                'precio' => '' . $i,
                'fecha' => date('y-m-d'),
            ));
            $this->command->info('La tabla de frutas a sido rellenada');
        }
    }
}
