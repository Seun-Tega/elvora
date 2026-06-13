@extends('layouts.blog')

@section('title', ($article->meta_title ?: $article->title) . ' | Elvora Innovations')

@section('head')
    <style>
        .serif-text { font-family: 'Lora', serif; }
        .reading-progress-bar {
            height: 4px;
            background: #7c5800; /* Secondary color */
            width: 0%;
            transition: width 0.1s ease;
        }
        .code-container {
            background: #0b1c30;
            color: #d5e3ff;
            font-family: 'JetBrains Mono', monospace;
        }
        
        /* Dropcap and prose refinements */
        .article-content > p:first-of-type::first-letter {
            font-size: 3.5rem;
            font-weight: 700;
            color: #001e40; /* primary */
            margin-right: 0.75rem;
            float: left;
            line-height: 1;
        }

        .prose h2 {
            font-family: 'Inter', sans-serif !important;
            font-weight: 600 !important;
            font-size: 2rem !important;
            line-height: 2.5rem !important;
            color: #001e40 !important;
            margin-top: 4rem !important;
            margin-bottom: 1.5rem !important;
            letter-spacing: -0.01em !important;
        }

        .prose h3 {
            font-family: 'Inter', sans-serif !important;
            font-weight: 600 !important;
            font-size: 1.5rem !important;
            line-height: 2rem !important;
            color: #001e40 !important;
            margin-top: 2.5rem !important;
            margin-bottom: 1rem !important;
        }

        .prose blockquote {
            margin: 3rem 0 !important;
            padding: 1.5rem 2rem !important;
            border-left: 4px solid #7c5800 !important;
            background-color: #eff4ff !important;
            font-style: italic !important;
            font-size: 1.5rem !important;
            line-height: 1.5 !important;
            color: #745200 !important;
            position: relative !important;
        }

        .prose blockquote::before {
            content: 'format_quote';
            font-family: 'Material Symbols Outlined';
            position: absolute;
            top: -1rem;
            left: 1rem;
            font-size: 4rem;
            opacity: 0.1;
            pointer-events: none;
        }

        .prose pre {
            background: #0b1c30 !important;
            color: #d5e3ff !important;
            padding: 1.5rem !important;
            border-radius: 0.75rem !important;
            margin: 2rem 0 !important;
            font-family: 'JetBrains Mono', monospace !important;
            font-size: 0.9rem !important;
            overflow-x: auto !important;
        }

        .prose ul {
            list-style: none !important;
            padding-left: 1.5rem !important;
            border-left: 4px solid #d3e4fe !important;
            margin: 2rem 0 !important;
        }

        .prose li {
            position: relative !important;
            margin-bottom: 1rem !important;
            padding-left: 2rem !important;
        }

        .prose li::before {
            content: 'check_circle' !important;
            font-family: 'Material Symbols Outlined' !important;
            position: absolute !important;
            left: 0 !important;
            top: 0.25rem !important;
            color: #7c5800 !important;
            font-size: 1.25rem !important;
        }
    </style>
@endsection

