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
    </style>
@endsection

@section('content')
    <!-- Hero & Portfolio Showcase (Sliding Carousel) -->
    <section x-data="{
        activeSlide: 0,
        slidesCount: 3,
        progress: 0,
        interval: null,
        startAutoplay() {
            this.stopAutoplay();
            this.interval = setInterval(() => {
                if (this.progress >= 100) {
                    this.next();
                } else {
                    this.progress += 1.5;
                }
            }, 100);
        },
        stopAutoplay() {
            if (this.interval) {
                clearInterval(this.interval);
                this.interval = null;
            }
        },
        next() {
            this.activeSlide = (this.activeSlide + 1) % this.slidesCount;
            this.progress = 0;
        },
        prev() {
            this.activeSlide = (this.activeSlide - 1 + this.slidesCount) % this.slidesCount;
            this.progress = 0;
        },
        goTo(index) {
            this.activeSlide = index;
            this.progress = 0;
        }
    }"
    x-init="startAutoplay()"
    class="relative min-h-screen flex items-center justify-center bg-black overflow-hidden py-32 border-b border-white/5">
        
        <!-- Slides Track (Sliding Movement) -->
        <div class="absolute inset-0 w-full h-full z-0 flex transition-transform duration-1000 ease-[cubic-bezier(0.23,1,0.32,1)]"
             :style="`transform: translateX(-${activeSlide * 100}%)`"
        >
            <!-- Slide 1 Background -->
            <div class="relative min-w-full h-full">
                <img src="https://images.pexels.com/photos/5058118/pexels-photo-5058118.jpeg?auto=compress&cs=tinysrgb&w=1920" 
                     class="absolute inset-0 w-full h-full object-cover object-center opacity-60 mix-blend-luminosity" 
                     alt="Strategy & Innovation">
                <div class="absolute inset-0 bg-gradient-to-b from-black/90 via-black/40 to-black"></div>
            </div>

            <!-- Slide 2 Background -->
            <div class="relative min-w-full h-full">
                <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1920&q=80" 
                     class="absolute inset-0 w-full h-full object-cover object-center opacity-45 mix-blend-luminosity" 
                     alt="Enterprise Software">
                <div class="absolute inset-0 bg-gradient-to-b from-black/90 via-black/40 to-black"></div>
            </div>

            <!-- Slide 3 Background -->
            <div class="relative min-w-full h-full">
                <img src="https://images.unsplash.com/photo-1531403009284-440f080d1e12?auto=format&fit=crop&w=1920&q=80" 
                     class="absolute inset-0 w-full h-full object-cover object-center opacity-45 mix-blend-luminosity" 
                     alt="Human-Centered Design">
                <div class="absolute inset-0 bg-gradient-to-b from-black/90 via-black/40 to-black"></div>
            </div>
        </div>

        <!-- Slides Content (Fixed Position, Swaps Content) -->
        <div class="max-w-[1400px] mx-auto px-6 md:px-12 relative z-10 w-full flex flex-col items-center text-center">
            
            <!-- Slide 1 Content -->
            <div x-show="activeSlide === 0"
                 x-transition:enter="transition duration-700 delay-300 ease-out"
                 x-transition:enter-start="opacity-0 translate-y-8"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition duration-300 ease-in"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-4"
                 class="flex flex-col items-center space-y-8 max-w-4xl">
                <div class="inline-flex items-center space-x-3 bg-white/10 backdrop-blur-md border border-white/10 px-5 py-2 rounded-full w-fit shadow-sm">
                    <span class="w-1.5 h-1.5 rounded-full bg-brand-secondary animate-pulse shadow-[0_0_10px_rgba(204,153,51,0.5)]"></span>
                    <span class="font-display font-bold uppercase tracking-[0.2em] text-[10px] text-white/80">Strategy . Innovation</span>
                </div>
                
                <h1 class="font-display text-4xl md:text-5xl lg:text-6xl xl:text-7xl leading-[1.1] font-extrabold tracking-tighter text-white">
                    Building <span class="text-brand-secondary drop-shadow-sm">Digital Products</span> <br/>That Solve Real Problems
                </h1>
                
                <p class="text-slate-300 text-sm md:text-base max-w-xl leading-relaxed font-medium">
                    Elvora Innovation helps businesses, startups, and organizations design, build, and scale products that drive growth, efficiency, and impact.
                </p>

                <div class="flex flex-wrap justify-center gap-4 pt-2">
                    <a href="{{ route('project') }}" class="group bg-brand-primary text-white hover:bg-brand-primaryDark px-8 py-4 rounded-xl font-bold text-sm flex items-center space-x-3 shadow-2xl transition-all hover:-translate-y-1 active:scale-95 duration-300">
                        <span>Start a Project</span>
                        <span class="material-symbols-outlined text-xs group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    </a>
                    <a href="{{ route('contact') }}" class="backdrop-blur-md border border-white/10 hover:bg-white/5 text-white px-8 py-4 rounded-xl font-bold text-sm transition-all hover:-translate-y-1 active:scale-95 duration-300">
                        Book a Consultation
                    </a>
                </div>
            </div>

            <!-- Slide 2 Content -->
            <div x-show="activeSlide === 1"
                 x-transition:enter="transition duration-700 delay-300 ease-out"
                 x-transition:enter-start="opacity-0 translate-y-8"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition duration-300 ease-in"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-4"
                 class="flex flex-col items-center space-y-8 max-w-4xl"
                 style="display: none;">
                <div class="inline-flex items-center space-x-3 bg-white/10 backdrop-blur-md border border-white/10 px-5 py-2 rounded-full w-fit shadow-sm">
                    <span class="w-1.5 h-1.5 rounded-full bg-brand-secondary animate-pulse shadow-[0_0_10px_rgba(204,153,51,0.5)]"></span>
                    <span class="font-display font-bold uppercase tracking-[0.2em] text-[10px] text-white/80">Enterprise Engineering</span>
                </div>
                
                <h1 class="font-display text-4xl md:text-5xl lg:text-6xl xl:text-7xl leading-[1.1] font-extrabold tracking-tighter text-white">
                    Engineer Software <br/><span class="text-brand-secondary drop-shadow-sm">That Scales Dynamically</span>
                </h1>
                
                <p class="text-slate-300 text-sm md:text-base max-w-xl leading-relaxed font-medium">
                    We design and build cloud-native systems, high-performing APIs, and secure database infrastructures tailored to handle millions of operations.
                </p>

                <div class="flex flex-wrap justify-center gap-4 pt-2">
                    <a href="{{ route('services') }}" class="group bg-brand-primary text-white hover:bg-brand-primaryDark px-8 py-4 rounded-xl font-bold text-sm flex items-center space-x-3 shadow-2xl transition-all hover:-translate-y-1 active:scale-95 duration-300">
                        <span>Explore Services</span>
                        <span class="material-symbols-outlined text-xs group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    </a>
                    <a href="{{ route('project') }}" class="backdrop-blur-md border border-white/10 hover:bg-white/5 text-white px-8 py-4 rounded-xl font-bold text-sm transition-all hover:-translate-y-1 active:scale-95 duration-300">
                        Discuss Architecture
                    </a>
                </div>
            </div>

            <!-- Slide 3 Content -->
            <div x-show="activeSlide === 2"
                 x-transition:enter="transition duration-700 delay-300 ease-out"
                 x-transition:enter-start="opacity-0 translate-y-8"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition duration-300 ease-in"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-4"
                 class="flex flex-col items-center space-y-8 max-w-4xl"
                 style="display: none;">
                <div class="inline-flex items-center space-x-3 bg-white/10 backdrop-blur-md border border-white/10 px-5 py-2 rounded-full w-fit shadow-sm">
                    <span class="w-1.5 h-1.5 rounded-full bg-brand-secondary animate-pulse shadow-[0_0_10px_rgba(204,153,51,0.5)]"></span>
                    <span class="font-display font-bold uppercase tracking-[0.2em] text-[10px] text-white/80">Human-Centered Design</span>
                </div>
                
                <h1 class="font-display text-4xl md:text-5xl lg:text-6xl xl:text-7xl leading-[1.1] font-extrabold tracking-tighter text-white">
                    Sleek Design and UX <br/><span class="text-brand-secondary drop-shadow-sm">Built for Engagement</span>
                </h1>
                
                <p class="text-slate-300 text-sm md:text-base max-w-xl leading-relaxed font-medium">
                    Beautiful, intuitive, and conversion-optimized interfaces that capture attention and turn users into long-term customer relationships.
                </p>

                <div class="flex flex-wrap justify-center gap-4 pt-2">
                    <a href="{{ route('project') }}" class="group bg-brand-primary text-white hover:bg-brand-primaryDark px-8 py-4 rounded-xl font-bold text-sm flex items-center space-x-3 shadow-2xl transition-all hover:-translate-y-1 active:scale-95 duration-300">
                        <span>Design Your App</span>
                        <span class="material-symbols-outlined text-xs group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    </a>
                    <a href="{{ route('about') }}" class="backdrop-blur-md border border-white/10 hover:bg-white/5 text-white px-8 py-4 rounded-xl font-bold text-sm transition-all hover:-translate-y-1 active:scale-95 duration-300">
                        Our Philosophy
                    </a>
                </div>
            </div>
        </div>

        <!-- Navigation Arrows -->
        <button @click="prev()" class="absolute left-6 z-20 hidden md:flex items-center justify-center w-14 h-14 rounded-full border border-white/10 bg-white/5 backdrop-blur-md text-white hover:bg-white/10 hover:border-white/25 active:scale-95 transition-all duration-300" aria-label="Previous Slide">
            <span class="material-symbols-outlined text-[24px]">chevron_left</span>
        </button>
        <button @click="next()" class="absolute right-6 z-20 hidden md:flex items-center justify-center w-14 h-14 rounded-full border border-white/10 bg-white/5 backdrop-blur-md text-white hover:bg-white/10 hover:border-white/25 active:scale-95 transition-all duration-300" aria-label="Next Slide">
            <span class="material-symbols-outlined text-[24px]">chevron_right</span>
        </button>

        <!-- Bottom Navigation Indicators -->
        <div class="absolute bottom-12 left-1/2 -translate-x-1/2 z-20 flex space-x-3 items-center">
            <template x-for="(slide, index) in slidesCount" :key="index">
                <button @click="goTo(index)" class="group flex flex-col items-center focus:outline-none">
                    <!-- Indicator Track -->
                    <div class="w-12 md:w-16 h-1 rounded-full bg-white/20 overflow-hidden transition-all duration-300 group-hover:bg-white/40">
                        <!-- Indicator Progress -->
                        <div class="h-full bg-brand-secondary transition-all"
                             :style="activeSlide === index ? 'width: ' + progress + '%' : 'width: 0%'"
                             :class="activeSlide === index ? 'duration-100 ease-linear' : 'duration-0'">
                        </div>
                    </div>
                </button>
            </template>
        </div>
    </section>

    <!-- Continuous Logo Marquee -->
    <section class="py-20 bg-white dark:bg-brand-surfaceDark border-b border-brand-borderLight dark:border-white/5 overflow-hidden relative">
        <div class="max-w-[1400px] mx-auto px-6 md:px-12 mb-10">
            <div class="flex flex-col items-center text-center space-y-3">
                <p class="text-[10px] font-black uppercase tracking-[0.5em] text-brand-secondary opacity-80">
                    Trusted Product Engineering
                </p>
                <h3 class="font-display font-black text-xl md:text-2xl text-brand-primary dark:text-white tracking-tight">
                    Helping businesses transform ideas into products people love
                </h3>
            </div>
        </div>
        <div class="marquee-container flex overflow-hidden select-none relative w-full mask-marquee">
            <!-- Repeat marquee content to ensure seamless loop -->
            <div class="marquee-content flex gap-20 items-center py-2 text-brand-textMuted dark:text-slate-400 font-display font-black text-xs tracking-[0.3em] uppercase">
                <span>Product Strategy</span> <span class="w-1.5 h-1.5 rounded-full bg-brand-secondary animate-pulse shadow-[0_0_10px_rgba(204,153,51,0.4)]"></span>
                <span>Web Engineering</span> <span class="w-1.5 h-1.5 rounded-full bg-brand-secondary animate-pulse shadow-[0_0_10px_rgba(204,153,51,0.4)]"></span>
                <span>Mobile Apps</span> <span class="w-1.5 h-1.5 rounded-full bg-brand-secondary animate-pulse shadow-[0_0_10px_rgba(204,153,51,0.4)]"></span>
                <span>UI/UX Design</span> <span class="w-1.5 h-1.5 rounded-full bg-brand-secondary animate-pulse shadow-[0_0_10px_rgba(204,153,51,0.4)]"></span>
                <span>Venture Building</span> <span class="w-1.5 h-1.5 rounded-full bg-brand-secondary animate-pulse shadow-[0_0_10px_rgba(204,153,51,0.4)]"></span>
                <span>Business Growth</span> <span class="w-1.5 h-1.5 rounded-full bg-brand-secondary animate-pulse shadow-[0_0_10px_rgba(204,153,51,0.4)]"></span>
            </div>
            <div class="marquee-content flex gap-20 items-center py-2 text-brand-textMuted dark:text-slate-400 font-display font-black text-xs tracking-[0.3em] uppercase" aria-hidden="true">
                <span>Product Strategy</span> <span class="w-1.5 h-1.5 rounded-full bg-brand-secondary animate-pulse shadow-[0_0_10px_rgba(204,153,51,0.4)]"></span>
                <span>Web Engineering</span> <span class="w-1.5 h-1.5 rounded-full bg-brand-secondary animate-pulse shadow-[0_0_10px_rgba(204,153,51,0.4)]"></span>
                <span>Mobile Apps</span> <span class="w-1.5 h-1.5 rounded-full bg-brand-secondary animate-pulse shadow-[0_0_10px_rgba(204,153,51,0.4)]"></span>
                <span>UI/UX Design</span> <span class="w-1.5 h-1.5 rounded-full bg-brand-secondary animate-pulse shadow-[0_0_10px_rgba(204,153,51,0.4)]"></span>
                <span>Venture Building</span> <span class="w-1.5 h-1.5 rounded-full bg-brand-secondary animate-pulse shadow-[0_0_10px_rgba(204,153,51,0.4)]"></span>
                <span>Business Growth</span> <span class="w-1.5 h-1.5 rounded-full bg-brand-secondary animate-pulse shadow-[0_0_10px_rgba(204,153,51,0.4)]"></span>
            </div>
        </div>
    </section>

    <!-- Homepage About section (Enhanced Dynamic Focus) -->
    <section x-data="{ 
                 visible: false,
                 handleIntersection(entry) {
                     if (entry.isIntersecting) {
                         this.visible = true;
                     }
                 }
             }"
             x-init="
                new IntersectionObserver(([entry]) => handleIntersection(entry), { threshold: 0.2 }).observe($el);
             "
             class="py-32 bg-brand-surfaceLight dark:bg-brand-primaryDark border-b border-brand-borderLight dark:border-white/5 relative overflow-hidden">
        
        <!-- Animated Background Orbs -->
        <div class="absolute top-1/4 -left-20 w-96 h-96 bg-brand-primary/5 dark:bg-brand-primary/10 rounded-full blur-[120px] pointer-events-none animate-pulse"></div>
        <div class="absolute bottom-1/4 -right-20 w-80 h-80 bg-brand-secondary/5 dark:bg-brand-secondary/10 rounded-full blur-[100px] pointer-events-none animate-pulse delay-700"></div>

        <div class="max-w-[1400px] mx-auto px-6 md:px-12 grid lg:grid-cols-12 gap-16 items-center relative z-10">
            <!-- Left Info: Dynamic Content -->
            <div class="lg:col-span-7 space-y-10">
                <div class="space-y-4">
                    <span class="text-brand-secondary font-bold text-xs uppercase tracking-[0.4em] block transition-all duration-700 transform"
                          :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 -translate-y-4'">
                        Our Focus
                    </span>
                    <h2 class="font-display font-black text-4xl md:text-5xl lg:text-6xl text-brand-primary dark:text-white tracking-tight leading-[1.1] transition-all duration-1000 delay-100 transform"
                        :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                        Innovation Driven. <br/>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-primary via-brand-secondary to-brand-primary animate-gradient-x dark:from-white dark:via-brand-secondary dark:to-white">Results Focused.</span>
                    </h2>
                </div>

                <p class="text-brand-textMuted dark:text-slate-400 text-lg md:text-xl leading-relaxed font-medium max-w-2xl transition-all duration-1000 delay-300 transform"
                   :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                    Elvora Innovation is a company helping businesses turn ideas into products that grow. From planning and analysis to design and building, we work with you to create products that people love.
                </p>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 pt-6 border-t border-brand-borderLight dark:border-white/10 transition-all duration-1000 delay-500 transform"
                     :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                    <div class="flex items-start gap-4 group cursor-default">
                        <div class="w-12 h-12 rounded-xl bg-brand-primary/5 dark:bg-white/5 flex items-center justify-center text-brand-secondary transition-all duration-300 group-hover:bg-brand-secondary group-hover:text-white">
                            <span class="material-symbols-outlined font-bold transition-transform duration-500 group-hover:scale-110">check_circle</span>
                        </div>
                        <div>
                            <h4 class="font-display font-bold text-brand-primary dark:text-white text-lg">Fast & Flexible</h4>
                            <p class="text-sm text-brand-textMuted dark:text-slate-500 mt-1">Agile workflows tailored to your velocity needs.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 group cursor-default">
                        <div class="w-12 h-12 rounded-xl bg-brand-primary/5 dark:bg-white/5 flex items-center justify-center text-brand-secondary transition-all duration-300 group-hover:bg-brand-secondary group-hover:text-white">
                            <span class="material-symbols-outlined font-bold transition-transform duration-500 group-hover:scale-110">check_circle</span>
                        </div>
                        <div>
                            <h4 class="font-display font-bold text-brand-primary dark:text-white text-lg">Product-First Mindset</h4>
                            <p class="text-sm text-brand-textMuted dark:text-slate-500 mt-1">We build with the end-user's impact in mind.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Graphic Frame: Interactive 3D Session -->
            <div class="lg:col-span-5 relative flex justify-center transition-all duration-1000 delay-700 transform"
                 :class="visible ? 'opacity-100 translate-y-0 scale-100' : 'opacity-0 translate-y-12 scale-95'">
                 
                <!-- Dynamic Backing Glow -->
                <div class="absolute inset-0 bg-brand-primary/20 dark:bg-brand-secondary/10 rounded-full blur-[80px] pointer-events-none animate-pulse"></div>
                
                <!-- Interactive 3D Card Wrapper -->
                <div x-data="{ 
                         tiltX: 0, 
                         tiltY: 0, 
                         scale: 1,
                         glowX: 50,
                         glowY: 50,
                         handleMove(e) {
                             let rect = $el.getBoundingClientRect();
                             let x = e.clientX - rect.left;
                             let y = e.clientY - rect.top;
                             let xc = rect.width / 2;
                             let yc = rect.height / 2;
                             this.tiltX = (xc - x) / 15;
                             this.tiltY = (y - yc) / 15;
                             this.glowX = (x / rect.width) * 100;
                             this.glowY = (y / rect.height) * 100;
                             this.scale = 1.05;
                         },
                         handleLeave() {
                             this.tiltX = 0; 
                             this.tiltY = 0; 
                             this.scale = 1;
                         }
                     }" 
                     @mousemove="handleMove($event)"
                     @mouseleave="handleLeave()"
                     class="relative p-1 bg-gradient-to-br from-brand-secondary/40 via-brand-primary/20 to-brand-secondary/40 rounded-[2.5rem] shadow-2xl w-full max-w-md transition-all duration-300 ease-out cursor-pointer z-10 group"
                     :style="`transform: perspective(1000px) rotateX(${tiltY}deg) rotateY(${tiltX}deg) scale(${scale})`"
                >
                    <!-- Glossy Overlay Effect -->
                    <div class="absolute inset-0 rounded-[2.5rem] pointer-events-none z-20 transition-opacity duration-300 opacity-0 group-hover:opacity-100"
                         :style="`background: radial-gradient(circle at ${glowX}% ${glowY}%, rgba(255,255,255,0.15) 0%, transparent 60%)`"></div>

                    <div class="relative rounded-[2.3rem] overflow-hidden bg-white dark:bg-slate-900 h-[450px]">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=80" 
                             alt="Collaboration Session" 
                             class="absolute inset-0 w-full h-full object-cover filter transition-all duration-700 group-hover:scale-110 group-hover:rotate-1">
                             
                        <!-- Content Overlay on Card -->
                        <div class="absolute inset-0 bg-gradient-to-t from-brand-primary/90 via-transparent to-transparent flex flex-col justify-end p-8 space-y-2">
                            <span class="text-white font-display font-black text-2xl drop-shadow-lg">Collaboration Session</span>
                            <div class="flex items-center gap-2">
                                <div class="h-1 w-12 bg-brand-secondary rounded-full"></div>
                                <span class="text-brand-secondary text-[10px] font-bold uppercase tracking-widest">Live Engineering</span>
                            </div>
                        </div>
                    </div>
                         
                    <!-- Floating High-End Badges -->
                    <div class="absolute -left-10 top-12 bg-white/90 dark:bg-slate-900/90 backdrop-blur-xl border border-slate-200/50 dark:border-white/10 rounded-2xl p-4 shadow-2xl flex items-center gap-4 animate-float-slow z-30 transition-transform group-hover:translate-x-2">
                        <div class="relative flex h-4 w-4">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-4 w-4 bg-emerald-500 shadow-[0_0_10px_rgba(16,185,129,0.5)]"></span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest leading-none">Speed</span>
                            <span class="text-sm font-black text-slate-800 dark:text-slate-100">Fast &amp; Flexible</span>
                        </div>
                    </div>

                    <div class="absolute -right-10 bottom-20 bg-white/90 dark:bg-slate-900/90 backdrop-blur-xl border border-slate-200/50 dark:border-white/10 rounded-2xl p-4 shadow-2xl flex items-center gap-4 animate-float-slow delay-500 z-30 transition-transform group-hover:-translate-x-2">
                        <div class="w-10 h-10 rounded-xl bg-brand-secondary/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-brand-secondary text-xl font-bold">workspace_premium</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest leading-none">Quality</span>
                            <span class="text-sm font-black text-slate-800 dark:text-slate-100">Product-First</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- What We Do (Capabilities Bento Grid) -->
    <section x-data="{ 
                 visible: false,
                 handleIntersection(entry) {
                     if (entry.isIntersecting) {
                         this.visible = true;
                     }
                 }
             }"
             x-init="
                new IntersectionObserver(([entry]) => handleIntersection(entry), { threshold: 0.1 }).observe($el);
             "
             class="py-32 bg-white dark:bg-brand-surfaceDark border-b border-brand-borderLight dark:border-white/5 relative overflow-hidden">

        <!-- Subtle Background Glow -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-brand-primary/[0.02] dark:bg-brand-secondary/[0.02] rounded-full blur-[120px] pointer-events-none"></div>

        <div class="max-w-[1400px] mx-auto px-6 md:px-12 relative z-10">
            <div class="text-center max-w-2xl mx-auto mb-20 space-y-4">
                <span class="text-brand-secondary font-bold text-xs uppercase tracking-[0.4em] block transition-all duration-700 transform"
                      :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 -translate-y-4'">
                    What We Do
                </span>
                <h2 class="font-display font-black text-4xl md:text-5xl text-brand-primary dark:text-white tracking-tight transition-all duration-1000 delay-100 transform"
                    :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                    How We Help You
                </h2>
                <p class="text-brand-textMuted dark:text-slate-400 text-lg transition-all duration-1000 delay-300 transform"
                   :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                    From planning your idea to launching and growing it, we work with you to build products that really work.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div class="group bg-brand-surfaceLight dark:bg-brand-primaryDark p-10 rounded-[2.5rem] border border-brand-borderLight dark:border-white/10 flex flex-col justify-between transition-all duration-700 hover:-translate-y-2 hover:border-brand-secondary/40 hover:shadow-[0_30px_60px_-15px_rgba(204,153,51,0.2)] relative overflow-hidden"
                     :class="visible ? 'opacity-100 translate-y-0 scale-100' : 'opacity-0 translate-y-12 scale-95'"
                     style="transition-delay: 400ms;">
                    <!-- Dynamic Gold Motion Background -->
                    <div class="absolute inset-0 bg-gradient-to-r from-brand-secondary/10 via-brand-primary/5 to-brand-secondary/10 opacity-0 group-hover:opacity-100 transition-opacity duration-1000 animate-gradient-x"></div>

                    <div class="space-y-6 relative z-10">
                        <div class="w-14 h-14 rounded-2xl bg-white dark:bg-brand-surfaceDark border border-brand-borderLight dark:border-white/10 flex items-center justify-center text-brand-primary dark:text-brand-secondary shadow-sm group-hover:bg-brand-secondary group-hover:text-white group-hover:rotate-6 transition-all duration-500">
                            <span class="material-symbols-outlined text-3xl">insights</span>
                        </div>
                        <h3 class="font-display font-bold text-xl text-brand-primary dark:text-white group-hover:text-brand-secondary transition-colors duration-300">Product Planning</h3>
                        <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed font-medium">
                            We help you plan your product, decide what it needs, and create a clear step-by-step path to finish it.
                        </p>
                    </div>
                    <div class="mt-8 pt-6 border-t border-brand-borderLight dark:border-white/5 opacity-0 group-hover:opacity-100 transition-all duration-500 translate-y-2 group-hover:translate-y-0 relative z-10">
                        <span class="text-[10px] font-black uppercase tracking-widest text-brand-secondary">Strategic Discovery</span>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="group bg-brand-surfaceLight dark:bg-brand-primaryDark p-10 rounded-[2.5rem] border border-brand-borderLight dark:border-white/10 flex flex-col justify-between transition-all duration-700 hover:-translate-y-2 hover:border-brand-secondary/40 hover:shadow-[0_30px_60px_-15px_rgba(204,153,51,0.2)] relative overflow-hidden"
                     :class="visible ? 'opacity-100 translate-y-0 scale-100' : 'opacity-0 translate-y-12 scale-95'"
                     style="transition-delay: 500ms;">
                    <div class="absolute inset-0 bg-gradient-to-r from-brand-secondary/10 via-brand-primary/5 to-brand-secondary/10 opacity-0 group-hover:opacity-100 transition-opacity duration-1000 animate-gradient-x"></div>

                    <div class="space-y-6 relative z-10">
                        <div class="w-14 h-14 rounded-2xl bg-white dark:bg-brand-surfaceDark border border-brand-borderLight dark:border-white/10 flex items-center justify-center text-brand-primary dark:text-brand-secondary shadow-sm group-hover:bg-brand-secondary group-hover:text-white group-hover:-rotate-6 transition-all duration-500">
                            <span class="material-symbols-outlined text-3xl">code</span>
                        </div>
                        <h3 class="font-display font-bold text-xl text-brand-primary dark:text-white group-hover:text-brand-secondary transition-colors duration-300">Web Building</h3>
                        <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed font-medium">
                            We build fast and safe websites for businesses and startups that are easy for everyone to use.
                        </p>
                    </div>
                    <div class="mt-8 pt-6 border-t border-brand-borderLight dark:border-white/5 opacity-0 group-hover:opacity-100 transition-all duration-500 translate-y-2 group-hover:translate-y-0 relative z-10">
                        <span class="text-[10px] font-black uppercase tracking-widest text-brand-secondary">Full-Stack Engineering</span>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="group bg-brand-surfaceLight dark:bg-brand-primaryDark p-10 rounded-[2.5rem] border border-brand-borderLight dark:border-white/10 flex flex-col justify-between transition-all duration-700 hover:-translate-y-2 hover:border-brand-secondary/40 hover:shadow-[0_30px_60px_-15px_rgba(204,153,51,0.2)] relative overflow-hidden"
                     :class="visible ? 'opacity-100 translate-y-0 scale-100' : 'opacity-0 translate-y-12 scale-95'"
                     style="transition-delay: 600ms;">
                    <div class="absolute inset-0 bg-gradient-to-r from-brand-secondary/10 via-brand-primary/5 to-brand-secondary/10 opacity-0 group-hover:opacity-100 transition-opacity duration-1000 animate-gradient-x"></div>

                    <div class="space-y-6 relative z-10">
                        <div class="w-14 h-14 rounded-2xl bg-white dark:bg-brand-surfaceDark border border-brand-borderLight dark:border-white/10 flex items-center justify-center text-brand-primary dark:text-brand-secondary shadow-sm group-hover:bg-brand-secondary group-hover:text-white group-hover:rotate-6 transition-all duration-500">
                            <span class="material-symbols-outlined text-3xl">phone_iphone</span>
                        </div>
                        <h3 class="font-display font-bold text-xl text-brand-primary dark:text-white group-hover:text-brand-secondary transition-colors duration-300">Mobile App Building</h3>
                        <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed font-medium">
                            Apps for phones that people enjoy using and that help your business grow.
                        </p>
                    </div>
                    <div class="mt-8 pt-6 border-t border-brand-borderLight dark:border-white/5 opacity-0 group-hover:opacity-100 transition-all duration-500 translate-y-2 group-hover:translate-y-0 relative z-10">
                        <span class="text-[10px] font-black uppercase tracking-widest text-brand-secondary">Native Experience</span>
                    </div>
                </div>

                <!-- Service 4 -->
                <div class="group bg-brand-surfaceLight dark:bg-brand-primaryDark p-10 rounded-[2.5rem] border border-brand-borderLight dark:border-white/10 flex flex-col justify-between transition-all duration-700 hover:-translate-y-2 hover:border-brand-secondary/40 hover:shadow-[0_30px_60px_-15px_rgba(204,153,51,0.2)] relative overflow-hidden"
                     :class="visible ? 'opacity-100 translate-y-0 scale-100' : 'opacity-0 translate-y-12 scale-95'"
                     style="transition-delay: 700ms;">
                    <div class="absolute inset-0 bg-gradient-to-r from-brand-secondary/10 via-brand-primary/5 to-brand-secondary/10 opacity-0 group-hover:opacity-100 transition-opacity duration-1000 animate-gradient-x"></div>

                    <div class="space-y-6 relative z-10">
                        <div class="w-14 h-14 rounded-2xl bg-white dark:bg-brand-surfaceDark border border-brand-borderLight dark:border-white/10 flex items-center justify-center text-brand-primary dark:text-brand-secondary shadow-sm group-hover:bg-brand-secondary group-hover:text-white group-hover:-rotate-6 transition-all duration-500">
                            <span class="material-symbols-outlined text-3xl">palette</span>
                        </div>
                        <h3 class="font-display font-bold text-xl text-brand-primary dark:text-white group-hover:text-brand-secondary transition-colors duration-300">Design for People</h3>
                        <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed font-medium">
                            Creating simple and beautiful screens that make it easy for your customers to get things done.
                        </p>
                    </div>
                    <div class="mt-8 pt-6 border-t border-brand-borderLight dark:border-white/5 opacity-0 group-hover:opacity-100 transition-all duration-500 translate-y-2 group-hover:translate-y-0 relative z-10">
                        <span class="text-[10px] font-black uppercase tracking-widest text-brand-secondary">UI/UX Excellence</span>
                    </div>
                </div>

                <!-- Service 5 -->
                <div class="group bg-brand-surfaceLight dark:bg-brand-primaryDark p-10 rounded-[2.5rem] border border-brand-borderLight dark:border-white/10 flex flex-col justify-between transition-all duration-700 hover:-translate-y-2 hover:border-brand-secondary/40 hover:shadow-[0_30px_60px_-15px_rgba(204,153,51,0.2)] relative overflow-hidden"
                     :class="visible ? 'opacity-100 translate-y-0 scale-100' : 'opacity-0 translate-y-12 scale-95'"
                     style="transition-delay: 800ms;">
                    <div class="absolute inset-0 bg-gradient-to-r from-brand-secondary/10 via-brand-primary/5 to-brand-secondary/10 opacity-0 group-hover:opacity-100 transition-opacity duration-1000 animate-gradient-x"></div>

                    <div class="space-y-6 relative z-10">
                        <div class="w-14 h-14 rounded-2xl bg-white dark:bg-brand-surfaceDark border border-brand-borderLight dark:border-white/10 flex items-center justify-center text-brand-primary dark:text-brand-secondary shadow-sm group-hover:bg-brand-secondary group-hover:text-white group-hover:rotate-6 transition-all duration-500">
                            <span class="material-symbols-outlined text-3xl">rocket_launch</span>
                        </div>
                        <h3 class="font-display font-bold text-xl text-brand-primary dark:text-white group-hover:text-brand-secondary transition-colors duration-300">Building New Ideas</h3>
                        <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed font-medium">
                            Supporting people with new ideas from the very start all the way to launching and growing. 
                        </p>
                    </div>
                    <div class="mt-8 pt-6 border-t border-brand-borderLight dark:border-white/5 opacity-0 group-hover:opacity-100 transition-all duration-500 translate-y-2 group-hover:translate-y-0 relative z-10">
                        <span class="text-[10px] font-black uppercase tracking-widest text-brand-secondary">Venture Incubation</span>
                    </div>
                </div>

                <!-- Service 6 -->
                <div class="group bg-brand-surfaceLight dark:bg-brand-primaryDark p-10 rounded-[2.5rem] border border-brand-borderLight dark:border-white/10 flex flex-col justify-between transition-all duration-700 hover:-translate-y-2 hover:border-brand-secondary/40 hover:shadow-[0_30px_60px_-15px_rgba(204,153,51,0.2)] relative overflow-hidden"
                     :class="visible ? 'opacity-100 translate-y-0 scale-100' : 'opacity-0 translate-y-12 scale-95'"
                     style="transition-delay: 900ms;">
                    <div class="absolute inset-0 bg-gradient-to-r from-brand-secondary/10 via-brand-primary/5 to-brand-secondary/10 opacity-0 group-hover:opacity-100 transition-opacity duration-1000 animate-gradient-x"></div>

                    <div class="space-y-6 relative z-10">
                        <div class="w-14 h-14 rounded-2xl bg-white dark:bg-brand-surfaceDark border border-brand-borderLight dark:border-white/10 flex items-center justify-center text-brand-primary dark:text-brand-secondary shadow-sm group-hover:bg-brand-secondary group-hover:text-white group-hover:-rotate-6 transition-all duration-500">
                            <span class="material-symbols-outlined text-3xl">settings_suggest</span>
                        </div>
                        <h3 class="font-display font-bold text-xl text-brand-primary dark:text-white group-hover:text-brand-secondary transition-colors duration-300">Business Growth</h3>
                        <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed font-medium">
                            Helping companies use new tools to work better, faster, and smarter.
                        </p>
                    </div>
                    <div class="mt-8 pt-6 border-t border-brand-borderLight dark:border-white/5 opacity-0 group-hover:opacity-100 transition-all duration-500 translate-y-2 group-hover:translate-y-0 relative z-10">
                        <span class="text-[10px] font-black uppercase tracking-widest text-brand-secondary">Scale Optimization</span>
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
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110 -z-20" style="background-image: url('https://images.unsplash.com/photo-1501504905252-473c47e087f8?auto=format&fit=crop&w=800&q=80')"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/40 to-transparent -z-10 group-hover:via-slate-950/50 transition-all"></div>
                    <div class="space-y-3">
                        <div class="w-12 h-12 rounded-xl bg-white/10 backdrop-blur-md flex items-center justify-center text-brand-secondary mb-2 transition-transform duration-500 group-hover:rotate-12">
                            <span class="material-symbols-outlined text-3xl">school</span>
                        </div>
                        <h4 class="font-display font-bold text-xl text-white">Education</h4>
                        <p class="text-xs text-slate-300 font-medium leading-relaxed">Modern platforms for schools and students to learn and grow digital skills.</p>
                        <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-brand-secondary flex items-center gap-2 pt-2">
                            Empowering Learning <span class="material-symbols-outlined text-xs transition-transform duration-300 group-hover:translate-x-1">arrow_forward</span>
                        </span>
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
    <section class="relative py-24 md:py-32 bg-slate-50 border-b border-slate-200/60 overflow-visible">
        <!-- Enhanced Background Elements -->
        <div class="absolute inset-0 bg-[radial-gradient(rgba(15,23,42,0.03)_1px,transparent_1px)] bg-[size:2rem_2rem] pointer-events-none"></div>
        <div class="absolute top-0 left-0 w-full h-32 bg-gradient-to-b from-white to-transparent pointer-events-none"></div>
        
        <style>
            @keyframes pulse-ring {
                0% { transform: scale(0.8); opacity: 0.5; }
                100% { transform: scale(1.3); opacity: 0; }
            }
            @keyframes radar-beam {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
            @keyframes draw-path {
                to { stroke-dashoffset: 0; }
            }
            @keyframes float-slow {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-10px); }
            }
            .animate-pulse-ring { animation: pulse-ring 2s cubic-bezier(0.4, 0, 0.6, 1) infinite; }
            .animate-radar { animation: radar-beam 4s linear infinite; }
            .animate-float-slow { animation: float-slow 4s ease-in-out infinite; }
        </style>
        
        <div class="max-w-[1200px] mx-auto px-6 md:px-12 relative z-10" x-data="{
            activeStep: 1,
            init() {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            this.activeStep = parseInt(entry.target.dataset.step);
                        }
                    });
                }, {
                    rootMargin: '-30% 0px -50% 0px'
                });
                this.$refs.cards.querySelectorAll('.process-card').forEach(card => {
                    observer.observe(card);
                });
            }
        }">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-20">
                <!-- Left column: Sticky description and interactive checklist -->
                <div class="lg:col-span-5 lg:sticky lg:top-28 h-fit space-y-8">
                    <div>
                        <span class="text-brand-secondary font-bold text-xs uppercase tracking-[0.4em] block mb-2">Workflow</span>
                        <h2 class="font-display font-extrabold text-3xl md:text-5xl text-brand-primary tracking-tight">Our Simple Process</h2>
                        <p class="text-slate-500 text-sm md:text-base mt-3 leading-relaxed">We combine strategic engineering with user-centric design to deliver exceptional digital products.</p>
                    </div>
                    
                    <!-- Vertical progress list -->
                    <div class="relative pl-8 space-y-6 py-2 hidden lg:block">
                        <!-- Background vertical track -->
                        <div class="absolute left-0 top-0 bottom-0 w-[1px] bg-slate-200"></div>
                        
                        <!-- Animated active step line overlay -->
                        <div class="absolute left-0 top-0 w-[2px] bg-brand-secondary transition-all duration-700 ease-in-out"
                             :style="'height: ' + ((activeStep - 1) / 6 * 100) + '%;'"></div>
                        
                        <!-- Checklist items -->
                        <template x-for="(name, index) in ['Discovery', 'Strategy', 'Design', 'Building', 'Testing', 'Launch', 'Growth & Support']">
                            <div class="relative cursor-pointer group flex items-center space-x-4 transition-all duration-300"
                                 @click="
                                     const card = document.querySelector('[data-step=\'' + (index + 1) + '\']');
                                     if (card) { card.scrollIntoView({ behavior: 'smooth', block: 'center' }); }
                                 ">
                                <!-- Marker dot -->
                                <div class="absolute -left-[35px] w-3 h-3 rounded-full border-2 bg-white transition-all duration-500 z-10"
                                     :class="activeStep === (index + 1) ? 'border-brand-secondary scale-110' : (activeStep > (index + 1) ? 'border-brand-primary bg-brand-primary' : 'border-slate-300 group-hover:border-slate-400')">
                                     <div x-show="activeStep === (index + 1)" class="absolute inset-0 rounded-full animate-pulse-ring bg-brand-secondary/40"></div>
                                </div>
                                
                                <span class="font-display font-bold text-xs md:text-sm tracking-wide uppercase transition-all duration-300"
                                      :class="activeStep === (index + 1) ? 'text-brand-primary translate-x-1' : 'text-slate-400 group-hover:text-slate-600 group-hover:translate-x-1'">
                                    <span x-text="name"></span>
                                </span>
                            </div>
                        </template>
                    </div>

                    <!-- Dynamic Motion Graphics Visualizer Box -->
                    <div class="border border-slate-200/60 bg-white/90 backdrop-blur-xl rounded-[2.5rem] p-8 shadow-2xl h-64 flex items-center justify-center relative overflow-hidden group hidden lg:flex">
                        <!-- Background Grid/Nodes -->
                        <div class="absolute inset-0 opacity-[0.03] pointer-events-none">
                            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                                <pattern id="visualizer-grid" width="10" height="10" patternUnits="userSpaceOnUse">
                                    <path d="M 10 0 L 0 0 0 10" fill="none" stroke="#003366" stroke-width="0.5"/>
                                </pattern>
                                <rect width="100" height="100" fill="url(#visualizer-grid)" />
                            </svg>
                        </div>
                        
                        <!-- Visualizer Elements Container -->
                        <div class="relative w-full h-full flex items-center justify-center">
                            
                            <!-- Step 1: Discovery (Radar/Scanning) -->
                            <div x-show="activeStep === 1" x-transition.opacity.duration.500ms class="absolute inset-0 flex flex-col items-center justify-center space-y-4">
                                <div class="relative w-24 h-24">
                                    <div class="absolute inset-0 rounded-full border border-brand-primary/10"></div>
                                    <div class="absolute inset-2 rounded-full border border-brand-primary/20"></div>
                                    <div class="absolute inset-4 rounded-full border border-brand-primary/30"></div>
                                    <div class="absolute inset-0 rounded-full animate-radar bg-gradient-to-r from-brand-primary/10 via-transparent to-transparent"></div>
                                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-2 h-2 rounded-full bg-brand-primary shadow-[0_0_10px_rgba(0,51,102,0.5)]"></div>
                                    <!-- Floating nodes -->
                                    <div class="absolute top-4 right-6 w-1.5 h-1.5 rounded-full bg-brand-secondary animate-pulse"></div>
                                    <div class="absolute bottom-6 left-4 w-1 h-1 rounded-full bg-brand-primary/40"></div>
                                </div>
                                <div class="text-[10px] font-display font-black uppercase tracking-[0.3em] text-brand-primary/60">Scanning Market Insights</div>
                            </div>

                            <!-- Step 2: Strategy (Blueprint/Connection) -->
                            <div x-show="activeStep === 2" x-transition.opacity.duration.500ms class="absolute inset-0 flex flex-col items-center justify-center space-y-6">
                                <svg class="w-32 h-16" viewBox="0 0 120 60">
                                    <circle cx="20" cy="30" r="4" fill="#003366" />
                                    <circle cx="60" cy="15" r="4" fill="#CC9933" />
                                    <circle cx="60" cy="45" r="4" fill="#003366" />
                                    <circle cx="100" cy="30" r="4" fill="#CC9933" />
                                    <path d="M24 30 L56 15 M24 30 L56 45 M64 15 L96 30 M64 45 L96 30" 
                                          stroke="#003366" stroke-width="1.5" stroke-dasharray="100" stroke-dashoffset="100"
                                          class="transition-all duration-1000"
                                          :style="activeStep === 2 ? 'stroke-dashoffset: 0;' : ''" />
                                </svg>
                                <div class="text-[10px] font-display font-black uppercase tracking-[0.3em] text-brand-secondary/80">Mapping Product Roadmap</div>
                            </div>

                            <!-- Step 3: Design (Creative/Flow) -->
                            <div x-show="activeStep === 3" x-transition.opacity.duration.500ms class="absolute inset-0 flex flex-col items-center justify-center space-y-5">
                                <div class="relative w-32 h-20 bg-slate-50 rounded-xl border border-slate-200 overflow-hidden shadow-inner p-3 animate-float-slow">
                                    <div class="w-1/2 h-2 bg-slate-200 rounded-full mb-3"></div>
                                    <div class="grid grid-cols-3 gap-2">
                                        <div class="h-6 bg-brand-secondary/10 border border-brand-secondary/20 rounded-lg"></div>
                                        <div class="h-6 bg-brand-primary/5 border border-brand-primary/10 rounded-lg"></div>
                                        <div class="h-6 bg-brand-primary/5 border border-brand-primary/10 rounded-lg"></div>
                                    </div>
                                    <div class="absolute bottom-0 right-0 p-2">
                                        <span class="material-symbols-outlined text-brand-secondary text-xs opacity-40">edit</span>
                                    </div>
                                </div>
                                <div class="text-[10px] font-display font-black uppercase tracking-[0.3em] text-slate-400">Crafting Visual Systems</div>
                            </div>

                            <!-- Step 4: Building (Architecture/Code) -->
                            <div x-show="activeStep === 4" x-transition.opacity.duration.500ms class="absolute inset-0 flex flex-col items-center justify-center bg-slate-900 rounded-[2rem] m-2 shadow-2xl p-6">
                                <div class="w-full font-mono text-[10px] space-y-1.5">
                                    <div class="flex items-center space-x-2">
                                        <span class="text-pink-400">import</span>
                                        <span class="text-sky-300">{ Elvora }</span>
                                        <span class="text-pink-400">from</span>
                                        <span class="text-emerald-300">'@engine'</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="text-sky-300">Elvora.initialize</span><span class="text-slate-400">()</span>
                                    </div>
                                    <div class="h-0.5 w-full bg-slate-800 rounded-full overflow-hidden mt-2">
                                        <div class="h-full bg-emerald-500 transition-all duration-1000" :style="activeStep === 4 ? 'width: 100%' : 'width: 0%'"></div>
                                    </div>
                                </div>
                                <div class="absolute bottom-4 right-6">
                                    <div class="flex space-x-1">
                                        <div class="w-1 h-1 rounded-full bg-emerald-500 animate-pulse"></div>
                                        <div class="w-1 h-1 rounded-full bg-emerald-500 animate-pulse delay-75"></div>
                                        <div class="w-1 h-1 rounded-full bg-emerald-500 animate-pulse delay-150"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 5: Testing (Quality/Audit) -->
                            <div x-show="activeStep === 5" x-transition.opacity.duration.500ms class="absolute inset-0 flex flex-col items-center justify-center space-y-4">
                                <div class="flex items-center space-x-3">
                                    <div x-data="{ count: 0 }" x-init="setInterval(() => { if(activeStep === 5 && count < 98) count++ }, 20)" class="relative w-20 h-20">
                                        <svg class="w-full h-full -rotate-90" viewBox="0 0 36 36">
                                            <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="#E2E8F0" stroke-width="2" />
                                            <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="#10B981" stroke-width="2.5" stroke-dasharray="100, 100" :style="'stroke-dasharray: ' + count + ', 100'" class="transition-all duration-500" />
                                        </svg>
                                        <div class="absolute inset-0 flex items-center justify-center font-display font-black text-xs text-emerald-600" x-text="count + '%'"></div>
                                    </div>
                                    <div class="space-y-2">
                                        <div class="flex items-center space-x-2 text-[9px] font-bold text-slate-500">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                            <span>Performance</span>
                                        </div>
                                        <div class="flex items-center space-x-2 text-[9px] font-bold text-slate-500">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                            <span>Security</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-[10px] font-display font-black uppercase tracking-[0.3em] text-emerald-600/70">Auditing Integrity</div>
                            </div>

                            <!-- Step 6: Launch (Deployment) -->
                            <div x-show="activeStep === 6" x-transition.opacity.duration.500ms class="absolute inset-0 flex flex-col items-center justify-center">
                                <div class="relative">
                                    <span class="material-symbols-outlined text-4xl text-brand-secondary transition-all duration-1000" :class="activeStep === 6 ? '-translate-y-4' : 'translate-y-0'">rocket_launch</span>
                                    <div x-show="activeStep === 6" class="absolute -bottom-2 left-1/2 -translate-x-1/2 w-8 h-8 bg-brand-secondary/20 rounded-full blur-xl animate-pulse"></div>
                                </div>
                                <div class="mt-6 flex space-x-2">
                                    <div class="px-3 py-1 rounded-full bg-brand-primary text-[8px] font-bold text-white uppercase tracking-widest animate-pulse">Live Server</div>
                                    <div class="px-3 py-1 rounded-full border border-slate-200 text-[8px] font-bold text-slate-400 uppercase tracking-widest">v1.0.0</div>
                                </div>
                            </div>

                            <!-- Step 7: Growth (Optimization) -->
                            <div x-show="activeStep === 7" x-transition.opacity.duration.500ms class="absolute inset-0 flex flex-col items-center justify-center space-y-4">
                                <div class="flex items-end space-x-2 h-16">
                                    <div class="w-5 bg-slate-100 rounded-t-lg h-[20%]"></div>
                                    <div class="w-5 bg-slate-200 rounded-t-lg h-[40%]"></div>
                                    <div class="w-5 bg-brand-primary/40 rounded-t-lg h-[60%] transition-all duration-1000" :style="activeStep === 7 ? 'height: 60%' : 'height: 0%'"></div>
                                    <div class="w-5 bg-brand-primary rounded-t-lg h-[85%] transition-all duration-1000 delay-100" :style="activeSlide === 7 ? 'height: 85%' : 'height: 0%'"></div>
                                    <div class="w-5 bg-brand-secondary rounded-t-lg h-[100%] transition-all duration-1000 delay-200" :style="activeSlide === 7 ? 'height: 100%' : 'height: 0%'"></div>
                                </div>
                                <div class="text-[10px] font-display font-black uppercase tracking-[0.3em] text-brand-primary/60">Scaling &amp; Optimization</div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Right column: The vertical sequence of cards -->
                <div class="lg:col-span-7 space-y-12" x-ref="cards">
                    <!-- Step 1 Card -->
                    <div data-step="1" class="process-card bg-white border border-slate-100 shadow-[0_4px_20px_rgba(0,0,0,0.02)] transition-all duration-700 p-8 md:p-12 rounded-[2.5rem] relative overflow-hidden group hover:border-brand-primary/10"
                         :class="activeStep === 1 ? 'opacity-100 translate-x-0 scale-100' : 'opacity-40 translate-x-4 scale-[0.98]'">
                        <div class="absolute -right-8 -top-8 w-32 h-32 rounded-full bg-brand-primary/5 blur-3xl group-hover:bg-brand-primary/10 transition-all duration-700"></div>
                        <div class="flex items-center gap-6 mb-8">
                            <div class="w-16 h-16 rounded-2xl bg-slate-50 flex items-center justify-center text-brand-primary transition-all duration-500 group-hover:bg-brand-primary group-hover:text-white group-hover:rotate-6">
                                <span class="material-symbols-outlined text-3xl">search</span>
                            </div>
                            <div class="text-4xl font-display font-black text-slate-100 group-hover:text-brand-primary/10 transition-colors">01</div>
                        </div>
                        <div class="space-y-4">
                            <h3 class="font-display font-black text-2xl md:text-3xl text-brand-primary tracking-tight">Discovery & Analysis</h3>
                            <p class="text-slate-600 text-base leading-relaxed font-medium max-w-lg">
                                We deep-dive into your business goals, target audience, and market landscape to find the unique angle that will drive your product's success.
                            </p>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mt-8 pt-8 border-t border-slate-50">
                            <div class="flex items-center gap-2 text-xs font-bold text-slate-400">
                                <span class="w-1 h-1 rounded-full bg-brand-secondary"></span> Market Research
                            </div>
                            <div class="flex items-center gap-2 text-xs font-bold text-slate-400">
                                <span class="w-1 h-1 rounded-full bg-brand-secondary"></span> User Interviews
                            </div>
                        </div>
                    </div>

                    <!-- Step 2 Card -->
                    <div data-step="2" class="process-card bg-white border border-slate-100 shadow-[0_4px_20px_rgba(0,0,0,0.02)] transition-all duration-700 p-8 md:p-12 rounded-[2.5rem] relative overflow-hidden group hover:border-brand-primary/10"
                         :class="activeStep === 2 ? 'opacity-100 translate-x-0 scale-100' : 'opacity-40 translate-x-4 scale-[0.98]'">
                        <div class="absolute -right-8 -top-8 w-32 h-32 rounded-full bg-brand-primary/5 blur-3xl group-hover:bg-brand-primary/10 transition-all duration-700"></div>
                        <div class="flex items-center gap-6 mb-8">
                            <div class="w-16 h-16 rounded-2xl bg-slate-50 flex items-center justify-center text-brand-primary transition-all duration-500 group-hover:bg-brand-primary group-hover:text-white group-hover:rotate-6">
                                <span class="material-symbols-outlined text-3xl">architecture</span>
                            </div>
                            <div class="text-4xl font-display font-black text-slate-100 group-hover:text-brand-primary/10 transition-colors">02</div>
                        </div>
                        <div class="space-y-4">
                            <h3 class="font-display font-black text-2xl md:text-3xl text-brand-primary tracking-tight">Strategy & Roadmap</h3>
                            <p class="text-slate-600 text-base leading-relaxed font-medium max-w-lg">
                                We define the Minimum Viable Product (MVP) and create a technical roadmap that balances speed-to-market with long-term scalability.
                            </p>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mt-8 pt-8 border-t border-slate-50">
                            <div class="flex items-center gap-2 text-xs font-bold text-slate-400">
                                <span class="w-1 h-1 rounded-full bg-brand-secondary"></span> MVP Definition
                            </div>
                            <div class="flex items-center gap-2 text-xs font-bold text-slate-400">
                                <span class="w-1 h-1 rounded-full bg-brand-secondary"></span> KPI Setting
                            </div>
                        </div>
                    </div>

                    <!-- Step 3 Card -->
                    <div data-step="3" class="process-card bg-white border border-slate-100 shadow-[0_4px_20px_rgba(0,0,0,0.02)] transition-all duration-700 p-8 md:p-12 rounded-[2.5rem] relative overflow-hidden group hover:border-brand-primary/10"
                         :class="activeStep === 3 ? 'opacity-100 translate-x-0 scale-100' : 'opacity-40 translate-x-4 scale-[0.98]'">
                        <div class="absolute -right-8 -top-8 w-32 h-32 rounded-full bg-brand-primary/5 blur-3xl group-hover:bg-brand-primary/10 transition-all duration-700"></div>
                        <div class="flex items-center gap-6 mb-8">
                            <div class="w-16 h-16 rounded-2xl bg-slate-50 flex items-center justify-center text-brand-primary transition-all duration-500 group-hover:bg-brand-primary group-hover:text-white group-hover:rotate-6">
                                <span class="material-symbols-outlined text-3xl">brush</span>
                            </div>
                            <div class="text-4xl font-display font-black text-slate-100 group-hover:text-brand-primary/10 transition-colors">03</div>
                        </div>
                        <div class="space-y-4">
                            <h3 class="font-display font-black text-2xl md:text-3xl text-brand-primary tracking-tight">Human-Centered Design</h3>
                            <p class="text-slate-600 text-base leading-relaxed font-medium max-w-lg">
                                Our designers craft intuitive interfaces that not only look premium but are optimized for user retention and frictionless engagement.
                            </p>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mt-8 pt-8 border-t border-slate-50">
                            <div class="flex items-center gap-2 text-xs font-bold text-slate-400">
                                <span class="w-1 h-1 rounded-full bg-brand-secondary"></span> UI/UX Design
                            </div>
                            <div class="flex items-center gap-2 text-xs font-bold text-slate-400">
                                <span class="w-1 h-1 rounded-full bg-brand-secondary"></span> Interactive Prototypes
                            </div>
                        </div>
                    </div>

                    <!-- Step 4 Card -->
                    <div data-step="4" class="process-card bg-white border border-slate-100 shadow-[0_4px_20px_rgba(0,0,0,0.02)] transition-all duration-700 p-8 md:p-12 rounded-[2.5rem] relative overflow-hidden group hover:border-brand-primary/10"
                         :class="activeStep === 4 ? 'opacity-100 translate-x-0 scale-100' : 'opacity-40 translate-x-4 scale-[0.98]'">
                        <div class="absolute -right-8 -top-8 w-32 h-32 rounded-full bg-brand-primary/5 blur-3xl group-hover:bg-brand-primary/10 transition-all duration-700"></div>
                        <div class="flex items-center gap-6 mb-8">
                            <div class="w-16 h-16 rounded-2xl bg-slate-50 flex items-center justify-center text-brand-primary transition-all duration-500 group-hover:bg-brand-primary group-hover:text-white group-hover:rotate-6">
                                <span class="material-symbols-outlined text-3xl">developer_mode</span>
                            </div>
                            <div class="text-4xl font-display font-black text-slate-100 group-hover:text-brand-primary/10 transition-colors">04</div>
                        </div>
                        <div class="space-y-4">
                            <h3 class="font-display font-black text-2xl md:text-3xl text-brand-primary tracking-tight">Engineering & Build</h3>
                            <p class="text-slate-600 text-base leading-relaxed font-medium max-w-lg">
                                Using modern stacks like Laravel, React, and Flutter, we engineer robust, secure, and lightning-fast applications ready for scale.
                            </p>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mt-8 pt-8 border-t border-slate-50">
                            <div class="flex items-center gap-2 text-xs font-bold text-slate-400">
                                <span class="w-1 h-1 rounded-full bg-brand-secondary"></span> Frontend & Backend
                            </div>
                            <div class="flex items-center gap-2 text-xs font-bold text-slate-400">
                                <span class="w-1 h-1 rounded-full bg-brand-secondary"></span> API Engineering
                            </div>
                        </div>
                    </div>

                    <!-- Step 5 Card -->
                    <div data-step="5" class="process-card bg-white border border-slate-100 shadow-[0_4px_20px_rgba(0,0,0,0.02)] transition-all duration-700 p-8 md:p-12 rounded-[2.5rem] relative overflow-hidden group hover:border-brand-primary/10"
                         :class="activeStep === 5 ? 'opacity-100 translate-x-0 scale-100' : 'opacity-40 translate-x-4 scale-[0.98]'">
                        <div class="absolute -right-8 -top-8 w-32 h-32 rounded-full bg-brand-primary/5 blur-3xl group-hover:bg-brand-primary/10 transition-all duration-700"></div>
                        <div class="flex items-center gap-6 mb-8">
                            <div class="w-16 h-16 rounded-2xl bg-slate-50 flex items-center justify-center text-brand-primary transition-all duration-500 group-hover:bg-brand-primary group-hover:text-white group-hover:rotate-6">
                                <span class="material-symbols-outlined text-3xl">verified</span>
                            </div>
                            <div class="text-4xl font-display font-black text-slate-100 group-hover:text-brand-primary/10 transition-colors">05</div>
                        </div>
                        <div class="space-y-4">
                            <h3 class="font-display font-black text-2xl md:text-3xl text-brand-primary tracking-tight">Quality & Rigorous Testing</h3>
                            <p class="text-slate-600 text-base leading-relaxed font-medium max-w-lg">
                                No product leaves our lab without passing exhaustive QA, performance benchmarks, and security audits to ensure a flawless user experience.
                            </p>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mt-8 pt-8 border-t border-slate-50">
                            <div class="flex items-center gap-2 text-xs font-bold text-slate-400">
                                <span class="w-1 h-1 rounded-full bg-brand-secondary"></span> Automated Testing
                            </div>
                            <div class="flex items-center gap-2 text-xs font-bold text-slate-400">
                                <span class="w-1 h-1 rounded-full bg-brand-secondary"></span> UX Audits
                            </div>
                        </div>
                    </div>

                    <!-- Step 6 Card -->
                    <div data-step="6" class="process-card bg-white border border-slate-100 shadow-[0_4px_20px_rgba(0,0,0,0.02)] transition-all duration-700 p-8 md:p-12 rounded-[2.5rem] relative overflow-hidden group hover:border-brand-primary/10"
                         :class="activeStep === 6 ? 'opacity-100 translate-x-0 scale-100' : 'opacity-40 translate-x-4 scale-[0.98]'">
                        <div class="absolute -right-8 -top-8 w-32 h-32 rounded-full bg-brand-primary/5 blur-3xl group-hover:bg-brand-primary/10 transition-all duration-700"></div>
                        <div class="flex items-center gap-6 mb-8">
                            <div class="w-16 h-16 rounded-2xl bg-slate-50 flex items-center justify-center text-brand-primary transition-all duration-500 group-hover:bg-brand-primary group-hover:text-white group-hover:rotate-6">
                                <span class="material-symbols-outlined text-3xl">rocket</span>
                            </div>
                            <div class="text-4xl font-display font-black text-slate-100 group-hover:text-brand-primary/10 transition-colors">06</div>
                        </div>
                        <div class="space-y-4">
                            <h3 class="font-display font-black text-2xl md:text-3xl text-brand-primary tracking-tight">Launch & Deployment</h3>
                            <p class="text-slate-600 text-base leading-relaxed font-medium max-w-lg">
                                We handle the complex deployment process, server configuration, and live monitoring to ensure your transition to "Live" is seamless.
                            </p>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mt-8 pt-8 border-t border-slate-50">
                            <div class="flex items-center gap-2 text-xs font-bold text-slate-400">
                                <span class="w-1 h-1 rounded-full bg-brand-secondary"></span> Cloud Deployment
                            </div>
                            <div class="flex items-center gap-2 text-xs font-bold text-slate-400">
                                <span class="w-1 h-1 rounded-full bg-brand-secondary"></span> Real-time Monitoring
                            </div>
                        </div>
                    </div>

                    <!-- Step 7 Card -->
                    <div data-step="7" class="process-card bg-white border border-slate-100 shadow-[0_4px_20px_rgba(0,0,0,0.02)] transition-all duration-700 p-8 md:p-12 rounded-[2.5rem] relative overflow-hidden group hover:border-brand-primary/10"
                         :class="activeStep === 7 ? 'opacity-100 translate-x-0 scale-100' : 'opacity-40 translate-x-4 scale-[0.98]'">
                        <div class="absolute -right-8 -top-8 w-32 h-32 rounded-full bg-brand-primary/5 blur-3xl group-hover:bg-brand-primary/10 transition-all duration-700"></div>
                        <div class="flex items-center gap-6 mb-8">
                            <div class="w-16 h-16 rounded-2xl bg-slate-50 flex items-center justify-center text-brand-primary transition-all duration-500 group-hover:bg-brand-primary group-hover:text-white group-hover:rotate-6">
                                <span class="material-symbols-outlined text-3xl">auto_graph</span>
                            </div>
                            <div class="text-4xl font-display font-black text-slate-100 group-hover:text-brand-primary/10 transition-colors">07</div>
                        </div>
                        <div class="space-y-4">
                            <h3 class="font-display font-black text-2xl md:text-3xl text-brand-primary tracking-tight">Growth & Evolution</h3>
                            <p class="text-slate-600 text-base leading-relaxed font-medium max-w-lg">
                                Beyond the launch, we partner with you to analyze user data, optimize performance, and roll out new features to stay ahead of the curve.
                            </p>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mt-8 pt-8 border-t border-slate-50">
                            <div class="flex items-center gap-2 text-xs font-bold text-slate-400">
                                <span class="w-1 h-1 rounded-full bg-brand-secondary"></span> Data Optimization
                            </div>
                            <div class="flex items-center gap-2 text-xs font-bold text-slate-400">
                                <span class="w-1 h-1 rounded-full bg-brand-secondary"></span> Feature Scaling
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Elvora -->
    <section class="py-32 bg-white dark:bg-brand-surfaceDark border-b border-brand-borderLight dark:border-white/5 relative overflow-hidden">
        <div class="max-w-[1200px] mx-auto px-6 md:px-12 relative z-10">
            <div class="text-center max-w-2xl mx-auto mb-20 space-y-4">
                <span class="text-brand-secondary font-bold text-xs uppercase tracking-[0.4em] block">Benefits</span>
                <h2 class="font-display font-extrabold text-4xl md:text-5xl text-brand-primary dark:text-white tracking-tight">Why Choose Elvora</h2>
                <p class="text-brand-textMuted dark:text-slate-400 text-lg font-medium">Why people work with us to build and grow their ideas.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Benefit 1: People-First Thinking -->
                <div class="bg-slate-50 dark:bg-white/[0.02] border border-slate-100 dark:border-white/[0.05] rounded-[2rem] p-8 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 hover:border-brand-secondary/30 relative overflow-hidden group">
                    <div class="absolute -right-8 -top-8 w-24 h-24 rounded-full bg-brand-secondary/5 dark:bg-brand-secondary/2 filter blur-xl group-hover:scale-150 group-hover:bg-brand-secondary/10 dark:group-hover:bg-brand-secondary/5 transition-all duration-700"></div>
                    <div class="w-12 h-12 rounded-2xl bg-brand-primary/5 dark:bg-white/5 text-brand-primary dark:text-white flex items-center justify-center mb-6 group-hover:bg-brand-secondary group-hover:text-white transition-all duration-300">
                        <span class="material-symbols-outlined transition-transform duration-500 group-hover:scale-110">
                            groups
                        </span>
                    </div>
                    <h3 class="font-display font-bold text-lg text-brand-primary dark:text-white group-hover:text-brand-secondary transition-colors duration-300">People-First Thinking</h3>
                    <p class="text-brand-textMuted dark:text-slate-400 text-sm mt-3 leading-relaxed font-medium">We focus on solving your problems, not just writing code.</p>
                    <div class="w-0 h-0.5 bg-brand-secondary mt-6 transition-all duration-500 group-hover:w-full"></div>
                </div>

                <!-- Benefit 2: Help from Start to Finish -->
                <div class="bg-slate-50 dark:bg-white/[0.02] border border-slate-100 dark:border-white/[0.05] rounded-[2rem] p-8 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 hover:border-brand-secondary/30 relative overflow-hidden group">
                    <div class="absolute -right-8 -top-8 w-24 h-24 rounded-full bg-brand-secondary/5 dark:bg-brand-secondary/2 filter blur-xl group-hover:scale-150 group-hover:bg-brand-secondary/10 dark:group-hover:bg-brand-secondary/5 transition-all duration-700"></div>
                    <div class="w-12 h-12 rounded-2xl bg-brand-primary/5 dark:bg-white/5 text-brand-primary dark:text-white flex items-center justify-center mb-6 group-hover:bg-brand-secondary group-hover:text-white transition-all duration-300">
                        <span class="material-symbols-outlined transition-transform duration-500 group-hover:scale-110">
                            route
                        </span>
                    </div>
                    <h3 class="font-display font-bold text-lg text-brand-primary dark:text-white group-hover:text-brand-secondary transition-colors duration-300">Help from Start to Finish</h3>
                    <p class="text-brand-textMuted dark:text-slate-400 text-sm mt-3 leading-relaxed font-medium">We stay with you from your first idea until long after launch.</p>
                    <div class="w-0 h-0.5 bg-brand-secondary mt-6 transition-all duration-500 group-hover:w-full"></div>
                </div>

                <!-- Benefit 3: Goal-Focused Approach -->
                <div class="bg-slate-50 dark:bg-white/[0.02] border border-slate-100 dark:border-white/[0.05] rounded-[2rem] p-8 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 hover:border-brand-secondary/30 relative overflow-hidden group">
                    <div class="absolute -right-8 -top-8 w-24 h-24 rounded-full bg-brand-secondary/5 dark:bg-brand-secondary/2 filter blur-xl group-hover:scale-150 group-hover:bg-brand-secondary/10 dark:group-hover:bg-brand-secondary/5 transition-all duration-700"></div>
                    <div class="w-12 h-12 rounded-2xl bg-brand-primary/5 dark:bg-white/5 text-brand-primary dark:text-white flex items-center justify-center mb-6 group-hover:bg-brand-secondary group-hover:text-white transition-all duration-300">
                        <span class="material-symbols-outlined transition-transform duration-500 group-hover:scale-110">
                            track_changes
                        </span>
                    </div>
                    <h3 class="font-display font-bold text-lg text-brand-primary dark:text-white group-hover:text-brand-secondary transition-colors duration-300">Goal-Focused Approach</h3>
                    <p class="text-brand-textMuted dark:text-slate-400 text-sm mt-3 leading-relaxed font-medium">Every tool we use is chosen to help you reach your goals.</p>
                    <div class="w-0 h-0.5 bg-brand-secondary mt-6 transition-all duration-500 group-hover:w-full"></div>
                </div>

                <!-- Benefit 4: Working Together -->
                <div class="bg-slate-50 dark:bg-white/[0.02] border border-slate-100 dark:border-white/[0.05] rounded-[2rem] p-8 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 hover:border-brand-secondary/30 relative overflow-hidden group">
                    <div class="absolute -right-8 -top-8 w-24 h-24 rounded-full bg-brand-secondary/5 dark:bg-brand-secondary/2 filter blur-xl group-hover:scale-150 group-hover:bg-brand-secondary/10 dark:group-hover:bg-brand-secondary/5 transition-all duration-700"></div>
                    <div class="w-12 h-12 rounded-2xl bg-brand-primary/5 dark:bg-white/5 text-brand-primary dark:text-white flex items-center justify-center mb-6 group-hover:bg-brand-secondary group-hover:text-white transition-all duration-300">
                        <span class="material-symbols-outlined transition-transform duration-500 group-hover:scale-110">
                            forum
                        </span>
                    </div>
                    <h3 class="font-display font-bold text-lg text-brand-primary dark:text-white group-hover:text-brand-secondary transition-colors duration-300">Working Together</h3>
                    <p class="text-brand-textMuted dark:text-slate-400 text-sm mt-3 leading-relaxed font-medium">Fast, easy talk and regular updates to keep things moving.</p>
                    <div class="w-0 h-0.5 bg-brand-secondary mt-6 transition-all duration-500 group-hover:w-full"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call To Action (High-End & Dynamic) -->
    <section x-data="{ 
                 visible: false,
                 mouseX: 0,
                 mouseY: 0,
                 handleMouseMove(e) {
                     let rect = $el.getBoundingClientRect();
                     this.mouseX = ((e.clientX - rect.left) / rect.width) * 100;
                     this.mouseY = ((e.clientY - rect.top) / rect.height) * 100;
                 }
             }"
             x-init="
                new IntersectionObserver(([entry]) => { if(entry.isIntersecting) visible = true; }, { threshold: 0.2 }).observe($el);
             "
             @mousemove="handleMouseMove($event)"
             class="py-40 md:py-52 bg-[#020617] text-white text-center relative overflow-hidden group/cta">
        
        <!-- Premium Animated Background -->
        <div class="absolute inset-0 z-0 overflow-hidden">
            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-1000 scale-110 opacity-20 mix-blend-luminosity will-change-transform"
                 :style="`transform: translate(${(mouseX - 50) * 0.015}px, ${(mouseY - 50) * 0.015}px) scale(1.1)`"
                 style="background-image: url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1920&q=80')">
            </div>
            
            <!-- Interactive Shimmer Glow -->
            <div class="absolute inset-0 opacity-40 transition-opacity duration-1000 pointer-events-none"
                 :style="`background: radial-gradient(circle at ${mouseX}% ${mouseY}%, rgba(204, 153, 51, 0.15) 0%, transparent 50%)`"></div>
            
            <!-- Slow Moving Grid Overlay -->
            <div class="absolute inset-0 opacity-[0.03] grid-dots scale-150 pointer-events-none animate-[shimmer_20s_linear_infinite]"></div>
            
            <!-- Top/Bottom Vignettes -->
            <div class="absolute inset-0 bg-gradient-to-b from-[#020617] via-transparent to-[#020617]"></div>
        </div>

        <!-- Floating Glassmorphism Content Card -->
        <div class="relative z-10 max-w-4xl mx-auto px-6">
            <div class="bg-white/[0.03] backdrop-blur-2xl border border-white/[0.08] rounded-[3.5rem] p-12 md:p-20 shadow-2xl transition-all duration-1000 transform"
                 :class="visible ? 'opacity-100 translate-y-0 scale-100' : 'opacity-0 translate-y-12 scale-95'">
                
                <div class="space-y-8">
                    <div class="inline-flex items-center gap-3 px-5 py-2 rounded-full bg-brand-secondary/10 border border-brand-secondary/20 transition-all duration-700"
                          :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 -translate-y-4'">
                        <span class="w-1.5 h-1.5 rounded-full bg-brand-secondary animate-pulse"></span>
                        <span class="text-[9px] font-black uppercase tracking-[0.4em] text-brand-secondary">Start Your Legacy</span>
                    </div>
                    
                    <h2 class="font-display font-black text-4xl md:text-6xl lg:text-7xl tracking-tighter leading-[1] transition-all duration-1000 delay-200 transform"
                        :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                        Ready to build your <br/>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-white via-brand-secondary to-white animate-gradient-x italic">next big idea?</span>
                    </h2>
                    
                    <p class="text-slate-400 text-base md:text-xl max-w-xl mx-auto transition-all duration-1000 delay-400 transform"
                       :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                        Partner with Elvora to transform your vision into a high-performance digital product.
                    </p>

                    <div class="pt-6 transition-all duration-1000 delay-600 transform"
                         :class="visible ? 'opacity-100 translate-y-0 scale-100' : 'opacity-0 translate-y-8 scale-95'">
                        <a href="{{ route('project') }}" 
                           class="relative inline-flex items-center gap-4 px-12 py-6 bg-white text-slate-950 font-black text-base rounded-full shadow-[0_20px_50px_rgba(255,255,255,0.1)] transition-all duration-500 hover:scale-105 hover:shadow-[0_30px_70px_rgba(255,255,255,0.2)] active:scale-95 group/btn overflow-hidden">
                            <span class="relative z-10">Start Your Project Today</span>
                            <span class="material-symbols-outlined relative z-10 transition-transform duration-500 group-hover/btn:translate-x-2">arrow_forward</span>
                            
                            <!-- Button Shine -->
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-slate-900/5 to-transparent -translate-x-full group-hover/btn:animate-[shimmer_1.5s_infinite]"></div>
                        </a>
                    </div>
                </div>

                <!-- Trusted Badges Footer -->
                <div class="mt-16 flex flex-wrap justify-center items-center gap-6 md:gap-10 opacity-30 grayscale hover:opacity-60 hover:grayscale-0 transition-all duration-1000">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">verified_user</span>
                        <span class="text-[9px] font-bold uppercase tracking-widest">Trusted Engineering</span>
                    </div>
                    <div class="h-1 w-1 bg-white/20 rounded-full"></div>
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">public</span>
                        <span class="text-[9px] font-bold uppercase tracking-widest">Global Standards</span>
                    </div>
                    <div class="h-1 w-1 bg-white/20 rounded-full"></div>
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">speed</span>
                        <span class="text-[9px] font-bold uppercase tracking-widest">Rapid Delivery</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dynamic Decorative Orbs -->
        <div class="absolute -left-40 top-1/2 w-[600px] h-[600px] bg-brand-primary/5 rounded-full blur-[120px] pointer-events-none animate-float-slow"></div>
        <div class="absolute -right-40 bottom-0 w-[500px] h-[500px] bg-brand-secondary/5 rounded-full blur-[100px] pointer-events-none animate-float-slow delay-700"></div>
    </section>
@endsection
