@extends('layouts.app')

@section('title', 'Healthcare Solutions | Elvora Innovation')

@section('head')
    <style>
        .glass-card {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(226, 232, 240, 0.8);
        }
        .dark .glass-card {
            background: rgba(15, 23, 42, 0.75);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="relative overflow-hidden py-24 bg-brand-surfaceLight dark:bg-brand-surfaceDark border-b border-brand-borderLight dark:border-white/10">
        <div class="max-w-[1400px] mx-auto px-6 md:px-12 grid lg:grid-cols-2 items-center gap-12">
            <div class="z-10 relative space-y-6">
                <div class="inline-flex items-center space-x-2 bg-blue-50 dark:bg-slate-900 text-brand-primary dark:text-brand-secondary border border-blue-100 dark:border-white/10 px-4 py-1.5 rounded-full shadow-sm">
                    <x-lucide-shield-check class="w-5 h-5" />
                    <span class="font-display font-bold uppercase tracking-wider text-[11px]">Secure Health Systems</span>
                </div>
                <h1 class="font-display text-4xl md:text-5xl font-extrabold leading-tight text-brand-primary dark:text-white">
                    Digital Health &amp; <br/><span class="text-brand-secondary">Care-focused</span> Innovation
                </h1>
                <p class="text-brand-textMuted dark:text-slate-400 text-lg leading-relaxed max-w-xl">
                    Designing next-generation healthcare applications that protect patient data, connect care teams seamlessly, and improve diagnostic clarity for clinical providers worldwide.
                </p>
                <div class="flex flex-wrap gap-4 pt-2">
                    <a href="{{ route('project') }}" class="px-8 py-4 bg-brand-primary hover:bg-brand-primaryDark text-white font-bold rounded-xl shadow-premium hover:shadow-premiumHover hover:scale-[1.02] transition-all">
                        Consult Our Specialists
                    </a>
                </div>
            </div>
            <div class="relative lg:h-[500px] flex items-center justify-center">
                <div class="absolute inset-0 bg-gradient-to-tr from-brand-primary/10 to-transparent rounded-full blur-3xl opacity-30"></div>
                <img alt="Medical Technology Interface" class="rounded-xl shadow-premium object-cover w-full h-[350px] lg:h-[450px] border border-brand-borderLight dark:border-white/10 relative z-10" src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?q=80&w=1200&auto=format&fit=crop"/>
                
                <!-- Floater -->
                <div class="absolute -top-4 -right-4 glass-card p-4 rounded-xl shadow-premium z-20 flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-full bg-brand-secondary/15 flex items-center justify-center">
                        <x-lucide-eye class="w-5 h-5 text-brand-secondary" />
                    </div>
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-wider text-brand-textMuted dark:text-slate-400">System Performance</p>
                        <p class="font-display font-extrabold text-sm text-brand-primary dark:text-white">Continuous Access</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Capabilities Bento Grid -->
    <section class="py-24 bg-white dark:bg-slate-950">
        <div class="max-w-[1400px] mx-auto px-6 md:px-12">
            <div class="text-center mb-16 space-y-2">
                <h2 class="font-display font-extrabold text-3xl text-brand-primary dark:text-white">Core Capabilities</h2>
                <div class="w-12 h-1 bg-brand-secondary mx-auto"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
                <!-- Telemedicine Systems -->
                <div class="md:col-span-8 bg-brand-surfaceLight dark:bg-slate-900/40 p-8 rounded-2xl border border-brand-borderLight dark:border-white/10 hover:shadow-premium transition-all group overflow-hidden relative">
                    <div class="relative z-10 space-y-4">
                        <x-lucide-video class="w-10 h-10 text-brand-secondary mb-2 group-hover:scale-110 transition-transform" />
                        <h3 class="font-display font-bold text-xl text-brand-primary dark:text-white">Virtual Consultation Platforms</h3>
                        <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed max-w-lg">
                            Secure, high-quality audio and video channels built directly into your clinical interface. Tailored patient portals designed for direct specialist care and remote check-ins.
                        </p>
                    </div>
                    <img alt="Telemedicine Screen" class="absolute right-0 bottom-0 w-1/3 opacity-20 grayscale group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-700 pointer-events-none" src="https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?q=80&w=800&auto=format&fit=crop"/>
                </div>
                <!-- AI Diagnostics -->
                <div class="md:col-span-4 bg-brand-primary p-8 rounded-2xl border border-brand-primaryDark hover:shadow-premium transition-all relative group flex flex-col justify-between">
                    <div class="space-y-4">
                        <x-lucide-cpu class="w-10 h-10 text-brand-secondary mb-2" />
                        <h3 class="font-display font-bold text-xl text-white">Intelligent Diagnostics</h3>
                        <p class="text-blue-100 text-sm leading-relaxed">
                            Employing smart systems to assist in medical imaging analysis and prompt symptom identification.
                        </p>
                    </div>
                    <a href="{{ route('project') }}" class="mt-8 flex items-center text-brand-secondary font-bold text-xs space-x-1 group-hover:translate-x-2 transition-transform">
                        <span>Explore Capabilities</span>
                        <x-lucide-arrow-right class="w-4 h-4" />
                    </a>
                </div>
                <!-- Health Data Interoperability -->
                <div class="md:col-span-5 bg-brand-surfaceLight dark:bg-slate-900/40 p-8 rounded-2xl border border-brand-borderLight dark:border-white/10 hover:shadow-premium transition-all space-y-4">
                    <div class="w-12 h-12 bg-white dark:bg-slate-950 rounded-full flex items-center justify-center border border-brand-borderLight dark:border-white/10">
                        <x-lucide-maximize class="w-5 h-5 text-brand-primary dark:text-brand-secondary" />
                    </div>
                    <h3 class="font-display font-bold text-xl text-brand-primary dark:text-white">Seamless Record Integration</h3>
                    <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed">
                        Connecting patient records seamlessly across hospital departments. We ensure legacy database networks communicate securely with modern digital portals.
                    </p>
                </div>
                <!-- Secure Infrastructure -->
                <div class="md:col-span-7 bg-brand-surfaceLight dark:bg-slate-900/40 p-8 rounded-2xl border border-brand-borderLight dark:border-white/10 flex flex-col justify-between group hover:shadow-premium transition-all">
                    <div class="flex justify-between items-start">
                        <div class="space-y-2">
                            <h3 class="font-display font-bold text-xl text-brand-primary dark:text-white">Secure Data Architecture</h3>
                            <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed max-w-md">
                                Dedicated hosting and storage environments designed specifically for highly sensitive clinical information.
                            </p>
                        </div>
                        <x-lucide-shield-check class="w-12 h-12 text-brand-primary/20 dark:text-brand-secondary/20 group-hover:text-brand-primary dark:group-hover:text-brand-secondary transition-colors" />
                    </div>
                    <div class="mt-8 grid grid-cols-3 gap-4">
                        <div class="text-center p-3 bg-white dark:bg-slate-950 rounded-xl border border-brand-borderLight dark:border-white/10 shadow-sm">
                            <p class="font-display text-xs text-brand-primary dark:text-white font-bold">Encrypted</p>
                            <p class="text-[9px] font-bold uppercase tracking-wider text-brand-textMuted dark:text-slate-400">Data Transfer</p>
                        </div>
                        <div class="text-center p-3 bg-white dark:bg-slate-950 rounded-xl border border-brand-borderLight dark:border-white/10 shadow-sm">
                            <p class="font-display text-xs text-brand-primary dark:text-white font-bold">Redundant</p>
                            <p class="text-[9px] font-bold uppercase tracking-wider text-brand-textMuted dark:text-slate-400">Backup Sites</p>
                        </div>
                        <div class="text-center p-3 bg-white dark:bg-slate-950 rounded-xl border border-brand-borderLight dark:border-white/10 shadow-sm">
                            <p class="font-display text-xs text-brand-primary dark:text-white font-bold">24/7 Managed</p>
                            <p class="text-[9px] font-bold uppercase tracking-wider text-brand-textMuted dark:text-slate-400">Security Team</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Compliance Section -->
    <section class="py-24 bg-brand-surfaceLight dark:bg-brand-surfaceDark border-y border-brand-borderLight dark:border-white/10 relative">
        <div class="max-w-[1400px] mx-auto px-6 md:px-12 grid lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-7 space-y-6">
                <div class="text-brand-secondary font-bold text-xs uppercase tracking-widest flex items-center">
                    <x-lucide-lock class="w-4 h-4 mr-1" /> TRUST &amp; SAFETY
                </div>
                <h2 class="font-display font-extrabold text-3xl md:text-4xl text-brand-primary dark:text-white leading-tight">Global Security Standards by Design</h2>
                <p class="text-brand-textMuted dark:text-slate-400 text-lg leading-relaxed">
                    We plan security measures directly into each layout. Our health platforms operate on verified structures that prioritize privacy and comply with major international directives.
                </p>
                <div class="space-y-4 pt-2">
                    <div class="flex items-start space-x-3">
                        <x-lucide-check-circle class="w-5 h-5 text-brand-primary dark:text-brand-secondary" />
                        <div>
                            <h4 class="font-display font-bold text-sm text-brand-primary dark:text-white">Automated Audit Trails</h4>
                            <p class="text-brand-textMuted dark:text-slate-400 text-xs mt-0.5">Continuous logs documenting system access, ready for verification audits at any moment.</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <x-lucide-check-circle class="w-5 h-5 text-brand-primary dark:text-brand-secondary" />
                        <div>
                            <h4 class="font-display font-bold text-sm text-brand-primary dark:text-white">Individual Control</h4>
                            <p class="text-brand-textMuted dark:text-slate-400 text-xs mt-0.5">Simple options allowing users to manage, verify, and delete their medical data history.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="lg:col-span-5 grid grid-cols-2 gap-4">
                <div class="bg-white dark:bg-slate-900/60 p-6 rounded-xl border border-brand-borderLight dark:border-white/10 shadow-sm flex flex-col items-center text-center">
                    <x-lucide-badge-check class="w-10 h-10 text-brand-secondary mb-3" />
                    <p class="font-display font-bold text-xs text-brand-primary dark:text-white">Fully Certified</p>
                </div>
                <div class="bg-white dark:bg-slate-900/60 p-6 rounded-xl border border-brand-borderLight dark:border-white/10 shadow-sm flex flex-col items-center text-center">
                    <x-lucide-scale class="w-10 h-10 text-brand-secondary mb-3" />
                    <p class="font-display font-bold text-xs text-brand-primary dark:text-white">Globally Compliant</p>
                </div>
                <div class="col-span-2 bg-brand-primary p-4 rounded-xl flex items-center justify-between border border-brand-primaryDark">
                    <div class="flex items-center space-x-3">
                        <x-lucide-shield-alert class="w-7 h-7 text-white" />
                        <span class="text-white text-xs font-semibold">Verified Secure Server Infrastructure</span>
                    </div>
                    <x-lucide-heart class="w-5 h-5 text-brand-secondary" />
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 bg-white dark:bg-slate-950 text-center">
        <div class="max-w-2xl mx-auto px-6 space-y-6">
            <h2 class="font-display font-extrabold text-3xl text-brand-primary dark:text-white">Ready to modernize your medical digital assets?</h2>
            <p class="text-brand-textMuted dark:text-slate-400 text-base">
                Partner with Elvora Innovation to design secure, compliant, and patient-focused healthcare solutions.
            </p>
            <div class="pt-4">
                <a href="{{ route('project') }}" class="inline-flex px-8 py-4 bg-brand-primary hover:bg-brand-primaryDark text-white font-bold rounded-xl shadow-premium hover:shadow-premiumHover hover:scale-[1.02] transition-all">
                    Consult Our Specialists
                </a>
            </div>
        </div>
    </section>
@endsection
