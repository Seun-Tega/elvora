<?php

namespace App\Filament\Resources\Blogs\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Illuminate\Support\Str;

class BlogForm
{
    public static function configure(Form $form): Form
    {
        return $form
            ->schema([
                // Publishing controls at the top
                Section::make('Publishing')
                    ->icon('heroicon-m-megaphone')
                    ->compact()
                    ->columnSpanFull()
                    ->schema([
                        Grid::make(['default' => 1, 'sm' => 4])
                            ->schema([
                                Select::make('author_id')
                                    ->label('Author')
                                    ->relationship('author', 'name')
                                    ->required()
                                    ->native(false),
                                Select::make('category_id')
                                    ->label('Category')
                                    ->relationship('category', 'name')
                                    ->native(false)
                                    ->default(null),
                                DateTimePicker::make('published_at')
                                    ->label('Publish Date'),
                                Toggle::make('published')
                                    ->label('Published')
                                    ->required()
                                    ->inline(false),
                            ]),
                    ]),

                // Article content
                Section::make('Article Content')
                    ->description('Title, slug, excerpt, and body content.')
                    ->icon('heroicon-m-document-text')
                    ->columnSpanFull()
                    ->schema([
                        Grid::make(['default' => 1, 'sm' => 2])
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (string $operation, $state, $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                                TextInput::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true),
                            ]),
                        Textarea::make('excerpt')
                            ->default(null)
                            ->rows(2)
                            ->columnSpanFull(),
                        RichEditor::make('content')
                            ->required()
                            ->columnSpanFull(),
                    ]),

                // Media
                Section::make('Featured Image')
                    ->icon('heroicon-m-photo')
                    ->columnSpanFull()
                    ->collapsed()
                    ->schema([
                        FileUpload::make('featured_image')
                            ->image()
                            ->columnSpanFull(),
                    ]),

                // SEO
                Section::make('SEO')
                    ->description('Search engine optimization metadata.')
                    ->icon('heroicon-m-magnifying-glass')
                    ->columnSpanFull()
                    ->collapsible()
                    ->schema([
                        Grid::make(['default' => 1, 'sm' => 2])
                            ->schema([
                                TextInput::make('meta_title')
                                    ->label('Meta Title')
                                    ->default(null),
                                Textarea::make('meta_description')
                                    ->label('Meta Description')
                                    ->default(null)
                                    ->rows(2),
                            ]),
                    ]),
            ]);
    }
}
