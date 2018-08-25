<?php
namespace Modules\Carousel\Tests;

use Illuminate\Support\Facades\DB;
use Modules\Carousel\Model\Carousel;
use Tests\TestCase;
use Faker\Factory as Faker;

class ReportSchemesCarousel
{
    public $list = [
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

    public $show = [
        'data' => [
            'id',
            'user_id',
            'name',
            'alt',
            'position'
        ],
        'success'
    ];
}


class CarouselTest extends TestCase
{
    public $schemes = null;

    public $testing_url = 'api/carousel/';

    public function setUp()
    {
        $this->schemes = new ReportSchemesCarousel();
        parent::setUp();
    }

    public function testGetCarouselsList()
    {
        $count =  DB::table('carousels')->count();

        $response = $this->withoutMiddleware()
            ->json('GET', $this->testing_url)
            ->assertStatus(200)
            ->assertJsonStructure($this->schemes->list)
            ->decodeResponseJson('data');

        $this->assertEquals($count, count($response));
    }

    public function testGetCarouselById()
    {
        $carousel = Carousel::inRandomOrder()
            ->first();

        $response = $this->withoutMiddleware()
            ->json('GET', $this->testing_url.$carousel->id )
            ->assertStatus(200)
            ->assertJsonStructure($this->schemes->show)
            ->decodeResponseJson('data');

        $this->assertEquals($carousel->id, $response['id'], 'Id should be '.$carousel->id);
        $this->assertEquals($carousel->user_id, $response['user_id'], 'User_id should be '.$carousel->user_id);
        $this->assertEquals($carousel->name, $response['name'], 'Name should be '.$carousel->name);
        $this->assertEquals($carousel->alt, $response['alt'], 'Name should be '.$carousel->alt);
        $this->assertEquals($carousel->position, $response['position'], 'Position should be '.$carousel->position);

    }

    public function createNewCarouselTest()
    {
        /** TODO
         * create new carousel test
         */
    }

    public function updateCarouselTest()
    {
        $carousel = Carousel::inRandomOrder()
            ->first();
        $faker = Faker::create();

        $carousel->alt = $faker->text(20);

        $response = $this->withoutMiddleware()
            ->json(
                'PUT',
                $this->testing_url,
                [$carousel]
            )->assertStatus(200)
            ->assertJsonStructure($this->schemes->show)
            ->decodeResponseJson('data');

        $this->assertEquals($carousel->alt, $response['alt'], 'Name should be '.$carousel->alt);

    }

}