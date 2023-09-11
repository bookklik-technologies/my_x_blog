<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Filament\Resources\Closure;
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
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-m-book-open';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->autofocus()
                ->required()
                ->live(debounce: 500)
                ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                ->placeholder(__('Title')),
            Forms\Components\TextInput::make('slug')
                ->autofocus()
                ->prefix(URL::to('/page') . '/')
                ->required()
                ->readonly()
                ->placeholder(__('Slug')),
            Forms\Components\Textarea::make('description')
                ->columnSpan('full')
                ->autofocus()
                ->required()
                ->placeholder(__('Description')),
            Forms\Components\TextInput::make('keywords')
                ->maxLength(255)
                ->columnSpanFull(),
            Forms\Components\RichEditor::make('body')
                ->columnSpan('full')
                ->autofocus()
                ->required()
                ->fileAttachmentsDisk('public')
                ->fileAttachmentsDirectory('posts/body_images')
                ->placeholder(__('Body')),
            Forms\Components\Select::make('status')
                ->autofocus()
                ->required()
                ->placeholder(__('Status'))
                ->options([
                    'draft' => __('Draft'),
                    'published' => __('Published'),
                ])
                ->native(false)
                ->default('draft'),
            Forms\Components\BelongsToSelect::make('category_id')
                ->autofocus()
                ->required()
                ->placeholder(__('Category'))
                ->relationship('category', 'name')
                ->native(false)
                ->default(Post::first()->id),
            Forms\Components\FileUpload::make('featured_image')
                ->autofocus()
                ->required()
                ->directory('posts/featured_images')
                ->disk('public')
                ->image()
                ->imageEditor()
                ->imageEditorAspectRatios(['4:3'])
                ->placeholder(__('Featured Image')),
            Forms\Components\Hidden::make('author_id')
                ->required()
                ->default(auth()->user()->id),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->limit(50)
                    ->wrap(),
                Tables\Columns\TextColumn::make('status')
                    ->sortable()
                    ->badge()
                    ->color(
                        fn(string $state): string => match ($state) {
                            'draft' => 'gray',
                            'published' => 'success',
                        },
                    ),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'draft' => __('Draft'),
                        'published' => __('Published'),
                    ])
                    ->label(__('Status')),
            ])
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->withoutGlobalScopes([SoftDeletingScope::class]);
    }
}
