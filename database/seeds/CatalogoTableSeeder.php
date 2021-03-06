<?php

use Illuminate\Database\Seeder;

class CatalogoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Catalogo::class)->create([
        		'idtable'=> 0,
        		'iditem'=> 0,
        		'codigo'=> 'MAE',
        		'nombre'=> 'MAESTRO',
        		'descripcion'=> 'MAESTRO DE TABLAS',
        		'activo'=> TRUE
        	]);
        factory(App\Catalogo::class)->create([
                'idtable'=> 0,
                'iditem'=> 1,
                'codigo'=> 'ROL',
                'nombre'=> 'ROL USUARIO',
                'descripcion'=> 'ROL DE USUARIO',
                'activo'=> TRUE
            ]);
        factory(App\Catalogo::class)->create([
                'idtable'=> 0,
                'iditem'=> 2,
                'codigo'=> 'SECCIONES',
                'nombre'=> 'SECCIONES',
                'descripcion'=> 'SECCIONES',
                'activo'=> TRUE
            ]);
        factory(App\Catalogo::class)->create([
                'idtable'=> 1,
                'iditem'=> 1,
                'codigo'=> 'admin',
                'nombre'=> 'admin',
                'descripcion'=> 'Administrador del sistema',
                'activo'=> TRUE
            ]);
        factory(App\Catalogo::class)->create([
                'idtable'=> 1,
                'iditem'=> 2,
                'codigo'=> 'rol2',
                'nombre'=> 'rol2',
                'descripcion'=> 'rol2',
                'activo'=> TRUE
            ]);
        factory(App\Catalogo::class)->create([
                'idtable'=> 1,
                'iditem'=> 3,
                'codigo'=> 'rol3',
                'nombre'=> 'rol3',
                'descripcion'=> 'rol3',
                'activo'=> TRUE
            ]);

    }
}
