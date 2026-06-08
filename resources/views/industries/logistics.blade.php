@extends('layouts.app')

@section('title', 'Logistics & Supply Chain | Elvora Innovation')

@section('head')
    <style>
        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(226, 232, 240, 0.8);
        }
        .dark .glass-card {
            background: rgba(15, 23, 42, 0.85);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-brand-primaryDark py-28 overflow-hidden text-white border-b border-brand-primaryDark">
        <div class="absolute inset-0 z-0">
            <img class="w-full h-full object-cover opacity-35 mix-blend-overlay pointer-events-none" src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?q=80&w=1200&auto=format&fit=crop"/>
        </div>
        <div class="max-w-[1400px] mx-auto px-6 md:px-12 relative z-10 w-full">
            <div class="max-w-3xl space-y-6">
                <span class="inline-block px-4 py-1.5 rounded-full bg-brand-secondary/20 text-brand-secondary border border-brand-secondary/30 font-mono uppercase tracking-widest text-[10px]">
                    Industries / Logistics &amp; Distribution
                </span>
                <h1 class="font-display text-4xl md:text-5xl lg:text-[56px] font-extrabold leading-tight">
                    Optimizing Global Supply Routes through Intelligent Design
                </h1>
                <p class="text-blue-100 text-lg max-w-xl">
                    We design automated inventory tools and distribution platforms to transform standard supply chains into responsive assets.
                </p>
                <div class="flex flex-wrap gap-4 pt-2">
                    <a href="{{ route('project') }}" class="bg-brand-secondary hover:bg-brand-secondaryDark text-white px-8 py-4 rounded-xl font-bold flex items-center gap-2 hover:scale-[1.02] transition-transform">
                        <span>Deploy Infrastructure</span>
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Efficiency Metrics Section -->
    <section class="py-24 bg-white dark:bg-slate-950 relative z-20">
        <div class="max-w-[1400px] mx-auto px-6 md:px-12">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <!-- Dashboard Info -->
                <div class="lg:col-span-4 space-y-6">
                    <h2 class="font-display font-extrabold text-3xl text-brand-primary dark:text-white">Efficiency Metrics</h2>
                    <p class="text-brand-textMuted dark:text-slate-400 text-base">
                        Our distribution tracking dashboard provides real-time visibility into every step of your network, helping reduce warehouse processing delays by an average of 34%.
                    </p>
                    <div class="p-6 rounded-2xl bg-brand-surfaceLight dark:bg-slate-900/40 border border-brand-borderLight dark:border-white/10 space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-xs font-bold text-brand-textMuted dark:text-slate-400 uppercase">Active Delivery Routes</span>
                            <span class="font-mono text-brand-primary dark:text-brand-secondary font-bold text-sm">14,802</span>
                        </div>
                        <div class="w-full bg-slate-200 dark:bg-slate-950 h-1.5 rounded-full overflow-hidden">
                            <div class="bg-brand-primary dark:bg-brand-secondary w-[85%] h-full"></div>
                        </div>
                        <div class="flex justify-between items-center pt-2">
                            <span class="text-xs font-bold text-brand-textMuted dark:text-slate-400 uppercase">Response Uptime</span>
                            <span class="font-mono text-brand-secondary font-bold text-sm">99.9%</span>
                        </div>
                    </div>
                </div>
                <!-- Main Dashboard Canvas -->
                <div class="lg:col-span-8 glass-card rounded-2xl p-6 shadow-premium grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <h3 class="font-display font-bold text-lg text-brand-primary dark:text-white">Fleet Monitoring</h3>
                            <span class="material-symbols-outlined text-brand-primary dark:text-brand-secondary">monitoring</span>
                        </div>
                        <div class="h-44 w-full bg-slate-100 dark:bg-slate-950 rounded-xl flex items-end p-4 space-x-2 overflow-hidden border border-brand-borderLight dark:border-white/10">
                            <div class="bg-brand-primary dark:bg-brand-secondary h-1/2 w-full rounded-t-sm"></div>
                            <div class="bg-brand-primary dark:bg-brand-secondary h-2/3 w-full rounded-t-sm"></div>
                            <div class="bg-brand-secondary dark:bg-brand-primary h-full w-full rounded-t-sm"></div>
                            <div class="bg-brand-primary dark:bg-brand-secondary h-3/4 w-full rounded-t-sm"></div>
                            <div class="bg-brand-primary dark:bg-brand-secondary h-1/3 w-full rounded-t-sm"></div>
                            <div class="bg-brand-primaryDark dark:bg-brand-secondary h-4/5 w-full rounded-t-sm"></div>
                        </div>
                        <p class="text-[10px] text-brand-textMuted dark:text-slate-400 font-bold uppercase tracking-wider italic">Smart route coordination updated continuously.</p>
                    </div>
                    <div class="grid grid-rows-2 gap-4">
                        <div class="bg-brand-primary p-5 rounded-xl flex flex-col justify-between border border-brand-primaryDark">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-300">Average Load Factor</span>
                            <span class="font-display font-extrabold text-3xl text-white">98.4%</span>
                            <span class="text-[10px] font-mono text-slate-400">+2.1% from last quarter</span>
                        </div>
                        <div class="bg-brand-surfaceLight dark:bg-slate-900/60 text-brand-primary dark:text-white p-5 rounded-xl flex flex-col justify-between border border-brand-borderLight dark:border-white/10">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-brand-textMuted dark:text-slate-400">On-Time Distribution</span>
                            <span class="font-display font-extrabold text-3xl text-brand-primary dark:text-brand-secondary">99.9%</span>
                            <div class="flex -space-x-1.5">
                                <span class="w-5 h-5 rounded-full bg-slate-300 dark:bg-slate-800 border-2 border-white dark:border-slate-900 flex items-center justify-center font-bold text-[8px]">A</span>
                                <span class="w-5 h-5 rounded-full bg-slate-400 dark:bg-slate-700 border-2 border-white dark:border-slate-900 flex items-center justify-center font-bold text-[8px]">B</span>
                                <span class="w-5 h-5 rounded-full bg-slate-500 dark:bg-slate-600 border-2 border-white dark:border-slate-900 flex items-center justify-center font-bold text-[8px]">C</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Capabilities Bento Grid -->
    <section class="py-24 bg-brand-surfaceLight dark:bg-brand-surfaceDark border-t border-brand-borderLight dark:border-white/10">
        <div class="max-w-[1400px] mx-auto px-6 md:px-12">
            <div class="text-center mb-16 space-y-2">
                <h2 class="font-display font-extrabold text-3xl text-brand-primary dark:text-white">Core Capabilities</h2>
                <p class="text-brand-textMuted dark:text-slate-400 text-base max-w-2xl mx-auto">Enterprise-grade solutions for complex product movement.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Automated Warehousing -->
                <div class="md:col-span-2 group relative overflow-hidden rounded-2xl h-[380px] border border-brand-borderLight dark:border-white/10 shadow-sm">
                    <img class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 pointer-events-none" src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?q=80&w=1200&auto=format&fit=crop"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-brand-primaryDark/90 via-brand-primaryDark/40 to-transparent flex flex-col justify-end p-8">
                        <h3 class="font-display font-bold text-xl text-white mb-2">Automated Warehousing</h3>
                        <p class="text-blue-100 text-sm max-w-md">Automated storage integration from dispatch to delivery platforms, helping reduce processing errors.</p>
                    </div>
                </div>
                <!-- Real-time Tracking -->
                <div class="group bg-white dark:bg-slate-900/40 p-8 rounded-2xl border border-brand-borderLight dark:border-white/10 hover:border-brand-primary hover:shadow-premium transition-all flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 dark:bg-slate-950 border border-blue-100 dark:border-white/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-brand-primary dark:text-brand-secondary">location_searching</span>
                        </div>
                        <h3 class="font-display font-bold text-xl text-brand-primary dark:text-white">Live Tracking Systems</h3>
                        <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed">Integrated tracking units providing precise coordinates and temperature monitoring for every parcel.</p>
                    </div>
                    <a href="{{ route('project') }}" class="text-brand-primary dark:text-brand-secondary font-bold flex items-center gap-1 mt-6 text-sm">
                        <span>Learn More</span>
                        <span class="material-symbols-outlined text-sm">north_east</span>
                    </a>
                </div>
                <!-- Supply Chain Orchestration -->
                <div class="group bg-brand-primary p-8 rounded-2xl flex flex-col justify-between hover:shadow-premium transition-all border border-brand-primaryDark">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-brand-secondary/20 flex items-center justify-center">
                            <span class="material-symbols-outlined text-brand-secondary">hub</span>
                        </div>
                        <h3 class="font-display font-bold text-xl text-white">Network Coordination</h3>
                        <p class="text-blue-100 text-sm leading-relaxed">Continuous analysis that flags potential transport bottlenecks before they impact your fulfillment.</p>
                    </div>
                    <a href="{{ route('project') }}" class="bg-white text-brand-primary px-6 py-2.5 rounded-xl font-bold w-fit mt-6 text-xs hover:bg-slate-50 transition-colors">
                        Request Consultation
                    </a>
                </div>
                <!-- Visual Detail -->
                <div class="md:col-span-2 relative overflow-hidden rounded-2xl h-[280px] border border-brand-borderLight dark:border-white/10 shadow-sm">
                    <img class="absolute inset-0 w-full h-full object-cover grayscale opacity-20 pointer-events-none" src="https://images.unsplash.com/photo-1518241353330-0f7941c2d9b5?q=80&w=800&auto=format&fit=crop"/>
                    <div class="relative z-10 p-8 flex items-center h-full">
                        <div class="bg-white/95 dark:bg-slate-900/95 backdrop-blur p-6 rounded-xl border border-brand-borderLight dark:border-white/10 max-w-sm shadow-premium">
                            <h4 class="font-display font-bold text-sm text-brand-primary dark:text-white mb-1">Route Network Analysis</h4>
                            <p class="text-[10px] text-brand-textMuted dark:text-slate-400 font-mono">Continuous tracking updates and route efficiency metrics across global hubs.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Global Reach Section -->
    <section class="py-24 bg-brand-primaryDark text-white overflow-hidden relative">
        <div class="absolute inset-0 grid-dots-dark opacity-10"></div>
        <div class="max-w-[1400px] mx-auto px-6 md:px-12 relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-8">
                <div class="space-y-3">
                    <h2 class="font-display font-extrabold text-3xl">Global Operational Reach</h2>
                    <p class="text-slate-300 text-lg max-w-xl">We support distribution networks connected to strategic regional hubs worldwide.</p>
                </div>
                <div class="flex gap-12">
                    <div class="text-center">
                        <div class="text-3xl font-display font-extrabold text-brand-secondary">24</div>
                        <div class="text-[10px] font-mono uppercase tracking-wider text-slate-400 font-bold">Strategic Hubs</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-display font-extrabold text-brand-secondary">800+</div>
                        <div class="text-[10px] font-mono uppercase tracking-wider text-slate-400 font-bold">Partners</div>
                    </div>
                </div>
            </div>
            
            <div class="relative w-full aspect-video rounded-2xl overflow-hidden bg-slate-900 border border-blue-900 shadow-premium">
                <img class="w-full h-full object-cover grayscale brightness-50 pointer-events-none" src="https://images.unsplash.com/photo-1524661135-423995f22d0b?q=80&w=1200&auto=format&fit=crop"/>
                <!-- Simulated Pins -->
                <div class="absolute top-1/3 left-1/4 group cursor-pointer">
                    <div class="w-4 h-4 bg-brand-secondary rounded-full animate-ping absolute"></div>
                    <div class="w-4 h-4 bg-brand-secondary rounded-full relative shadow-[0_0_15px_rgba(204,153,51,0.8)]"></div>
                </div>
                <div class="absolute top-1/2 left-3/4 group cursor-pointer">
                    <div class="w-4 h-4 bg-brand-secondary rounded-full animate-ping absolute"></div>
                    <div class="w-4 h-4 bg-brand-secondary rounded-full relative shadow-[0_0_15px_rgba(204,153,51,0.8)]"></div>
                </div>
            </div>
        </div>
    </section>
@endsection
