@extends('layouts.app')

@section('title', 'About Us | Elvora Innovation')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-brand-surfaceLight dark:bg-brand-surfaceDark overflow-hidden py-24 border-b border-brand-borderLight dark:border-white/10">
        <div class="absolute inset-0 grid-dots opacity-40 dark:grid-dots-dark"></div>
        <div class="max-w-[1600px] w-full mx-auto px-4 relative z-10 text-center space-y-6">
            <span class="text-brand-secondary font-bold text-xs uppercase tracking-widest block">Who We Are</span>
            <h1 class="font-display font-extrabold text-fluid-4xl lg:text-fluid-5xl xl:text-fluid-6xl text-brand-primary dark:text-white max-w-3xl mx-auto leading-tight">
                About Elvora Innovation
            </h1>
            <p class="text-brand-textMuted dark:text-slate-400 text-lg max-w-3xl mx-auto leading-relaxed">
                Elvora Innovation is a company focused on building products that solve real-world problems. We work with startups, businesses, and organizations to design, build, and grow impactful products. Our team combines expertise in managing products, analysis, design, and building websites and apps to deliver solutions that create real value.
            </p>
        </div>
    </section>

    <!-- Mission & Vision Bento -->
    <section class="py-24 bg-white dark:bg-slate-950 border-b border-brand-borderLight dark:border-white/10">
        <div class="max-w-[1600px] w-full mx-auto px-4 grid lg:grid-cols-2 gap-8">
            <div class="p-8 rounded-2xl bg-brand-surfaceLight dark:bg-slate-900/40 border border-brand-borderLight dark:border-white/10 space-y-4 hover-card-trigger">
                <div class="w-12 h-12 rounded-xl bg-blue-50 dark:bg-slate-950 border border-blue-100 dark:border-white/10 flex items-center justify-center text-brand-primary dark:text-brand-secondary">
                    <x-lucide-eye class="w-6 h-6" />
                </div>
                <h2 class="font-display font-extrabold text-xl text-brand-primary dark:text-white">Our Vision</h2>
                <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed">
                    To become a leading company helping businesses grow with technology and new tools across Africa.
                </p>
            </div>
            <div class="p-8 rounded-2xl bg-brand-surfaceLight dark:bg-slate-900/40 border border-brand-borderLight dark:border-white/10 space-y-4 hover-card-trigger">
                <div class="w-12 h-12 rounded-xl bg-blue-50 dark:bg-slate-950 border border-blue-100 dark:border-white/10 flex items-center justify-center text-brand-primary dark:text-brand-secondary">
                    <x-lucide-rocket class="w-6 h-6" />
                </div>
                <h2 class="font-display font-extrabold text-xl text-brand-primary dark:text-white">Our Mission</h2>
                <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed">
                    To help people turn their ideas into great products through strategy, new ideas, and the right tools.
                </p>
            </div>
        </div>
    </section>

    <!-- Core Values -->
    <section class="py-24 bg-white dark:bg-slate-950 border-b border-brand-borderLight dark:border-white/10">
        <div class="max-w-[1600px] w-full mx-auto px-4 space-y-16">
            <div class="text-center space-y-3">
                <span class="text-brand-secondary font-bold text-xs uppercase tracking-widest block">Principles</span>
                <h2 class="font-display font-extrabold text-fluid-3xl md:text-fluid-4xl lg:text-fluid-5xl text-brand-primary dark:text-white">Our Core Values</h2>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Value 1 -->
                <div class="bg-brand-surfaceLight dark:bg-slate-900/40 p-8 rounded-2xl border border-brand-borderLight dark:border-white/10 flex flex-col justify-between hover-card-trigger shadow-sm">
                    <div class="space-y-4">
                        <div class="w-10 h-10 rounded-full bg-blue-50 dark:bg-slate-950 border border-blue-100 dark:border-white/10 flex items-center justify-center text-brand-primary dark:text-brand-secondary shrink-0">
                            <x-lucide-lightbulb class="w-5 h-5" />
                        </div>
                        <h3 class="font-display font-bold text-lg text-brand-primary dark:text-white">Innovation</h3>
                        <p class="text-brand-textMuted dark:text-slate-400 text-xs leading-relaxed">
                            We embrace creativity and forward-thinking solutions.
                        </p>
                    </div>
                </div>

                <!-- Value 2 -->
                <div class="bg-brand-surfaceLight dark:bg-slate-900/40 p-8 rounded-2xl border border-brand-borderLight dark:border-white/10 flex flex-col justify-between hover-card-trigger shadow-sm">
                    <div class="space-y-4">
                        <div class="w-10 h-10 rounded-full bg-blue-50 dark:bg-slate-950 border border-blue-100 dark:border-white/10 flex items-center justify-center text-brand-primary dark:text-brand-secondary shrink-0">
                            <x-lucide-trophy class="w-5 h-5" />
                        </div>
                        <h3 class="font-display font-bold text-lg text-brand-primary dark:text-white">Excellence</h3>
                        <p class="text-brand-textMuted dark:text-slate-400 text-xs leading-relaxed">
                            We are committed to delivering high-quality outcomes.
                        </p>
                    </div>
                </div>

                <!-- Value 3 -->
                <div class="bg-brand-surfaceLight dark:bg-slate-900/40 p-8 rounded-2xl border border-brand-borderLight dark:border-white/10 flex flex-col justify-between hover-card-trigger shadow-sm">
                    <div class="space-y-4">
                        <div class="w-10 h-10 rounded-full bg-blue-50 dark:bg-slate-950 border border-blue-100 dark:border-white/10 flex items-center justify-center text-brand-primary dark:text-brand-secondary shrink-0">
                            <x-lucide-scale class="w-5 h-5" />
                        </div>
                        <h3 class="font-display font-bold text-lg text-brand-primary dark:text-white">Integrity</h3>
                        <p class="text-brand-textMuted dark:text-slate-400 text-xs leading-relaxed">
                            We operate with transparency and accountability.
                        </p>
                    </div>
                </div>

                <!-- Value 4 -->
                <div class="bg-brand-surfaceLight dark:bg-slate-900/40 p-8 rounded-2xl border border-brand-borderLight dark:border-white/10 flex flex-col justify-between hover-card-trigger shadow-sm">
                    <div class="space-y-4">
                        <div class="w-10 h-10 rounded-full bg-blue-50 dark:bg-slate-950 border border-blue-100 dark:border-white/10 flex items-center justify-center text-brand-primary dark:text-brand-secondary shrink-0">
                            <x-lucide-hand class="w-5 h-5" />
                        </div>
                        <h3 class="font-display font-bold text-lg text-brand-primary dark:text-white">Collaboration</h3>
                        <p class="text-brand-textMuted dark:text-slate-400 text-xs leading-relaxed">
                            We believe great products are built together.
                        </p>
                    </div>
                </div>

                <!-- Value 5 -->
                <div class="bg-brand-surfaceLight dark:bg-slate-900/40 p-8 rounded-2xl border border-brand-borderLight dark:border-white/10 flex flex-col justify-between hover-card-trigger shadow-sm">
                    <div class="space-y-4">
                        <div class="w-10 h-10 rounded-full bg-blue-50 dark:bg-slate-950 border border-blue-100 dark:border-white/10 flex items-center justify-center text-brand-primary dark:text-brand-secondary shrink-0">
                            <x-lucide-eye class="w-5 h-5" />
                        </div>
                        <h3 class="font-display font-bold text-lg text-brand-primary dark:text-white">Impact</h3>
                        <p class="text-brand-textMuted dark:text-slate-400 text-xs leading-relaxed">
                            We focus on creating meaningful value for users and organizations.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
ction
