<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            //Permissions
            LaratrustSeeder::class,
            //User
            Modules\User\Database\Seeders\UserDatabaseSeeder::class,
            //Carousel
            Modules\Carousel\Database\Seeders\CarouselGroupDatabaseSeeder::class,
            Modules\Carousel\Database\Seeders\CarouselDatabaseSeeder::class,
            Modules\Carousel\Database\Seeders\CarouselCarouselGroupDatabaseSeeder::class,
            //Settings
            Modules\Settings\Database\Seeders\SettingsDatabaseSeeder::class,
            //Post
            Modules\Post\Database\Seeders\PostDatabaseSeeder::class
        ]);
    }
}
