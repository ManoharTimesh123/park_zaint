<?php

namespace Database\Seeders;

use App\Models\Addons;
use App\Models\AddonsOptions;
use Illuminate\Database\Seeder;
use Stripe\StripeClient;

class AddonsoptionsSeeder extends Seeder
{
    private $stripe;

    public function __construct()
    {
        $this->stripe = new StripeClient(config('app.stripe_secret'));
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Addons = Addons::findOrFail(2);
        $strip_price = $this->stripe->prices->create([
            'unit_amount' => 54,
            'currency' => config('app.currency'),
            'product' => $Addons->strip_product_id,
            'nickname' => 'Addons1',
            'metadata' => [
                'product_type' => 'Addon',
            ],
        ]);
        $entryfirst = [
            'name'              => 'Addons1',
            'addons_id'         => 2,
            'strip_price_id'    => $strip_price->id,
            'created_at'        => now(),
            'status'            => true,
            'price'             => 54,
            'updated_at'        => now(),
            'deleted_at'        => null,
        ];
        AddonsOptions::updateOrCreate(['id' => 1], $entryfirst);

        //user  details
        $Addons = Addons::findOrFail(1);
        $strip_price = $this->stripe->prices->create([
            'unit_amount' => 512,
            'currency' => config('app.currency'),
            'product' => $Addons->strip_product_id,
            'nickname' => 'Addons1',
            'metadata' => [
                'product_type' => 'Addon',
            ],
        ]);
        $entrysecond = [
            'name'              => 'Addons_options2',
            'addons_id'          => 1,
            'strip_price_id'    => $strip_price->id,
            'status'            => true,
            'price'             => 512,
            'created_at'        => now(),
            'updated_at'        => now(),
            'deleted_at'        => null,
        ];

        AddonsOptions::updateOrCreate(['id' => 2], $entrysecond);

        //user  details
        $Addons = Addons::findOrFail(2);
        $strip_price = $this->stripe->prices->create([
            'unit_amount' => 124,
            'currency' => config('app.currency'),
            'product' => $Addons->strip_product_id,
            'nickname' => 'Addons1',
            'metadata' => [
                'product_type' => 'Addon',
            ],
        ]);
        //user  details
        $entrythird = [
            'name'              => 'Addons_options3',
            'addons_id'          => 2,
            'status'            => true,
            'strip_price_id'    => $strip_price->id,
            'price'             => 124,
            'created_at'        => now(),
            'updated_at'        => now(),
            'deleted_at'        => null,
        ];

        AddonsOptions::updateOrCreate(['id' => 3], $entrythird);
    }
}
