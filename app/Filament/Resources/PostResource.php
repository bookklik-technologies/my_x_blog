<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\Forms\Components;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->autofocus()
                    ->required()
                    ->unique(Post::class, 'title')
                    ->placeholder(__('Title')),
                Forms\Components\TextInput::make('slug')
                    ->autofocus()
                    ->required()
                    ->unique(Post::class, 'slug')
                    ->placeholder(__('Slug')),
                Forms\Components\Textarea::make('description')
                    ->columnSpan('full')
                    ->autofocus()
                    ->required()
                    ->placeholder(__('Description')),
                Forms\Components\RichEditor::make('body')
                    ->columnSpan('full')
                    ->autofocus()
                    ->required()
                    ->placeholder(__('Body')),
                Forms\Components\Select::make('status')
                    ->autofocus()
                    ->required()
                    ->placeholder(__('Status'))
                    ->default('draft')
                    ->options([
                        'draft' => __('Draft'),
                        'published' => __('Published'),
                    ])
                    ->native(false),
                Forms\Components\BelongsToSelect::make('category_id')
                    ->autofocus()
                    ->required()
                    ->placeholder(__('Category'))
                    ->relationship('category', 'name'),
                Forms\Components\FileUpload::make('featured_image')
                    ->autofocus()
                    ->required()
                    ->placeholder(__('Featured Image')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
