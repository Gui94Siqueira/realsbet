<?php

namespace Tests\App\Http\Controllers;

use App\Models\Affiliate;
use App\Models\AffiliateCommission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class AffiliateCommissionControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the create method.
     *
     * @return void
     */
    public function test_create_commission_page()
    {
        // Create a dummy affiliate
        $affiliate = Affiliate::factory()->create();

        // Visit the create commission page
        $response = $this->get(route('affiliate_commissions.create', $affiliate->id));

        // Assert the response status and view
        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('affiliate_commissions.create');
        $response->assertViewHas('affiliate');
    }

    /**
     * Test storing a new commission.
     *
     * @return void
     */
    public function test_store_commission()
    {
        $affiliate = Affiliate::factory()->create();
        $data = [
            'value' => 100.00,
            'date' => now()->toDateString(),
        ];
        $response = $this->post(route('affiliate_commissions.store', $affiliate->id), $data);

        $this->assertDatabaseHas('affiliate_commissions', $data);
        $response->assertRedirect(route('affiliate_commissions.show', $affiliate->id));
    }

    /**
     * Test displaying the commissions for an affiliate.
     *
     * @return void
     */
    public function test_show_commissions()
    {
        $affiliate = Affiliate::factory()->create();

        $commission = AffiliateCommission::factory()->create([
            'affiliate_id' => $affiliate->id,
        ]);
        $response = $this->get(route('affiliate_commissions.show', $affiliate->id));
        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('affiliate_commissions.show');
        $response->assertViewHas('affiliate', $affiliate);
        $response->assertViewHas('commissions');
        $response->assertViewHas('commissions', function ($commissions) use ($commission) {
            return $commissions->contains($commission);
        });
    }




    /**
     * Test deleting a commission.
     *
     * @return void
     */
    public function test_destroy_commission()
    {
        $affiliate = Affiliate::factory()->create();
        $commission = AffiliateCommission::factory()->create([
            'affiliate_id' => $affiliate->id,
        ]);

        $response = $this->delete(route('affiliate_commissions.destroy', $commission->id));

        $this->assertDatabaseMissing('affiliate_commissions', ['id' => $commission->id]);
        $response->assertRedirect(route('affiliates.index'));
    }
}
