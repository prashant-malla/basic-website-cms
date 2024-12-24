<?php

namespace Database\Seeders;

use App\Models\Admin\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            'title' => 'Example Pvt. Ltd.',
            'message' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magnam explicabo magni odio corrupti.',
            'address' => 'Kathmandu, Nepal',
            'phone' => '+977 98',
            'email' => 'info@example.com',

            'google_map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d...',

            'facebook' => 'https://facebook.com/prashantmalla62',
            'twitter' => 'https://twitter.com/prashantmalla62',
        ];

        foreach ($settings as $key => $value) {
            Setting::create([
                'key' => $key,
                'value' => $value,
            ]);
        }
    }
}
