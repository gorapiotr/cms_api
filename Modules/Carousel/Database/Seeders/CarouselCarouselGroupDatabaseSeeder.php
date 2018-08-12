<?php

namespace Modules\Carousel\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CarouselCarouselGroupDatabaseSeeder extends Seeder
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

        foreach (range(1, 3) as $value) {
            foreach (range(1,5) as $index) {
                DB::table('carousel_carousel_group')->insert([
                    'carousel_group_id' => $value,
                    'carousel_id' => $index,
                    'active' => $faker->boolean
                ]);
            }
        }

    }
}
