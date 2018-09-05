<?php

namespace Modules\User\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
//use Modules\User\Model\User;
use Illuminate\Database\Eloquent\Factory;
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
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $user = User::where('email','admin@gmail.com')->first();
        $user->attachRole('superadministrator');


        factory(User::class, 10)->create()->each(function ($user) {
            $user->attachRole('user');
        });
    }
}
