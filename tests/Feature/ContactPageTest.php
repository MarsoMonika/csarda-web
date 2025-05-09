<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactPageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_contact_page_loads_successfully()
    {
        $response = $this->get('/elerhetoseg');
        $response->assertStatus(200);
        $response->assertSee('Kecskemét, Kölcsey u. 7, 6000');
    }
}
