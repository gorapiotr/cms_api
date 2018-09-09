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
use Modules\User\Model\User;
use Tests\TestCase;
use Faker\Factory as Faker;
use Tymon\JWTAuth\Facades\JWTAuth;

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
    public $schemes;
    public $testing_url = 'api/settings/';
    public $user;
    public $token;
    public $setting;

    public function setUp()
    {
        $this->refreshApplication();
        $this->schemes = new ReportSchemesSettings();
        $this->user = factory(\Modules\User\Model\User::class)->create()->attachRole('superadministrator');
        $this->setting = factory(\Modules\Settings\Model\Settings::class)->create();
        $this->token = JWTAuth::fromUser($this->user);
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
        $this->withoutMiddleware()
            ->json(
                'PUT',
                $this->testing_url.$this->setting->id,
               $this->setting->toArray(),
                ['Authorization' => 'Bearer '.$this->token ]
            )->assertStatus(200)
            ->assertJsonStructure($this->schemes->show)
            ->decodeResponseJson('data');
    }

}