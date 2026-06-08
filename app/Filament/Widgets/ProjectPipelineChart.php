<?php

namespace App\Filament\Widgets;

use App\Models\ProjectRequest;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class ProjectPipelineChart extends ChartWidget
{
    protected ?string $heading = 'Monthly Project Requests';
    
    protected static ?int $sort = 2;
    
    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        $data = ProjectRequest::select(
                DB::raw('count(*) as count'),
                DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month")
            )
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Requests',
                    'data' => $data->pluck('count')->toArray(),
                    'fill' => 'start',
                    'borderColor' => '#003366',
                    'backgroundColor' => 'rgba(0, 51, 102, 0.1)',
                ],
            ],
            'labels' => $data->pluck('month')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
