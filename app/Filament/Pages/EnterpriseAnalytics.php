<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class EnterpriseAnalytics extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    protected static ?string $navigationGroup = 'Business Intelligence';

    protected static ?string $navigationLabel = 'Enterprise Analytics';

    protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.pages.enterprise-analytics';
}
