<?php

namespace Database\Seeders;

use App\Models\Test;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Test::create([
            'name' => 'Abu-Bakar',
            'email' => 'test@test.com',
            'state' => 'Test',
            'phone_no' => '0350-1235621',
        ]);
    }
}
