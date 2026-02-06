<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PropietarioResource\Pages;
use App\Filament\Resources\PropietarioResource\RelationManagers;
use App\Models\Propietario;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PropietarioResource extends Resource
{
    protected static ?string $model = Propietario::class;

    //modificar el ícono del menu desde el sitio https://heroicons.com/
    protected static ?string $navigationIcon = 'heroicon-o-user';

    // Pone el recurso bajo un grupo de navegación llamado "Datos Auxiliares"
    protected static ?string $navigationGroup = 'Datos Auxiliares';

    // orden en el que aparece en el menú
    protected static ?int $navigationSort = 7;

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
            'index' => Pages\ListPropietarios::route('/'),
            'create' => Pages\CreatePropietario::route('/create'),
            'edit' => Pages\EditPropietario::route('/{record}/edit'),
        ];
    }
}
