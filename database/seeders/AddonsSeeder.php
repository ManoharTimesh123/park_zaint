<?php

namespace Database\Seeders;

use App\Models\Addons;
use Illuminate\Database\Seeder;
use Stripe\StripeClient;

class AddonsSeeder extends Seeder
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
        $product_id_first = $this->stripe->products->create([
            'name' => 'code1',
            'description' => 'park.giants115@yopmail.com',
            'active' => true,
          ]);
        $entryfirst = [
            'name'              => 'Addons1',
            'code'              => 'code1',
            'description'       => 'park.giants115@yopmail.com',
            'strip_product_id'  => $product_id_first->id, //i.e Admin@123
            'created_at'        => now(),
            'status'            => true,
            'updated_at'        => now(),
            'deleted_at'        => null,
        ];
        Addons::updateOrCreate(['id' => 1], $entryfirst);

        $product_id_second = $this->stripe->products->create([
            'name' => 'Addons2',
            'description' => 'park.giants115@yopmail.com',
            'active' => true,
          ]);
        //user  details
        $entrysecond = [
            'name'              => 'Addons2',
            'code'              => 'code2',
            'description'       => 'park.giants116@yopmail.com',
            'strip_product_id'  => $product_id_second->id, //i.e Admin@123
            'status'            => true,
            'created_at'        => now(),
            'updated_at'        => now(),
            'deleted_at'        => null,
        ];

        Addons::updateOrCreate(['id' => 2], $entrysecond);

        $product_id_third = $this->stripe->products->create([
            'name' => 'Addons3',
            'description' => 'park.giants115@yopmail.com',
            'active' => true,
          ]);
        //user  details
        $entrythird = [
            'name'              => 'Addons3',
            'code'              => 'code3',
            'description'       => 'park.giants117@yopmail.com',
            'strip_product_id'  => $product_id_third->id, //i.e Admin@123
            'status'            => true,
            'created_at'        => now(),
            'updated_at'        => now(),
            'deleted_at'        => null,
        ];

        Addons::updateOrCreate(['id' => 3], $entrythird);
    }
}
