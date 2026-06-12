<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class ActivityCenter extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-bell';

    protected static ?string $navigationGroup = 'System';

    protected static ?string $navigationLabel = 'Activity Center';

    protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.pages.activity-center';
}
