<?php

namespace Modules\Carousel\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Modules\User\Model\User;

class CarouselDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $faker = Faker::create();
        $user = User::where('email','admin@gmail.com')->first();

        foreach (range(1,20) as $index) {
            DB::table('carousels')->insert([
                'user_id' => $user->id,
                'name' => $faker->text(20),
                'alt' => $faker->text(20),
                'position' => $faker->numberBetween(1,5),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }

    }
}
