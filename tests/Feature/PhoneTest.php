<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Entities\Phone;

class PhoneTest extends TestCase
{
    protected $user;

    protected function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }

    public function testIndex()
    {
        $response = $this->actingAs($this->user)->get('/phones');
        $response->assertOk();
    }

    public function createEdit()
    {
        $response = $this->actingAs($this->user)->get('/phones/create');
        $response->assertOk();
    }
}
