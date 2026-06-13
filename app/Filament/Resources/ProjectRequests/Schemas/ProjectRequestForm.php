<?php

namespace App\Filament\Resources\ProjectRequests\Schemas;

use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Schemas\Schema;

class ProjectRequestForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Project progress controls — full width, always at the top
                Section::make('Project Progress')
                    ->icon('heroicon-m-adjustments-vertical')
                    ->compact()
                    ->columnSpanFull()
                    ->schema([
                        Grid::make(['default' => 1, 'sm' => 3])
                            ->schema([
                                Select::make('status')
                                    ->label('Status')
                                    ->options([
                                        'new' => 'New',
                                        'contacted' => 'Contacted',
                                        'qualified' => 'Qualified',
                                        'proposal_sent' => 'Proposal Sent',
                                        'negotiation' => 'Negotiation',
                                        'won' => 'Won',
                                        'lost' => 'Lost',
                                        'closed' => 'Closed',
                                    ])
                                    ->required()
                                    ->native(false),

                                Select::make('assigned_to_id')
                                    ->label('Assigned To')
                                    ->relationship('assigned_to', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->native(false),

                                TextInput::make('lead_value')
                                    ->label('Deal Value')
                                    ->numeric()
                                    ->prefix('$')
                                    ->placeholder('0.00'),
                            ]),
                    ]),

                // Project details — full width
                Section::make('Project Specifications')
                    ->description('Technical scope and project details.')
                    ->icon('heroicon-m-document-text')
                    ->columnSpanFull()
                    ->schema([
                        Grid::make(['default' => 1, 'sm' => 2, 'lg' => 4])
                            ->schema([
                                TextInput::make('project_type')
                                    ->label('Project Type')
                                    ->disabled(),
                                TextInput::make('budget_range')
                                    ->label('Budget Range')
                                    ->disabled(),
                                TextInput::make('timeline')
                                    ->label('Timeline')
                                    ->disabled(),
                                TextInput::make('organization')
                                    ->label('Organization')
                                    ->disabled(),
                            ]),
                        Textarea::make('description')
                            ->label('Project Description')
                            ->disabled()
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),

                // Contact info — full width
                Section::make('Prospect Contact')
                    ->description('Who submitted this request.')
                    ->icon('heroicon-m-user-circle')
                    ->columnSpanFull()
                    ->schema([
                        Grid::make(['default' => 1, 'sm' => 2])
                            ->schema([
                                TextInput::make('name')
                                    ->label('Full Name')
                                    ->disabled(),
                                TextInput::make('email')
                                    ->label('Email Address')
                                    ->disabled(),
                            ]),
                    ]),

                // Internal notes — full width, collapsible
                Section::make('Internal Notes')
                    ->description('Activity log, follow-ups, and negotiation details.')
                    ->icon('heroicon-m-pencil-square')
                    ->collapsible()
                    ->columnSpanFull()
                    ->schema([
                        MarkdownEditor::make('internal_notes')
                            ->label('Notes & Activity')
                            ->placeholder('Add internal notes, activity log, or next steps...')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
