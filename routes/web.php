<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormSubmissionController;
use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\Category;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/services', function () {
    return view('services');
})->name('services');

// Dynamic sector-specific industries routes
Route::get('/industries/healthcare', function () {
    return view('industries.healthcare');
})->name('industries.healthcare');

Route::get('/industries/fintech', function () {
    return view('industries.fintech');
})->name('industries.fintech');

Route::get('/industries/logistics', function () {
    return view('industries.logistics');
})->name('industries.logistics');

Route::get('/industries/enterprise', function () {
    return view('industries.enterprise');
})->name('industries.enterprise');

Route::get('/industries', function () {
    return view('industries');
})->name('industries');

Route::get('/contact-us', function () {
    return view('contact');
})->name('contact');

Route::get('/start-project', function () {
    return view('project');
})->name('project');



Route::get('/dashboard', function () {
    if (auth()->user()->hasRole('admin') || auth()->user()->email === 'admin@elvora.com') {
        return redirect()->route('filament.admin.pages.dashboard');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/contact', [FormSubmissionController::class, 'submitContact'])->name('contact.submit');
Route::post('/start-project', [FormSubmissionController::class, 'submitProject'])->name('project.submit');
Route::post('/newsletter', [FormSubmissionController::class, 'submitNewsletter'])->name('newsletter.submit');

Route::get('/blog', function () {
    $search = request('search');
    $categorySlug = request('category');

    $query = Blog::with(['category', 'author'])->where('published', true);

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('excerpt', 'like', "%{$search}%")
              ->orWhere('content', 'like', "%{$search}%");
        });
    }

    if ($categorySlug) {
        $query->whereHas('category', function ($q) use ($categorySlug) {
            $q->where('slug', $categorySlug);
        });
    }

    $blogs = $query->orderBy('published_at', 'desc')->paginate(6);
    $categories = Category::withCount(['blogs' => fn($q) => $q->where('published', true)])->get();

    return view('blog', compact('blogs', 'categories'));
})->name('blog');

Route::get('/blog/{slug}', function ($slug) {
    if (view()->exists('blog.' . $slug)) {
        return view('blog.' . $slug);
    }

    $article = Blog::with(['category', 'author'])
        ->where('slug', $slug)
        ->where('published', true)
        ->firstOrFail();

    return view('blog.show', compact('article'));
})->name('blog.show');

Route::get('/sitemap.xml', function () {
    $blogs = Blog::where('published', true)->orderBy('updated_at', 'desc')->get();
    
    $xml = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    
    $pages = ['', 'about', 'services', 'blog', 'contact', 'start-project'];
    foreach ($pages as $page) {
        $xml .= '<url>';
        $xml .= '<loc>' . url($page) . '</loc>';
        $xml .= '<lastmod>' . date('Y-m-d') . '</lastmod>';
        $xml .= '<changefreq>weekly</changefreq>';
        $xml .= '<priority>' . ($page === '' ? '1.0' : '0.8') . '</priority>';
        $xml .= '</url>';
    }
    
    $industries = ['industries/healthcare', 'industries/fintech', 'industries/logistics', 'industries/enterprise'];
    foreach ($industries as $industry) {
        $xml .= '<url>';
        $xml .= '<loc>' . url($industry) . '</loc>';
        $xml .= '<lastmod>' . date('Y-m-d') . '</lastmod>';
        $xml .= '<changefreq>monthly</changefreq>';
        $xml .= '<priority>0.7</priority>';
        $xml .= '</url>';
    }
    
    foreach ($blogs as $blog) {
        $xml .= '<url>';
        $xml .= '<loc>' . route('blog.show', $blog->slug) . '</loc>';
        $xml .= '<lastmod>' . $blog->updated_at->format('Y-m-d') . '</lastmod>';
        $xml .= '<changefreq>monthly</changefreq>';
        $xml .= '<priority>0.6</priority>';
        $xml .= '</url>';
    }
    
    $xml .= '</urlset>';
    
    return response($xml)->header('Content-Type', 'text/xml');
})->name('sitemap');

require __DIR__.'/auth.php';

