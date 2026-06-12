<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class SystemCenter extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-circle-stack';

    protected static ?string $navigationGroup = 'Infrastructure';

    protected static ?string $navigationLabel = 'System Center';

    protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.pages.system-center';
}
