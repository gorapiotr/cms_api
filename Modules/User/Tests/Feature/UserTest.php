<?php

namespace Modules\User\Tests;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ReportSchemesUser
{
    public $list = [
        'data' => [
            '*' => [
                'id',
                'name',
                'email'
            ]
        ]
    ];

    public $show = [
        'data' => [
            'id',
            'name',
            'email'
        ]
    ];
}


class UserTest extends TestCase
{
    public $schemes = null;

    public $testing_url = 'api/user/';

    public function setUp()
    {
        $this->schemes = new ReportSchemesUser();
        parent::setUp();
    }


    public function testUser()
    {
        $this->assertTrue(true);
    }

    public function testGetUsersList()
    {
        $response = $this->withoutMiddleware()
            ->json('GET', $this->testing_url.'list' )
            ->assertStatus(200)
            ->assertJsonStructure($this->schemes->list)
            ->decodeResponseJson('data');

        $this->assertEquals(1, $response[0]['id'], 'Id should be 1.');
        $this->assertEquals('admin', $response[0]['name'], 'Name should be admin.');
        $this->assertEquals('admin@gmail.com', $response[0]['email'], 'Email should be admin@admin.com.');

        $this->assertEquals(3, $response[2]['id'], 'Id should be 3.');
        $this->assertEquals('mike', $response[2]['name'], 'Name should be mike.');
        $this->assertEquals('mike@gmail.com', $response[2]['email'], 'Email should be mike@gmail.com.');
    }

    public function testGetUserById()
    {
        $user_id = 3;

        $response = $this->withoutMiddleware()
            ->json('GET', $this->testing_url.$user_id )
            ->assertStatus(200)
            ->assertJsonStructure($this->schemes->show)
            ->decodeResponseJson('data');

        $this->assertEquals(3, $response['id'], 'Id should be 3.');
        $this->assertEquals('mike', $response['name'], 'Name should be mike.');
        $this->assertEquals('mike@gmail.com', $response['email'], 'Email should be mike@gmail.com.');

    }

    public function testGetAuthUserData()
    {
        /* get authorization token */
        $token = \JWTAuth::attempt([
            'email' => 'admin@gmail.com',
            'password' => 'adminadmin'
        ]);


        $response = $this->withoutMiddleware()
            ->json(
            'GET',
            $this->testing_url,
            [],
            ['Authorization' => 'Bearer '.$token ]
        )
            ->assertStatus(200)
            ->assertJsonStructure($this->schemes->show)
            ->decodeResponseJson('data');

        $this->assertEquals(1, $response['id'], 'Id should be 1.');
        $this->assertEquals('admin', $response['name'], 'Name should be admin.');
        $this->assertEquals('admin@gmail.com', $response['email'], 'Email should be admin@gmail.com.');

        $this->withoutMiddleware()
            ->json(
                'POST',
                'api/logout',
                [],
                ['Authorization' => 'Bearer '.$token ]
            );

        $this->assertEquals(null, Auth::id(), 'Id should be null.');

    }

    public function testUpdateUserData()
    {
        /* get authorization token */
        $token = \JWTAuth::attempt([
            'email' => 'admin@gmail.com',
            'password' => 'adminadmin'
        ]);

        $response = $this->withoutMiddleware()
            ->json(
                'PUT',
                $this->testing_url,
                ['name' => 'john'],
                ['Authorization' => 'Bearer '.$token ]
            )->assertStatus(200)
            ->assertJsonStructure($this->schemes->show)
            ->decodeResponseJson('data');


        $this->assertEquals('john', $response['name'], 'Name should be john.');

        $response = $this->withoutMiddleware()
            ->json(
                'PUT',
                $this->testing_url,
                ['name' => 'admin'],
                ['Authorization' => 'Bearer '.$token ]
            )->assertStatus(200)
            ->assertJsonStructure($this->schemes->show)
            ->decodeResponseJson('data');

        $this->assertEquals('admin', $response['name'], 'Name should be admin.');

        $this->withoutMiddleware()
            ->json(
                'POST',
                'api/logout',
                [],
                ['Authorization' => 'Bearer '.$token ]
            );

        $this->assertEquals(null, Auth::id(), 'Id should be null.');



    }


}