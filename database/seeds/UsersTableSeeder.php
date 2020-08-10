<?php

use Illuminate\Database\Seeder;
use App\Repositories\User\EloquentUserRepository;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$role_user = Role::where('name', 'user')->first();
        //$role_admin = Role::where('name', 'admin')->first();

        factory(User::class, 29)->create();
        
        $user = User::create([
          'name'      => 'Angel Vanegas',
          'email'     => 'avanepe@hotmail.com',
          'password'  => '$2y$10$plQ43fRUTlYtx570stctLuia9KWXda2Cwn1aoCrFqmzvR.zT4asy2' //alvape14
        ]);
        //$user->roles()->attach($role_admin);
    }
}
