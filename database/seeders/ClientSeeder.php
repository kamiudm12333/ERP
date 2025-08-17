<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\User;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = User::where('role', 'employee')->get();
        $companies = ['TechCorp', 'Global Solutions', 'Innovation Inc', 'Future Systems', 'Digital Dynamics'];
        $sources = ['Website', 'Referral', 'Cold Call', 'Trade Show', 'Social Media'];

        for ($i = 1; $i <= 10; $i++) {
            Client::create([
                'name' => 'Client ' . $i,
                'email' => 'client' . $i . '@example.com',
                'phone' => '+1-555-' . str_pad(rand(100, 999), 3, '0', STR_PAD_LEFT) . '-' . str_pad(rand(1000, 9999), 4, '0', STR_PAD_LEFT),
                'company' => $companies[array_rand($companies)],
                'position' => ['CEO', 'Manager', 'Director', 'Coordinator', 'Analyst'][array_rand(['CEO', 'Manager', 'Director', 'Coordinator', 'Analyst'])],
                'address' => rand(100, 9999) . ' Business Ave',
                'city' => 'Business City',
                'state' => 'CA',
                'zip_code' => '90210',
                'country' => 'USA',
                'status' => ['active', 'prospect', 'inactive'][array_rand(['active', 'prospect', 'inactive'])],
                'assigned_to' => $employees->random()->id,
                'source' => $sources[array_rand($sources)],
                'last_contact_date' => now()->subDays(rand(1, 30)),
                'next_follow_up' => now()->addDays(rand(1, 14)),
                'notes' => 'Sample client notes for demonstration purposes.',
            ]);
        }
    }
}