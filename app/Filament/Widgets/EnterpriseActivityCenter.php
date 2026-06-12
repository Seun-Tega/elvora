<?php

namespace App\Filament\Widgets;

use App\Models\Blog;
use App\Models\ContactMessage;
use App\Models\ProjectRequest;
use Filament\Widgets\Widget;

class EnterpriseActivityCenter extends Widget
{
    protected string $view = 'filament.widgets.enterprise-activity-center';

    protected static ?int $sort = 4;

    protected int | string | array $columnSpan = 'full';

    protected function getViewData(): array
    {
        return [
            'recentProjects' => ProjectRequest::latest()->limit(5)->get(),
            'recentMessages' => ContactMessage::latest()->limit(5)->get(),
            'recentPosts' => Blog::latest('updated_at')->limit(5)->get(),
        ];
    }
}
