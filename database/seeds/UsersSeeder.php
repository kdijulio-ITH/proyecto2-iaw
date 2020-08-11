<?php
use Illuminate\Database\Seeder;
use \App\User;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            try{
            User::create([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('asdasdas'),
                'edad' => 18,
                'roles' => 'Administrador',
                'api_token' => Str::random(60),
            ]);
          }catch (Exception $e) {};
          try{
            User::create([
                'name' => 'Vendedor',
                'email' => 'vendedor@gmail.com',
                'password' => Hash::make('asdasdas'),
                'edad' => 20,
                'roles' => 'Vendedor',
                'api_token' => Str::random(60),
            ]);
          }catch (Exception $e) {};

    }
}
