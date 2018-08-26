<?php
/**
 * Created by PhpStorm.
 * User: piotrgora
 * Date: 11.08.2018
 * Time: 09:35
 */

namespace Modules\Carousel\Database\Seeders;


use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Modules\User\Model\User;

class CarouselGroupDatabaseSeeder extends Seeder
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

        foreach (range(1,3) as $index) {
            DB::table('carousel_groups')->insert([
                'user_id' => $user->id,
                'name' => $faker->text(20),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}