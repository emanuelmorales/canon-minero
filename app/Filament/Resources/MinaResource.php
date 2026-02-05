<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MinaResource\Pages;
use App\Filament\Resources\MinaResource\RelationManagers;
use App\Models\Mina;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class MinaResource extends Resource
{
    protected static ?string $model = Mina::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('grupominero_id')
                    ->label('Grupo Minero')
                    // indica que se mostrara el campo nombre del modelo estudiante
                    ->relationship('GrupoMinero', 'nombre')
                    // habilita la busqueda en el select
                    ->default(1)
                    ->searchable()
                    // carga previa de los datos para mejorar el rendimiento
                    ->preload()
                    ->required(),

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
                Tables\Columns\TextColumn::make('grupominero.nombre') // hacemos referencia al campo nombre del modelo grupominero
                    ->label('Grupo Minero')
                    ->numeric()
                    ->numeric()
                    ->sortable(),
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
                // eliminar individual
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListMinas::route('/'),
            'create' => Pages\CreateMina::route('/create'),
            'edit' => Pages\EditMina::route('/{record}/edit'),
        ];
    }
}
