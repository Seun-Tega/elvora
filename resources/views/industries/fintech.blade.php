@extends('layouts.app')

@section('title', 'FinTech Solutions | Elvora Innovation')

@section('head')
    <style>
        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .hero-gradient {
            background: radial-gradient(circle at 50% 50%, #003366 0%, #001F3D 100%);
        }
        .dark .hero-gradient {
            background: radial-gradient(circle at 50% 50%, #0c1524 0%, #030712 100%);
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-gradient relative py-28 overflow-hidden text-white border-b border-brand-primaryDark dark:border-white/10">
        <div class="absolute inset-0 z-0">
            <img class="w-full h-full object-cover opacity-35 mix-blend-overlay pointer-events-none" src="https://images.unsplash.com/photo-1639762681485-074b7f938ba0?q=80&w=1200&auto=format&fit=crop"/>
        </div>
        <div class="max-w-[1400px] mx-auto px-6 md:px-12 relative z-10 grid md:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <div class="inline-flex items-center space-x-2 px-4 py-1.5 rounded-full border border-brand-secondary text-brand-secondary font-display font-bold uppercase tracking-wider text-[10px]">
                    <span class="material-symbols-outlined text-[18px]">account_balance</span>
                    <span>FINANCIAL TECHNOLOGY SYSTEMS</span>
                </div>
                <h1 class="font-display text-4xl md:text-5xl font-extrabold leading-tight">Global Financial Systems for the Next Era</h1>
                <p class="text-blue-100 text-lg max-w-xl">
                    We build high-capacity payment pathways, unified digital banking platforms, and secure transaction systems for global organizations.
                </p>
                <div class="flex flex-wrap gap-4 pt-2">
                    <a href="{{ route('project') }}" class="bg-brand-secondary hover:bg-brand-secondaryDark text-white px-6 py-3 rounded-xl font-bold shadow-premium hover:shadow-premiumHover hover:scale-[1.02] transition-all">
                        Consult Our Specialists
                    </a>
                </div>
            </div>
            
            <div class="hidden md:block">
                <div class="glass-card p-8 rounded-2xl space-y-6">
                    <div class="flex justify-between items-center border-b border-white/10 pb-4">
                        <span class="text-white/60 font-mono text-[10px] font-bold tracking-wider">LIVE SYSTEM OVERVIEW</span>
                        <span class="flex items-center text-brand-secondary text-xs font-semibold">
                            <span class="w-2 h-2 rounded-full bg-brand-secondary mr-2 animate-pulse"></span> ALL SYSTEMS OPERATIONAL
                        </span>
                    </div>
                    <div class="space-y-4">
                        <div class="grid grid-cols-3 gap-4 pt-2">
                            <div>
                                <p class="text-white/40 text-[9px] uppercase font-bold tracking-wider">Daily Volume</p>
                                <p class="text-white font-mono text-xl font-bold">14.2M</p>
                            </div>
                            <div>
                                <p class="text-white/40 text-[9px] uppercase font-bold tracking-wider">Success Rate</p>
                                <p class="text-white font-mono text-xl font-bold">99.9%</p>
                            </div>
                            <div>
                                <p class="text-white/40 text-[9px] uppercase font-bold tracking-wider">Uptime Status</p>
                                <p class="text-white font-mono text-xl font-bold">100%</p>
                            </div>
                        </div>
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
                <p class="text-brand-textMuted dark:text-slate-400 text-base max-w-2xl mx-auto">Scalable, secure, and long-term systems built for institutional growth.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
                <!-- Digital Banking -->
                <div class="md:col-span-8 group relative overflow-hidden rounded-2xl border border-brand-borderLight dark:border-white/10 bg-brand-surfaceLight dark:bg-slate-900/40 p-8 transition-all hover:shadow-premium">
                    <div class="flex flex-col h-full justify-between relative z-10 space-y-8">
                        <div class="space-y-4 max-w-md">
                            <span class="material-symbols-outlined text-brand-secondary text-4xl">digital_wellbeing</span>
                            <h3 class="font-display font-bold text-xl text-brand-primary dark:text-white">Unified Banking Platforms</h3>
                            <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed">Complete digital finance infrastructure featuring custom ledger systems, user verification flows, and fast mobile designs.</p>
                        </div>
                        <a href="{{ route('project') }}" class="flex items-center gap-2 text-brand-primary dark:text-brand-secondary font-bold text-sm">
                            <span>Explore Banking Tools</span>
                            <span class="material-symbols-outlined text-sm transition-transform group-hover:translate-x-1">arrow_forward</span>
                        </a>
                    </div>
                    <img class="absolute right-0 bottom-0 w-1/2 h-full object-cover opacity-10 group-hover:opacity-20 transition-opacity pointer-events-none" src="https://images.unsplash.com/photo-1563013544-824ae1d704d3?q=80&w=800&auto=format&fit=crop"/>
                </div>
                <!-- Payment Rails -->
                <div class="md:col-span-4 rounded-2xl border border-brand-primaryDark bg-brand-primary p-8 flex flex-col justify-between text-white hover:shadow-premium transition-all">
                    <div class="space-y-4">
                        <span class="material-symbols-outlined text-brand-secondary text-4xl">sync_alt</span>
                        <h3 class="font-display font-bold text-xl">Global Transaction Pathways</h3>
                        <p class="text-blue-100 text-sm leading-relaxed">Unified billing routes supporting instant cross-border transfers and multiple currencies.</p>
                    </div>
                    <div class="mt-8 flex items-center justify-between text-xs text-brand-secondary font-bold">
                        <span>OPTIMIZED TRANSFERS</span>
                        <span class="material-symbols-outlined text-base">offline_bolt</span>
                    </div>
                </div>
                <!-- Tokenization -->
                <div class="md:col-span-4 rounded-2xl border border-brand-borderLight dark:border-white/10 bg-white dark:bg-slate-900/40 p-8 flex flex-col justify-between hover:shadow-premium transition-all">
                    <div class="space-y-4">
                        <span class="material-symbols-outlined text-brand-primary dark:text-brand-secondary text-4xl">token</span>
                        <h3 class="font-display font-bold text-xl text-brand-primary dark:text-white">Secure Digital Registers</h3>
                        <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed">Protocols to log real estate, physical assets, and private funds onto unified, audited records.</p>
                    </div>
                    <a href="{{ route('project') }}" class="mt-8 text-brand-primary dark:text-brand-secondary font-bold text-xs flex items-center gap-1 hover:underline">
                        <span>Scope Integration</span>
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </a>
                </div>
                <!-- Innovation Lab -->
                <div class="md:col-span-8 group relative overflow-hidden rounded-2xl bg-brand-surfaceLight dark:bg-slate-900/40 border border-brand-borderLight dark:border-white/10 p-8 text-brand-primary dark:text-white hover:shadow-premium transition-all">
                    <div class="grid md:grid-cols-2 gap-8 items-center h-full">
                        <div class="space-y-4">
                            <div class="bg-brand-secondary/15 text-brand-secondaryDark dark:text-brand-secondary border border-brand-secondary/30 px-3 py-1 rounded w-fit text-[10px] font-bold uppercase tracking-wider">Design Highlight</div>
                            <h3 class="font-display font-bold text-xl">FinTech System Lab</h3>
                            <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed">Where we structure new options. From smart portfolio calculators to identity verification panels.</p>
                            <ul class="space-y-2 pt-2 text-xs text-brand-textMuted dark:text-slate-400 font-medium">
                                <li class="flex items-center space-x-2"><span class="material-symbols-outlined text-brand-primary dark:text-brand-secondary text-sm">check_circle</span> <span>Smart Risk Assessment Tools</span></li>
                                <li class="flex items-center space-x-2"><span class="material-symbols-outlined text-brand-primary dark:text-brand-secondary text-sm">check_circle</span> <span>Secure Data Protection Steps</span></li>
                            </ul>
                        </div>
                        <div class="relative h-full hidden md:block">
                            <img class="absolute inset-0 w-full h-full object-cover rounded-xl border border-brand-borderLight dark:border-white/10" src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=800&auto=format&fit=crop"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Compliance Section -->
    <section class="py-24 bg-brand-surfaceLight dark:bg-brand-surfaceDark border-y border-brand-borderLight dark:border-white/10">
        <div class="max-w-[1400px] mx-auto px-6 md:px-12 grid md:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <h2 class="font-display font-extrabold text-3xl text-brand-primary dark:text-white">Compliance &amp; Reliability</h2>
                <p class="text-brand-textMuted dark:text-slate-400 text-lg leading-relaxed">
                    We bridge the gap between creative technology and corporate rules. Our systems are built to comply with international regulations and local regional guidelines.
                </p>
                <div class="grid grid-cols-2 gap-4">
                    <div class="p-5 bg-white dark:bg-slate-900/60 border border-brand-borderLight dark:border-white/10 rounded-xl shadow-sm space-y-1">
                        <h4 class="font-display font-bold text-sm text-brand-primary dark:text-white">Audited Security</h4>
                        <p class="text-xs text-brand-textMuted dark:text-slate-400">Systems verified to satisfy high-level global standards.</p>
                    </div>
                    <div class="p-5 bg-white dark:bg-slate-900/60 border border-brand-borderLight dark:border-white/10 rounded-xl shadow-sm space-y-1">
                        <h4 class="font-display font-bold text-sm text-brand-primary dark:text-white">Identity Checks</h4>
                        <p class="text-xs text-brand-textMuted dark:text-slate-400">Integrated user verification and activity logging.</p>
                    </div>
                </div>
            </div>
            
            <div class="flex justify-center">
                <div class="relative w-full max-w-sm">
                    <div class="absolute -inset-4 bg-brand-secondary/10 rounded-full blur-3xl opacity-60"></div>
                    <div class="relative bg-white dark:bg-slate-900 p-6 rounded-2xl border border-brand-borderLight dark:border-white/10 shadow-premium space-y-6">
                        <div class="flex items-center space-x-3 pb-4 border-b border-brand-borderLight dark:border-white/10">
                            <div class="w-10 h-10 bg-brand-primary dark:bg-slate-950 rounded-xl flex items-center justify-center text-white dark:text-brand-secondary">
                                <span class="material-symbols-outlined">security</span>
                            </div>
                            <div>
                                <h4 class="font-display font-bold text-sm text-brand-primary dark:text-white">Activity Overview</h4>
                                <p class="text-[10px] text-brand-textMuted dark:text-slate-400">Continuous Audit Logging</p>
                            </div>
                        </div>
                        <div class="space-y-3">
                            <div class="flex justify-between text-[10px] font-mono font-bold"><span>Policy Checks</span> <span class="text-brand-secondary">ACTIVE</span></div>
                            <div class="w-full bg-slate-100 dark:bg-slate-950 h-1.5 rounded-full overflow-hidden"><div class="bg-brand-secondary w-full h-full"></div></div>
                            <div class="flex justify-between text-[10px] font-mono font-bold"><span>User Verification</span> <span class="text-brand-secondary">VERIFIED</span></div>
                            <div class="w-full bg-slate-100 dark:bg-slate-950 h-1.5 rounded-full overflow-hidden"><div class="bg-brand-secondary w-11/12 h-full"></div></div>
                            <div class="flex justify-between text-[10px] font-mono font-bold"><span>System Tracking</span> <span class="text-brand-secondary">SCANNING</span></div>
                            <div class="w-full bg-slate-100 dark:bg-slate-950 h-1.5 rounded-full overflow-hidden"><div class="bg-brand-secondary w-4/5 h-full"></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Executive CTA -->
    <section class="py-24 bg-white dark:bg-slate-950 text-center">
        <div class="max-w-2xl mx-auto px-6 space-y-6">
            <h2 class="font-display font-extrabold text-3xl text-brand-primary dark:text-white">Ready to build your fintech digital legacy?</h2>
            <p class="text-brand-textMuted dark:text-slate-400 text-base">Our team of experienced financial consultants and system architects is ready to design your next solution.</p>
            <div class="pt-4">
                <a href="{{ route('project') }}" class="inline-flex px-6 py-3 bg-brand-primary hover:bg-brand-primaryDark text-white font-bold rounded-xl shadow-premium hover:shadow-premiumHover hover:scale-[1.02] transition-all">
                    Consult With Our Team
                </a>
            </div>
        </div>
    </section>
@endsection
