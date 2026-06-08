@extends('layouts.app')

@section('title', 'Elvora Innovation | Building Digital Products That Solve Real Problems')

@section('head')
    <style>
        @keyframes marquee {
            0% { transform: translateX(0%); }
            100% { transform: translateX(-50%); }
        }
        .marquee-content {
            display: inline-flex;
            animation: marquee 35s linear infinite;
        }
        .marquee-container:hover .marquee-content {
            animation-play-state: paused;
        }
        .scroll-down-dot {
            animation: scrollDown 2.2s infinite;
        }
        @keyframes scrollDown {
            0% { transform: translateY(0); opacity: 1; }
            50% { transform: translateY(8px); opacity: 0.3; }
            100% { transform: translateY(0); opacity: 1; }
        }
    </style>
@endsection

@section('content')
    <!-- Hero & Portfolio Showcase -->
    <section class="relative min-h-screen flex items-center justify-center bg-black overflow-hidden py-32 border-b border-white/5">
        <!-- Background Elements -->
        <div class="absolute inset-0 z-0 pointer-events-none">
            <img src="https://images.pexels.com/photos/5058118/pexels-photo-5058118.jpeg?auto=compress&cs=tinysrgb&w=1920" 
                 class="absolute inset-0 w-full h-full object-cover object-center opacity-60 mix-blend-luminosity" 
                 alt="Infrastructure Texture">
            <!-- Gradient overlay for text legibility -->
            <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/20 to-black"></div>
        </div>
        
        <div class="max-w-[1400px] mx-auto px-6 md:px-12 relative z-10 w-full flex flex-col items-center text-center">
            <!-- Narrative -->
            <div class="flex flex-col items-center space-y-8 max-w-4xl">
                <div class="inline-flex items-center space-x-3 bg-white/10 backdrop-blur-md border border-white/10 px-5 py-2 rounded-full w-fit shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-brand-secondary animate-pulse shadow-[0_0_10px_rgba(204,153,51,0.5)]"></span>
                    <span class="font-display font-bold uppercase tracking-[0.2em] text-[10px] text-white/80">Strategy &amp; Innovation</span>
                </div>
                
                <h1 class="font-display text-5xl md:text-6xl lg:text-7xl xl:text-8xl leading-[1.05] font-extrabold tracking-tighter text-white">
                    Building <span class="text-brand-secondary drop-shadow-sm">Digital Products</span> <br/>That Solve Real Problems
                </h1>
                
                <p class="text-slate-300 text-xl md:text-2xl max-w-3xl leading-relaxed font-medium">
                    Elvora Innovation helps businesses, startups, and organizations design, build, and scale products that drive growth, efficiency, and impact.
                </p>

                <div class="flex flex-wrap justify-center gap-5 pt-4">
                    <a href="{{ route('project') }}" class="group bg-brand-primary text-white hover:bg-brand-primaryDark px-10 py-5 rounded-2xl font-bold flex items-center space-x-3 shadow-2xl transition-all hover:-translate-y-1 active:scale-95 duration-300">
                        <span>Start a Project</span>
                        <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    </a>
                    <a href="{{ route('contact') }}" class="backdrop-blur-md border border-white/10 hover:bg-white/5 text-white px-10 py-5 rounded-2xl font-bold transition-all hover:-translate-y-1 active:scale-95 duration-300">
                        Book a Consultation
                    </a>
                </div>
            </div>
        </div>

        <div class="absolute bottom-12 left-1/2 -translate-x-1/2 z-10 flex flex-col items-center gap-3 opacity-40 hover:opacity-100 transition-opacity cursor-pointer">
            <span class="text-[10px] font-bold tracking-[0.4em] uppercase text-slate-400">Deep Scan</span>
            <div class="w-6 h-10 border-2 border-slate-500 rounded-full flex justify-center p-1.5">
                <div class="w-1.5 h-1.5 bg-brand-secondary rounded-full scroll-down-dot shadow-[0_0_10px_rgba(204,153,51,1)]"></div>
            </div>
        </div>
    </section>

    <!-- Continuous Logo Marquee -->
    <section class="py-16 bg-white dark:bg-brand-surfaceDark border-b border-brand-borderLight dark:border-white/5 overflow-hidden relative">
        <div class="max-w-[1400px] mx-auto px-6 md:px-12 mb-6">
            <p class="text-center text-[10px] font-bold uppercase tracking-[0.4em] text-brand-textMuted dark:text-slate-500 opacity-60">
                Helping businesses transform ideas into products people love
            </p>
        </div>
        <div class="marquee-container flex overflow-hidden select-none relative w-full mask-marquee">
            <!-- Repeat marquee content to ensure seamless loop -->
            <div class="marquee-content flex gap-20 items-center py-4 text-brand-textMuted dark:text-slate-500 font-display font-extrabold text-[11px] tracking-[0.3em] uppercase opacity-40">
                <span><span class="text-brand-secondary mr-3 text-lg">✦</span>Product Strategy</span>
                <span><span class="text-brand-secondary mr-3 text-lg">✦</span>Web Building</span>
                <span><span class="text-brand-secondary mr-3 text-lg">✦</span>Mobile Apps</span>
                <span><span class="text-brand-secondary mr-3 text-lg">✦</span>People-First Design</span>
                <span><span class="text-brand-secondary mr-3 text-lg">✦</span>Building New Ideas</span>
                <span><span class="text-brand-secondary mr-3 text-lg">✦</span>Business Growth</span>
            </div>
            <div class="marquee-content flex gap-20 items-center py-4 text-brand-textMuted dark:text-slate-500 font-display font-extrabold text-[11px] tracking-[0.3em] uppercase opacity-40" aria-hidden="true">
                <span><span class="text-brand-secondary mr-3 text-lg">✦</span>Product Strategy</span>
                <span><span class="text-brand-secondary mr-3 text-lg">✦</span>Web Building</span>
                <span><span class="text-brand-secondary mr-3 text-lg">✦</span>Mobile Apps</span>
                <span><span class="text-brand-secondary mr-3 text-lg">✦</span>People-First Design</span>
                <span><span class="text-brand-secondary mr-3 text-lg">✦</span>Building New Ideas</span>
                <span><span class="text-brand-secondary mr-3 text-lg">✦</span>Business Growth</span>
            </div>
        </div>
    </section>

    <!-- Homepage About section (Premium Side-by-Side) -->
    <section class="py-32 bg-brand-surfaceLight dark:bg-brand-primaryDark border-b border-brand-borderLight dark:border-white/5 relative">
        <div class="max-w-[1400px] mx-auto px-6 md:px-12 grid lg:grid-cols-12 gap-16 items-center">
            <!-- Left Info -->
            <div class="lg:col-span-7 space-y-8">
                <span class="text-brand-secondary font-bold text-xs uppercase tracking-[0.4em] block">Our Focus</span>
                <h2 class="font-display font-extrabold text-4xl md:text-5xl text-brand-primary dark:text-white tracking-tight">
                    Innovation Driven. <br/>Results Focused.
                </h2>
                <p class="text-brand-textMuted dark:text-slate-400 text-lg leading-relaxed font-medium">
                    Elvora Innovation is a company helping businesses turn ideas into products that grow. From planning and analysis to design and building, we work with you to create products that people love.
                </p>
                
                <div class="grid grid-cols-2 gap-6 pt-4 border-t border-brand-borderLight dark:border-white/5 text-xs text-brand-textMuted dark:text-slate-400">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-brand-secondary">check_circle</span>
                        <span class="font-bold">Fast &amp; Flexible</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-brand-secondary">check_circle</span>
                        <span class="font-bold">Product-First Mindset</span>
                    </div>
                </div>
            </div>
            
            <!-- Right Graphic Frame -->
            <div class="lg:col-span-5 relative flex justify-center">
                <div class="absolute inset-0 bg-brand-secondary/10 dark:bg-brand-secondary/5 rounded-3xl blur-2xl pointer-events-none"></div>
                <div class="relative p-2 bg-gradient-to-br from-brand-secondary/30 to-brand-primary/30 rounded-3xl shadow-xl w-full max-w-md">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=80" 
                         alt="Collaboration Session" 
                         class="rounded-2xl object-cover h-[350px] w-full filter brightness-95 contrast-105">
                </div>
            </div>
        </div>
    </section>

    <!-- What We Do (Capabilities Bento Grid) -->
    <section class="py-32 bg-white dark:bg-brand-surfaceDark border-b border-brand-borderLight dark:border-white/5 relative">
        <div class="max-w-[1400px] mx-auto px-6 md:px-12 relative z-10">
            <div class="text-center max-w-2xl mx-auto mb-20 space-y-4">
                <span class="text-brand-secondary font-bold text-xs uppercase tracking-[0.4em] block">What We Do</span>
                <h2 class="font-display font-extrabold text-4xl md:text-5xl text-brand-primary dark:text-white tracking-tight">How We Help You</h2>
                <p class="text-brand-textMuted dark:text-slate-400 text-lg">From planning your idea to launching and growing it, we work with you to build products that really work.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div class="group bg-brand-surfaceLight dark:bg-brand-primaryDark p-10 rounded-3xl border border-brand-borderLight dark:border-white/10 flex flex-col justify-between hover-card-trigger shadow-sm hover:shadow-[0_20px_50px_rgba(0,51,102,0.08)] hover:border-brand-primary/20 dark:hover:border-white/20 transition-all duration-500">
                    <div class="space-y-6">
                        <div class="w-14 h-14 rounded-2xl bg-white dark:bg-brand-surfaceDark border border-brand-borderLight dark:border-white/10 flex items-center justify-center text-brand-primary dark:text-brand-secondary shadow-sm group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">
                            <span class="material-symbols-outlined text-3xl">insights</span>
                        </div>
                        <h3 class="font-display font-bold text-xl text-brand-primary dark:text-white">Product Planning</h3>
                        <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed font-medium">
                            We help you plan your product, decide what it needs, and create a clear step-by-step path to finish it.
                        </p>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="group bg-brand-surfaceLight dark:bg-brand-primaryDark p-10 rounded-3xl border border-brand-borderLight dark:border-white/10 flex flex-col justify-between hover-card-trigger shadow-sm hover:shadow-[0_20px_50px_rgba(0,51,102,0.08)] hover:border-brand-primary/20 dark:hover:border-white/20 transition-all duration-500">
                    <div class="space-y-6">
                        <div class="w-14 h-14 rounded-2xl bg-white dark:bg-brand-surfaceDark border border-brand-borderLight dark:border-white/10 flex items-center justify-center text-brand-primary dark:text-brand-secondary shadow-sm group-hover:scale-110 group-hover:-rotate-3 transition-transform duration-300">
                            <span class="material-symbols-outlined text-3xl">code</span>
                        </div>
                        <h3 class="font-display font-bold text-xl text-brand-primary dark:text-white">Web Building</h3>
                        <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed font-medium">
                            We build fast and safe websites for businesses and startups that are easy for everyone to use.
                        </p>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="group bg-brand-surfaceLight dark:bg-brand-primaryDark p-10 rounded-3xl border border-brand-borderLight dark:border-white/10 flex flex-col justify-between hover-card-trigger shadow-sm hover:shadow-[0_20px_50px_rgba(0,51,102,0.08)] hover:border-brand-primary/20 dark:hover:border-white/20 transition-all duration-500">
                    <div class="space-y-6">
                        <div class="w-14 h-14 rounded-2xl bg-white dark:bg-brand-surfaceDark border border-brand-borderLight dark:border-white/10 flex items-center justify-center text-brand-primary dark:text-brand-secondary shadow-sm group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">
                            <span class="material-symbols-outlined text-3xl">phone_iphone</span>
                        </div>
                        <h3 class="font-display font-bold text-xl text-brand-primary dark:text-white">Mobile App Building</h3>
                        <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed font-medium">
                            Apps for phones that people enjoy using and that help your business grow.
                        </p>
                    </div>
                </div>

                <!-- Service 4 -->
                <div class="group bg-brand-surfaceLight dark:bg-brand-primaryDark p-10 rounded-3xl border border-brand-borderLight dark:border-white/10 flex flex-col justify-between hover-card-trigger shadow-sm hover:shadow-[0_20px_50px_rgba(0,51,102,0.08)] hover:border-brand-primary/20 dark:hover:border-white/20 transition-all duration-500">
                    <div class="space-y-6">
                        <div class="w-14 h-14 rounded-2xl bg-white dark:bg-brand-surfaceDark border border-brand-borderLight dark:border-white/10 flex items-center justify-center text-brand-primary dark:text-brand-secondary shadow-sm group-hover:scale-110 group-hover:-rotate-3 transition-transform duration-300">
                            <span class="material-symbols-outlined text-3xl">palette</span>
                        </div>
                        <h3 class="font-display font-bold text-xl text-brand-primary dark:text-white">Design for People</h3>
                        <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed font-medium">
                            Creating simple and beautiful screens that make it easy for your customers to get things done.
                        </p>
                    </div>
                </div>

                <!-- Service 5 -->
                <div class="group bg-brand-surfaceLight dark:bg-brand-primaryDark p-10 rounded-3xl border border-brand-borderLight dark:border-white/10 flex flex-col justify-between hover-card-trigger shadow-sm hover:shadow-[0_20px_50px_rgba(0,51,102,0.08)] hover:border-brand-primary/20 dark:hover:border-white/20 transition-all duration-500">
                    <div class="space-y-6">
                        <div class="w-14 h-14 rounded-2xl bg-white dark:bg-brand-surfaceDark border border-brand-borderLight dark:border-white/10 flex items-center justify-center text-brand-primary dark:text-brand-secondary shadow-sm group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">
                            <span class="material-symbols-outlined text-3xl">rocket_launch</span>
                        </div>
                        <h3 class="font-display font-bold text-xl text-brand-primary dark:text-white">Building New Ideas</h3>
                        <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed font-medium">
                            Supporting people with new ideas from the very start all the way to launching and growing.
                        </p>
                    </div>
                </div>

                <!-- Service 6 -->
                <div class="group bg-brand-surfaceLight dark:bg-brand-primaryDark p-10 rounded-3xl border border-brand-borderLight dark:border-white/10 flex flex-col justify-between hover-card-trigger shadow-sm hover:shadow-[0_20px_50px_rgba(0,51,102,0.08)] hover:border-brand-primary/20 dark:hover:border-white/20 transition-all duration-500">
                    <div class="space-y-6">
                        <div class="w-14 h-14 rounded-2xl bg-white dark:bg-brand-surfaceDark border border-brand-borderLight dark:border-white/10 flex items-center justify-center text-brand-primary dark:text-brand-secondary shadow-sm group-hover:scale-110 group-hover:-rotate-3 transition-transform duration-300">
                            <span class="material-symbols-outlined text-3xl">settings_suggest</span>
                        </div>
                        <h3 class="font-display font-bold text-xl text-brand-primary dark:text-white">Business Growth</h3>
                        <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed font-medium">
                            Helping companies use new tools to work better, faster, and smarter.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Industries We Serve (Who We Help) -->
    <section class="py-32 bg-brand-surfaceLight dark:bg-brand-primaryDark border-b border-brand-borderLight dark:border-white/5 relative">
        <div class="max-w-[1400px] mx-auto px-6 md:px-12 relative z-10">
            <div class="text-center max-w-2xl mx-auto mb-20 space-y-4">
                <span class="text-brand-secondary font-bold text-xs uppercase tracking-[0.4em] block">Sectors</span>
                <h2 class="font-display font-extrabold text-4xl md:text-5xl text-brand-primary dark:text-white tracking-tight">Who We Help</h2>
                <p class="text-brand-textMuted dark:text-slate-400 text-lg">Special help for different types of businesses and organizations.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Healthcare -->
                <a href="{{ route('industries.healthcare') }}" class="group relative overflow-hidden rounded-3xl h-80 flex flex-col justify-end p-8 border border-brand-borderLight dark:border-white/10 shadow-lg transition-all duration-700 hover:-translate-y-2 hover:shadow-2xl">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110 -z-20" style="background-image: url('https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=600&q=80')"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/40 to-transparent -z-10 group-hover:via-slate-950/50 transition-all"></div>
                    <div class="space-y-3">
                        <span class="material-symbols-outlined text-brand-secondary text-3xl">health_and_safety</span>
                        <h4 class="font-display font-bold text-xl text-white">Healthcare</h4>
                        <p class="text-xs text-slate-300 font-medium leading-relaxed">Tools for doctors and patients to connect and work together easily.</p>
                        <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-brand-secondary flex items-center gap-2 pt-2">
                            Explore <span class="material-symbols-outlined text-xs transition-transform duration-300 group-hover:translate-x-1">arrow_forward</span>
                        </span>
                    </div>
                </a>

                <!-- Education -->
                <div class="group relative overflow-hidden rounded-3xl h-80 flex flex-col justify-end p-8 border border-brand-borderLight dark:border-white/10 shadow-lg transition-all duration-700 hover:-translate-y-2 hover:shadow-2xl">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110 -z-20" style="background-image: url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&w=600&q=80')"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/40 to-transparent -z-10"></div>
                    <div class="space-y-3">
                        <span class="material-symbols-outlined text-brand-secondary text-3xl">school</span>
                        <h4 class="font-display font-bold text-xl text-white">Education</h4>
                        <p class="text-xs text-slate-300 font-medium leading-relaxed">Websites and apps for schools and students to learn better.</p>
                    </div>
                </div>

                <!-- Money & Banking -->
                <a href="{{ route('industries.fintech') }}" class="group relative overflow-hidden rounded-3xl h-80 flex flex-col justify-end p-8 border border-brand-borderLight dark:border-white/10 shadow-lg transition-all duration-700 hover:-translate-y-2 hover:shadow-2xl">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110 -z-20" style="background-image: url('https://images.unsplash.com/photo-1559526324-4b87b5e36e44?auto=format&fit=crop&w=600&q=80')"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/40 to-transparent -z-10 group-hover:via-slate-950/50 transition-all"></div>
                    <div class="space-y-3">
                        <span class="material-symbols-outlined text-brand-secondary text-3xl">account_balance</span>
                        <h4 class="font-display font-bold text-xl text-white">Money &amp; Banking</h4>
                        <p class="text-xs text-slate-300 font-medium leading-relaxed">Simple and safe ways to manage money and pay for things online.</p>
                        <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-brand-secondary flex items-center gap-2 pt-2">
                            Explore <span class="material-symbols-outlined text-xs transition-transform duration-300 group-hover:translate-x-1">arrow_forward</span>
                        </span>
                    </div>
                </a>

                <!-- Shipping & Delivery -->
                <a href="{{ route('industries.logistics') }}" class="group relative overflow-hidden rounded-3xl h-80 flex flex-col justify-end p-8 border border-brand-borderLight dark:border-white/10 shadow-lg transition-all duration-700 hover:-translate-y-2 hover:shadow-2xl">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110 -z-20" style="background-image: url('https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=600&q=80')"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/40 to-transparent -z-10 group-hover:via-slate-950/50 transition-all"></div>
                    <div class="space-y-3">
                        <span class="material-symbols-outlined text-brand-secondary text-3xl">local_shipping</span>
                        <h4 class="font-display font-bold text-xl text-white">Shipping &amp; Delivery</h4>
                        <p class="text-xs text-slate-300 font-medium leading-relaxed">Systems to help track packages and manage moving goods.</p>
                        <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-brand-secondary flex items-center gap-2 pt-2">
                            Explore <span class="material-symbols-outlined text-xs transition-transform duration-300 group-hover:translate-x-1">arrow_forward</span>
                        </span>
                    </div>
                </a>

                <!-- Public Services -->
                <a href="{{ route('industries.enterprise') }}" class="group relative overflow-hidden rounded-3xl h-80 flex flex-col justify-end p-8 border border-brand-borderLight dark:border-white/10 shadow-lg transition-all duration-700 hover:-translate-y-2 hover:shadow-2xl">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110 -z-20" style="background-image: url('https://images.unsplash.com/photo-1589829545856-d10d557cf95f?auto=format&fit=crop&w=600&q=80')"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/40 to-transparent -z-10 group-hover:via-slate-950/50 transition-all"></div>
                    <div class="space-y-3">
                        <span class="material-symbols-outlined text-brand-secondary text-3xl">gavel</span>
                        <h4 class="font-display font-bold text-xl text-white">Public Services</h4>
                        <p class="text-xs text-slate-300 font-medium leading-relaxed">Helping people connect with their local groups and services online.</p>
                        <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-brand-secondary flex items-center gap-2 pt-2">
                            Explore <span class="material-symbols-outlined text-xs transition-transform duration-300 group-hover:translate-x-1">arrow_forward</span>
                        </span>
                    </div>
                </a>

                <!-- Large Companies -->
                <div class="group relative overflow-hidden rounded-3xl h-80 flex flex-col justify-end p-8 border border-brand-borderLight dark:border-white/10 shadow-lg transition-all duration-700 hover:-translate-y-2 hover:shadow-2xl">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110 -z-20" style="background-image: url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=600&q=80')"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/40 to-transparent -z-10"></div>
                    <div class="space-y-3">
                        <span class="material-symbols-outlined text-brand-secondary text-3xl">business</span>
                        <h4 class="font-display font-bold text-xl text-white">Large Companies</h4>
                        <p class="text-xs text-slate-300 font-medium leading-relaxed">Custom tools built to help large teams work better together.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Simple Process Section -->
    <section class="py-32 bg-white dark:bg-brand-surfaceDark border-b border-brand-borderLight dark:border-white/5 relative">
        <div class="max-w-[1200px] mx-auto px-6 md:px-12 relative z-10">
            <div class="text-center max-w-2xl mx-auto mb-20 space-y-4">
                <span class="text-brand-secondary font-bold text-xs uppercase tracking-[0.4em] block">How We Work</span>
                <h2 class="font-display font-extrabold text-4xl md:text-5xl text-brand-primary dark:text-white tracking-tight">Our Simple Process</h2>
                <p class="text-brand-textMuted dark:text-slate-400 text-lg">A clear way to build and finish your product step by step.</p>
            </div>

            <div class="relative border-l-2 border-brand-borderLight dark:border-white/10 ml-4 md:ml-32 space-y-12">
                <!-- Discovery -->
                <div class="relative pl-8 md:pl-12 group">
                    <span class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-brand-secondary border-4 border-white dark:border-brand-surfaceDark transition-transform duration-300 group-hover:scale-125"></span>
                    <div class="absolute right-full mr-8 top-0 hidden md:block text-right">
                        <span class="font-display font-extrabold text-lg text-brand-primary dark:text-white group-hover:text-brand-secondary transition-colors">Step 1</span>
                    </div>
                    <div class="space-y-1">
                        <h4 class="font-display font-bold text-sm text-brand-primary dark:text-white">Discovery</h4>
                        <p class="text-brand-textMuted dark:text-slate-400 text-xs leading-relaxed max-w-xl">
                            Understanding your goals and what you want to achieve.
                        </p>
                    </div>
                </div>

                <!-- Strategy -->
                <div class="relative pl-8 md:pl-12 group">
                    <span class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-brand-secondary border-4 border-white dark:border-brand-surfaceDark transition-transform duration-300 group-hover:scale-125"></span>
                    <div class="absolute right-full mr-8 top-0 hidden md:block text-right">
                        <span class="font-display font-extrabold text-lg text-brand-primary dark:text-white group-hover:text-brand-secondary transition-colors">Step 2</span>
                    </div>
                    <div class="space-y-1">
                        <h4 class="font-display font-bold text-sm text-brand-primary dark:text-white">Strategy</h4>
                        <p class="text-brand-textMuted dark:text-slate-400 text-xs leading-relaxed max-w-xl">
                            Deciding exactly what to build first and how to measure success.
                        </p>
                    </div>
                </div>

                <!-- Design -->
                <div class="relative pl-8 md:pl-12 group">
                    <span class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-brand-secondary border-4 border-white dark:border-brand-surfaceDark transition-transform duration-300 group-hover:scale-125"></span>
                    <div class="absolute right-full mr-8 top-0 hidden md:block text-right">
                        <span class="font-display font-extrabold text-lg text-brand-primary dark:text-white group-hover:text-brand-secondary transition-colors">Step 3</span>
                    </div>
                    <div class="space-y-1">
                        <h4 class="font-display font-bold text-sm text-brand-primary dark:text-white">Design</h4>
                        <p class="text-brand-textMuted dark:text-slate-400 text-xs leading-relaxed max-w-xl">
                            Making the product easy to look at and simple to use.
                        </p>
                    </div>
                </div>

                <!-- Building -->
                <div class="relative pl-8 md:pl-12 group">
                    <span class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-brand-secondary border-4 border-white dark:border-brand-surfaceDark transition-transform duration-300 group-hover:scale-125"></span>
                    <div class="absolute right-full mr-8 top-0 hidden md:block text-right">
                        <span class="font-display font-extrabold text-lg text-brand-primary dark:text-white group-hover:text-brand-secondary transition-colors">Step 4</span>
                    </div>
                    <div class="space-y-1">
                        <h4 class="font-display font-bold text-sm text-brand-primary dark:text-white">Building</h4>
                        <p class="text-brand-textMuted dark:text-slate-400 text-xs leading-relaxed max-w-xl">
                            Writing the code to make your idea come to life.
                        </p>
                    </div>
                </div>

                <!-- Testing -->
                <div class="relative pl-8 md:pl-12 group">
                    <span class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-brand-secondary border-4 border-white dark:border-brand-surfaceDark transition-transform duration-300 group-hover:scale-125"></span>
                    <div class="absolute right-full mr-8 top-0 hidden md:block text-right">
                        <span class="font-display font-extrabold text-lg text-brand-primary dark:text-white group-hover:text-brand-secondary transition-colors">Step 5</span>
                    </div>
                    <div class="space-y-1">
                        <h4 class="font-display font-bold text-sm text-brand-primary dark:text-white">Testing</h4>
                        <p class="text-brand-textMuted dark:text-slate-400 text-xs leading-relaxed max-w-xl">
                            Making sure everything works perfectly and is easy to use.
                        </p>
                    </div>
                </div>

                <!-- Launch -->
                <div class="relative pl-8 md:pl-12 group">
                    <span class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-brand-secondary border-4 border-white dark:border-brand-surfaceDark transition-transform duration-300 group-hover:scale-125"></span>
                    <div class="absolute right-full mr-8 top-0 hidden md:block text-right">
                        <span class="font-display font-extrabold text-lg text-brand-primary dark:text-white group-hover:text-brand-secondary transition-colors">Step 6</span>
                    </div>
                    <div class="space-y-1">
                        <h4 class="font-display font-bold text-sm text-brand-primary dark:text-white">Launch</h4>
                        <p class="text-brand-textMuted dark:text-slate-400 text-xs leading-relaxed max-w-xl">
                            Setting everything up so your customers can start using it.
                        </p>
                    </div>
                </div>

                <!-- Growth & Support -->
                <div class="relative pl-8 md:pl-12 group">
                    <span class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-brand-secondary border-4 border-white dark:border-brand-surfaceDark transition-transform duration-300 group-hover:scale-125"></span>
                    <div class="absolute right-full mr-8 top-0 hidden md:block text-right">
                        <span class="font-display font-extrabold text-lg text-brand-primary dark:text-white group-hover:text-brand-secondary transition-colors">Step 7</span>
                    </div>
                    <div class="space-y-1">
                        <h4 class="font-display font-bold text-sm text-brand-primary dark:text-white">Growth &amp; Support</h4>
                        <p class="text-brand-textMuted dark:text-slate-400 text-xs leading-relaxed max-w-xl">
                            Keeping your product running well and helping it grow over time.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Elvora -->
    <section class="py-32 bg-white dark:bg-brand-surfaceDark border-b border-brand-borderLight dark:border-white/5 relative">
        <div class="max-w-[1200px] mx-auto px-6 md:px-12 relative z-10">
            <div class="text-center max-w-2xl mx-auto mb-20 space-y-4">
                <span class="text-brand-secondary font-bold text-xs uppercase tracking-[0.4em] block">Benefits</span>
                <h2 class="font-display font-extrabold text-4xl md:text-5xl text-brand-primary dark:text-white tracking-tight">Why Choose Elvora</h2>
                <p class="text-brand-textMuted dark:text-slate-400 text-lg font-medium">Why people work with us to build and grow their ideas.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-0 border border-brand-borderLight dark:border-white/10 rounded-[2rem] overflow-hidden shadow-2xl">
                <!-- Column 1 -->
                <div class="p-12 bg-brand-surfaceLight dark:bg-brand-primaryDark/20 space-y-8">
                    <h3 class="font-display font-bold text-2xl text-brand-primary dark:text-white border-b border-brand-borderLight dark:border-white/5 pb-6">Other Ways</h3>
                    <ul class="space-y-6 text-sm text-brand-textMuted dark:text-slate-400 font-medium">
                        <li class="flex items-start gap-4">
                            <span class="material-symbols-outlined text-red-500 text-xl mt-0.5">cancel</span>
                            <span>Just writing code: Only making things without thinking about your business.</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <span class="material-symbols-outlined text-red-500 text-xl mt-0.5">cancel</span>
                            <span>Short-term help: Leaving you to handle things on your own later.</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <span class="material-symbols-outlined text-red-500 text-xl mt-0.5">cancel</span>
                            <span>Too technical: Choosing tools that don't help your actual goals.</span>
                        </li>
                    </ul>
                </div>
                <!-- Column 2 -->
                <div class="p-12 bg-white dark:bg-brand-surfaceDark space-y-8 border-t md:border-t-0 md:border-l border-brand-borderLight dark:border-white/10 relative shadow-[0_0_50px_rgba(204,153,51,0.05)] border-l-4 border-l-brand-secondary">
                    <div class="absolute inset-0 bg-gradient-to-br from-brand-secondary/5 to-transparent"></div>
                    <h3 class="font-display font-bold text-2xl text-brand-secondary border-b border-brand-borderLight dark:border-white/5 pb-6 relative z-10">The Elvora Way</h3>
                    <ul class="space-y-6 text-sm text-brand-primary dark:text-white font-bold relative z-10">
                        <li class="flex items-start gap-4">
                            <span class="material-symbols-outlined text-brand-secondary text-xl mt-0.5">check_circle</span>
                            <div>
                                <h4 class="font-display font-bold text-sm text-brand-primary dark:text-white">People-First Thinking</h4>
                                <p class="text-xs text-brand-textMuted dark:text-slate-400 mt-1 font-medium">We focus on solving your problems, not just writing code.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
                            <span class="material-symbols-outlined text-brand-secondary text-xl mt-0.5">check_circle</span>
                            <div>
                                <h4 class="font-display font-bold text-sm text-brand-primary dark:text-white">Help from Start to Finish</h4>
                                <p class="text-xs text-brand-textMuted dark:text-slate-400 mt-1 font-medium">We stay with you from your first idea until long after launch.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
                            <span class="material-symbols-outlined text-brand-secondary text-xl mt-0.5">check_circle</span>
                            <div>
                                <h4 class="font-display font-bold text-sm text-brand-primary dark:text-white">Goal-Focused Approach</h4>
                                <p class="text-xs text-brand-textMuted dark:text-slate-400 mt-1 font-medium">Every tool we use is chosen to help you reach your goals.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
                            <span class="material-symbols-outlined text-brand-secondary text-xl mt-0.5">check_circle</span>
                            <div>
                                <h4 class="font-display font-bold text-sm text-brand-primary dark:text-white">Working Together</h4>
                                <p class="text-xs text-brand-textMuted dark:text-slate-400 mt-1 font-medium">Fast, easy talk and regular updates to keep things moving.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Call To Action -->
    <section class="py-32 bg-brand-primary dark:bg-brand-primaryDark text-white text-center relative overflow-hidden">
        <div class="absolute inset-0 grid-dots opacity-10 pointer-events-none -z-10"></div>
        <div class="glow-orb top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 opacity-20 scale-150"></div>
        <div class="relative z-10 max-w-3xl mx-auto px-6 space-y-8">
            <h2 class="font-display font-extrabold text-4xl md:text-5xl lg:text-6xl tracking-tight">Have an Idea Worth Building?</h2>
            <p class="text-blue-100/80 text-lg md:text-xl leading-relaxed font-medium">
                Let’s talk about how Elvora can help turn your vision into a product people love.
            </p>
            <div class="pt-6">
                <a href="{{ route('project') }}" class="inline-flex px-10 py-5 bg-brand-secondary hover:bg-brand-secondaryDark text-white font-bold rounded-2xl shadow-[0_20px_40px_-10px_rgba(204,153,51,0.5)] transition-all hover:-translate-y-1 active:scale-95 duration-300">
                    Start Your Project Today
                </a>
            </div>
        </div>
    </section>
@endsection
