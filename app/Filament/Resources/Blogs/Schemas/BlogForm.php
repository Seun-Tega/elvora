<?php

namespace App\Filament\Resources\Blogs\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

use Illuminate\Support\Str;

class BlogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Publishing controls at the top
                Section::make('Publishing & Metadata')
                    ->icon('heroicon-m-megaphone')
                    ->compact()
                    ->columnSpanFull()
                    ->schema([
                        Grid::make(['default' => 1, 'sm' => 3])
                            ->schema([
                                Select::make('author_id')
                                    ->label('Author')
                                    ->relationship('author', 'name')
                                    ->required()
                                    ->native(false),
                                TextInput::make('author_role')
                                    ->placeholder('e.g. Managing Partner'),
                                FileUpload::make('author_avatar')
                                    ->image()
                                    ->avatar()
                                    ->disk('public')
                                    ->directory('authors'),
                                Select::make('category_id')
                                    ->label('Category')
                                    ->relationship('category', 'name')
                                    ->native(false)
                                    ->default(null),
                                TextInput::make('category_label')
                                    ->placeholder('e.g. Venture Studio'),
                                DateTimePicker::make('published_at')
                                    ->label('Publish Date'),
                                TextInput::make('reading_time')
                                    ->numeric()
                                    ->suffix('min read'),
                                Toggle::make('published')
                                    ->label('Published')
                                    ->required()
                                    ->inline(false),
                            ]),
                    ]),

                // Styling
                Section::make('Article Styling')
                    ->description('Select fonts for this article.')
                    ->icon('heroicon-m-paint-brush')
                    ->columnSpanFull()
                    ->schema([
                        Grid::make(['default' => 1, 'sm' => 2])
                            ->schema([
                                Select::make('heading_font')
                                    ->options([
                                        'Inter' => 'Inter (Modern Sans)',
                                        'Outfit' => 'Outfit (Geometric)',
                                        'Lora' => 'Lora (Elegant Serif)',
                                    ])
                                    ->default('Inter')
                                    ->required(),
                                Select::make('body_font')
                                    ->options([
                                        'Lora' => 'Lora (Elegant Serif)',
                                        'Inter' => 'Inter (Modern Sans)',
                                        'JetBrains Mono' => 'JetBrains Mono (Technical)',
                                    ])
                                    ->default('Lora')
                                    ->required(),
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
                        \Filament\Forms\Components\RichEditor::make('content')
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
