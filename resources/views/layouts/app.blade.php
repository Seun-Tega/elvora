<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'Elvora Innovation | Building Digital Products That Solve Real Problems')</title>
    <meta name="description" content="@yield('meta_description', 'Elvora Innovation is a company focused on building products that solve real-world problems. We help businesses and startups design, build, and grow impactful products.')">
    <meta name="keywords" content="digital products, business growth, website building, app development, strategy, innovation">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="@yield('title', 'Elvora Innovation | Building Digital Products That Solve Real Problems')">
    <meta property="og:description" content="@yield('meta_description', 'Elvora Innovation is a company focused on building products that solve real-world problems. We help businesses and startups design, build, and grow impactful products.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Fonts: Outfit & Inter & JetBrains Mono -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Tailwind Configured for Stripe/Linear Style Redesign -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        brand: {
                            primary: '#003366',
                            primaryDark: '#001F3D',
                            secondary: '#CC9933',
                            secondaryDark: '#99701F',
                            bg: '#FFFFFF',
                            surfaceLight: '#F8FAFC',
                            surfaceDark: '#0F172A',
                            borderLight: '#E2E8F0',
                            textDark: '#0F172A',
                            textMuted: '#475569',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Outfit', 'sans-serif'],
                        mono: ['JetBrains Mono', 'monospace'],
                    },
                    boxShadow: {
                        premium: '0 10px 30px -10px rgba(0, 51, 102, 0.08), 0 1px 3px 0 rgba(0, 0, 0, 0.02)',
                        premiumHover: '0 20px 40px -15px rgba(0, 51, 102, 0.12), 0 1px 10px 0 rgba(0, 0, 0, 0.03)',
                    }
                }
            }
        }
    </script>
    <script>
        // Apply theme immediately to prevent FOUC
        const savedTheme = localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
        if (savedTheme === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <!-- Custom Premium Styles (Glassmorphism & Animation Specs) -->
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
        }
        .glass-header {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            transition: background 0.3s, border-color 0.3s;
        }
        .grid-dots {
            background-image: radial-gradient(circle, #E2E8F0 1.5px, transparent 1.5px);
            background-size: 24px 24px;
        }
        .grid-dots-dark {
            background-image: radial-gradient(circle, rgba(255, 255, 255, 0.05) 1.5px, transparent 1.5px);
            background-size: 24px 24px;
        }
        .hover-card-trigger {
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.6s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .hover-card-trigger:hover {
            transform: translateY(-8px) scale(1.01);
        }
        .mask-marquee {
            mask-image: linear-gradient(to right, transparent, black 15%, black 85%, transparent);
            -webkit-mask-image: linear-gradient(to right, transparent, black 15%, black 85%, transparent);
        }
        .glow-orb {
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(204, 153, 51, 0.08) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
            filter: blur(60px);
        }
        .glass-panel-premium {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .text-glow {
            text-shadow: 0 0 20px rgba(204, 153, 51, 0.2);
        }
        @keyframes scan {
            0% { transform: translateY(-100%); opacity: 0; }
            50% { opacity: 0.5; }
            100% { transform: translateY(100%); opacity: 0; }
        }
        .scanner-line {
            height: 40px;
            background: linear-gradient(to bottom, transparent, rgba(204, 153, 51, 0.1), transparent);
            animation: scan 4s linear infinite;
        }
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* Premium Dark Mode Styles */
        .dark body {
            background-color: #001F3D; /* brand-primaryDark */
            color: #F8FAFC;
        }
        .dark .glass-header {
            background: rgba(0, 31, 61, 0.85); /* branded primaryDark tint */
            border-color: rgba(255, 255, 255, 0.08);
        }
        .dark #mobile-drawer {
            background-color: #001F3D;
            border-color: rgba(255, 255, 255, 0.08);
        }
        .dark .bg-white {
            background-color: #003366 !important; /* brand-primary */
        }
        .dark .bg-brand-surfaceLight {
            background-color: #001F3D !important; /* brand-primaryDark */
        }
        .dark .text-brand-primary {
            color: #F8FAFC !important;
        }
        .dark .text-brand-textDark {
            color: #E2E8F0 !important;
        }
        .dark .text-brand-textMuted {
            color: #94A3B8 !important;
        }
        .dark .border-brand-borderLight {
            border-color: rgba(255, 255, 255, 0.08) !important;
        }
        .dark .bg-blue-50 {
            background-color: rgba(0, 51, 102, 0.5) !important;
        }
        .dark .border-blue-100 {
            border-color: rgba(255, 255, 255, 0.08) !important;
        }
        .dark .hover\:bg-slate-50:hover {
            background-color: #003366 !important;
        }
        .dark .bg-slate-50 {
            background-color: #001F3D !important;
        }
        .dark .text-slate-900 {
            color: #F8FAFC !important;
        }
        .dark .text-slate-500 {
            color: #94A3B8 !important;
        }
        .dark .glow-orb {
            background: radial-gradient(circle, rgba(204, 153, 51, 0.15) 0%, transparent 70%);
        }
    </style>
    @yield('head')
</head>
<body class="bg-brand-bg text-brand-textDark font-sans antialiased selection:bg-brand-secondary/20 overflow-x-hidden transition-colors duration-300">

    <!-- ========================================== -->
    <!--          SECTION 1 — NAVIGATION            -->
    <!-- ========================================== -->
    <header id="nav-header" 
            x-data="{ mobileOpen: false, industriesOpen: false }"
            @click.away="industriesOpen = false"
            class="fixed top-0 w-full z-50 glass-header border-b border-brand-borderLight transition-all duration-300 py-5">
        <div class="max-w-[1400px] mx-auto px-6 md:px-12 flex justify-between items-center">
            <a href="{{ route('home') }}" class="flex items-center gap-3 group transition-opacity duration-300 hover:opacity-90">
                <div class="relative flex items-center justify-center">
                    <img src="{{ asset('images/elvora-logo.png') }}" alt="Elvora Innovation" class="h-9 w-auto object-contain transition-all duration-500 group-hover:scale-105 group-hover:drop-shadow-[0_0_15px_rgba(204,153,51,0.3)]">
                </div>
                <div class="flex flex-col">
                    <span class="font-display font-bold text-xl leading-tight text-brand-primary tracking-tight">Elvora Innovation</span>
                    <span class="text-[9px] font-bold tracking-[0.2em] text-brand-secondary opacity-80 group-hover:opacity-100 transition-opacity">Structure, Growth &amp; Legacy</span>
                </div>
            </a>
            
            <nav class="hidden lg:flex items-center space-x-8 font-medium">
                <a href="{{ route('about') }}" class="text-brand-textMuted hover:text-brand-primary transition-colors text-sm @if(Request::routeIs('about')) text-brand-primary font-bold border-b-2 border-brand-primary pb-1 @endif">About</a>
                <a href="{{ route('services') }}" class="text-brand-textMuted hover:text-brand-primary transition-colors text-sm @if(Request::routeIs('services')) text-brand-primary font-bold border-b-2 border-brand-primary pb-1 @endif">Services</a>

                <!-- Dropdown using Alpine -->
                <div class="relative" @mouseenter="industriesOpen = true" @mouseleave="industriesOpen = false">
                    <button class="flex items-center gap-1 text-brand-textMuted hover:text-brand-primary transition-colors text-sm font-medium py-2 @if(Request::is('industries*')) text-brand-primary font-bold @endif">
                        <span>Industries</span>
                        <span class="material-symbols-outlined text-[16px] transition-transform duration-200" :class="industriesOpen ? 'rotate-180' : ''">keyboard_arrow_down</span>
                    </button>
                    <div x-show="industriesOpen"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-1"
                         class="absolute left-0 mt-1 w-64 bg-white border border-brand-borderLight rounded-xl shadow-premium p-2 z-50"
                         style="display: none;">
                        <a href="{{ route('industries.healthcare') }}" class="flex items-center gap-3 p-3 rounded-lg hover:bg-slate-50 transition-colors">
                            <span class="material-symbols-outlined text-brand-primary text-lg">health_and_safety</span>
                            <div>
                                <p class="text-xs font-bold text-brand-primary">Healthcare</p>
                                <p class="text-[10px] text-brand-textMuted">Simple tools for health teams</p>
                            </div>
                        </a>
                        <a href="{{ route('industries.fintech') }}" class="flex items-center gap-3 p-3 rounded-lg hover:bg-slate-50 transition-colors">
                            <span class="material-symbols-outlined text-brand-primary text-lg">account_balance</span>
                            <div>
                                <p class="text-xs font-bold text-brand-primary">Money &amp; Banking</p>
                                <p class="text-[10px] text-brand-textMuted">Easy online money management</p>
                            </div>
                        </a>
                        <a href="{{ route('industries.logistics') }}" class="flex items-center gap-3 p-3 rounded-lg hover:bg-slate-50 transition-colors">
                            <span class="material-symbols-outlined text-brand-primary text-lg">local_shipping</span>
                            <div>
                                <p class="text-xs font-bold text-brand-primary">Shipping &amp; Delivery</p>
                                <p class="text-[10px] text-brand-textMuted">Better ways to track goods</p>
                            </div>
                        </a>
                        <a href="{{ route('industries.enterprise') }}" class="flex items-center gap-3 p-3 rounded-lg hover:bg-slate-50 transition-colors">
                            <span class="material-symbols-outlined text-brand-primary text-lg">gavel</span>
                            <div>
                                <p class="text-xs font-bold text-brand-primary">Large Companies</p>
                                <p class="text-[10px] text-brand-textMuted">Tools built for large teams</p>
                            </div>
                        </a>
                    </div>
                </div>
                <a href="{{ route('blog') }}" class="text-brand-textMuted hover:text-brand-primary transition-colors text-sm @if(Request::routeIs('blog') || Request::routeIs('blog.show')) text-brand-primary @endif">Blog</a>
                <a href="{{ route('contact') }}" class="text-brand-textMuted hover:text-brand-primary transition-colors text-sm @if(Request::routeIs('contact')) text-brand-primary font-bold border-b-2 border-brand-primary pb-1 @endif">Contact</a>
            </nav>

            <div class="hidden lg:flex items-center space-x-6">
                <!-- Theme Toggle Button -->
                <button class="theme-toggle-btn p-2 text-brand-textMuted hover:text-brand-primary dark:text-slate-400 dark:hover:text-white rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors duration-200" aria-label="Toggle theme">
                    <span class="material-symbols-outlined block dark:hidden">dark_mode</span>
                    <span class="material-symbols-outlined hidden dark:block">light_mode</span>
                </button>

                <a href="{{ route('project') }}" class="bg-brand-primary text-white hover:bg-brand-primaryDark px-5 py-2.5 rounded-xl text-xs font-bold shadow-premium hover:shadow-premiumHover transition-all hover:scale-[1.02] active:scale-95">
                    Start a Project
                </a>
            </div>

            <!-- Hamburger Button -->
            <button @click="mobileOpen = !mobileOpen" class="lg:hidden p-2 text-brand-primary dark:text-white hover:bg-slate-100 dark:hover:bg-slate-800 rounded-xl transition-colors" aria-label="Toggle Menu">
                <span class="material-symbols-outlined text-[28px]" x-text="mobileOpen ? 'close' : 'menu'">menu</span>
            </button>
        </div>

        <!-- Mobile Drawer Menu -->
        <div x-show="mobileOpen"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="lg:hidden w-full bg-white border-b border-brand-borderLight py-6 px-6 space-y-4"
             style="display: none;">
            <a href="{{ route('about') }}" class="block font-medium text-brand-textMuted hover:text-brand-primary transition-colors py-2 text-base @if(Request::routeIs('about')) text-brand-primary font-bold @endif">About</a>
            <a href="{{ route('services') }}" class="block font-medium text-brand-textMuted hover:text-brand-primary transition-colors py-2 text-base @if(Request::routeIs('services')) text-brand-primary font-bold @endif">Services</a>

            <!-- Mobile Industries Submenu -->
            <div class="py-2 space-y-1">
                <span class="block text-xs font-bold uppercase tracking-wider text-slate-400">Who We Help</span>
                <a href="{{ route('industries.healthcare') }}" class="block font-medium text-brand-textMuted hover:text-brand-primary transition-colors py-1.5 pl-4 text-sm @if(Request::is('industries/healthcare')) text-brand-primary font-bold @endif">Healthcare</a>
                <a href="{{ route('industries.fintech') }}" class="block font-medium text-brand-textMuted hover:text-brand-primary transition-colors py-1.5 pl-4 text-sm @if(Request::is('industries/fintech')) text-brand-primary font-bold @endif">Money &amp; Banking</a>
                <a href="{{ route('industries.logistics') }}" class="block font-medium text-brand-textMuted hover:text-brand-primary transition-colors py-1.5 pl-4 text-sm @if(Request::is('industries/logistics')) text-brand-primary font-bold @endif">Shipping &amp; Delivery</a>
                <a href="{{ route('industries.enterprise') }}" class="block font-medium text-brand-textMuted hover:text-brand-primary transition-colors py-1.5 pl-4 text-sm @if(Request::is('industries/enterprise')) text-brand-primary font-bold @endif">Large Companies</a>
            </div>

            <a href="{{ route('blog') }}" class="block font-medium text-brand-textMuted hover:text-brand-primary transition-colors py-2 text-base @if(Request::routeIs('blog') || Request::routeIs('blog.show')) text-brand-primary @endif">Blog</a>
            <a href="{{ route('contact') }}" class="block font-medium text-brand-textMuted hover:text-brand-primary transition-colors py-2 text-base @if(Request::routeIs('contact')) text-brand-primary font-bold @endif">Contact</a>
            <hr class="border-brand-borderLight">
            <div class="flex items-center justify-between pt-2">
                <!-- Theme Toggle Button -->
                <button class="theme-toggle-btn p-2 text-brand-textMuted hover:text-brand-primary dark:text-slate-400 dark:hover:text-white rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors duration-200" aria-label="Toggle theme">
                    <span class="material-symbols-outlined block dark:hidden">dark_mode</span>
                    <span class="material-symbols-outlined hidden dark:block">light_mode</span>
                </button>

                <a href="{{ route('project') }}" class="bg-brand-primary text-white px-5 py-2.5 rounded-xl text-xs font-bold shadow-premium">
                    Start a Project
                </a>
            </div>
        </div>
    </header>

    <main class="pt-24">
        @yield('content')
    </main>

    <!-- ========================================== -->
    <!--          SECTION 13 — MEGA FOOTER          -->
    <!-- ========================================== -->
    <footer class="bg-brand-primaryDark text-white pt-20 pb-12 border-t border-blue-900 relative">
        <div class="absolute inset-0 grid-dots-dark opacity-10 pointer-events-none"></div>
        
        <div class="max-w-[1400px] mx-auto px-6 md:px-12 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 pb-16 border-b border-blue-950">
                <!-- Brand details -->
                <div class="lg:col-span-4 space-y-6">
                    <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                        <img src="{{ asset('images/elvora-logo.png') }}" alt="Elvora Innovation" class="h-9 w-auto brightness-0 invert opacity-80 group-hover:opacity-100 transition-opacity duration-300">
                        <span class="font-display font-bold text-lg text-white tracking-tight">Elvora Innovation</span>
                    </a>
                    <p class="text-xs text-slate-400 max-w-sm leading-relaxed">
                        Helping businesses and organizations build products that people love and that help them grow.
                    </p>
                    <div class="flex items-center space-x-4 pt-2">
                        <a href="#" class="text-slate-400 hover:text-white transition-colors"><span class="material-symbols-outlined text-base">public</span></a>
                        <a href="#" class="text-slate-400 hover:text-white transition-colors"><span class="material-symbols-outlined text-base">partner_exchange</span></a>
                    </div>
                </div>

                <!-- Navigation Groups -->
                <div class="lg:col-span-2 space-y-4">
                    <h5 class="text-xs font-bold uppercase tracking-wider text-brand-secondary">Menu</h5>
                    <ul class="space-y-2 text-xs text-slate-400 font-medium">
                        <li><a href="{{ route('about') }}" class="hover:text-white transition-colors">About Us</a></li>
                        <li><a href="{{ route('services') }}" class="hover:text-white transition-colors">Services</a></li>

                        <li><a href="{{ route('industries') }}" class="hover:text-white transition-colors">Who We Help</a></li>
                        <li><a href="{{ route('blog') }}" class="hover:text-white transition-colors">Blog</a></li>
                    </ul>
                </div>
                <div class="lg:col-span-2 space-y-4">
                    <h5 class="text-xs font-bold uppercase tracking-wider text-brand-secondary">Help</h5>
                    <ul class="space-y-2 text-xs text-slate-400 font-medium">
                        <li><a href="#" class="hover:text-white transition-colors">Guides</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Venture Hub</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Case Studies</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Newsletter Subscription Form -->
                <div class="lg:col-span-4 space-y-4">
                    <h5 class="text-xs font-bold uppercase tracking-wider text-brand-secondary">Our Newsletter</h5>
                    <p class="text-xs text-slate-400 leading-relaxed">Join 12,000+ people receiving weekly updates on business growth and new ideas.</p>
                    
                    <div id="newsletter-feedback-alert" class="hidden p-3 rounded-lg text-xs font-medium mb-3"></div>

                    <form id="newsletter-form" class="flex gap-2">
                        <input type="email" name="email" required class="bg-blue-950 border border-blue-900 rounded-xl px-4 py-2.5 text-xs text-white placeholder:text-slate-500 focus:ring-brand-secondary focus:border-transparent flex-grow outline-none" placeholder="Professional email">
                        <button type="submit" class="bg-brand-secondary hover:bg-brand-secondaryDark text-white px-4 py-2.5 rounded-xl text-xs font-bold transition-all shadow-sm">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>

            <!-- Bottom Footer Bar -->
            <div class="flex flex-col md:flex-row justify-between items-center pt-8 text-xs text-slate-500 font-medium space-y-4 md:space-y-0">
                <div>
                    © 2024 Elvora Innovation. All rights reserved. Built to WCAG AA guidelines.
                </div>
                <div class="flex gap-6">
                    <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                    <a href="#" class="hover:text-white transition-colors">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Form & Navigation Javascript Logic -->
    <script>
        // Transparent to solid header transition on scroll
        window.addEventListener('scroll', () => {
            const header = document.getElementById('nav-header');
            if (window.scrollY > 40) {
                header.classList.add('shadow-premium', 'py-3.5');
                header.classList.remove('py-5');
            } else {
                header.classList.remove('shadow-premium', 'py-3.5');
                header.classList.add('py-5');
            }
        });

        // Hamburger drawer toggle logic removed (now handled by Alpine.js)

        // AJAX newsletter logic
        document.getElementById('newsletter-form')?.addEventListener('submit', async (e) => {
            e.preventDefault();
            const form = e.target;
            const submitBtn = form.querySelector('button[type="submit"]');
            const alertBox = document.getElementById('newsletter-feedback-alert');

            submitBtn.disabled = true;
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';

            alertBox.className = "hidden p-3 rounded-lg text-xs font-medium mb-3";
            alertBox.textContent = "";

            const formData = new FormData(form);
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            try {
                const response = await fetch('/newsletter', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                const data = await response.json();

                if (response.ok && data.success) {
                    alertBox.className = "p-3 rounded-lg text-xs font-medium mb-3 bg-green-950 text-green-300 border border-green-900 block";
                    alertBox.textContent = data.message;
                    form.reset();
                } else {
                    const errMsg = data.errors ? data.errors.join(' | ') : (data.message || 'Error occurred.');
                    alertBox.className = "p-3 rounded-lg text-xs font-medium mb-3 bg-red-950 text-red-300 border border-red-900 block";
                    alertBox.textContent = errMsg;
                }
            } catch (error) {
                alertBox.className = "p-3 rounded-lg text-xs font-medium mb-3 bg-red-950 text-red-300 border border-red-900 block";
                alertBox.textContent = "Unable to connect.";
            } finally {
                submitBtn.disabled = false;
                submitBtn.textContent = originalText;
            }
        });

        // Theme Toggling Logic
        const themeToggleBtns = document.querySelectorAll('.theme-toggle-btn');
        
        themeToggleBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const isDark = document.documentElement.classList.contains('dark');
                if (isDark) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                }
            });
        });
    </script>
    @yield('scripts')
</body>
</html>
