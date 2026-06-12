@extends('layouts.app')

@section('title', 'Journal & Insights | Elvora Innovations')

@section('content')
    <!-- ========================================== -->
    <!--          MAIN JOURNAL WRAPPER              -->
    <!-- ========================================== -->
    <div class="bg-white dark:bg-slate-950 py-16 border-b border-slate-100 dark:border-white/5">
        <div class="max-w-[1600px] w-full mx-auto px-4">
            <div class="grid lg:grid-cols-12 gap-16 items-start">
                
                <!-- ========================================== -->
                <!--          LEFT COLUMN: STICKY SIDEBAR       -->
                <!-- ========================================== -->
                <aside class="lg:col-span-4 space-y-10 lg:sticky lg:top-28">
                    <!-- Title & description -->
                    <div class="space-y-3">
                        <span class="text-brand-secondary font-mono text-[10px] uppercase tracking-[0.25em] block">Publications</span>
                        <h1 class="font-display font-black text-fluid-3xl md:text-fluid-4xl tracking-tight text-brand-primary dark:text-white leading-tight">
                            The Journal
                        </h1>
                        <p class="text-slate-400 dark:text-slate-500 text-xs leading-relaxed max-w-sm">
                            Curated insights on high-availability backend engines, double-entry financial ledger standards, and cloud sovereignty.
                        </p>
                    </div>

                    <!-- Search Input -->
                    <form method="GET" action="{{ route('blog') }}" class="relative flex items-center bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-white/10 rounded-2xl px-4 py-2.5 w-full group transition-all focus-within:border-brand-primary dark:focus-within:border-brand-secondary focus-within:ring-2 focus-within:ring-brand-primary/10">
                        @if(request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        
                        <input name="search" value="{{ request('search') }}" class="bg-transparent border-none focus:ring-0 text-xs w-full placeholder:text-slate-400 text-brand-primary dark:text-white outline-none p-0" placeholder="Search publications..." type="text"/>
                    </form>

                    <!-- Curated Active Topics (Only show categories with posts) -->
                    <div class="space-y-4">
                        <h3 class="text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest">Active Topics</h3>
                        <div class="flex flex-wrap lg:flex-col gap-2">
                            <a href="{{ route('blog', ['search' => request('search')]) }}" class="flex items-center justify-between text-xs font-bold py-1.5 transition-colors border-b border-transparent {{ !request('category') ? 'text-brand-primary dark:text-brand-secondary font-black' : 'text-slate-500 dark:text-slate-400 hover:text-brand-primary dark:hover:text-white' }}">
                                <span>All Publications</span>
                            </a>
                            @foreach($categories as $cat)
                                @if($cat->blogs_count > 0)
                                    <a href="{{ route('blog', ['category' => $cat->slug, 'search' => request('search')]) }}" class="flex items-center justify-between text-xs font-bold py-1.5 transition-colors border-b border-transparent {{ request('category') === $cat->slug ? 'text-brand-primary dark:text-brand-secondary font-black' : 'text-slate-500 dark:text-slate-400 hover:text-brand-primary dark:hover:text-white' }}">
                                        <span>{{ $cat->name }}</span>
                                        <span class="text-[10px] font-mono opacity-65">({{ $cat->blogs_count }})</span>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Mini Newsletter Subscription in Sidebar -->
                    <div class="bg-brand-primary dark:bg-slate-900 border border-brand-primaryDark dark:border-white/10 p-6 rounded-3xl space-y-4 relative overflow-hidden">
                        <div class="absolute -top-12 -left-12 w-32 h-32 bg-brand-secondary/10 rounded-full blur-2xl pointer-events-none"></div>
                        <div class="space-y-2 relative z-10">
                            <h4 class="font-display font-bold text-sm text-white">Subscribe</h4>
                            <p class="text-blue-100 dark:text-slate-400 text-[11px] leading-relaxed">
                                Get sovereign tech briefings directly in your inbox.
                            </p>
                        </div>
                        
                        <div id="newsletter-feedback-alert" class="hidden p-3 rounded-xl text-[10px] font-semibold"></div>

                        <form id="newsletter-form" class="space-y-2 relative z-10" onsubmit="submitNewsletter(event, this)">
                            @csrf
                            <input class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2.5 text-xs text-white placeholder:text-white/40 focus:ring-1 focus:ring-brand-secondary focus:border-transparent outline-none transition-all" name="email" required placeholder="name@company.com" type="email"/>
                            <button class="w-full bg-brand-secondary hover:bg-brand-secondaryDark text-white py-2.5 rounded-xl font-bold text-xs transition-transform active:scale-95 shadow-md" type="submit">Subscribe Now</button>
                        </form>
                    </div>
                </aside>

                <!-- ========================================== -->
                <!--          RIGHT COLUMN: ARTICLES TIMELINE   -->
                <!-- ========================================== -->
                <main class="lg:col-span-8 space-y-12">
                    @if(request('search') || request('category'))
                        <div class="pb-4 border-b border-slate-100 dark:border-white/5">
                            <p class="text-slate-400 dark:text-slate-500 text-xs">
                                Showing results for category <span class="text-brand-primary dark:text-white font-bold">"{{ request('category') ?? 'All' }}"</span> {{ request('search') ? 'and keyword "' . request('search') . '"' : '' }}
                            </p>
                        </div>
                    @endif

                    @php
                        $fallbackImages = [
                            'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?q=80&w=600&auto=format&fit=crop',
                            'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?q=80&w=600&auto=format&fit=crop',
                            'https://images.unsplash.com/photo-1600132806370-bf17e65e942f?q=80&w=600&auto=format&fit=crop'
                        ];
                    @endphp

                    @if($blogs->count() > 0)
                        <div class="space-y-12">
                            @foreach($blogs as $blog)
                                @php
                                    // Highlight first post only on page 1 with no search filter
                                    $isFeatured = $loop->first && !request('search') && !request('category') && (request('page') ?: 1) == 1;
                                @endphp

                                @if($isFeatured)
                                    <!-- Big Featured Card -->
                                    <article class="group space-y-6 pb-12 border-b border-slate-100 dark:border-white/5">
                                        <a href="{{ route('blog.show', $blog->slug) }}" class="block relative aspect-[21/10] rounded-[32px] overflow-hidden bg-slate-50 dark:bg-slate-900 border border-slate-100 dark:border-white/5 shadow-sm">
                                            @if($blog->featured_image)
                                                <img alt="{{ $blog->title }}" class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-[1.01]" src="{{ asset('storage/' . $blog->featured_image) }}"/>
                                            @else
                                                <img alt="Featured Cover Image" class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-[1.01]" src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=1200&auto=format&fit=crop"/>
                                            @endif
                                        </a>
                                        <div class="space-y-3">
                                            <div class="flex items-center gap-3 text-slate-400 dark:text-slate-500 text-[10px] font-mono">
                                                <span class="bg-brand-secondary/15 text-brand-secondaryDark dark:text-brand-secondary px-2.5 py-0.5 rounded-full text-[9px] font-bold uppercase tracking-wider">{{ $blog->category->name ?? 'Technology' }}</span>
                                                <span>{{ $blog->published_at ? $blog->published_at->format('M d, Y') : $blog->created_at->format('M d, Y') }}</span>
                                                <span class="w-1 h-1 bg-slate-200 dark:bg-slate-800 rounded-full"></span>
                                                <span>{{ ceil(str_word_count(strip_tags($blog->content)) / 200) }} Min Read</span>
                                            </div>
                                            <h2 class="font-display font-extrabold text-2xl md:text-3xl text-brand-primary dark:text-white leading-tight group-hover:text-brand-secondary transition-colors duration-200">
                                                <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a>
                                            </h2>
                                            <p class="text-slate-500 dark:text-slate-400 text-xs md:text-sm leading-relaxed">
                                                {{ $blog->excerpt ?? Str::limit(strip_tags($blog->content), 180) }}
                                            </p>
                                        </div>
                                    </article>
                                @else
                                    <!-- Horizontal Article Row -->
                                    <article class="group flex flex-col sm:flex-row gap-6 items-start py-8 border-b border-slate-100 dark:border-white/5 last:border-b-0">
                                        <a href="{{ route('blog.show', $blog->slug) }}" class="w-full sm:w-48 aspect-[16/10] rounded-2xl overflow-hidden bg-slate-50 dark:bg-slate-900 border border-slate-100 dark:border-white/5 shrink-0 block">
                                            @if($blog->featured_image)
                                                <img alt="{{ $blog->title }}" class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-[1.02]" src="{{ asset('storage/' . $blog->featured_image) }}"/>
                                            @else
                                                <img alt="Article Cover Image" class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-[1.02]" src="{{ $fallbackImages[$loop->index % count($fallbackImages)] }}"/>
                                            @endif
                                        </a>
                                        <div class="space-y-2 flex-grow">
                                            <div class="flex items-center gap-2 text-slate-400 dark:text-slate-500 text-[10px] font-mono">
                                                <span class="text-brand-secondary font-bold uppercase tracking-wider">{{ $blog->category->name ?? 'Technology' }}</span>
                                                <span class="w-1 h-1 bg-slate-200 dark:bg-slate-800 rounded-full"></span>
                                                <span>{{ $blog->published_at ? $blog->published_at->format('M d, Y') : $blog->created_at->format('M d, Y') }}</span>
                                                <span class="w-1 h-1 bg-slate-200 dark:bg-slate-800 rounded-full"></span>
                                                <span>{{ ceil(str_word_count(strip_tags($blog->content)) / 200) }} Min Read</span>
                                            </div>
                                            <h3 class="font-display font-bold text-base md:text-lg text-brand-primary dark:text-white leading-snug group-hover:text-brand-secondary transition-colors duration-200">
                                                <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a>
                                            </h3>
                                            <p class="text-slate-400 dark:text-slate-500 text-xs leading-relaxed line-clamp-2">
                                                {{ $blog->excerpt ?? Str::limit(strip_tags($blog->content), 120) }}
                                            </p>
                                        </div>
                                    </article>
                                @endif
                            @endforeach
                        </div>

                        <!-- Pagination Navigation -->
                        <div class="mt-16 pt-8">
                            {{ $blogs->appends(request()->query())->links('pagination::tailwind') }}
                        </div>
                    @else
                        <!-- Clean Empty State -->
                        <div class="text-center py-20 space-y-4 max-w-sm mx-auto">
                            <div class="w-12 h-12 bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-white/5 rounded-2xl flex items-center justify-center text-slate-400 mx-auto">
                                
                            </div>
                            <div>
                                <h4 class="font-display font-bold text-sm text-brand-primary dark:text-white">No Publications Found</h4>
                                <p class="text-slate-400 dark:text-slate-500 text-xs mt-1">We couldn't find any articles matching your search query.</p>
                            </div>
                            <a href="{{ route('blog') }}" class="inline-block px-4 py-2 bg-brand-primary dark:bg-brand-secondary text-white text-xs font-bold rounded-xl shadow-sm">Reset Filters</a>
                        </div>
                    @endif
                </main>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // AJAX newsletter submit handler
        function submitNewsletter(e, form) {
            e.preventDefault();
            const submitBtn = form.querySelector('button[type="submit"]');
            const alertBox = document.getElementById('newsletter-feedback-alert');

            submitBtn.disabled = true;
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';

            alertBox.className = "hidden p-3 rounded-xl text-[10px] font-semibold mb-3";
            alertBox.textContent = "";

            const formData = new FormData(form);

            fetch('/newsletter', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(async response => {
                const data = await response.json();
                if (response.ok && data.success) {
                    alertBox.className = "p-3 rounded-xl text-[10px] font-semibold mb-3 bg-green-100 text-green-800 border border-green-200 block";
                    alertBox.textContent = data.message;
                    form.reset();
                } else {
                    const errMsg = data.errors ? Object.values(data.errors).flat().join(' | ') : (data.message || 'Error occurred.');
                    alertBox.className = "p-3 rounded-xl text-[10px] font-semibold mb-3 bg-red-100 text-red-800 border border-red-200 block";
                    alertBox.textContent = errMsg;
                }
            })
            .catch(error => {
                alertBox.className = "p-3 rounded-xl text-[10px] font-semibold mb-3 bg-red-100 text-red-800 border border-red-200 block";
                alertBox.textContent = "Unable to connect.";
            })
            .finally(() => {
                submitBtn.disabled = false;
                submitBtn.textContent = originalText;
            });
        }
    </script>
@endsection
