<?php
/**
 * Created by PhpStorm.
 * User: piotrgora
 * Date: 11.08.2018
 * Time: 22:52
 */

namespace Modules\Carousel\Tests;

use Illuminate\Support\Facades\DB;
use Modules\Carousel\Model\Carousel;
use Modules\Carousel\Model\CarouselGroup;
use Tests\TestCase;
use Faker\Factory as Faker;

class ReportSchemesCarouselGroup
{
    public $list = [
        'data' => [
            '*' => [
                'id',
                'name'
            ]
        ],
        'success'
    ];

    public $show = [
        'data' => [
            '*' => [
                'id',
                'user_id',
                'name',
                'alt',
                'position'
            ]
        ],
        'success'
    ];
}

class CarouselGroupTest extends TestCase
{
    public $schemes = null;

    public $testing_url = 'api/carousel-group/';

    public function setUp()
    {
        $this->schemes = new ReportSchemesCarouselGroup();
        parent::setUp();
    }

    public function testGetCarouselGroupList()
    {
        $count =  DB::table('carousel_groups')->count();

        $response = $this->withoutMiddleware()
            ->json('GET', $this->testing_url)
            ->assertStatus(200)
            ->assertJsonStructure($this->schemes->list)
            ->decodeResponseJson('data');

        $this->assertEquals($count, count($response));
    }

    public function testGetCarouselGroupById()
    {
        $carousel = CarouselGroup::inRandomOrder()
            ->first();

        $count = DB::table('carousel_carousel_group')
            ->where('carousel_group_id', $carousel->id)
            ->count();

        $response = $this->withoutMiddleware()
            ->json('GET', $this->testing_url.$carousel->id )
            ->assertStatus(200)
            ->assertJsonStructure($this->schemes->show)
            ->decodeResponseJson('data');

        $this->assertEquals($count, count($response));

    }

    public function testUpdateCarouselGroup()
    {
        $carousel = CarouselGroup::inRandomOrder()
            ->first();

        $faker = Faker::create();

        $user = [
            'email' => 'admin@gmail.com',
            'password' => 'adminadmin'
        ];

        /* get authorization token */
        $token = \JWTAuth::attempt([
            'email' => $user['email'],
            'password' => $user['password']
        ]);

        $car = [
            [
                'id' => 1,
                'user_id' => 1,
                'name' => $faker->text(20),
                'alt' => $faker->text(20),
                'active' => 1,
                'position' => $faker->numberBetween(1,5)
            ],
            [
                'id' => 2,
                'user_id' => 1,
                'name' => $faker->text(20),
                'alt' => $faker->text(20),
                'active' => 0,
                'position' => $faker->numberBetween(1,5)
            ]
        ];

        $response = $this->withoutMiddleware()
            ->json(
                'PUT',
                $this->testing_url.$carousel->id,
                    ['carousels' => $car],
                    ['Authorization' => 'Bearer '.$token ]
            )->assertStatus(200)
            ->assertJsonStructure($this->schemes->show)
            ->decodeResponseJson('data');

    }



}