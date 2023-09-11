<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use App\Models\Page;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-s-document';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        // Get the editor type from the model, or default to rich text.
        // $editorType = isset($form->model->editor_type_id) ? $form->model->editor_type_id : Page::EDITOR_TYPE_RICHTEXT;

        $editorField = Forms\Components\RichEditor::make('content')
            ->fileAttachmentsDisk('public')
            ->fileAttachmentsDirectory('pages/images')
            ->columnSpanFull();

        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->required()
                ->live(debounce: 500)
                ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                ->maxLength(255),
            Forms\Components\TextInput::make('slug')
                ->prefix(URL::to('/page') . '/')
                ->required()
                ->readonly()
                ->maxLength(255),
            Forms\Components\Textarea::make('description')
                ->maxLength(65535)
                ->columnSpanFull(),
            Forms\Components\TextInput::make('keywords')
                ->maxLength(255)
                ->columnSpanFull(),
            $editorField,
            Forms\Components\Select::make('editor_type_id')
                ->autofocus()
                ->required()
                ->placeholder(__('Editor'))
                ->options([
                    Page::EDITOR_TYPE_RICHTEXT => __('Rich Text'),
                    Page::EDITOR_TYPE_MARKDOWN => __('Markdown'),
                    Page::EDITOR_TYPE_EDITORJS => __('EditorJS'),
                    Page::EDITOR_TYPE_GRAPEJS => __('GrapeJS'),
                ])
                ->native(false)
                ->hidden()
                ->default(Page::EDITOR_TYPE_RICHTEXT),
            Forms\Components\Select::make('status')
                ->autofocus()
                ->required()
                ->placeholder(__('Status'))
                ->options([
                    Page::STATUS_DRAFT => __('Draft'),
                    Page::STATUS_PUBLISHED => __('Published'),
                ])
                ->native(false)
                ->default('draft'),
            Forms\Components\BelongsToSelect::make('category_id')
                ->autofocus()
                ->required()
                ->placeholder(__('Category'))
                ->relationship('category', 'name')
                ->native(false)
                ->default(Category::first()->id),
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->withoutGlobalScopes([SoftDeletingScope::class]);
    }
}
