<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Category;
use App\Models\Blog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicPagesAndFormsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Seed dynamic category and blog post for routing tests
        $category = Category::create([
            'name' => 'Technology',
            'slug' => 'technology'
        ]);

        $author = User::create([
            'name' => 'Test Author',
            'email' => 'author@test.com',
            'password' => bcrypt('password')
        ]);

        Blog::create([
            'title' => 'The Future of Venture Building',
            'slug' => 'the-future-of-venture-building',
            'excerpt' => 'Venture building blog posts.',
            'content' => 'Full article contents.',
            'category_id' => $category->id,
            'author_id' => $author->id,
            'published' => true,
            'published_at' => now(),
            'meta_title' => 'Venture Building',
            'meta_description' => 'Venture building metadata'
        ]);
    }

    /** @test */
    public function public_static_pages_can_be_rendered()
    {
        $pages = [
            '/',
            '/about',
            '/services',
            '/contact-us',
            '/start-project',
            '/industries',
            '/industries/healthcare',
            '/industries/fintech',
            '/industries/logistics',
            '/industries/enterprise',
            '/sitemap.xml'
        ];

        foreach ($pages as $page) {
            $response = $this->get($page);
            $response->assertStatus(200);
        }
    }

    /** @test */
    public function blog_page_renders_and_filters_successfully()
    {
        $response = $this->get('/blog');
        $response->assertStatus(200);
        $response->assertSee('The Future of Venture Building');

        // Test Category filtering
        $response = $this->get('/blog?category=technology');
        $response->assertStatus(200);
        $response->assertSee('The Future of Venture Building');

        // Test search matching
        $response = $this->get('/blog?search=Venture');
        $response->assertStatus(200);
        $response->assertSee('The Future of Venture Building');
    }

    /** @test */
    public function blog_detail_page_renders_successfully()
    {
        $response = $this->get('/blog/the-future-of-venture-building');
        $response->assertStatus(200);
        $response->assertSee('The Future of Venture Building');
        $response->assertSee('Full article contents.');
    }

    /** @test */
    public function contact_form_can_be_submitted_successfully()
    {
        $response = $this->postJson(route('contact.submit'), [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '+123456789',
            'message' => 'This is a test contact message.'
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true
        ]);

        $this->assertDatabaseHas('contact_messages', [
            'email' => 'john@example.com'
        ]);
    }

    /** @test */
    public function project_form_can_be_submitted_successfully()
    {
        $response = $this->postJson(route('project.submit'), [
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'phone' => '+987654321',
            'organization' => 'Innovate Corp',
            'project_type' => 'MVP Development',
            'budget_range' => '$25k - $50k',
            'timeline' => '1 - 3 Months',
            'description' => 'We need an MVP designed and coded.'
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true
        ]);

        $this->assertDatabaseHas('project_requests', [
            'email' => 'jane@example.com',
            'organization' => 'Innovate Corp'
        ]);
    }
}
