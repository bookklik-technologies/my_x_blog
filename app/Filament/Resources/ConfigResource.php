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
use Filament\Forms\Get;

class ConfigResource extends Resource
{
    protected static ?string $model = Config::class;

    protected static ?string $navigationIcon = 'heroicon-m-cog-6-tooth';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('key')
                ->required()
                ->maxLength(255),
            Forms\Components\ColorPicker::make('value')->hidden(fn(Config $config) => $config->key !== 'theme_color'),
            Forms\Components\FileUpload::make('value')
                ->directory('configs/icon_images')
                ->disk('public')
                ->image()
                ->imageEditor()
                ->imageEditorAspectRatios(['1.1'])
                ->hidden(fn(Config $config) => $config->key !== 'icon_image'),
            Forms\Components\FileUpload::make('value')
                ->directory('configs/logo_images')
                ->disk('public')
                ->image()
                ->imageEditor()
                ->hidden(fn(Config $config) => $config->key !== 'logo_image'),
            Forms\Components\Textarea::make('value')
                ->maxLength(65535)
                ->hidden(
                    fn(Config $config) => $config->key === 'theme_color' || $config->key === 'icon_image' || $config->key === 'logo_image'
                ),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')->searchable(),
                Tables\Columns\TextColumn::make('value')->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
