<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;
use App\Models\LandingHero;
use App\Models\DietProgram;
use App\Models\DietBenefit;
use App\Models\DietMenu;
use App\Models\CustomerTestimonial;
use App\Models\Faq;

class NutrizaSeeder extends Seeder
{
    public function run(): void
    {
        SiteSetting::truncate();
        LandingHero::truncate();
        DietProgram::truncate();
        DietBenefit::truncate();
        DietMenu::truncate();
        CustomerTestimonial::truncate();
        Faq::truncate();

        // 1. Site Settings
        SiteSetting::insert([
            ['key' => 'site_name', 'value' => 'Nutriza'],
            ['key' => 'site_logo', 'value' => 'https://ui-avatars.com/api/?name=Nutriza&background=22c55e&color=fff&size=128&font-size=0.33'], // Temporarily using ui-avatars
            ['key' => 'contact_whatsapp', 'value' => '6281234567890'],
            ['key' => 'contact_email', 'value' => 'hello@nutriza.id'],
            ['key' => 'footer_description', 'value' => 'Nutriza adalah katering diet sehat terpercaya yang membantu Anda mencapai tujuan kesehatan yang nyata.'],
            ['key' => 'instagram_url', 'value' => 'https://instagram.com/nutriza.id'],
        ]);

        // 2. Landing Hero
        LandingHero::create([
            'title' => 'Healthy Diet Meals, Delivered Daily to You.',
            'subtitle' => 'Capai target berat badan dan kesehatan Anda bersama program defisit kalori dan pola makan bernutrisi dari Nutriza.',
            'image' => 'https://images.unsplash.com/photo-1490645935967-10de6ba17061?q=80&w=2070&auto=format&fit=crop',
            'cta_text' => 'Pilih Program Anda',
            'cta_link' => '#programs'
        ]);

        // 3. Diet Programs
        DietProgram::insert([
            [
                'name' => 'Fatloss Program',
                'slug' => 'fatloss-program',
                'description' => 'Solusi tepat untuk menurunkan persentase lemak tubuh tanpa harus menderita lapar.',
                'image' => 'https://images.unsplash.com/photo-1540420773420-3366772f4999?q=80&w=800&auto=format&fit=crop',
                'display_order' => 1
            ],
            [
                'name' => 'Diabetes Care',
                'slug' => 'diabetes-care',
                'description' => 'Didesain khusus rendah glikemik untuk menjaga dan menstabilkan kadar gula darah.',
                'image' => 'https://images.unsplash.com/photo-1505576399279-565b52d4ac71?q=80&w=800&auto=format&fit=crop',
                'display_order' => 2
            ],
            [
                'name' => 'Pregnancy Menu',
                'slug' => 'pregnancy-menu',
                'description' => 'Nutrisi optimal untuk ibu hamil dan persiapan menyusui.',
                'image' => 'https://images.unsplash.com/photo-1510515112102-dbad416f0ce3?q=80&w=800&auto=format&fit=crop',
                'display_order' => 3
            ],
            [
                'name' => 'Muscle Gain',
                'slug' => 'muscle-gain',
                'description' => 'Program tinggi protein untuk membentuk dan mempertahankan massa otot.',
                'image' => 'https://images.unsplash.com/photo-1583454110551-21f2fa2afe61?q=80&w=800&auto=format&fit=crop',
                'display_order' => 4
            ],
        ]);

        // 4. Benefits
        DietBenefit::insert([
            [
                'title' => 'Bebas Ongkir',
                'description' => 'Pengiriman tepat waktu ke depan pintu Anda setiap hari.',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 18H3c-.6 0-1-.4-1-1V7c0-.6.4-1 1-1h10c.6 0 1 .4 1 1v11"/><path d="M14 9h4l4 4v4c0 .6-.4 1-1 1h-2"/><circle cx="7" cy="18" r="2"/><circle cx="17" cy="18" r="2"/></svg>',
                'display_order' => 1
            ],
            [
                'title' => 'Menu Variatif',
                'description' => 'Nikmati +200 pilihan makanan sehat dari koki berpengalaman.',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m11 21 3-9"/><path d="m13 12 3-9"/><path d="M8 3v4"/><path d="M11 3v4"/><path d="M5 3v4"/><path d="M5 10c0 1.7 1.3 3 3 3h0c1.7 0 3-1.3 3-3"/><path d="M8 13v8"/></svg>',
                'display_order' => 2
            ],
            [
                'title' => 'Konsultasi Ahli Gizi',
                'description' => 'Didukung oleh certified nutritionist untuk menu diet yang tepat.',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
                'display_order' => 3
            ],
        ]);

        // 5. Testimonials
        CustomerTestimonial::insert([
            [
                'customer_name' => 'Amanda T.',
                'comment' => 'Sungguh pengalaman luar biasa. Berat saya turun 5kg dalam sebulan!',
                'rating' => 5,
                'before_image' => 'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?q=80&w=400&auto=format&fit=crop',
                'after_image' => 'https://images.unsplash.com/photo-1517836357463-d25dfeac3438?q=80&w=400&auto=format&fit=crop'
            ],
            [
                'customer_name' => 'Budi S.',
                'comment' => 'Makanannya tidak hambar dan porsinya pas. Gula darah saya jauh lebih stabil sekarang.',
                'rating' => 5,
                'before_image' => null,
                'after_image' => null
            ]
        ]);

        // 6. Whats Inside (Menus)
        DietMenu::insert([
            [
                'day' => 'Senin',
                'meal_type' => 'Makan Siang',
                'food_name' => 'Grilled Chicken Salad',
                'image' => 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?q=80&w=500&auto=format&fit=crop'
            ],
            [
                'day' => 'Selasa',
                'meal_type' => 'Makan Siang',
                'food_name' => 'Healthy Salmon Bowl',
                'image' => 'https://images.unsplash.com/photo-1467003909585-2f8a72700288?q=80&w=500&auto=format&fit=crop'
            ],
            [
                'day' => 'Rabu',
                'meal_type' => 'Snack',
                'food_name' => 'Fruit Mix Granola',
                'image' => 'https://images.unsplash.com/photo-1505253758473-96b7015fcd40?q=80&w=500&auto=format&fit=crop'
            ],
        ]);

        // 7. FAQs
        Faq::insert([
            [
                'question' => 'Kapan pengiriman biasanya dilakukan?',
                'answer' => 'Pengiriman batch pagi dilakukan sebelum jam 09.00, sedangkan batch malam dilakukan sebelum jam 18.00.',
                'display_order' => 1
            ],
            [
                'question' => 'Apakah makanan Nutriza halal?',
                'answer' => 'Ya, seluruh dapur dan bahan baku Nutriza diolah menggunakan prosedur yang 100% Halal.',
                'display_order' => 2
            ],
            [
                'question' => 'Apakah saya bisa berhenti sementara program langganan?',
                'answer' => 'Bisa. Silakan beritahu tim admin kami via WhatsApp maksimal H-1 agar jadwal Anda bisa di-pause/diskip tanpa mengurangi jatah berlangganan Anda.',
                'display_order' => 3
            ],
        ]);
    }
}
