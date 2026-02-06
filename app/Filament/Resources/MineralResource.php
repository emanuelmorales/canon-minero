<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MineralResource\Pages;
use App\Filament\Resources\MineralResource\RelationManagers;
use App\Models\Mineral;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MineralResource extends Resource
{
    protected static ?string $model = Mineral::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    // Pone el recurso bajo un grupo de navegación llamado "Datos Auxiliares"
    protected static ?string $navigationGroup = 'Datos Auxiliares';

    // label en el que aparece en el menú
    protected static ?string $navigationLabel = 'Minerales';

    // orden en el que aparece en el menú
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //codigo agregado
                Tables\Columns\TextColumn::make('index')
                    ->label('Nro')
                    ->sortable()
                    ->rowIndex() //inidica que sea el numero de fila y si se elimina un registro, se reordena automáticamente para que los numeros sean consecutivos
                    ->searchable(),
                //fin codigo agregado
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
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
            ->actions([
                Tables\Actions\EditAction::make(),
                // delete action agregado
                Tables\Actions\DeleteAction::make(),
                // fin delete action agregado
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListMinerals::route('/'),
            'create' => Pages\CreateMineral::route('/create'),
            'edit' => Pages\EditMineral::route('/{record}/edit'),
        ];
    }
}
