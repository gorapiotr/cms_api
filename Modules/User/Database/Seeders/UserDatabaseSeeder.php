<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin'.'@gmail.com',
            'password' => bcrypt('adminadmin')
            ]);

        DB::table('users')->insert([
            'name' => 'john',
            'email' => 'john'.'@gmail.com',
            'password' => bcrypt('johnjohn')
        ]);

        DB::table('users')->insert([
            'name' => 'mike',
            'email' => 'mike'.'@gmail.com',
            'password' => bcrypt('mikemike')
        ]);

    }
}
