<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Profession;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //usando marcadores ?? para evitar inyeccion sql
        // DB::insert('insert into professions (title) values (?)', ['UX/UI']);
        //is a class with method table
        Profession::create([
            'title' => 'UX/UI',
        ]);

        Profession::create([
            'title' => 'Desarrollador back-end',
        ]);

        Profession::create([
            'title' => 'Desarrollador front-end',
        ]);

        factory(Profession::class, 17)->create();
        // DB::table('professions')
        //     ->insert([
        //         'title' => 'Desarrollador back-end',
        //     ]);
        // DB::table('professions')
        // ->insert([
        //     'title' => 'Desarrollador front-end',
        // ]);
    }
}
