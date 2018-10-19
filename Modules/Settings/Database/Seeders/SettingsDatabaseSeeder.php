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
                'description' => 'title',
                'type' => 'text',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_by' => 1,
            ]);

        DB::table('settings')->insert([
            'key' => 'description',
            'value' => 'Thoughts, stories and ideas.',
            'description' => 'description',
            'type' => 'text',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'logo',
            'value' => 'https://casper.ghost.org/v1.0.0/images/ghost-logo.svg',
            'description' => 'logo',
            'type' => 'url',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'admin_logo',
            'value' => 'https://firebasestorage.googleapis.com/v0/b/cmsimage-9ec21.appspot.com/o/blog_page.svg?alt=media&token=182a9143-4b17-4477-b06e-9ca6b98cbffc',
            'description' => 'admin panel logo',
            'type' => 'url',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'cover_image',
            'value' => 'https://casper.ghost.org/v1.0.0/images/blog-cover.jpg',
            'description' => 'cover image',
            'type' => 'url',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'icon',
            'value' => 'https://cdn.iconscout.com/icon/free/png-256/angular-6-458222.png',
            'description' => 'icon',
            'type' => 'url',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'default_locale',
            'description' => 'default locale',
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
            'description' => 'time zone',
            'type' => 'text',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'facebook',
            'value' => 'https://www.facebook.com',
            'description' => 'facebook',
            'type' => 'text',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'active_fb',
            'description' => 'show facebook icon',
            'value' => 'true',
            'type' => 'text',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'twitter',
            'value' => 'https://twitter.com',
            'description' => 'twitter',
            'type' => 'text',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'active_tw',
            'value' => 'true',
            'description' => 'show twitter icon',
            'type' => 'text',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'youtube',
            'value' => 'https://youtube.com',
            'description' => 'youtube',
            'type' => 'text',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'active_yt',
            'value' => 'true',
            'description' => 'show youtube icon',
            'type' => 'text',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        //MENU ITEMS

        DB::table('settings')->insert([
            'key' => 'home_menu_item',
            'value' => 'Main page',
            'description' => 'Main page',
            'type' => 'text',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'home_menu_item_slug',
            'value' => '',
            'description' => 'Main page slug',
            'type' => 'text',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'active_home_menu_item',
            'value' => 'true',
            'description' => 'Show home item',
            'type' => 'text',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'about_menu_item',
            'value' => 'About page',
            'description' => 'About page',
            'type' => 'text',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'about_menu_item_slug',
            'value' => '',
            'description' => 'About page slug',
            'type' => 'text',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'active_about_menu_item',
            'value' => 'true',
            'description' => 'Show about item',
            'type' => 'text',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'contact_menu_item',
            'value' => 'Contact page',
            'description' => 'Contact page',
            'type' => 'text',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'contact_menu_item_slug',
            'value' => '',
            'description' => 'Contact page slug',
            'type' => 'text',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);

        DB::table('settings')->insert([
            'key' => 'active_contact_menu_item',
            'value' => 'true',
            'description' => 'Show contact item',
            'type' => 'text',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => 1,
        ]);
    }
}
