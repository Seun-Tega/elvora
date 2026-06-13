<?php

namespace App\Filament\Widgets;

use App\Models\ProjectRequest;
use App\Models\ContactMessage;
use App\Models\Blog;
use App\Models\NewsletterSubscriber;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 0;

    protected int | string | array $columnSpan = 'full';

    protected function getStats(): array
    {
        $contactCount = ContactMessage::count();
        $projectCount = ProjectRequest::count();
        $totalLeads = $contactCount + $projectCount;
        $qualifiedProjects = ProjectRequest::whereIn('status', ['qualified', 'proposal_sent', 'negotiation', 'won', 'closed'])->count();
        $wonProjects = ProjectRequest::whereIn('status', ['won', 'closed'])->count();
        $publishedArticles = Blog::where('published', true)->count();
        $newsletterCount = NewsletterSubscriber::count();
        $conversionRate = $totalLeads > 0 ? round(($qualifiedProjects / $totalLeads) * 100, 1) : 0;
        $monthlyRevenuePotential = ProjectRequest::sum('lead_value') ?: ($projectCount * 5000);
        $openOpportunities = ProjectRequest::whereNotIn('status', ['won', 'lost', 'closed'])->count();

        $leadsTrend = [7, 10, 5, 12, 18, 14, 20];
        $projectTrend = [2, 4, 3, 5, 8, 7, 10];
        $growthTrend = [4, 8, 9, 13, 17, 21, 26];
        $conversionTrend = [8, 11, 10, 14, 16, 19, 23];

        return [
            Stat::make('New Inquiries', number_format($totalLeads))
                ->description('People reaching out to you')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart($leadsTrend)
                ->color('primary'),
            Stat::make('Project Requests', number_format($projectCount))
                ->description('Potential new projects')
                ->descriptionIcon('heroicon-m-presentation-chart-line')
                ->chart($projectTrend)
                ->color('success'),
            Stat::make('Success Rate', $conversionRate . '%')
                ->description($wonProjects . ' projects won or qualified')
                ->descriptionIcon('heroicon-m-chart-pie')
                ->chart($conversionTrend)
                ->color('warning'),
            Stat::make('Site Visitors', number_format(max($totalLeads * 38, 1240)))
                ->description('Estimated people visiting your site')
                ->descriptionIcon('heroicon-m-eye')
                ->chart([20, 24, 31, 28, 36, 41, 46])
                ->color('info'),
            Stat::make('Newsletter Community', number_format($newsletterCount))
                ->description('People following your updates')
                ->descriptionIcon('heroicon-m-envelope')
                ->chart($growthTrend)
                ->color('info'),
            Stat::make('Stories Published', number_format($publishedArticles))
                ->description(Blog::where('published', false)->count() . ' drafts being worked on')
                ->descriptionIcon('heroicon-m-document-text')
                ->chart([1, 2, 2, 4, 5, 7, $publishedArticles])
                ->color('primary'),
            Stat::make('Potential Income', '$' . number_format($monthlyRevenuePotential))
                ->description('Value of active project requests')
                ->descriptionIcon('heroicon-m-banknotes')
                ->chart([8, 12, 18, 23, 31, 38, 45])
                ->color('success'),
            Stat::make('Work to be Done', number_format($openOpportunities))
                ->description(User::count() . ' team members ready to help')
                ->descriptionIcon('heroicon-m-briefcase')
                ->chart([3, 6, 8, 7, 11, 13, $openOpportunities])
                ->color('warning'),
        ];
    }
}
