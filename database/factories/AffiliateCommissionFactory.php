<?php

namespace Database\Factories;

use App\Models\AffiliateCommission;
use App\Models\Affiliate;
use Illuminate\Database\Eloquent\Factories\Factory;

class AffiliateCommissionFactory extends Factory
{
    protected $model = AffiliateCommission::class;

    public function definition()
    {
        return [
            'affiliate_id' => Affiliate::factory(),
            'value' => $this->faker->randomFloat(2, 10),
            'date' => $this->faker->date(),
        ];
    }
}
