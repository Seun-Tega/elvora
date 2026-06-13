<x-filament-panels::page>
    <div class="elvora-page-hero">
        <p class="elvora-eyebrow">Analytics</p>
        <h1>Business Performance Overview</h1>
        <p>Track your progress, content, and growth in one place.</p>
    </div>

    <div class="elvora-analytics-grid">
        <x-filament::section heading="Inquiry Progress" description="How inquiries are moving through your process.">
            @livewire(\App\Filament\Widgets\LeadFunnelChart::class)
        </x-filament::section>
        <x-filament::section heading="Project Activity" description="Monthly interest and project updates.">
            @livewire(\App\Filament\Widgets\ProjectPipelineChart::class)
        </x-filament::section>
        <x-filament::section heading="Content Updates" description="How often stories are being published.">
            @livewire(\App\Filament\Widgets\BlogPerformanceChart::class)
        </x-filament::section>
        <x-filament::section heading="Visitor Sources" description="Where your visitors are coming from.">
            <div class="elvora-source-list">
                @foreach ([['Organic Search', 48], ['Direct', 24], ['LinkedIn', 16], ['Referral', 8], ['Email', 4]] as [$label, $value])
                    <div><span>{{ $label }}</span><strong>{{ $value }}%</strong><i style="width: {{ $value }}%"></i></div>
                @endforeach
            </div>
        </x-filament::section>
    </div>
</x-filament-panels::page>
