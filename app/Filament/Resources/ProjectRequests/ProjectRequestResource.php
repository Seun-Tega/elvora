<?php

namespace App\Filament\Resources\ProjectRequests;

use App\Filament\Resources\ProjectRequests\Pages\CreateProjectRequest;
use App\Filament\Resources\ProjectRequests\Pages\EditProjectRequest;
use App\Filament\Resources\ProjectRequests\Pages\ListProjectRequests;
use App\Filament\Resources\ProjectRequests\Schemas\ProjectRequestForm;
use App\Filament\Resources\ProjectRequests\Tables\ProjectRequestsTable;
use App\Models\ProjectRequest;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProjectRequestResource extends Resource
{
    protected static ?string $model = ProjectRequest::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBriefcase;

    protected static \UnitEnum|string|null $navigationGroup = 'Lead Management';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ProjectRequestForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProjectRequestsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProjectRequests::route('/'),
            'create' => CreateProjectRequest::route('/create'),
            'edit' => EditProjectRequest::route('/{record}/edit'),
        ];
    }
}
