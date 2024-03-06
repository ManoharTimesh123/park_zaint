<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdminUser = [
            'id'                => 1,
            'username'          => 'superadmin',
            'name'              => 'Super Admin',
            'email'             => 'park.giants115@yopmail.com',
            'email_verified_at' => null,
            'password'          => 'Admin@123', //i.e Admin@123
            'phone'             => '0123456789',
            'profile_pic'       => null,
            'company_name'      =>'Exiliensoft',
            'account_type'      => 'Individual',
            'status'            => '1',
            'remember_token'    => null,
            'created_at'        => now(),
            'updated_at'        => now(),
            'deleted_at'        => null,
        ];
        $condition = [
            'email' => 'park.giants115@yopmail.com',
        ];

        // $superAdmin = User::create($superAdminUser);
        $superAdmin = User::updateOrCreate($condition, $superAdminUser);

        $superAdmin->assignRole('Super Admin');
        //user  details
        $adminUser = [
            'id'                => 2,
            'username'          => 'admin',
            'name'              => 'Admin',
            'email'             => 'park.giants116@yopmail.com',
            'email_verified_at' => null,
            'password'          => 'Admin@123', //i.e Admin@123
            'phone'             => '0123456789',
            'profile_pic'       => null,
            'company_name'      =>'Exiliensoft',
            'account_type'      => 'Individual',
            'status'            => '1',
            'remember_token'    => null,
            'created_at'        => now(),
            'updated_at'        => now(),
            'deleted_at'        => null,
        ];
        $condition = [
            'email' => 'park.giants116@yopmail.com',
        ];

        // $admin = User::create($adminUser);
        $admin = User::updateOrCreate($condition, $adminUser);

        $admin->assignRole('Admin');

        //user  details
        $customerUser = [
            'id'                => 3,
            'username'          => 'customer',
            'name'              => 'Customer 1',
            'email'             => 'park.giants117@yopmail.com',
            'email_verified_at' => null,
            'password'          => 'Admin@123', //i.e Admin@123
            'phone'             => '0123456789',
            'profile_pic'       => null,
            'company_name'      =>'Exiliensoft',
            'account_type'      => 'Individual',
            'status'            => '1',
            'remember_token'    => null,
            'created_at'        => now(),
            'updated_at'        => now(),
            'deleted_at'        => null,
        ];
        $condition = [
            'email' => 'park.giants117@yopmail.com',
        ];

        // $customer = User::create($customerUser);
        $customer = User::updateOrCreate($condition, $customerUser);

        $customer->assignRole('Customer');
    }
}
