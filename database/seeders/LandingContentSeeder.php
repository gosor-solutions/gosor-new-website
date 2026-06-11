<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Platform;
use App\Models\Portfolio;
use App\Models\Review;
use App\Models\Setting;

class LandingContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $en = require base_path('lang/en/landing.php');
        $ar = require base_path('lang/ar/landing.php');


        Service::truncate();
        Platform::truncate();
        Portfolio::truncate();
        Review::truncate();
        Setting::truncate();


        // 1. Seed Services
        $servicesKeys = ['web', 'mobile', 'ecommerce', 'education', 'erp_crm', 'ai'];
        foreach ($servicesKeys as $index => $key) {
            Service::create([
                'name' => [
                    'en' => $en['services']['items'][$key]['title'],
                    'ar' => $ar['services']['items'][$key]['title'],
                ],
                'description' => [
                    'en' => $en['services']['items'][$key]['description'],
                    'ar' => $ar['services']['items'][$key]['description'],
                ],
                'order' => $index,
                'is_active' => true,
            ]);
        }

        // 2. Seed Platforms
        Platform::create([
            'name' => [
                'en' => $en['products']['items']['edubridge']['title'],
                'ar' => $ar['products']['items']['edubridge']['title'],
            ],
            'description' => [
                'en' => $en['products']['items']['edubridge']['description'],
                'ar' => $ar['products']['items']['edubridge']['description'],
            ],
            'features' => [
                'en' => collect($en['products']['items']['edubridge']['features'])->map(function($featureEn) {
                    return ['feature' => $featureEn];
                })->toArray(),
                'ar' => collect($ar['products']['items']['edubridge']['features'])->map(function($featureAr) {
                    return ['feature' => $featureAr];
                })->toArray(),
            ],
            'order' => 0,
            'is_active' => true,
        ]);

        // 3. Seed Portfolios
        $portfolioKeys = ['project1', 'project2', 'project3'];
        foreach ($portfolioKeys as $index => $key) {
            Portfolio::create([
                'name' => [
                    'en' => $en['portfolio']['items'][$key]['title'],
                    'ar' => $ar['portfolio']['items'][$key]['title'],
                ],
                'description' => [
                    'en' => $en['portfolio']['items'][$key]['description'],
                    'ar' => $ar['portfolio']['items'][$key]['description'],
                ],
                'badge' => [
                    'en' => $en['portfolio']['items'][$key]['tag'],
                    'ar' => $ar['portfolio']['items'][$key]['tag'],
                ],
                'image' => 'portfolio/placeholder.jpg', // You may need to copy a real image to storage/app/public/portfolio
                'link' => null,
                'order' => $index,
                'is_active' => true,
            ]);
        }

        // 4. Seed Reviews
        Review::create([
            'name' => [
                'en' => $en['testimonials']['items']['test1']['author'],
                'ar' => $ar['testimonials']['items']['test1']['author'],
            ],
            'job_position' => [
                'en' => $en['testimonials']['items']['test1']['role'],
                'ar' => $ar['testimonials']['items']['test1']['role'],
            ],
            'content' => [
                'en' => $en['testimonials']['items']['test1']['quote'],
                'ar' => $ar['testimonials']['items']['test1']['quote'],
            ],
            'is_active' => true,
        ]);

        // 5. Seed Settings
        $settings = [
            ['key' => 'location', 'value' => $en['contact']['details']['location_val'], 'type' => 'text'],
            ['key' => 'phone', 'value' => $en['contact']['details']['phone_val'], 'type' => 'tel'],
            ['key' => 'email', 'value' => 'info@gosorsolutions.com', 'type' => 'email'],
            ['key' => 'facebook', 'value' => '#', 'type' => 'url'],
            ['key' => 'linkedin', 'value' => '#', 'type' => 'url'],
        ];

        foreach ($settings as $setting) {
            Setting::create([
                'key' => $setting['key'],
                'value' => $setting['value'],
                'type' => $setting['type'],
            ]);
        }
    }
}
