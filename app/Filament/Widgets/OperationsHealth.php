<?php

namespace App\Filament\Widgets;

use App\Models\Blog;
use App\Models\ContactMessage;
use App\Models\ProjectRequest;
use Filament\Widgets\Widget;

class OperationsHealth extends Widget
{
    protected string $view = 'filament.widgets.operations-health';

    protected static ?int $sort = 5;

    protected int | string | array $columnSpan = 'full';

    protected function getViewData(): array
    {
        return [
            'systems' => [
                ['name' => 'Content Manager', 'status' => 'Healthy', 'score' => 98, 'detail' => Blog::count() . ' stories published and ready'],
                ['name' => 'Inquiry System', 'status' => 'Active', 'score' => 96, 'detail' => ContactMessage::count() + ProjectRequest::count() . ' total inquiries received'],
                ['name' => 'Project Tracker', 'status' => 'Monitoring', 'score' => 91, 'detail' => ProjectRequest::whereNotIn('status', ['won', 'lost', 'closed'])->count() . ' projects being tracked'],
                ['name' => 'System Alerts', 'status' => 'Ready', 'score' => 88, 'detail' => 'Automatic alerts are active'],
            ],
        ];
    }
}
