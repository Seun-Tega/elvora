<?php

namespace App\Filament\Resources\ProjectRequests\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProjectRequestsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('organization')
                    ->searchable()
                    ->placeholder('Personal'),
                TextColumn::make('project_type')
                    ->badge()
                    ->color('gray')
                    ->searchable(),
                TextColumn::make('budget_range')
                    ->label('Budget')
                    ->searchable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'new' => 'info',
                        'contacted' => 'warning',
                        'qualified' => 'success',
                        'proposal_sent' => 'primary',
                        'negotiation' => 'warning',
                        'won' => 'success',
                        'lost' => 'danger',
                        'closed' => 'gray',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('assigned_to.name')
                    ->label('Assigned Specialist')
                    ->placeholder('Unassigned')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Received')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'new' => 'New',
                        'contacted' => 'Contacted',
                        'qualified' => 'Qualified',
                        'proposal_sent' => 'Proposal Sent',
                        'negotiation' => 'Negotiation',
                        'won' => 'Won',
                        'lost' => 'Lost',
                        'closed' => 'Closed',
                    ]),
                SelectFilter::make('assigned_to_id')
                    ->label('Specialist')
                    ->relationship('assigned_to', 'name'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
