<?php

namespace Modules\User\Tests;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\User\Model\User;
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
       $count =  DB::table('users')->count();

        $response = $this->withoutMiddleware()
            ->json('GET', $this->testing_url.'list' )
            ->assertStatus(200)
            ->assertJsonStructure($this->schemes->list)
            ->decodeResponseJson('data');

        $this->assertEquals($count, count($response));
    }

    public function testGetUserById()
    {
        $user = User::inRandomOrder()
            ->first();

        $response = $this->withoutMiddleware()
            ->json('GET', $this->testing_url.$user->id )
            ->assertStatus(200)
            ->assertJsonStructure($this->schemes->show)
            ->decodeResponseJson('data');

        $this->assertEquals($user->id, $response['id'], 'Id should be '.$user->id);
        $this->assertEquals($user->name, $response['name'], 'Name should be '.$user->name);
        $this->assertEquals($user->email, $response['email'], 'Email should be '.$user->email);

    }

    public function testGetAuthUserData()
    {

        $user = [
            'email' => 'admin@gmail.com',
            'password' => 'adminadmin'
        ];

        /* get authorization token */
        $token = \JWTAuth::attempt([
            'email' => $user['email'],
            'password' => $user['password']
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

        $this->assertEquals($user['email'], $response['email'], 'Email should be '.$user['email']);

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