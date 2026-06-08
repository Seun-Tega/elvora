<x-filament-panels::page>
    <div class="elvora-page-hero">
        <p class="elvora-eyebrow">System</p>
        <h1>System center</h1>
        <p>Audit readiness, performance monitoring, notifications, backups, and queue visibility.</p>
    </div>

    @livewire(\App\Filament\Widgets\OperationsHealth::class)

    <div class="elvora-system-modules">
        @foreach (['Audit Logs', 'Activity Logs', 'Error Logs', 'Backups', 'Performance Monitoring', 'Queue Monitoring'] as $module)
            <x-filament::section>
                <div class="elvora-module-card">
                    <span>{{ $module }}</span>
                    <p>Ready for integration with the production monitoring stack.</p>
                </div>
            </x-filament::section>
        @endforeach
    </div>
</x-filament-panels::page>
