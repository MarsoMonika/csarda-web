<?php

namespace Tests\Feature;

use App\Models\WeeklyOffer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WeeklyOfferTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_weekly_offer_page_displays_offers()
    {

        WeeklyOffer::factory()->create([
            'letter' => 'A',
            'category' => 'leves',
            'description' => 'Húsleves',
        ]);

        $response = $this->get('/hetiaj');
        $response->assertStatus(200);
        $response->assertSee('Húsleves');
    }
}
