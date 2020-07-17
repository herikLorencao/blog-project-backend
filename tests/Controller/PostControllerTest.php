<?php


namespace Controller;


use App\Admin;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use TestCase;

class PostControllerTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function authenticateRequest()
    {
        $user = factory(Admin::class)->make();
        $this->actingAs($user);
    }

    public function testAdmin()
    {
        $this->authenticateRequest();
        $response = $this->call('GET', '/api/admins');
        $this->assertEquals(200, $response->status());
    }

    public function testTrue()
    {
        $this->assertEquals(true, true);
    }
}
