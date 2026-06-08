<?php

namespace App\Filament\Widgets;

use App\Models\Blog;
use App\Models\ContactMessage;
use App\Models\NewsletterSubscriber;
use App\Models\ProjectRequest;
use Filament\Widgets\Widget;

class ExecutiveCommandCenter extends Widget
{
    protected string $view = 'filament.widgets.executive-command-center';

    protected static ?int $sort = -2;

    protected int | string | array $columnSpan = 'full';

    protected function getViewData(): array
    {
        $leads = ContactMessage::count() + ProjectRequest::count();
        $openPipeline = ProjectRequest::whereNotIn('status', ['won', 'lost', 'closed'])->count();

        return [
            'healthScore' => min(99, 72 + $openPipeline + Blog::where('published', true)->count()),
            'pipelineValue' => ProjectRequest::sum('lead_value') ?: ProjectRequest::count() * 5000,
            'openPipeline' => $openPipeline,
            'leadVelocity' => $leads > 0 ? min(100, 35 + ($leads * 4)) : 35,
            'contentMomentum' => Blog::where('published', true)->count(),
            'audience' => NewsletterSubscriber::count(),
            'priorities' => [
                'Review new project requests and assign ownership.',
                'Move qualified leads into proposal or negotiation.',
                'Publish high-intent thought leadership for enterprise buyers.',
            ],
        ];
    }
}
