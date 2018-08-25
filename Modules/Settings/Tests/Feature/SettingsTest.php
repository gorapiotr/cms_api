<?php
/**
 * Created by PhpStorm.
 * User: piotrgora
 * Date: 17.08.2018
 * Time: 07:07
 */

namespace Modules\Settings\Tests\Feature;

use Illuminate\Support\Facades\DB;
use Modules\Settings\Model\Settings;
use Tests\TestCase;
use Faker\Factory as Faker;

class ReportSchemesSettings
{
    public $list = [
        'data' => [
            '*' => [
                'id',
                'key',
                'value',
                'created_at',
                'created_by' => [
                    'id',
                    'name',
                    'email'
                ],
                'updated_at',
                'updated_by' => [
                    'id',
                    'name',
                    'email'
                ]
            ]
        ]
    ];

    public $show = [
        'data' => [
            'id',
            'key',
            'value',
            'created_at',
            'created_by' => [
                'id',
                'name',
                'email'
            ],
            'updated_at',
            'updated_by' => [
                'id',
                'name',
                'email'
            ]
        ]
    ];
}


class SettingsTest extends TestCase
{
    public $schemes = null;

    public $testing_url = 'api/settings/';

    public function setUp()
    {
        $this->schemes = new ReportSchemesSettings();
        parent::setUp();
    }

    public function testGetSettingsList()
    {
        $count =  DB::table('settings')->count();

        $response = $this->withoutMiddleware()
            ->json('GET', $this->testing_url)
            ->assertStatus(200)
            ->assertJsonStructure($this->schemes->list)
            ->decodeResponseJson('data');

        $this->assertEquals($count, count($response));
    }

    public function testUpdateSetting()
    {
        $setting = Settings::inRandomOrder()
            ->first();
        $faker = Faker::create();
        $response = $this->withoutMiddleware()
            ->json(
                'PUT',
                $this->testing_url.$setting->id,
                ['key'=> $setting->key,
                 'value'=> $setting->value
                ]
            )->dump();
            //->assertStatus(200)
            //->assertJsonStructure($this->schemes->show)
            //->decodeResponseJson('data');

    }

}