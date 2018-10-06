<?php

namespace Modules\User\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
            'avatar' => 'https://firebasestorage.googleapis.com/v0/b/cmsimage-9ec21.appspot.com/o/pic-1.png?alt=media&token=12737b0d-2d61-4c27-96ee-3f35f3f6694c',
            'avatar_type' => 'url',
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
