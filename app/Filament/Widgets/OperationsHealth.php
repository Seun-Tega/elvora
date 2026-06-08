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
                ['name' => 'CMS Publishing', 'status' => 'Operational', 'score' => 98, 'detail' => Blog::count() . ' content records indexed'],
                ['name' => 'Lead Intake', 'status' => 'Operational', 'score' => 96, 'detail' => ContactMessage::count() + ProjectRequest::count() . ' total leads'],
                ['name' => 'Project Pipeline', 'status' => 'Monitored', 'score' => 91, 'detail' => ProjectRequest::whereNotIn('status', ['won', 'lost', 'closed'])->count() . ' open opportunities'],
                ['name' => 'Notifications', 'status' => 'Ready', 'score' => 88, 'detail' => 'Database notifications enabled'],
            ],
        ];
    }
}
