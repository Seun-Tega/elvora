<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;

class SettingForm
{
    public static function configure(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('key')
                    ->required(),
                Textarea::make('value')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
