<x-filament-panels::page>
    <div class="elvora-page-hero">
        <p class="elvora-eyebrow">Analytics</p>
        <h1>Enterprise analytics cockpit</h1>
        <p>Pipeline, content, traffic, conversion, and growth intelligence for leadership decisions.</p>
    </div>

    <div class="elvora-analytics-grid">
        <x-filament::section heading="Lead Funnel" description="Stage distribution across the CRM lifecycle.">
            @livewire(\App\Filament\Widgets\LeadFunnelChart::class)
        </x-filament::section>
        <x-filament::section heading="Project Pipeline" description="Monthly demand and opportunity movement.">
            @livewire(\App\Filament\Widgets\ProjectPipelineChart::class)
        </x-filament::section>
        <x-filament::section heading="Blog Performance" description="Publishing velocity and content readiness.">
            @livewire(\App\Filament\Widgets\BlogPerformanceChart::class)
        </x-filament::section>
        <x-filament::section heading="Traffic Sources" description="Modeled acquisition mix until analytics integration is connected.">
            <div class="elvora-source-list">
                @foreach ([['Organic Search', 48], ['Direct', 24], ['LinkedIn', 16], ['Referral', 8], ['Email', 4]] as [$label, $value])
                    <div><span>{{ $label }}</span><strong>{{ $value }}%</strong><i style="width: {{ $value }}%"></i></div>
                @endforeach
            </div>
        </x-filament::section>
    </div>
</x-filament-panels::page>
