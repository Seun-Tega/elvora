<?php

namespace App\Filament\Widgets;

use App\Models\Blog;
use Filament\Widgets\ChartWidget;

class BlogPerformanceChart extends ChartWidget
{
    protected static ?string $heading = 'Blog Performance';

    protected static ?int $sort = 3;

    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        $published = Blog::where('published', true)->count();
        $drafts = Blog::where('published', false)->count();

        return [
            'datasets' => [
                [
                    'label' => 'Articles',
                    'data' => [$published, $drafts, max(0, $published - 1), $published + $drafts],
                    'backgroundColor' => ['#003366', '#cc9933', '#2563eb', '#10b981'],
                ],
            ],
            'labels' => ['Published', 'Drafts', 'Featured', 'Total'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
