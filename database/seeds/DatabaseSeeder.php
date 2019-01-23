<?php

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

        $this->truncateTables([
            'professions',
            'users'
        ]);
        // dd(ProfessionSeeder::class);
        // $this->call(UsersTableSeeder::class);
        // $this->call(ProfessionSeeder::class);
        // $this->call(UserSeeder::class);
        //todo en uno
        $this->call([
            ProfessionSeeder::class,
            UserSeeder::class,
        ]);
    }

    protected function truncateTables(array $table)
    {
        //Disable foreign keys
        DB::statement("SET FOREIGN_KEY_CHECKS = 0;");

        foreach($table as $tab) {
             //Limpiar la tabla (ELIMINA)
             DB::table($tab)->truncate();
        }
        //Activamos
        DB::statement("SET FOREIGN_KEY_CHECKS = 1;");
    }
}
