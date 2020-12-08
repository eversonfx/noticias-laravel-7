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
        //Usuário
        $values = array('name' => 'Administrador 1','email' => 'admin@admin.com','divisao' => 'trabsocial','role' => 1,'password' => Hash::make('admin'));
        DB::table('users')->insert($values);

      
        factory(App\User::class, 5)->create();
        factory(App\Secao::class, 7)->create();
        factory(App\Noticia::class, 20)->create();
    }
}
