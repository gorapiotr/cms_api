<?php

namespace Modules\Carousel\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CarouselDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** TODO
         * timestamps();
         */

        Model::unguard();
        $faker = Faker::create();
        foreach (range(1,20) as $index) {
            DB::table('carousels')->insert([
                'user_id' => 1,
                'carousel_group_id' => $faker->numberBetween(1,3),
                'name' => $faker->text(20),
                'alt' => $faker->text(20),
                'position' => $faker->numberBetween(1,5),
                'active' => $faker->boolean
            ]);
        }

    }
}