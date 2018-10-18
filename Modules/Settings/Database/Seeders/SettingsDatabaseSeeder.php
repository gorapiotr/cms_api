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
                'type' => 'text',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_by' => 1,
            ]);

        DB::table('settings')->insert([
            'key' => 'description',
            'value' => 'Thoughts, stories and ideas.',
            'type' => 'text',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'logo',
            'value' => 'https://casper.ghost.org/v1.0.0/images/ghost-logo.svg',
            'type' => 'url',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'admin_logo',
            'value' => 'https://firebasestorage.googleapis.com/v0/b/cmsimage-9ec21.appspot.com/o/blog_page.svg?alt=media&token=182a9143-4b17-4477-b06e-9ca6b98cbffc',
            'type' => 'url',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'cover_image',
            'value' => 'https://casper.ghost.org/v1.0.0/images/blog-cover.jpg',
            'type' => 'url',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'icon',
            'value' => 'https://cdn.iconscout.com/icon/free/png-256/angular-6-458222.png',
            'type' => 'url',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'default_locale',
            'value' => 'en',
            'type' => 'text',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'active_timezone',
            'value' => 'Etc/UTC',
            'type' => 'text',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'facebook',
            'value' => 'https://www.facebook.com',
            'type' => 'text',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'twitter',
            'value' => 'https://twitter.com',
            'type' => 'text',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);
    }
}
