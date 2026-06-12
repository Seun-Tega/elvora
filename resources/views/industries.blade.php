@extends('layouts.app')

@section('title', 'Industries & Verticals | Elvora Innovation')

@section('content')
    <!-- ========================================== -->
    <!--          HEADER SECTION                      -->
    <!-- ========================================== -->
    <section class="relative bg-brand-surfaceLight dark:bg-brand-surfaceDark overflow-hidden py-24 border-b border-brand-borderLight dark:border-white/10">
        <div class="absolute inset-0 grid-dots opacity-40 dark:grid-dots-dark"></div>
        <div class="max-w-[1600px] w-full mx-auto px-4 relative z-10 text-center space-y-6">
            <span class="text-brand-secondary font-bold text-xs uppercase tracking-widest block">Sector Solutions</span>
            <h1 class="font-display font-extrabold text-fluid-4xl lg:text-fluid-5xl xl:text-fluid-6xl text-brand-primary dark:text-white max-w-3xl mx-auto leading-tight">
                Engineered to satisfy complex standards.
            </h1>
            <p class="text-brand-textMuted dark:text-slate-400 text-lg max-w-2xl mx-auto leading-relaxed">
                From HIPAA-secure telehealth portals to SOC-2 compliant transaction ledger engines, we design for absolute security.
            </p>
        </div>
    </section>

    <!-- ========================================== -->
    <!--          SECTORS GRID                       -->
    <!-- ========================================== -->
    <section class="py-24 bg-white dark:bg-slate-950">
        <div class="max-w-[1600px] w-full mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Sector 1 -->
            <a href="{{ route('industries.healthcare') }}" class="bg-brand-surfaceLight dark:bg-slate-900/40 border border-brand-borderLight dark:border-white/10 p-8 rounded-2xl space-y-4 hover-card-trigger group flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-center mb-6">
                        <x-lucide-activity class="w-8 h-8 text-brand-primary dark:text-brand-secondary" />
                        <span class="text-[9px] bg-blue-50 dark:bg-slate-950 text-brand-primary dark:text-brand-secondary px-3 py-1 rounded-full font-bold uppercase tracking-widest border border-blue-100 dark:border-white/10">HIPAA / GDPR</span>
                    </div>
                    <h3 class="font-display font-bold text-lg text-brand-primary dark:text-white mb-2">Healthcare</h3>
                    <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed mb-6">
                        EMR interoperability connectors, encrypted remote patient telemetry structures, and diagnostic analytics apps complying with HIPAA, GDPR, and FHIR specifications.
                    </p>
                </div>
                <span class="text-[10px] font-bold uppercase text-brand-secondary flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                    View Specifications <x-lucide-arrow-right class="w-3 h-3" />
                </span>
            </a>

            <!-- Sector 2 -->
            <a href="{{ route('industries.fintech') }}" class="bg-brand-surfaceLight dark:bg-slate-900/40 border border-brand-borderLight dark:border-white/10 p-8 rounded-2xl space-y-4 hover-card-trigger group flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-center mb-6">
                        <x-lucide-landmark class="w-8 h-8 text-brand-primary dark:text-brand-secondary" />
                        <span class="text-[9px] bg-yellow-50 dark:bg-slate-950 text-brand-secondaryDark dark:text-brand-secondary px-3 py-1 rounded-full font-bold uppercase tracking-widest border border-yellow-100 dark:border-white/10">SOC-2 Type II</span>
                    </div>
                    <h3 class="font-display font-bold text-lg text-brand-primary dark:text-white mb-2">Financial Technology</h3>
                    <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed mb-6">
                        Double-entry ledger databases, high-speed transaction pipeline orchestrators, fraud mitigation middleware, and compliant audit trails.
                    </p>
                </div>
                <span class="text-[10px] font-bold uppercase text-brand-secondary flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                    View Specifications <x-lucide-arrow-right class="w-3 h-3" />
                </span>
            </a>

            <!-- Sector 3 -->
            <a href="{{ route('industries.logistics') }}" class="bg-brand-surfaceLight dark:bg-slate-900/40 border border-brand-borderLight dark:border-white/10 p-8 rounded-2xl space-y-4 hover-card-trigger group flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-center mb-6">
                        <x-lucide-truck class="w-8 h-8 text-brand-primary dark:text-brand-secondary" />
                        <span class="text-[9px] bg-slate-100 dark:bg-slate-950 text-brand-primary dark:text-brand-secondary px-3 py-1 rounded-full font-bold uppercase tracking-widest border border-slate-200 dark:border-white/10">IoT / Telematics</span>
                    </div>
                    <h3 class="font-display font-bold text-lg text-brand-primary dark:text-white mb-2">Logistics &amp; Supply Chain</h3>
                    <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed mb-6">
                        Real-time GPS dispatch pipelines, route optimization models, asset custody records, and automated inventory indicators.
                    </p>
                </div>
                <span class="text-[10px] font-bold uppercase text-brand-secondary flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                    View Specifications <x-lucide-arrow-right class="w-3 h-3" />
                </span>
            </a>

            <!-- Sector 4 -->
            <a href="{{ route('industries.enterprise') }}" class="bg-brand-surfaceLight dark:bg-slate-900/40 border border-brand-borderLight dark:border-white/10 p-8 rounded-2xl space-y-4 hover-card-trigger group flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-center mb-6">
                        <x-lucide-building-2 class="w-8 h-8 text-brand-primary dark:text-brand-secondary" />
                        <span class="text-[9px] bg-blue-50 dark:bg-slate-950 text-brand-primary dark:text-brand-secondary px-3 py-1 rounded-full font-bold uppercase tracking-widest border border-blue-100 dark:border-white/10">Sovereign Data</span>
                    </div>
                    <h3 class="font-display font-bold text-lg text-brand-primary dark:text-white mb-2">Government &amp; Public Sector</h3>
                    <p class="text-brand-textMuted dark:text-slate-400 text-sm leading-relaxed mb-6">
                        Decoupled microservice architectures, sovereign host servers, strict user validation configurations, and accessible portals.
                    </p>
                </div>
                <span class="text-[10px] font-bold uppercase text-brand-secondary flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                    View Specifications <x-lucide-arrow-right class="w-3 h-3" />
                </span>
            </a>
        </div>
    </section>
@endsection
