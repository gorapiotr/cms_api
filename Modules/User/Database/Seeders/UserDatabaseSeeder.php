<?php

namespace Modules\User\Database\Seeders;

use \Modules\User\Model\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\User\Model\User;


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
            'email' => 'admin@gmail.com',
            'password' => bcrypt('adminadmin'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        $user = User::where('email','admin@gmail.com')->first();
        $role = Role::where('name', '=', 'superadministrator')->first();
        DB::table('role_user')->insert([
            'role_id' => $role->id,
            'user_id' => $user->id,
            'user_type' => 'Modules\User\Model\User'
            ]);


        DB::table('users')->insert([
            'name' => 'john',
            'email' => 'john'.'@gmail.com',
            'password' => bcrypt('johnjohn'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $user = User::where('email','john@gmail.com')->first();
        $role = Role::where('name', '=', 'user')->first();
        DB::table('role_user')->insert([
            'role_id' => $role->id,
            'user_id' => $user->id,
            'user_type' => 'Modules\User\Model\User'
        ]);

        DB::table('users')->insert([
            'name' => 'mike',
            'email' => 'mike'.'@gmail.com',
            'password' => bcrypt('mikemike'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $user = User::where('email','mike@gmail.com')->first();
        $role = Role::where('name', '=', 'user')->first();
        DB::table('role_user')->insert([
            'role_id' => $role->id,
            'user_id' => $user->id,
            'user_type' => 'Modules\User\Model\User'
        ]);

    }
}
