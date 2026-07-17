<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;

class PropertySeeder extends Seeder
{
    public function run(): void
    {
        Property::create([
            'title' => 'Al Olaya Premium Suite',
            'city' => 'Riyadh',
            'type' => 'Apartment',
            'purpose' => 'Book Now',
            'price' => 450,
            'host_name' => 'Faisal Al-Rashid',
            'host_phone' => '+966500000001',
            'tourism_license_number' => 'TL-10023',
            'status' => 'published',
        ]);

        Property::create([
            'title' => 'Red Sea Corniche Villa',
            'city' => 'Jeddah',
            'type' => 'Villa',
            'purpose' => 'Book Now',
            'price' => 1200,
            'host_name' => 'Layla Hassan',
            'host_phone' => '+966500000002',
            'tourism_license_number' => 'TL-10098',
            'status' => 'published',
        ]);

        Property::create([
            'title' => 'Diriyah Heritage Chalet',
            'city' => 'Riyadh',
            'type' => 'Chalet',
            'purpose' => 'Book Now',
            'price' => 680,
            'host_name' => 'Omar Nasser',
            'host_phone' => '+966500000003',
            'tourism_license_number' => null,
            'status' => 'pending_review',
        ]);

        Property::create([
            'title' => 'Abha Mountain Camp',
            'city' => 'Abha',
            'type' => 'Camp',
            'purpose' => 'Book Now',
            'price' => 320,
            'host_name' => 'Sara Al-Ghamdi',
            'host_phone' => '+966500000004',
            'tourism_license_number' => null,
            'status' => 'pending_review',
        ]);

        Property::create([
            'title' => 'Boulevard Luxury Apartment',
            'city' => 'Riyadh',
            'type' => 'Apartment',
            'purpose' => 'Naqera Lease',
            'price' => 8500,
            'host_name' => 'Khalid Youssef',
            'host_phone' => '+966500000005',
            'tourism_license_number' => 'TL-10077',
            'status' => 'rejected',
        ]);
    }
}