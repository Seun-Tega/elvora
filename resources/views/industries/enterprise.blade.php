@extends('layouts.app')

@section('title', 'Enterprise & Public Sector | Elvora Innovation')

@section('head')
    <style>
        .glass-card {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(226, 232, 240, 0.8);
        }
        .dark .glass-card {
            background: rgba(15, 23, 42, 0.75);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-brand-surfaceLight dark:bg-brand-surfaceDark border-b border-brand-borderLight dark:border-white/10 py-28 overflow-hidden">
        <div class="max-w-[1400px] mx-auto px-6 md:px-12 grid lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <div class="inline-flex items-center space-x-2 px-4 py-1.5 rounded-full bg-slate-100 dark:bg-slate-900 text-brand-primary dark:text-brand-secondary border border-slate-200 dark:border-white/10 font-display font-bold uppercase tracking-wider text-[10px]">
                    <span class="material-symbols-outlined text-[18px]">gavel</span>
                    <span>ENTERPRISE SYSTEMS</span>
                </div>
                <h1 class="font-display text-4xl md:text-5xl font-extrabold leading-tight text-brand-primary dark:text-white">Secure, Resilient &amp; Sovereign Core Systems</h1>
                <p class="text-brand-textMuted dark:text-slate-400 text-lg leading-relaxed max-w-xl">
                    Deploying secure cloud configurations, core database migrations, and verified access networks for global enterprises and institutional clients.
                </p>
                <div class="flex flex-wrap gap-4 pt-2">
                    <a href="{{ route('project') }}" class="bg-brand-primary hover:bg-brand-primaryDark text-white px-6 py-3 rounded-xl font-bold shadow-premium hover:shadow-premiumHover hover:scale-[1.02] transition-all">
                        Consult Our Specialists
                    </a>
                </div>
            </div>
            
            <div class="relative h-[400px] lg:h-[500px] flex items-center justify-center">
                <div class="absolute inset-0 bg-gradient-to-tr from-brand-primary/10 to-transparent rounded-full blur-3xl opacity-30"></div>
                <img alt="Sovereign Data Center Interface" class="rounded-xl shadow-premium object-cover w-full h-[320px] lg:h-[420px] border border-brand-borderLight dark:border-white/10 relative z-10" src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1200&auto=format&fit=crop"/>
                
                <!-- Floater -->
                <div class="absolute -bottom-4 -left-4 glass-card p-4 rounded-xl shadow-premium z-20 flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-full bg-brand-secondary/15 flex items-center justify-center">
                        <span class="material-symbols-outlined text-brand-secondary">military_tech</span>
                    </div>
                    <div>
                        <p class="text-[9px] font-bold uppercase tracking-wider text-brand-textMuted dark:text-slate-400">Cloud Status</p>
                        <p class="font-display font-extrabold text-xs text-brand-primary dark:text-white">Certified Sync</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Key Capabilities (Bento Grid) -->
    <section class="py-24 bg-white dark:bg-slate-950">
        <div class="max-w-[1400px] mx-auto px-6 md:px-12">
            <div class="text-center mb-16 space-y-2">
                <h2 class="font-display font-extrabold text-3xl text-brand-primary dark:text-white">Core Capabilities</h2>
                <p class="text-brand-textMuted dark:text-slate-400 text-base max-w-2xl mx-auto">Providing sovereign reliability and enterprise strength in all our initiatives.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
                <!-- Legacy Systems Modernization -->
                <div class="md:col-span-8 bg-brand-surfaceLight dark:bg-slate-900/40 p-8 rounded-2xl border border-brand-borderLight dark:border-white/10 hover:shadow-premium transition-all group overflow-hidden relative">
                    <div class="relative z-10 space-y-4">
                        <span class="material-symbols-outlined text-[40px] text-brand-secondary mb-2 group-hover:scale-110 transition-transform">construction</span>
                        <h3 class="font-display font-bold text-xl text-brand-primary dark:text-white">Core Database Modernization</h3>
                        <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed max-w-lg">
                            Systematic update of legacy data setups. We migrate transactional systems to fast, scalable services, reducing overall system maintenance costs.
                        </p>
                    </div>
                    <img alt="Data Center Server" class="absolute right-0 bottom-0 w-1/3 opacity-20 grayscale group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-700 pointer-events-none" src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?q=80&w=800&auto=format&fit=crop"/>
                </div>
                <!-- Sovereign Cloud -->
                <div class="md:col-span-4 bg-brand-primary p-8 rounded-2xl border border-brand-primaryDark hover:shadow-premium transition-all relative group flex flex-col justify-between">
                    <div class="space-y-4">
                        <span class="material-symbols-outlined text-[40px] text-brand-secondary mb-2">cloud_queue</span>
                        <h3 class="font-display font-bold text-xl text-white">Sovereign Hosting</h3>
                        <p class="text-blue-100 text-sm leading-relaxed">
                            Ensuring data privacy requirements and isolated host configurations are met for institutional workloads.
                        </p>
                    </div>
                    <div class="mt-8 flex items-center text-brand-secondary font-bold text-xs space-x-1 group-hover:translate-x-2 transition-transform">
                        <span>Explore Hosting Solutions</span>
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </div>
                </div>
                <!-- Private Network Access -->
                <div class="md:col-span-5 bg-brand-surfaceLight dark:bg-slate-900/40 p-8 rounded-2xl border border-brand-borderLight dark:border-white/10 hover:shadow-premium transition-all space-y-4">
                    <div class="w-12 h-12 bg-white dark:bg-slate-950 rounded-full flex items-center justify-center border border-brand-borderLight dark:border-white/10">
                        <span class="material-symbols-outlined text-brand-primary dark:text-brand-secondary">vpn_lock</span>
                    </div>
                    <h3 class="font-display font-bold text-xl text-brand-primary dark:text-white">Secure Network Access</h3>
                    <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed">
                        Setting private, software-defined network boundaries to safeguard organizational digital assets across multiple offices.
                    </p>
                </div>
                <!-- Resilient Infrastructure -->
                <div class="md:col-span-7 bg-brand-surfaceLight dark:bg-slate-900/40 p-8 rounded-2xl border border-brand-borderLight dark:border-white/10 flex flex-col justify-between group hover:shadow-premium transition-all">
                    <div class="flex justify-between items-start">
                        <div class="space-y-2">
                            <h3 class="font-display font-bold text-xl text-brand-primary dark:text-white">Zero-Downtime Backups</h3>
                            <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed max-w-md">
                                Multi-region automated backup mechanisms, ensuring systems remain accessible and functional at all times.
                            </p>
                        </div>
                        <span class="material-symbols-outlined text-[48px] text-brand-primary/20 dark:text-brand-secondary/20 group-hover:text-brand-primary dark:group-hover:text-brand-secondary transition-colors">hub</span>
                    </div>
                    <div class="mt-8 grid grid-cols-3 gap-4">
                        <div class="text-center p-3 bg-white dark:bg-slate-950 rounded-xl border border-brand-borderLight dark:border-white/10 shadow-sm">
                            <p class="font-display text-xs text-brand-primary dark:text-white font-bold">Protected</p>
                            <p class="text-[9px] font-bold uppercase tracking-wider text-brand-textMuted dark:text-slate-400">Data Storage</p>
                        </div>
                        <div class="text-center p-3 bg-white dark:bg-slate-950 rounded-xl border border-brand-borderLight dark:border-white/10 shadow-sm">
                            <p class="font-display text-xs text-brand-primary dark:text-white font-bold">&lt; 5s</p>
                            <p class="text-[9px] font-bold uppercase tracking-wider text-brand-textMuted dark:text-slate-400">Backup Time</p>
                        </div>
                        <div class="text-center p-3 bg-white dark:bg-slate-950 rounded-xl border border-brand-borderLight dark:border-white/10 shadow-sm">
                            <p class="font-display text-xs text-brand-primary dark:text-white font-bold">Audited</p>
                            <p class="text-[9px] font-bold uppercase tracking-wider text-brand-textMuted dark:text-slate-400">Access Keys</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sovereign Security Section -->
    <section class="py-24 bg-brand-surfaceLight dark:bg-brand-surfaceDark border-y border-brand-borderLight dark:border-white/10 relative">
        <div class="max-w-[1400px] mx-auto px-6 md:px-12 grid lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-7 space-y-6">
                <div class="text-brand-secondary font-bold text-xs uppercase tracking-widest flex items-center">
                    <span class="material-symbols-outlined mr-1 text-base">verified</span> SOVEREIGN COMPLIANCE
                </div>
                <h2 class="font-display font-extrabold text-3xl md:text-4xl text-brand-primary dark:text-white leading-tight">High Security Level Standards</h2>
                <p class="text-brand-textMuted dark:text-slate-400 text-lg leading-relaxed">
                    Designed to withstand system disruptions and network failures, Elvora Innovation configures reliable connections that meet high compliance standards.
                </p>
            </div>
            
            <div class="lg:col-span-5 grid grid-cols-2 gap-4">
                <div class="bg-white dark:bg-slate-900/60 p-6 rounded-xl border border-brand-borderLight dark:border-white/10 shadow-sm flex flex-col items-center text-center">
                    <span class="material-symbols-outlined text-[48px] text-brand-secondary mb-3">gavel</span>
                    <p class="font-display font-bold text-xs text-brand-primary dark:text-white">Corporate Ready</p>
                </div>
                <div class="bg-white dark:bg-slate-900/60 p-6 rounded-xl border border-brand-borderLight dark:border-white/10 shadow-sm flex flex-col items-center text-center">
                    <span class="material-symbols-outlined text-[48px] text-brand-secondary mb-3">security</span>
                    <p class="font-display font-bold text-xs text-brand-primary dark:text-white">Fully Verified</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 bg-white dark:bg-slate-950 text-center">
        <div class="max-w-2xl mx-auto px-6 space-y-6">
            <h2 class="font-display font-extrabold text-3xl text-brand-primary dark:text-white">Looking to safeguard your enterprise operations?</h2>
            <p class="text-brand-textMuted dark:text-slate-400 text-base">
                Engage our specialists today to structure reliable and compliant digital assets.
            </p>
            <div class="pt-4">
                <a href="{{ route('project') }}" class="inline-flex px-6 py-3 bg-brand-primary hover:bg-brand-primaryDark text-white font-bold rounded-xl shadow-premium hover:shadow-premiumHover hover:scale-[1.02] transition-all">
                    Consult Our Specialists
                </a>
            </div>
        </div>
    </section>
@endsection
