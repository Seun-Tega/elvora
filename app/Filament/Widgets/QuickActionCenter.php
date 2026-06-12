<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class QuickActionCenter extends Widget
{
    protected static string $view = 'filament.widgets.quick-action-center';
    
    protected static ?int $sort = -1;
    
    protected int | string | array $columnSpan = 'full';
}
