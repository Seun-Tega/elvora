@extends('layouts.app')

@section('title', 'Services & Capabilities | Elvora Innovation')

@section('content')
    <!-- Header Section -->
    <section class="relative bg-brand-surfaceLight dark:bg-brand-surfaceDark overflow-hidden py-24 border-b border-brand-borderLight dark:border-white/10">
        <div class="absolute inset-0 grid-dots opacity-40 dark:grid-dots-dark"></div>
        <div class="max-w-[1600px] w-full mx-auto px-4 relative z-10 text-center space-y-6">
            <span class="text-brand-secondary font-bold text-xs uppercase tracking-widest block">What we do &amp; How we help</span>
            <h1 class="font-display font-extrabold text-fluid-4xl lg:text-fluid-5xl xl:text-fluid-6xl text-brand-primary dark:text-white max-w-3xl mx-auto leading-tight">
                Our Services
            </h1>
            <p class="text-brand-textMuted dark:text-slate-400 text-lg max-w-2xl mx-auto leading-relaxed">
                From planning your idea to launching and growing it, we work with you to build products that create real results.
            </p>
        </div>
    </section>

    <!-- Services list with filter -->
    <section class="py-24 bg-white dark:bg-slate-950" x-data="{ activeTab: 'all' }">
        <div class="max-w-[1600px] w-full mx-auto px-4">
            <!-- Filter Controls -->
            <div class="flex flex-wrap justify-center gap-2 mb-16">
                <button @click="activeTab = 'all'" 
                        :class="activeTab === 'all' ? 'bg-brand-primary text-white' : 'bg-brand-surfaceLight dark:bg-slate-900 text-brand-textMuted dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800'"
                        class="px-6 py-2.5 rounded-full text-xs font-bold transition-all">
                    All Services
                </button>
                <button @click="activeTab = 'strategy'" 
                        :class="activeTab === 'strategy' ? 'bg-brand-primary text-white' : 'bg-brand-surfaceLight dark:bg-slate-900 text-brand-textMuted dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800'"
                        class="px-6 py-2.5 rounded-full text-xs font-bold transition-all">
                    Planning &amp; Analysis
                </button>
                <button @click="activeTab = 'engineering'" 
                        :class="activeTab === 'engineering' ? 'bg-brand-primary text-white' : 'bg-brand-surfaceLight dark:bg-slate-900 text-brand-textMuted dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800'"
                        class="px-6 py-2.5 rounded-full text-xs font-bold transition-all">
                    Design &amp; Building
                </button>
                <button @click="activeTab = 'growth'" 
                        :class="activeTab === 'growth' ? 'bg-brand-primary text-white' : 'bg-brand-surfaceLight dark:bg-slate-900 text-brand-textMuted dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800'"
                        class="px-6 py-2.5 rounded-full text-xs font-bold transition-all">
                    Growth &amp; New Ideas
                </button>
            </div>

            <!-- Bento Card Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Product Strategy -->
                <div x-show="activeTab === 'all' || activeTab === 'strategy'"
                     x-transition
                     class="bg-brand-surfaceLight dark:bg-slate-900/40 border border-brand-borderLight dark:border-white/10 p-8 rounded-2xl shadow-sm space-y-4 hover-card-trigger flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-brand-primary/5 dark:bg-white/5 flex items-center justify-center text-brand-primary dark:text-brand-secondary">
                            <x-lucide-map class="w-6 h-6" />
                        </div>
                        <h3 class="font-display font-bold text-lg text-brand-primary dark:text-white">Product Strategy</h3>
                        <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed">
                            Great products start with a clear plan. We help you set goals, find opportunities, and create a step-by-step path to finish your product.
                        </p>
                    </div>
                </div>

                <!-- Business Analysis -->
                <div x-show="activeTab === 'all' || activeTab === 'strategy'"
                     x-transition
                     class="bg-brand-surfaceLight dark:bg-slate-900/40 border border-brand-borderLight dark:border-white/10 p-8 rounded-2xl shadow-sm space-y-4 hover-card-trigger flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-brand-primary/5 dark:bg-white/5 flex items-center justify-center text-brand-primary dark:text-brand-secondary">
                            <x-lucide-search class="w-6 h-6" />
                        </div>
                        <h3 class="font-display font-bold text-lg text-brand-primary dark:text-white">Analysis</h3>
                        <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed">
                            We look at what your business needs, check for any problems, and make sure the tools we build help you reach your goals.
                        </p>
                    </div>
                </div>

                <!-- Product Management -->
                <div x-show="activeTab === 'all' || activeTab === 'strategy'"
                     x-transition
                     class="bg-brand-surfaceLight dark:bg-slate-900/40 border border-brand-borderLight dark:border-white/10 p-8 rounded-2xl shadow-sm space-y-4 hover-card-trigger flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-brand-primary/5 dark:bg-white/5 flex items-center justify-center text-brand-primary dark:text-brand-secondary">
                            <x-lucide-target class="w-6 h-6" />
                        </div>
                        <h3 class="font-display font-bold text-lg text-brand-primary dark:text-white">Product Management</h3>
                        <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed">
                            We guide your product from an idea to a finished launch by planning, choosing what's most important, and working with your team.
                        </p>
                    </div>
                </div>

                <!-- UI/UX Design -->
                <div x-show="activeTab === 'all' || activeTab === 'engineering'"
                     x-transition
                     class="bg-brand-surfaceLight dark:bg-slate-900/40 border border-brand-borderLight dark:border-white/10 p-8 rounded-2xl shadow-sm space-y-4 hover-card-trigger flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-brand-primary/5 dark:bg-white/5 flex items-center justify-center text-brand-primary dark:text-brand-secondary">
                            <x-lucide-figma class="w-6 h-6" />
                        </div>
                        <h3 class="font-display font-bold text-lg text-brand-primary dark:text-white">Design for People</h3>
                        <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed">
                            Making screens that are simple and beautiful so they are easy for everyone to use.
                        </p>
                    </div>
                </div>

                <!-- Web Development -->
                <div x-show="activeTab === 'all' || activeTab === 'engineering'"
                     x-transition
                     class="bg-brand-surfaceLight dark:bg-slate-900/40 border border-brand-borderLight dark:border-white/10 p-8 rounded-2xl shadow-sm space-y-4 hover-card-trigger flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-brand-primary/5 dark:bg-white/5 flex items-center justify-center text-brand-primary dark:text-brand-secondary">
                            <x-lucide-code-2 class="w-6 h-6" />
                        </div>
                        <h3 class="font-display font-bold text-lg text-brand-primary dark:text-white">Web Building</h3>
                        <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed">
                            Custom websites and apps built to be fast, safe, and ready to grow with your business.
                        </p>
                    </div>
                </div>

                <!-- Mobile App Development -->
                <div x-show="activeTab === 'all' || activeTab === 'engineering'"
                     x-transition
                     class="bg-brand-surfaceLight dark:bg-slate-900/40 border border-brand-borderLight dark:border-white/10 p-8 rounded-2xl shadow-sm space-y-4 hover-card-trigger flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-brand-primary/5 dark:bg-white/5 flex items-center justify-center text-brand-primary dark:text-brand-secondary">
                            <x-lucide-smartphone class="w-6 h-6" />
                        </div>
                        <h3 class="font-display font-bold text-lg text-brand-primary dark:text-white">Mobile App Building</h3>
                        <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed">
                            Apps for Android and iPhones that help your business connect with customers anywhere.
                        </p>
                    </div>
                </div>

                <!-- Digital Transformation -->
                <div x-show="activeTab === 'all' || activeTab === 'growth'"
                     x-transition
                     class="bg-brand-surfaceLight dark:bg-slate-900/40 border border-brand-borderLight dark:border-white/10 p-8 rounded-2xl shadow-sm space-y-4 hover-card-trigger flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-brand-primary/5 dark:bg-white/5 flex items-center justify-center text-brand-primary dark:text-brand-secondary">
                            <x-lucide-trending-up class="w-6 h-6" />
                        </div>
                        <h3 class="font-display font-bold text-lg text-brand-primary dark:text-white">Helping Businesses Grow</h3>
                        <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed">
                            Helping companies use new tools to work better and automate their daily tasks.
                        </p>
                    </div>
                </div>

                <!-- Technology Consulting -->
                <div x-show="activeTab === 'all' || activeTab === 'strategy'"
                     x-transition
                     class="bg-brand-surfaceLight dark:bg-slate-900/40 border border-brand-borderLight dark:border-white/10 p-8 rounded-2xl shadow-sm space-y-4 hover-card-trigger flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-brand-primary/5 dark:bg-white/5 flex items-center justify-center text-brand-primary dark:text-brand-secondary">
                            <x-lucide-lightbulb class="w-6 h-6" />
                        </div>
                        <h3 class="font-display font-bold text-lg text-brand-primary dark:text-white">Strategy Consulting</h3>
                        <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed">
                            Expert advice on how to use new tools and methods to update and grow your business.
                        </p>
                    </div>
                </div>

                <!-- Venture Building -->
                <div x-show="activeTab === 'all' || activeTab === 'growth'"
                     x-transition
                     class="bg-brand-surfaceLight dark:bg-slate-900/40 border border-brand-borderLight dark:border-white/10 p-8 rounded-2xl shadow-sm space-y-4 hover-card-trigger flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-brand-primary/5 dark:bg-white/5 flex items-center justify-center text-brand-primary dark:text-brand-secondary">
                            <x-lucide-rocket class="w-6 h-6" />
                        </div>
                        <h3 class="font-display font-bold text-lg text-brand-primary dark:text-white">Building New Ideas</h3>
                        <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed">
                            Supporting people with new ideas from the very start through to building and growing their product.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
