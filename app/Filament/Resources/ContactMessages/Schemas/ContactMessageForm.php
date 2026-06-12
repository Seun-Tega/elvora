<?php

namespace App\Filament\Resources\ContactMessages\Schemas;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Form;

class ContactMessageForm
{
    public static function configure(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)
                    ->schema([
                        Section::make([
                            TextInput::make('name')->disabled(),
                            TextInput::make('email')->label('Email address')->disabled(),
                            TextInput::make('phone')->disabled(),
                            Textarea::make('message')->disabled()->columnSpanFull(),
                            MarkdownEditor::make('internal_notes')
                                ->label('Internal Response Plan')
                                ->placeholder('Plan the response or log internal discussion...'),
                        ])->columnSpan(2),
                        Section::make([
                            Select::make('status')
                                ->options([
                                    'new' => 'New',
                                    'read' => 'Read',
                                    'responded' => 'Responded',
                                    'archived' => 'Archived',
                                ])
                                ->required()
                                ->native(false),
                            Select::make('assigned_to_id')
                                ->label('Assigned Handler')
                                ->relationship('assigned_to', 'name')
                                ->searchable()
                                ->preload()
                                ->native(false),
                        ])->columnSpan(1),
                    ]),
            ]);
    }
}