@section('content')
    <!-- Reading Progress Indicator -->
    <div class="fixed top-0 left-0 w-full h-1 z-[60]">
        <div class="reading-progress-bar" id="readingProgress"></div>
    </div>

    <!-- TopNavBar -->
    <header class="bg-surface/80 backdrop-blur-md fixed top-0 w-full z-50 border-b border-outline-variant shadow-sm transition-all duration-300 ease-in-out">
        <div class="flex justify-between items-center h-20 px-lg max-w-container-max mx-auto">
            <a class="font-h3 text-h3 font-bold tracking-tight text-primary" href="{{ route('home') }}">Elvora Innovations</a>
            <nav class="hidden md:flex items-center space-x-lg">
                <a class="text-on-surface-variant hover:text-primary transition-colors duration-200 font-body-md text-body-md" href="{{ route('services') }}">Services</a>
                <a class="text-on-surface-variant hover:text-primary transition-colors duration-200 font-body-md text-body-md" href="{{ route('industries') }}">Industries</a>
                <a class="text-on-surface-variant hover:text-primary transition-colors duration-200 font-body-md text-body-md" href="{{ route('about') }}">Venture Building</a>
                <a class="text-primary font-semibold border-b-2 border-primary pb-1 font-body-md text-body-md" href="{{ route('blog') }}">Insights</a>
            </nav>
            <div class="flex items-center space-x-md">
                <a href="{{ route('dashboard') }}" class="hidden lg:block text-on-surface-variant hover:text-primary font-body-md text-body-md transition-colors">Log In</a>
                <a href="{{ route('project') }}" class="bg-primary text-on-primary px-lg py-sm rounded-xl font-body-md text-body-md font-semibold hover:bg-primary-container hover:text-on-primary-container transition-all">Start Project</a>
            </div>
        </div>
    </header>

    <main class="pt-xxl mt-xxl">
        <!-- Article Header Section -->
        <article class="max-w-[800px] mx-auto px-md">
            <!-- Breadcrumb -->
            <nav class="flex items-center space-x-xs text-on-surface-variant mb-md font-label-sm text-label-sm">
                <a class="hover:text-primary transition-colors" href="{{ route('blog') }}">Insights</a>
                <span class="material-symbols-outlined text-[14px]">chevron_right</span>
                <a class="hover:text-primary transition-colors" href="#">{{ $article->category->name ?? 'Strategy' }}</a>
                <span class="material-symbols-outlined text-[14px]">chevron_right</span>
                <span class="text-outline">Venture Building</span>
            </nav>

            <!-- Category & Title -->
            <div class="text-center mb-xl">
                <span class="inline-block px-sm py-1 bg-secondary-container text-on-secondary-container font-label-sm text-label-sm font-bold uppercase tracking-widest rounded-lg mb-md">
                    {{ $article->category_label ?? 'Venture Studio' }}
                </span>
                <h1 class="font-h1 text-h1 text-on-surface leading-tight mb-lg" style="font-family: '{{ $article->heading_font }}', sans-serif;">
                    {{ $article->title }}
                </h1>
                
                <!-- Author Info -->
                <div class="flex items-center justify-center space-x-md mt-lg">
                    @if($article->author_avatar)
                        <img alt="{{ $article->author->name }}" class="w-12 h-12 rounded-full border border-outline-variant object-cover" src="{{ asset('storage/' . $article->author_avatar) }}"/>
                    @else
                        <div class="w-12 h-12 rounded-full border border-outline-variant bg-primary flex items-center justify-center text-white font-bold">
                            {{ strtoupper(substr($article->author->name, 0, 1)) }}
                        </div>
                    @endif
                    <div class="text-left">
                        <p class="font-body-md text-body-md font-bold text-on-surface">{{ $article->author->name }}</p>
                        <p class="font-label-sm text-label-sm text-on-surface-variant">
                            {{ $article->author_role ?? 'Specialist' }} • {{ $article->published_at ? $article->published_at->format('M d, Y') : $article->created_at->format('M d, Y') }} • {{ $article->reading_time ?? ceil(str_word_count(strip_tags($article->content)) / 200) }} min read
                        </p>
                    </div>
                </div>
            </div>

            <!-- Hero Image -->
            <div class="relative w-full aspect-video rounded-xl overflow-hidden mb-xxl shadow-lg">
                @if($article->featured_image)
                    <img alt="{{ $article->title }}" class="w-full h-full object-cover" src="{{ asset('storage/' . $article->featured_image) }}"/>
                @else
                    <img alt="{{ $article->title }}" class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1920&q=80"/>
                @endif
            </div>

            <!-- Article Body -->
            <div class="relative flex flex-col md:flex-row gap-gutter">
                <!-- Sticky Social Share (Desktop Only) -->
                <aside class="hidden md:flex flex-col items-center space-y-lg sticky top-32 h-fit">
                    <button class="w-10 h-10 flex items-center justify-center rounded-full border border-outline-variant text-outline hover:text-primary hover:border-primary transition-all" onclick="navigator.clipboard.writeText(window.location.href); alert('Link copied!');">
                        <span class="material-symbols-outlined">share</span>
                    </button>
                    <button class="w-10 h-10 flex items-center justify-center rounded-full border border-outline-variant text-outline hover:text-primary hover:border-primary transition-all">
                        <span class="material-symbols-outlined">bookmark</span>
                    </button>
                    <div class="w-px h-12 bg-outline-variant"></div>
                    <button class="w-10 h-10 flex items-center justify-center rounded-full border border-outline-variant text-outline hover:text-primary hover:border-primary transition-all">
                        <span class="material-symbols-outlined" data-weight="fill">thumb_up</span>
                    </button>
                </aside>

                <!-- Content Area -->
                <div class="flex-1 article-content prose prose-lg max-w-none text-on-surface" 
                     style="font-family: '{{ $article->body_font }}', {{ in_array($article->body_font, ['Lora', 'serif']) ? 'serif' : 'sans-serif' }};">
                    {!! $article->content !!}
                </div>
            </div>
        </article>

        <!-- Related Articles -->
        @php
            $related = \App\Models\Blog::with(['category', 'author'])
                ->where('id', '!=', $article->id)
                ->where('published', true)
                ->inRandomOrder()
                ->limit(3)
                ->get();
        @endphp
        
        @if($related->count() > 0)
            <section class="bg-surface-container-lowest py-xxl border-t border-outline-variant mt-xxl">
                <div class="max-w-container-max mx-auto px-lg">
                    <div class="flex justify-between items-end mb-xl">
                        <div>
                            <h2 class="font-h2 text-h2 text-primary">Related Insights</h2>
                            <p class="font-body-md text-body-md text-on-surface-variant mt-sm">Further reading on high-performance venture strategy.</p>
                        </div>
                        <a class="font-label-sm text-label-sm font-bold text-secondary flex items-center hover:underline" href="{{ route('blog') }}">
                            VIEW ALL INSIGHTS <span class="material-symbols-outlined ml-xs">arrow_forward</span>
                        </a>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-lg">
                        @foreach($related as $rel)
                            <a href="{{ route('blog.show', $rel->slug) }}" class="group cursor-pointer">
                                <div class="aspect-[4/3] rounded-xl overflow-hidden mb-md shadow-sm">
                                    <img alt="{{ $rel->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ $rel->featured_image ? asset('storage/' . $rel->featured_image) : 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=800&q=80' }}"/>
                                </div>
                                <span class="font-label-sm text-label-sm text-secondary font-bold uppercase tracking-wider">{{ $rel->category_label ?? ($rel->category->name ?? 'Insights') }}</span>
                                <h3 class="font-h3 text-h3 text-on-surface mt-sm group-hover:text-primary transition-colors">{{ $rel->title }}</h3>
                            </a>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- Executive CTA Section -->
        <section class="py-xxl px-lg max-w-container-max mx-auto">
            <div class="bg-primary text-on-primary rounded-xxl p-xl md:p-xxl flex flex-col items-center text-center relative overflow-hidden shadow-2xl">
                <!-- Abstract Background Detail -->
                <div class="absolute top-0 right-0 w-1/3 h-full bg-primary-container/20 -skew-x-12 translate-x-1/2"></div>
                <h2 class="font-h1 text-h1 mb-md relative z-10">Have a vision for the future?</h2>
                <p class="font-body-lg text-body-lg max-w-2xl mb-xl opacity-90 relative z-10">We partner with exceptional founders and institutions to build market-defining technology companies from the ground up.</p>
                <div class="flex flex-col md:flex-row space-y-md md:space-y-0 md:space-x-lg relative z-10">
                    <a href="{{ route('project') }}" class="bg-secondary-container text-on-secondary-container px-xxl py-md rounded-xl font-body-md text-body-md font-bold hover:scale-[1.02] transition-transform shadow-lg">Start Project</a>
                    <a href="{{ route('about') }}" class="border border-on-primary/30 text-on-primary px-xxl py-md rounded-xl font-body-md text-body-md font-bold hover:bg-on-primary/10 transition-all">Our Process</a>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-surface w-full mt-xxl border-t border-outline-variant transition-all duration-300">
        <div class="flex flex-col md:flex-row justify-between items-center py-xl px-lg max-w-container-max mx-auto">
            <div class="mb-lg md:mb-0">
                <span class="font-h3 text-h3 font-bold text-primary">Elvora Innovations</span>
                <p class="text-on-surface-variant font-label-sm text-label-sm mt-2">© 2024 Elvora Innovations. All rights reserved.</p>
            </div>
            <div class="flex flex-wrap justify-center gap-lg">
                <a class="text-on-surface-variant hover:text-secondary transition-colors font-label-sm text-label-sm opacity-80 hover:opacity-100" href="#">Privacy Policy</a>
                <a class="text-on-surface-variant hover:text-secondary transition-colors font-label-sm text-label-sm opacity-80 hover:opacity-100" href="#">Terms of Service</a>
                <a class="text-on-surface-variant hover:text-secondary transition-colors font-label-sm text-label-sm opacity-80 hover:opacity-100" href="#">Cookie Policy</a>
                <a class="text-on-surface-variant hover:text-secondary transition-colors font-label-sm text-label-sm opacity-80 hover:opacity-100" href="#">Security</a>
            </div>
        </div>
    </footer>
@endsection

@section('scripts')
    <script>
        // Reading progress calculation
        window.onscroll = function() {
            let winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            let scrolled = (winScroll / height) * 100;
            const progress = document.getElementById("readingProgress");
            if (progress) {
                progress.style.width = scrolled + "%";
            }
            
            // Header scroll effect
            const header = document.querySelector('header');
            if (header) {
                if (winScroll > 50) {
                    header.classList.add('py-2');
                    header.classList.add('shadow-md');
                } else {
                    header.classList.remove('py-2');
                    header.classList.remove('shadow-md');
                }
            }
        };

        // Micro-interaction for social share buttons
        const shareBtns = document.querySelectorAll('aside button');
        shareBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                btn.classList.add('scale-90');
                setTimeout(() => btn.classList.remove('scale-90'), 150);
            });
        });
    </script>
@endsection
