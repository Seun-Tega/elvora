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

    <!-- Vite (Auto-Refresh & HMR) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        // Apply theme immediately to prevent FOUC
        (function() {
            const savedTheme = localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            if (savedTheme === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>
    @yield('head')
</head>
<body class="bg-brand-bg text-brand-textDark font-sans antialiased selection:bg-brand-secondary/20 overflow-x-hidden transition-colors duration-500">

    <!-- ========================================== -->
    <!--          SECTION 1 — NAVIGATION            -->
    <!-- ========================================== -->
    <header id="nav-header" 
            x-data="{ 
                mobileOpen: false, 
                industriesOpen: false,
                isScrolled: false,
                init() {
                    window.addEventListener('scroll', () => {
                        this.isScrolled = window.scrollY > 20;
                    });
                }
            }"
            @click.away="industriesOpen = false"
            class="fixed top-0 w-full z-50 transition-all duration-500 ease-in-out px-4 py-4 lg:py-6"
            :class="isScrolled ? 'pt-4' : 'pt-6'">
        
        <div class="max-w-[1400px] mx-auto px-6 py-3 md:px-8 flex justify-between items-center transition-all duration-500 rounded-full border border-transparent shadow-none"
             :class="isScrolled ? 'bg-white/80 dark:bg-brand-primaryDark/80 backdrop-blur-xl border-brand-borderLight dark:border-white/10 shadow-premium py-3' : 'py-4'">
            
            <a href="{{ route('home') }}" class="flex items-center gap-3 group transition-all duration-300">
                <div class="relative flex items-center justify-center">
                    <img src="{{ asset('images/elvora-logo.png') }}" alt="Elvora Innovation" class="h-9 w-auto object-contain transition-all duration-500 group-hover:scale-110 group-hover:rotate-3 group-hover:drop-shadow-[0_0_15px_rgba(204,153,51,0.4)]">
                </div>
                <div class="flex flex-col">
                    <span class="font-display font-black text-xl leading-tight text-brand-primary dark:text-white tracking-tighter transition-colors group-hover:text-brand-secondary">Elvora Innovation</span>
                    <span class="text-[8px] font-black tracking-[0.3em] uppercase text-brand-secondary opacity-70 group-hover:opacity-100 transition-opacity">Digital Engineering</span>
                </div>
            </a>
            
            <nav class="hidden lg:flex items-center space-x-1 font-semibold">
                <a href="{{ route('about') }}" class="px-4 py-2 text-brand-textMuted dark:text-slate-400 hover:text-brand-primary dark:hover:text-white transition-all text-sm rounded-full hover:bg-brand-primary/5 dark:hover:bg-white/5 @if(Request::routeIs('about')) text-brand-primary dark:text-white bg-brand-primary/5 dark:bg-white/5 @endif">About</a>
                <a href="{{ route('services') }}" class="px-4 py-2 text-brand-textMuted dark:text-slate-400 hover:text-brand-primary dark:hover:text-white transition-all text-sm rounded-full hover:bg-brand-primary/5 dark:hover:bg-white/5 @if(Request::routeIs('services')) text-brand-primary dark:text-white bg-brand-primary/5 dark:bg-white/5 @endif">Services</a>

                <!-- Dropdown -->
                <div class="relative" @mouseenter="industriesOpen = true" @mouseleave="industriesOpen = false">
                    <button class="flex items-center gap-1 px-4 py-2 text-brand-textMuted dark:text-slate-400 hover:text-brand-primary dark:hover:text-white transition-all text-sm rounded-full hover:bg-brand-primary/5 dark:hover:bg-white/5 @if(Request::is('industries*')) text-brand-primary dark:text-white @endif">
                        <span>Industries</span>
                        <span class="material-symbols-outlined text-[18px] transition-transform duration-300" :class="industriesOpen ? 'rotate-180' : ''">expand_more</span>
                    </button>
                    <div x-show="industriesOpen"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-1"
                         class="absolute left-0 mt-2 w-64 bg-white dark:bg-slate-900 border border-brand-borderLight dark:border-white/10 rounded-xl shadow-premium p-2 z-50"
                         style="display: none;">
                        <a href="{{ route('industries.healthcare') }}" class="flex items-center gap-3 p-3 rounded-lg hover:bg-slate-50 dark:hover:bg-white/5 transition-colors">
                            <span class="material-symbols-outlined text-brand-primary dark:text-brand-secondary text-lg">health_and_safety</span>
                            <div>
                                <p class="text-xs font-bold text-brand-primary dark:text-white">Healthcare</p>
                                <p class="text-[10px] text-brand-textMuted dark:text-slate-400">Simple tools for health teams</p>
                            </div>
                        </a>
                        <a href="{{ route('industries.fintech') }}" class="flex items-center gap-3 p-3 rounded-lg hover:bg-slate-50 dark:hover:bg-white/5 transition-colors">
                            <span class="material-symbols-outlined text-brand-primary dark:text-brand-secondary text-lg">account_balance</span>
                            <div>
                                <p class="text-xs font-bold text-brand-primary dark:text-white">Money &amp; Banking</p>
                                <p class="text-[10px] text-brand-textMuted dark:text-slate-400">Secure financial software</p>
                            </div>
                        </a>
                        <a href="{{ route('industries.logistics') }}" class="flex items-center gap-3 p-3 rounded-lg hover:bg-slate-50 dark:hover:bg-white/5 transition-colors">
                            <span class="material-symbols-outlined text-brand-primary dark:text-brand-secondary text-lg">local_shipping</span>
                            <div>
                                <p class="text-xs font-bold text-brand-primary dark:text-white">Shipping &amp; Delivery</p>
                                <p class="text-[10px] text-brand-textMuted dark:text-slate-400">Smart supply chain systems</p>
                            </div>
                        </a>
                        <a href="{{ route('industries.enterprise') }}" class="flex items-center gap-3 p-3 rounded-lg hover:bg-slate-50 dark:hover:bg-white/5 transition-colors">
                            <span class="material-symbols-outlined text-brand-primary dark:text-brand-secondary text-lg">domain</span>
                            <div>
                                <p class="text-xs font-bold text-brand-primary dark:text-white">Large Companies</p>
                                <p class="text-[10px] text-brand-textMuted dark:text-slate-400">Custom tools for big teams</p>
                            </div>
                        </a>
                    </div>
                </div>
                <a href="{{ route('blog') }}" class="px-4 py-2 text-brand-textMuted dark:text-slate-400 hover:text-brand-primary dark:hover:text-white transition-all text-sm rounded-full hover:bg-brand-primary/5 dark:hover:bg-white/5 @if(Request::routeIs('blog')) text-brand-primary dark:text-white bg-brand-primary/5 dark:bg-white/5 @endif">Blog</a>
                <a href="{{ route('contact') }}" class="px-4 py-2 text-brand-textMuted dark:text-slate-400 hover:text-brand-primary dark:hover:text-white transition-all text-sm rounded-full hover:bg-brand-primary/5 dark:hover:bg-white/5 @if(Request::routeIs('contact')) text-brand-primary dark:text-white bg-brand-primary/5 dark:bg-white/5 @endif">Contact</a>
            </nav>

            <div class="hidden lg:flex items-center space-x-4">
                <!-- Theme Toggle -->
                <button class="theme-toggle-btn w-10 h-10 flex items-center justify-center text-brand-textMuted hover:text-brand-primary dark:text-slate-400 dark:hover:text-white rounded-full hover:bg-slate-100 dark:hover:bg-white/5 transition-all duration-300">
                    <span class="material-symbols-outlined text-[20px] block dark:hidden">dark_mode</span>
                    <span class="material-symbols-outlined text-[20px] hidden dark:block">light_mode</span>
                </button>

                <a href="{{ route('project') }}" class="relative group overflow-hidden bg-brand-primary dark:bg-brand-secondary text-white dark:text-brand-primary px-6 py-2.5 rounded-full text-xs font-black shadow-premium hover:shadow-premiumHover transition-all hover:scale-[1.05] active:scale-95">
                    <span class="relative z-10">Start a Project</span>
                    <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                </a>
            </div>

            <!-- Hamburger -->
            <button @click="mobileOpen = !mobileOpen" class="lg:hidden w-10 h-10 flex items-center justify-center text-brand-primary dark:text-white hover:bg-slate-100 dark:hover:bg-white/5 rounded-full transition-colors">
                <span class="material-symbols-outlined text-[24px]" x-text="mobileOpen ? 'close' : 'menu'">menu</span>
            </button>
        </div>

        <!-- Mobile Drawer -->
        <div x-show="mobileOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-4 scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
             x-transition:leave-end="opacity-0 -translate-y-4 scale-95"
             class="lg:hidden absolute left-4 right-4 mt-4 bg-white/95 dark:bg-brand-primaryDark/95 backdrop-blur-xl border border-brand-borderLight dark:border-white/10 rounded-[2rem] shadow-premiumHover p-8 space-y-6 z-50"
             style="display: none;">
            <div class="grid gap-2">
                <a href="{{ route('about') }}" class="text-2xl font-black text-brand-primary dark:text-white hover:text-brand-secondary transition-colors">About</a>
                <a href="{{ route('services') }}" class="text-2xl font-black text-brand-primary dark:text-white hover:text-brand-secondary transition-colors">Services</a>
                <a href="{{ route('blog') }}" class="text-2xl font-black text-brand-primary dark:text-white hover:text-brand-secondary transition-colors">Blog</a>
                <a href="{{ route('contact') }}" class="text-2xl font-black text-brand-primary dark:text-white hover:text-brand-secondary transition-colors">Contact</a>
            </div>
            
            <hr class="border-brand-borderLight dark:border-white/5">
            
            <div class="flex flex-col gap-4">
                <a href="{{ route('project') }}" class="w-full py-4 bg-brand-primary dark:bg-brand-secondary text-white dark:text-brand-primary rounded-2xl text-center font-black text-lg shadow-premium">
                    Start a Project
                </a>
                <button class="theme-toggle-btn w-full py-3 flex items-center justify-center gap-3 border border-brand-borderLight dark:border-white/10 rounded-2xl text-brand-textMuted dark:text-slate-400 font-bold">
                    <span class="material-symbols-outlined block dark:hidden">dark_mode</span>
                    <span class="material-symbols-outlined hidden dark:block">light_mode</span>
                    <span x-text="document.documentElement.classList.contains('dark') ? 'Light Mode' : 'Dark Mode'"></span>
                </button>
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
