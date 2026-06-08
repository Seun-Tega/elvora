<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Blog;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create Spatie Roles
        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin']);
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $contentManagerRole = Role::firstOrCreate(['name' => 'content-manager']);
        $contentManagerRoleUnderscore = Role::firstOrCreate(['name' => 'content_manager']);
        $editorRole = Role::firstOrCreate(['name' => 'editor']);
        $marketingManagerRole = Role::firstOrCreate(['name' => 'marketing_manager']);
        $supportStaffRole = Role::firstOrCreate(['name' => 'support_staff']);

        // 2. Create and assign roles to users
        $superAdmin = User::firstOrCreate([
            'email' => 'superadmin@elvora.com',
        ], [
            'name' => 'Elvora Super Admin',
            'password' => bcrypt('password'),
        ]);
        $superAdmin->assignRole($superAdminRole);

        $admin = User::firstOrCreate([
            'email' => 'admin@elvora.com',
        ], [
            'name' => 'Elvora Admin',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole($adminRole);

        $contentManager = User::firstOrCreate([
            'email' => 'content@elvora.com',
        ], [
            'name' => 'Elvora Content Manager',
            'password' => bcrypt('password'),
        ]);
        $contentManager->assignRole($contentManagerRole);
        $contentManager->assignRole($contentManagerRoleUnderscore);

        $editor = User::firstOrCreate([
            'email' => 'editor@elvora.com',
        ], [
            'name' => 'Elvora Editor',
            'password' => bcrypt('password'),
        ]);
        $editor->assignRole($editorRole);

        $marketingManager = User::firstOrCreate([
            'email' => 'marketing@elvora.com',
        ], [
            'name' => 'Elvora Marketing Manager',
            'password' => bcrypt('password'),
        ]);
        $marketingManager->assignRole($marketingManagerRole);

        $supportStaff = User::firstOrCreate([
            'email' => 'support@elvora.com',
        ], [
            'name' => 'Elvora Support Staff',
            'password' => bcrypt('password'),
        ]);
        $supportStaff->assignRole($supportStaffRole);

        $regularUser = User::firstOrCreate([
            'email' => 'user@elvora.com',
        ], [
            'name' => 'Elvora Regular User',
            'password' => bcrypt('password'),
        ]);


        // 3. Create categories
        $categoriesData = [
            'Technology',
            'Product Management',
            'AI',
            'Healthcare Innovation',
            'Digital Transformation',
            'Civic Technology',
            'Startup Growth',
            'Business Analysis'
        ];

        $categories = [];
        foreach ($categoriesData as $name) {
            $categories[$name] = Category::firstOrCreate([
                'slug' => Str::slug($name)
            ], [
                'name' => $name
            ]);
        }

        // 4. Create sample blog posts
        $blogs = [
            [
                'title' => 'The Future of Venture Building in Emerging Markets',
                'excerpt' => 'How strategic incubation, agile product validation, and technical capital are reshaping the startup ecosystem across Africa.',
                'content' => 'Venture building is more than just investing capital; it is about providing the technical infrastructure, product validation methodologies, and business strategy necessary to turn early-stage ideas into market leaders. In emerging markets like Africa, where infrastructure deficits and regulatory friction present unique challenges, traditional venture capital models often fall short.

This is where venture builders step in. By functioning as co-founders and product engineering partners, venture development companies mitigate operational risk. They handle product design, technology stack selection, and regulatory integrations, allowing founders to focus entirely on customer acquisition and market fit. Over the next decade, we expect venture building to become the dominant framework for tech innovation on the continent.',
                'category' => 'Startup Growth',
                'published' => true,
            ],
            [
                'title' => 'Scaling Telemedicine Platforms: Addressing Data Integrity & Connectivity',
                'excerpt' => 'Key architecture paradigms for building robust healthcare portals capable of serving remote regions with intermittent internet access.',
                'content' => 'Healthcare access remains a significant challenge across remote regions. While telemedicine offers a path forward, building platforms that operate reliably under low-bandwidth conditions requires specialized engineering. Data integrity, patient privacy (HIPAA/GDPR compliance), and offline synchronization are critical pillars of modern healthcare software.

Using edge computing architectures, optimized WebRTC signaling, and lightweight SQL databases for offline data persistence, developers can build healthcare applications that do not crash when connectivity drops. Additionally, end-to-end encryption ensures patient consultation notes and medical imaging data remain secure at all times. In this guide, we dive deep into the microservices and messaging protocols that power resilient healthcare software.',
                'category' => 'Healthcare Innovation',
                'published' => true,
            ],
            [
                'title' => 'Building Secure Transaction Rails: A Guide to FinTech Compliance',
                'excerpt' => 'An in-depth look at implementing multi-tenant ledger databases, transaction security, and regulatory compliance standards.',
                'content' => 'Fintech innovation continues to accelerate, but with growth comes increased regulatory oversight and security threats. Building a payment processing platform or double-entry ledger requires strict adherence to security best practices. From PCI-DSS compliance to real-time fraud detection algorithms, financial technology platforms must be engineered for zero-downtime reliability.

In this article, we analyze the implementation of multi-tenant ledger databases. We cover atomic transactions, database locking strategies to prevent double-spending, and tokenization techniques that protect sensitive cardholder data. We also discuss how to design secure API webhooks that allow third-party developers to integrate payment options without exposing core banking infrastructure.',
                'category' => 'AI',
                'published' => true,
            ]
        ];

        foreach ($blogs as $blogData) {
            $category = $categories[$blogData['category']] ?? reset($categories);
            
            Blog::firstOrCreate([
                'slug' => Str::slug($blogData['title'])
            ], [
                'title' => $blogData['title'],
                'excerpt' => $blogData['excerpt'],
                'content' => $blogData['content'],
                'category_id' => $category->id,
                'author_id' => $admin->id,
                'published' => $blogData['published'],
                'published_at' => now(),
                'meta_title' => $blogData['title'] . ' | Elvora Blog',
                'meta_description' => $blogData['excerpt'],
            ]);
        }
    }
}
