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
            Modules\User\Database\Seeders\UserDatabaseSeeder::class,
            Modules\Carousel\Database\Seeders\CarouselGroupDatabaseSeeder::class,
            Modules\Carousel\Database\Seeders\CarouselDatabaseSeeder::class,
            Modules\Carousel\Database\Seeders\CarouselCarouselGroupDatabaseSeeder::class
        ]);
    }
}
