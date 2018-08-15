<?php

namespace Modules\User\Database\Seeders;

use Carbon\Carbon;
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
            'password' => bcrypt('adminadmin'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

        DB::table('users')->insert([
            'name' => 'john',
            'email' => 'john'.'@gmail.com',
            'password' => bcrypt('johnjohn'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'mike',
            'email' => 'mike'.'@gmail.com',
            'password' => bcrypt('mikemike'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    }
}
