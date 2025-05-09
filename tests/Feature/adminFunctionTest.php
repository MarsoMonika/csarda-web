<?php

namespace Tests\Feature;

use App\Http\Middleware\AdminAuth;
use App\Models\WeeklyOffer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class adminFunctionTest extends TestCase
{
    use RefreshDatabase;
    public function test_admin_can_update_meta()
    {
        $this->withoutMiddleware(AdminAuth::class);

        $response = $this->post('/admin/meta', [
            'text' => 'Ünnep miatt zárva',
            'validity' => '2025. aug. 20.',
        ]);

        $response->assertRedirect('/admin');
        $this->assertDatabaseHas('weekly_offer_meta', [
            'text' => 'Ünnep miatt zárva',
            'validity' => '2025. aug. 20.',
        ]);
}
    public function test_admin_can_add_offer()
    {
        $this->withoutMiddleware();

        $response = $this->post('/admin/offer', [
            'letter' => 'A',
            'category' => 'leves',
            'description' => 'Tanyasi tyúkhúsleves',
        ]);

        $response->assertRedirect('/admin');
        $this->assertDatabaseHas('weekly_offers', [
            'letter' => 'A',
            'category' => 'leves',
            'description' => 'Tanyasi tyúkhúsleves',
        ]);
    }

    public function test_admin_can_delete_offer()
    {
        $this->withoutMiddleware();

        $offer = WeeklyOffer::create([
            'letter' => 'B',
            'category' => 'főétel',
            'description' => 'Rántott hús burgonyával',
        ]);

        $response = $this->delete("/admin/offer/{$offer->id}");
        $response->assertRedirect('/admin');

        $this->assertDatabaseMissing('weekly_offers', [
            'id' => $offer->id,
        ]);
    }

    public function test_invalid_offer_data_is_rejected()
    {
        $this->withoutMiddleware();

        $response = $this->post('/admin/offer', [
            'letter' => '',
            'category' => '',
            'description' => '',
        ]);

        $response->assertSessionHasErrors(['letter', 'category', 'description']);
    }

}
