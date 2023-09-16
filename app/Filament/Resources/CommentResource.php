<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommentResource\Pages;
use App\Filament\Resources\CommentResource\RelationManagers;
use App\Models\Comment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Get;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static ?string $navigationIcon = 'heroicon-s-chat-bubble-left';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        $table_name = isset($form->model->table_name) ? $form->model->table_name : null;

        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->autofocus()
                ->required()
                ->disableAutocomplete()
                ->columnSpan('full'),
            Forms\Components\Textarea::make('body')
                ->autofocus()
                ->required()
                ->disableAutocomplete()
                ->columnSpan('full'),
            Forms\Components\Select::make('table_name')
                ->options([
                    'posts' => 'Posts',
                    'pages' => 'Pages',
                ])
                ->default('posts')
                ->autofocus()
                ->native(false)
                ->required(),
            Forms\Components\Select::make('table_row_id')
                ->options(function (Get $get) {
                    $table_name = $get('table_name');
                    if ($table_name === 'posts') {
                        return \App\Models\Post::all()->pluck('title', 'id');
                    } elseif ($table_name === 'pages') {
                        return \App\Models\Page::all()->pluck('title', 'id');
                    } else {
                        return [];
                    }
                })
                ->autofocus()
                ->native(false)
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->limit(25)
                    ->searchable(),
                Tables\Columns\TextColumn::make('body')
                    ->limit(50)
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('table_name')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([Tables\Filters\TrashedFilter::make()])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make(), Tables\Actions\ForceDeleteBulkAction::make(), Tables\Actions\RestoreBulkAction::make()])])
            ->emptyStateActions([Tables\Actions\CreateAction::make()]);
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
            'index' => Pages\ListComments::route('/'),
            'create' => Pages\CreateComment::route('/create'),
            'edit' => Pages\EditComment::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->withoutGlobalScopes([SoftDeletingScope::class]);
    }
}
