<x-filament-widgets::widget>
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-5 hover:shadow-premium-hover transition-all duration-300">
        <!-- Header -->
        <div class="flex items-center justify-between border-b border-slate-100 dark:border-slate-800/80 pb-4 mb-4">
            <div class="flex items-center gap-2">
                <x-filament::icon icon="heroicon-m-server" class="h-5 w-5 text-[#CC9933]" />
                <div>
                    <h3 class="text-sm font-bold text-slate-900 dark:text-white">Operational Health</h3>
                    <p class="text-[11px] text-slate-500 dark:text-slate-400">System telemetry, database operations, and application status.</p>
                </div>
            </div>
            <x-filament::button href="{{ \App\Filament\Pages\SystemCenter::getUrl() }}" tag="a" icon="heroicon-m-circle-stack" color="gray" size="xs" outlined>
                System Center
            </x-filament::button>
        </div>

        <!-- System Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($systems as $system)
                @php
                    $isOptimal = $system['score'] >= 90;
                    $statusColor = $isOptimal ? 'emerald' : 'amber';
                @endphp
                <div class="bg-slate-50 dark:bg-slate-950/40 border border-slate-100 dark:border-slate-850 p-4 rounded-xl flex flex-col justify-between hover:shadow-premium transition-all">
                    <div>
                        <div class="flex justify-between items-center mb-1">
                            <span class="text-xs font-bold text-slate-800 dark:text-slate-200">{{ $system['name'] }}</span>
                            <span class="text-xs font-mono font-bold text-slate-900 dark:text-slate-100">{{ $system['score'] }}%</span>
                        </div>
                        <div class="elvora-meter"><i style="width: {{ $system['score'] }}%"></i></div>
                    </div>
                    <div class="flex items-center gap-1.5 mt-3 pt-2 border-t border-slate-100 dark:border-slate-900/60">
                        <span class="relative flex h-1.5 w-1.5">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-{{ $statusColor }}-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-{{ $statusColor }}-500"></span>
                        </span>
                        <span class="text-[10px] font-bold text-{{ $statusColor }}-600 dark:text-{{ $statusColor }}-450 uppercase tracking-wider">{{ $system['status'] }}</span>
                    </div>
                    <p class="text-[11px] text-slate-500 dark:text-slate-400 mt-1.5 leading-relaxed">{{ $system['detail'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-filament-widgets::widget>
