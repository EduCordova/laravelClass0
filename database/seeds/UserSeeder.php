<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;  // IMportar la bd class
use App\User;
use App\Profession;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $prof = DB::select('SELECT id FROM professions WHERE title = ?', ['Desarrollador back-end']);
        // dd($prof[0]->id);
        $title = 'Desarrollador back-end';
        // $res = DB::table('professions')
        //     ->whereTitle($title)->value('id');
        //--------------------eloquent
        $professionId = Profession::whereTitle($title)->value('id');

        // dd($res);
        // ->select('id')->first();
        //TAKE IS SAME LIMIT  Ejemp 1 element
        // dd($res->id);  // $res[0]
        //------------------------------------------------------
        // DB::table('users')
        //     ->insert([
        //         'name' => 'EduCorova',
        //         'email' => 'dcv1690@gmail.com',
        //         'password' => bcrypt('laracast'),
        //         'profession_id' => $res,
        //     ]);
        //WITH ELOQUENT
        factory(User::class)->create([
            'email' => 'dcv1690@gmail.com',
            'password' => bcrypt('laracast'),
            'profession_id' => $professionId,
            'is_admin' => true,
        ]);

        factory(User::class)->create([
            'profession_id' => $professionId,
        ]);
        factory(User::class, 15)->create();
    }
}
