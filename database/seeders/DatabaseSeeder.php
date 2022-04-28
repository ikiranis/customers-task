<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private $customers = [
        ['name' => 'John Doe', 'email' => 'john.doe@example.com'],
        ['name' => 'Nick Patel', 'email' => 'nick.patel@example.com'],
        ['name' => 'Jane Quinn', 'email' => 'jane.quinn@example.com'],
        ['name' => 'Paul Reily', 'email' => 'paul.reily@example.com']
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->customers as $customer) {
            Customer::factory()->create($customer);
        }
    }
}
