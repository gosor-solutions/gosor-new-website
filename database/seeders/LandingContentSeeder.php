<?php

namespace Database\Seeders;

use App\Models\Partner;
use App\Models\Platform;
use App\Models\Portfolio;
use App\Models\Review;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Database\Seeder;

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
        Partner::truncate();

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
        // Platform 1: Edu-Bridge
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
                'en' => collect($en['products']['items']['edubridge']['features'])->map(function ($featureEn) {
                    return ['feature' => $featureEn];
                })->toArray(),
                'ar' => collect($ar['products']['items']['edubridge']['features'])->map(function ($featureAr) {
                    return ['feature' => $featureAr];
                })->toArray(),
            ],
            'order' => 0,
            'is_active' => true,
        ]);

        // Platform 2: HR Management System
        Platform::create([
            'name' => [
                'en' => 'HR Management System',
                'ar' => 'نظام إدارة الموارد البشرية',
            ],
            'description' => [
                'en' => 'A comprehensive HR management system covering the full employee lifecycle — from recruitment to offboarding — with full automation for payroll, leave, and performance.',
                'ar' => 'نظام متكامل لإدارة الموارد البشرية يغطي دورة حياة الموظف بالكامل، من التوظيف حتى المغادرة، مع أتمتة كاملة للرواتب والإجازات والأداء.',
            ],
            'features' => [
                'en' => [
                    ['feature' => 'Employee Profile & Records Management'],
                    ['feature' => 'Automated Payroll & Benefits Calculation'],
                    ['feature' => 'Leave, Attendance & Shift Tracking'],
                    ['feature' => 'Performance Evaluation & KPIs'],
                ],
                'ar' => [
                    ['feature' => 'إدارة بيانات وملفات الموظفين'],
                    ['feature' => 'أتمتة مسيرات الرواتب والمستحقات'],
                    ['feature' => 'إدارة الإجازات والحضور والانصراف'],
                    ['feature' => 'تقييم الأداء ومؤشرات الإنتاجية'],
                ],
            ],
            'order' => 1,
            'is_active' => true,
        ]);

        // 3. Seed Portfolios
        $portfolioImages = [
            'project1' => 'portfolio/ecommerce.jpg',
            'project2' => 'portfolio/education.jpg',
            'project3' => 'portfolio/saas.jpg',
        ];
        $index = 0;
        foreach ($portfolioImages as $key => $img) {
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
                'image' => $img,
                'link' => null,
                'order' => $index++,
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
            ['key' => 'whatsapp', 'value' => '+201035976592', 'type' => 'text'],
        ];

        foreach ($settings as $setting) {
            Setting::create([
                'key' => $setting['key'],
                'value' => $setting['value'],
                'type' => $setting['type'],
            ]);
        }

        // 6. Seed Partners
        $partners = [
            ['name' => ['en' => 'Al-Aadel', 'ar' => 'شركة العادل'], 'logo' => 'partners/al-Aadel.webp'],
            ['name' => ['en' => 'British Foundation', 'ar' => 'المؤسسة البريطانية'], 'logo' => 'partners/british foundation.png'],
            ['name' => ['en' => 'Dusor', 'ar' => 'جسور'], 'logo' => 'partners/dusor.jpeg'],
            ['name' => ['en' => 'E-Care', 'ar' => 'إي كير'], 'logo' => 'partners/ecare.webp'],
            ['name' => ['en' => 'Englivision', 'ar' => 'إنجليفيجن'], 'logo' => 'partners/englivision.webp'],
            ['name' => ['en' => 'EraaSoft', 'ar' => 'إيراسوفت'], 'logo' => 'partners/EraaSoft.png'],
            ['name' => ['en' => 'Fulfly', 'ar' => 'فولفلاي'], 'logo' => 'partners/fulfly.jpg'],
            ['name' => ['en' => 'Kenaz', 'ar' => 'كناز'], 'logo' => 'partners/kenaz.png'],
            ['name' => ['en' => 'Terrace', 'ar' => 'تيراس'], 'logo' => 'partners/terrace.jpeg'],
        ];

        foreach ($partners as $index => $partnerData) {
            Partner::create([
                'name' => $partnerData['name'],
                'logo' => $partnerData['logo'],
                'is_active' => true,
                'order' => $index,
            ]);
        }
    }
}
