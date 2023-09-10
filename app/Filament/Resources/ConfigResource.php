<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConfigResource\Pages;
use App\Filament\Resources\ConfigResource\RelationManagers;
use App\Models\Config;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Set;

class ConfigResource extends Resource
{
    protected static ?string $model = Config::class;

    protected static ?string $navigationIcon = 'heroicon-m-cog-6-tooth';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        $key = isset($form->model->key) ? $form->model->key : null;

        if($key === 'theme_color') {
            $keyValueField = Forms\Components\ColorPicker::make('value')
                ->columnSpan('full');
        }
        elseif($key === 'icon_image') {
            $keyValueField = Forms\Components\FileUpload::make('value')
                ->directory('configs/icon_images')
                ->disk('public')
                ->image()
                ->imageEditor()
                ->imageEditorAspectRatios(['1.1'])
                ->columnSpan('full');
        }
        elseif($key === 'logo_image') {
            $keyValueField = Forms\Components\FileUpload::make('value')
                ->directory('configs/logo_images')
                ->disk('public')
                ->image()
                ->imageEditor()
                ->columnSpan('full');
        }
        else {
            $keyValueField = Forms\Components\Textarea::make('value')
                ->maxLength(65535)
                ->columnSpan('full');
        }

        return $form->schema([
            Forms\Components\TextInput::make('key')
                ->required()
                ->maxLength(255)
                ->columnSpan('full'),
            $keyValueField,
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')->searchable(),
                Tables\Columns\TextColumn::make('value')
                    ->wrap()
                    ->limit(50)
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])])
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
            'index' => Pages\ListConfigs::route('/'),
            'create' => Pages\CreateConfig::route('/create'),
            'edit' => Pages\EditConfig::route('/{record}/edit'),
        ];
    }
}
