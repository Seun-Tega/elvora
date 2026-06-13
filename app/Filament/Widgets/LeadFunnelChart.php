<?php

namespace App\Filament\Widgets;

use App\Models\ProjectRequest;
use Filament\Widgets\ChartWidget;

class LeadFunnelChart extends ChartWidget
{
    protected ?string $heading = 'Inquiry Status Breakdown';
    
    protected static ?int $sort = 1;

    protected function getData(): array
    {
        $data = ProjectRequest::selectRaw('status, count(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        $statuses = ['new', 'contacted', 'qualified', 'proposal_sent', 'negotiation', 'won', 'lost'];
        $counts = [];
        foreach ($statuses as $status) {
            $counts[] = $data[$status] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Inquiries',
                    'data' => $counts,
                    'backgroundColor' => [
                        '#2563eb',
                        '#f59e0b',
                        '#10b981',
                        '#8b5cf6',
                        '#cc9933',
                        '#059669',
                        '#ef4444',
                    ],
                ],
            ],
            'labels' => ['New', 'Contacted', 'Qualified', 'Proposal Sent', 'Negotiation', 'Won', 'Lost'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
