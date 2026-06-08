<x-filament-widgets::widget>
    <div class="space-y-4">
        <!-- Main Hero & Health Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            <!-- Command Center Hero (Stripe-style gradient card) -->
            <div class="lg:col-span-2 elvora-command-hero rounded-xl p-6 flex flex-col justify-between relative overflow-hidden transition-all duration-300 hover:shadow-premium-hover">
                <div class="space-y-3 z-10">
                    <p class="elvora-eyebrow text-xs font-bold tracking-wider text-[#CC9933] uppercase">Operational Hub</p>
                    <h2 class="text-2xl md:text-3xl font-extrabold text-white tracking-tight leading-tight">Elvora Command Center</h2>
                    <p class="text-sm text-slate-300 max-w-xl">
                        Operational metrics, workflow pipelines, and system telemetry.
                    </p>
                </div>
                <div class="flex items-center gap-3 mt-6 z-10">
                    <x-filament::button href="{{ \App\Filament\Resources\ProjectRequests\ProjectRequestResource::getUrl('index') }}" tag="a" icon="heroicon-m-briefcase" class="shadow-sm">
                        Pipeline
                    </x-filament::button>
                    <x-filament::button href="{{ \App\Filament\Resources\Blogs\BlogResource::getUrl('create') }}" tag="a" icon="heroicon-m-pencil-square" color="gray" class="shadow-sm" outlined>
                        Write Post
                    </x-filament::button>
                </div>
            </div>

            <!-- Company Health Score Card -->
            <div class="elvora-health-card rounded-xl p-6 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 flex flex-col justify-between hover:shadow-premium-hover transition-all">
                <div class="flex justify-between items-start">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">System Telemetry</span>
                        <h3 class="text-slate-900 dark:text-white font-bold text-lg mt-1">Company Health</h3>
                    </div>
                    <div class="p-2 rounded-lg bg-emerald-50 dark:bg-emerald-950/30 text-emerald-600 dark:text-emerald-400">
                        <x-filament::icon icon="heroicon-m-bolt" class="h-5 w-5" />
                    </div>
                </div>
                <div class="my-4">
                    <div class="flex justify-between items-baseline mb-2">
                        <strong class="text-4xl font-extrabold tracking-tight text-slate-900 dark:text-white">{{ $healthScore }}%</strong>
                        <span class="text-xs font-semibold text-emerald-600 dark:text-emerald-400 flex items-center gap-0.5">
                            <x-filament::icon icon="heroicon-m-arrow-trending-up" class="h-4 w-4" /> Optimal
                        </span>
                    </div>
                    <div class="elvora-meter"><i style="width: {{ $healthScore }}%"></i></div>
                </div>
                <p class="text-xs text-slate-500 dark:text-slate-400">
                    Overall health of content growth, security, and pipeline activity.
                </p>
            </div>
        </div>

        <!-- Metrics Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Pipeline Value -->
            <div class="elvora-command-metrics bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-5 hover:shadow-premium-hover transition-all">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Pipeline Value</span>
                    <x-filament::icon icon="heroicon-m-currency-dollar" class="h-5 w-5 text-slate-400 dark:text-slate-500" />
                </div>
                <div class="flex items-baseline justify-between">
                    <strong class="text-2xl font-extrabold text-slate-900 dark:text-white">${{ number_format($pipelineValue) }}</strong>
                    <span class="text-xxs font-semibold bg-emerald-50 dark:bg-emerald-950/20 text-emerald-600 dark:text-emerald-400 px-1.5 py-0.5 rounded">+8.2%</span>
                </div>
            </div>

            <!-- Open Opportunities -->
            <div class="elvora-command-metrics bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-5 hover:shadow-premium-hover transition-all">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Open Pipeline</span>
                    <x-filament::icon icon="heroicon-m-folder-open" class="h-5 w-5 text-slate-400 dark:text-slate-500" />
                </div>
                <div class="flex items-baseline justify-between">
                    <strong class="text-2xl font-extrabold text-slate-900 dark:text-white">{{ number_format($openPipeline) }}</strong>
                    <span class="text-xxs font-semibold bg-amber-50 dark:bg-amber-950/20 text-amber-600 dark:text-amber-400 px-1.5 py-0.5 rounded">Active</span>
                </div>
            </div>

            <!-- Lead Velocity -->
            <div class="elvora-command-metrics bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-5 hover:shadow-premium-hover transition-all">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Lead Velocity</span>
                    <x-filament::icon icon="heroicon-m-chart-bar-square" class="h-5 w-5 text-slate-400 dark:text-slate-500" />
                </div>
                <div class="flex items-baseline justify-between">
                    <strong class="text-2xl font-extrabold text-slate-900 dark:text-white">{{ $leadVelocity }}%</strong>
                    <span class="text-xxs font-semibold bg-emerald-50 dark:bg-emerald-950/20 text-emerald-600 dark:text-emerald-400 px-1.5 py-0.5 rounded">+15% MoM</span>
                </div>
            </div>

            <!-- Audience Growth -->
            <div class="elvora-command-metrics bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-5 hover:shadow-premium-hover transition-all">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Audience</span>
                    <x-filament::icon icon="heroicon-m-users" class="h-5 w-5 text-slate-400 dark:text-slate-500" />
                </div>
                <div class="flex items-baseline justify-between">
                    <strong class="text-2xl font-extrabold text-slate-900 dark:text-white">{{ number_format($audience) }}</strong>
                    <span class="text-xxs font-semibold bg-emerald-50 dark:bg-emerald-950/20 text-emerald-600 dark:text-emerald-400 px-1.5 py-0.5 rounded">+4.2%</span>
                </div>
            </div>
        </div>

        <!-- Priority / Focus Strip -->
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-5 hover:shadow-premium-hover transition-all">
            <div class="flex items-center gap-2 mb-3">
                <x-filament::icon icon="heroicon-m-clipboard-document-check" class="h-5 w-5 text-[#CC9933]" />
                <span class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Core Priorities for Today</span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                @foreach ($priorities as $index => $priority)
                    <div class="flex gap-3 items-start p-3 bg-slate-50 dark:bg-slate-950/50 rounded-lg border border-slate-100 dark:border-slate-800/60">
                        <span class="flex items-center justify-center h-5 w-5 rounded-full bg-slate-200 dark:bg-slate-800 text-[10px] font-bold text-slate-600 dark:text-slate-400">
                            {{ $index + 1 }}
                        </span>
                        <p class="text-xs text-slate-600 dark:text-slate-400 font-medium leading-relaxed">{{ $priority }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-filament-widgets::widget>
