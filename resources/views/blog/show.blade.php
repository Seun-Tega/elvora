@extends('layouts.app')

@section('title', $article->title . ' | Elvora Innovations')

@section('content')
    <!-- Reading Progress Indicator -->
    <div class="fixed top-[72px] left-0 w-full h-[3px] z-[60] pointer-events-none">
        <div class="bg-brand-secondary h-full w-0 transition-all duration-100 ease-out" id="readingProgress"></div>
    </div>

    <!-- Main Container -->
    <div class="bg-white dark:bg-slate-950 py-16">
        <article class="max-w-[850px] mx-auto px-6">
            <!-- Breadcrumb Navigation -->
            <nav class="flex items-center space-x-1 text-slate-400 text-xs font-bold uppercase tracking-wider mb-8">
                <a class="hover:text-brand-primary dark:hover:text-white transition-colors" href="{{ route('blog') }}">Blog</a>
                <span class="material-symbols-outlined text-sm">chevron_right</span>
                <span>{{ $article->category->name ?? 'Technology' }}</span>
            </nav>

            <!-- Title & Metadata -->
            <div class="space-y-6 mb-12">
                <span class="inline-block px-3 py-1 bg-brand-surfaceLight dark:bg-slate-900 text-brand-primary dark:text-brand-secondary text-[10px] font-bold uppercase tracking-wider rounded-full border border-brand-borderLight dark:border-white/10">
                    {{ $article->category->name ?? 'Technology' }}
                </span>
                <h1 class="font-display font-extrabold text-3xl md:text-5xl text-brand-primary dark:text-white leading-tight">
                    {{ $article->title }}
                </h1>
                
                <!-- Author Widget -->
                <div class="flex items-center space-x-4 pt-4 border-t border-brand-borderLight dark:border-white/10">
                    <div class="w-10 h-10 rounded-full bg-brand-primary dark:bg-slate-800 flex items-center justify-center font-bold text-white text-xs shrink-0">
                        {{ strtoupper(substr($article->author->name ?? 'E', 0, 2)) }}
                    </div>
                    <div>
                        <p class="text-xs font-bold text-brand-primary dark:text-white">{{ $article->author->name ?? 'Elvora Specialist' }}</p>
                        <p class="text-[10px] text-brand-textMuted dark:text-slate-400 font-mono mt-0.5">
                            Published {{ $article->published_at ? $article->published_at->format('M d, Y') : $article->created_at->format('M d, Y') }} • {{ ceil(str_word_count(strip_tags($article->content)) / 200) }} min read
                        </p>
                    </div>
                </div>
            </div>

            <!-- Featured Image -->
            <div class="relative w-full aspect-video rounded-3xl overflow-hidden mb-12 shadow-premium bg-slate-100 dark:bg-slate-950 border border-brand-borderLight dark:border-white/5">
                @if($article->featured_image)
                    <img alt="{{ $article->title }}" class="w-full h-full object-cover" src="{{ asset('storage/' . $article->featured_image) }}"/>
                @else
                    <img alt="{{ $article->title }}" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCZ7g3sFnamz9avinn8GxahOJpMGV_-vdASLfMjy6R3cXRXy9oUCQ1QSoagDxmFM6NFNTG8eh5C5-E2MwTz12UYuC14X1vPeF-Mir1YvWlcOBT6xOPUUOJ0oKkkJXZJ1SRtZuZfltH8xD600lmhTnO2gAeGc8GlvBbTOsjxBL6MgodtfcITLyAwMYySA4Pb3cC4ZgzlLF_yh3yZR86t9yO1eo1_r9dLLx1jGrrMgzDRGqq7cddBaLR2Ad238Lb9UyGxgk3hFzHEX1vp"/>
                @endif
            </div>

            <!-- Content Layout -->
            <div class="relative flex flex-col md:flex-row gap-12">
                <!-- Sticky Actions (Desktop Only) -->
                <aside class="hidden md:flex flex-col items-center space-y-6 sticky top-32 h-fit">
                    <button @click="navigator.clipboard.writeText(window.location.href); alert('Link copied to clipboard!');" 
                            class="w-10 h-10 flex items-center justify-center rounded-full border border-brand-borderLight dark:border-white/10 text-brand-textMuted dark:text-slate-400 hover:text-brand-primary dark:hover:text-white hover:border-brand-primary dark:hover:border-white transition-all" 
                            title="Copy Link">
                        <span class="material-symbols-outlined text-sm">share</span>
                    </button>
                    <div class="w-px h-10 bg-brand-borderLight dark:border-white/10"></div>
                </aside>

                <!-- Prose content -->
                <div class="flex-1 text-brand-primary dark:text-slate-300 text-sm leading-relaxed space-y-6 prose dark:prose-invert max-w-none">
                    {!! $article->content !!}
                </div>
            </div>
        </article>

        <!-- Related Posts Section -->
        @php
            $related = \App\Models\Blog::with(['category', 'author'])
                ->where('id', '!=', $article->id)
                ->where('published', true)
                ->inRandomOrder()
                ->limit(3)
                ->get();
            
            $fallbackImages = [
                'https://lh3.googleusercontent.com/aida-public/AB6AXuB5bgcMFNoDEsLYgJBSZfV0nfwB4S2M8TY7fTlOyH_FuYZeHzTkIGXah_CRtf6Y96pQZULG5ZW3NSsaz1uOL6qkVtUROdMePKaoHP2D0DxK6bLAj9-F9ZmaCYWn50MXTyRxa92n2wysoenKZafGdGo5X6hOjjy1gLZ60QTdgmG_cVaX563XOb-9b-ooMJQPXEpFm2fxFSsTYL1YZtds2Byohmp6QtdvVXqjg1AAp7hgGfzSqf7maf_BKUsx_o7ZyJCpkgYGJE2W2CCk',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuDHs6shztCsIhHmxlGJqU1AO6MWX5hrYwiGOGn7neeBHXONnJYehozI3O7zPp3WmkpZcCrWUc258_zzW-aEdJsURfsFtOT15_uwPytNytH_hDrFeGXZL0tEQj6RhZMRkVpJikNrcYGSn-XNPcvb3e4ouNK-ZINePbi5TCIEvulqn6_MpRTTxClmdxQBpKgRs3k7-eBel6VoDBIYvxm9A9l09J8y2edifLuRITLB2HNkSLgsfBM1ko5ofuXqpq4OgINUqXqxwEuDxy1Z',
                'https://lh3.googleusercontent.com/aida-public/AB6AXuAabdmQg7CH1vV5Z_-9rLuvMSbSrqy7WK-GrIo3PGYCSiBGTktqHUqHFffnWnifMP0U-e26Q24N_BF0R5pS9BpXftFzYZLBPlMwApSVQV332rqBpk87fF5xmLgZEawo_oucpvqI6yYuQW9ER6eGT86KIb7uwLchb3H9oXBY_-efYpF2nuBGdLKtGQkmwes0TIFX10d0yjF5rXZnboJLrUqWaVyjbOcR1wwVTMenapxu458HWu65ODXbJWUXBfKlPHouBRy3WA-NEEIX'
            ];
        @endphp
        
        @if($related->count() > 0)
            <section class="border-t border-brand-borderLight dark:border-white/10 bg-brand-surfaceLight dark:bg-slate-900/20 py-20 mt-20">
                <div class="max-w-[1400px] mx-auto px-6 md:px-12">
                    <div class="flex flex-col sm:flex-row justify-between sm:items-end mb-12 gap-4">
                        <div>
                            <span class="text-brand-secondary font-bold text-xs uppercase tracking-widest block mb-2">Further Intelligence</span>
                            <h2 class="font-display font-extrabold text-2xl text-brand-primary dark:text-white">Related Publications</h2>
                        </div>
                        <a class="text-xs font-bold text-brand-primary dark:text-brand-secondary flex items-center gap-1 hover:underline" href="{{ route('blog') }}">
                            View all publications <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </a>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        @foreach($related as $relatedArticle)
                            <!-- Related Card -->
                            <a href="{{ route('blog.show', $relatedArticle->slug) }}" class="group bg-white dark:bg-slate-900 border border-brand-borderLight dark:border-white/5 rounded-2xl overflow-hidden shadow-premium hover:shadow-premiumHover hover:scale-[1.01] transition-all flex flex-col justify-between">
                                <div>
                                    <div class="aspect-video overflow-hidden relative bg-slate-100 dark:bg-slate-950">
                                        @if($relatedArticle->featured_image)
                                            <img alt="{{ $relatedArticle->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ asset('storage/' . $relatedArticle->featured_image) }}"/>
                                        @else
                                            <img alt="Article Cover" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ $fallbackImages[$loop->index % count($fallbackImages)] }}"/>
                                        @endif
                                    </div>
                                    <div class="p-6 space-y-2">
                                        <span class="text-[9px] font-mono font-bold text-brand-secondary uppercase tracking-wider">{{ $relatedArticle->category->name ?? 'Technology' }}</span>
                                        <h3 class="font-display font-bold text-sm text-brand-primary dark:text-white leading-snug group-hover:text-brand-secondary transition-colors line-clamp-2">{{ $relatedArticle->title }}</h3>
                                    </div>
                                </div>
                                <div class="px-6 pb-6 pt-2">
                                    <span class="text-[10px] font-bold text-brand-primary dark:text-brand-secondary flex items-center gap-0.5">Read Post <span class="material-symbols-outlined text-xs group-hover:translate-x-1 transition-transform">arrow_forward</span></span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- Executive CTA Section -->
        <section class="max-w-[1400px] mx-auto px-6 md:px-12 py-20">
            <div class="bg-brand-primary dark:bg-slate-900 text-white rounded-3xl p-12 text-center relative overflow-hidden border border-brand-primaryDark dark:border-white/10">
                <div class="absolute top-0 right-0 w-1/3 h-full bg-white/5 -skew-x-12 translate-x-1/2 pointer-events-none"></div>
                <div class="max-w-2xl mx-auto space-y-6 relative z-10">
                    <h2 class="font-display font-extrabold text-2xl md:text-3xl">Have a vision for your project?</h2>
                    <p class="text-blue-100 dark:text-slate-300 text-sm leading-relaxed">
                        We partner with ambitious organizations to build compliance-first, high-performance technology structures from inception to deployment.
                    </p>
                    <div class="pt-4 flex flex-wrap justify-center gap-4">
                        <a href="{{ route('project') }}" class="bg-brand-secondary hover:bg-brand-secondaryDark text-white px-8 py-3.5 rounded-xl text-xs font-bold transition-transform active:scale-95 shadow-md">Start Project</a>
                        <a href="{{ route('about') }}" class="border border-white/20 hover:bg-white/10 text-white px-8 py-3.5 rounded-xl text-xs font-bold transition-all">About Us</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script>
        // Reading progress calculation
        window.addEventListener('scroll', function() {
            let winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            let scrolled = (winScroll / height) * 100;
            const progress = document.getElementById("readingProgress");
            if (progress) {
                progress.style.width = scrolled + "%";
            }
        });
    </script>
@endsection
