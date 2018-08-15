<?php

namespace Modules\Settings\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SettingsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

            DB::table('settings')->insert([
                'key' => 'title',
                'value' => 'admin',
                'type' => 'page',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_by' => 1,
            ]);

        DB::table('settings')->insert([
            'key' => 'description',
            'value' => 'Thoughts, stories and ideas.',
            'type' => 'page',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'logo',
            'value' => 'https://casper.ghost.org/v1.0.0/images/ghost-logo.svg',
            'type' => 'page',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'cover_image',
            'value' => 'https://casper.ghost.org/v1.0.0/images/blog-cover.jpg',
            'type' => 'page',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'icon',
            'value' => 'https://cdn.iconscout.com/icon/free/png-256/angular-6-458222.png',
            'type' => 'page',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'default_locale',
            'value' => 'en',
            'type' => 'page',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'active_timezone',
            'value' => 'Etc/UTC',
            'type' => 'page',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'facebook',
            'value' => 'https://www.facebook.com',
            'type' => 'page',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'twitter',
            'value' => 'https://twitter.com',
            'type' => 'page',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);
    }
}
