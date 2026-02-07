<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PagoResource\Pages;
use App\Filament\Resources\PagoResource\RelationManagers;
use App\Models\Pago;
use Doctrine\DBAL\Schema\Column;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;

class PagoResource extends Resource
{
    protected static ?string $model = Pago::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    // Un número más bajo significa mayor prioridad (arriba)
    protected static ?int $navigationSort = 1;

    // Pone el recurso bajo un grupo de navegación llamado "Gestión de Pagos"
    // protected static ?string $navigationGroup = 'Gestión de Pagos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('fecha')
                    ->required(),
                Forms\Components\TextInput::make('expte')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('localidad_id')
                    ->label('Localidad')
                    // indica que se mostrara el campo nombre del modelo
                    ->relationship('localidad', 'nombre')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('mina_id')
                    ->label('Mina')
                    // indica que se mostrara el campo nombre del modelo estudiante
                    ->relationship('mina', 'nombre')
                    // habilita la busqueda en el select
                    ->searchable()
                    // carga previa de los datos para mejorar el rendimiento
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('mineral_id')
                    ->label('Mineral')
                    // indica que se mostrara el campo nombre del modelo estudiante
                    ->relationship('mineral', 'nombre')
                    // habilita la busqueda en el select
                    ->searchable()
                    // carga previa de los datos para mejorar el rendimiento
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('propietario_id')
                    ->label('Propietario')
                    // indica que se mostrara el campo nombre del modelo estudiante
                    ->relationship('propietario', 'nombre')
                    // habilita la busqueda en el select
                    ->searchable()
                    // carga previa de los datos para mejorar el rendimiento
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('categoria')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('pertenencia')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('superficie')
                    ->label('Superficie (Ha)')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('estado_exp_id')
                    ->label('Estado del Expediente')
                    // indica que se mostrara el campo nombre del modelo estudiante
                    ->relationship('estadoExp', 'nombre')
                    // habilita la busqueda en el select
                    ->searchable()
                    // carga previa de los datos para mejorar el rendimiento
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('anioPago')
                    ->label('Año de Pago')
                    ->required(),
                Forms\Components\TextInput::make('monto')
                    ->label('Monto ($)')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('detalle')
                    ->label('Detalle del Pago')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('archivo_adjunto')
                    ->label('Adjunto (PDF)')
                    ->directory('comprobantes-pagos') // Carpeta donde se guardarán en storage/app/public
                    // ->acceptedFileTypes(['application/pdf']) // Solo acepta PDF
                    // ->maxSize(2048) // 2MB en Kilobytes (2 * 1024)
                    ->acceptedFileTypes([
                        'application/pdf',
                        // Tipos para ZIP
                        // 'application/zip',
                        // 'application/x-zip-compressed',
                        // 'multipart/x-zip',
                        // Tipos para RAR
                        // 'application/vnd.rar',
                        // 'application/x-rar-compressed',
                        // 'application/x-rar',
                    ])
                    ->maxSize(51200) // 50MB
                    ->downloadable() // Permite descargar el archivo al editar
                    ->openable() // Permite abrirlo en una pestaña nueva
                    ->columnSpanFull(), // Opcional: Para que ocupe todo el ancho
            ])->columns(4);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->heading('Listado de Pagos de Canon Minero') // <--- Aquí va el título
            ->description('Gestiona aquí los registros de pagos.') // (Opcional) Subtítulo
            ->columns([
                //codigo agregado
                Tables\Columns\TextColumn::make('index')
                    ->label('Nro')
                    ->sortable()
                    ->rowIndex() //inidica que sea el numero de fila y si se elimina un registro, se reordena automáticamente para que los numeros sean consecutivos
                    // muestra en la tabla y permite ocultar la columna
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->sortable(),
                //fin codigo agregado

                Tables\Columns\TextColumn::make('fecha')
                    ->date('d/m/Y')
                    // muestra en la tabla y permite ocultar la columna
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('expte')
                    // muestra en la tabla y permite ocultar la columna
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->searchable(),
                Tables\Columns\TextColumn::make('localidad.nombre')
                    ->label('Localidad')
                    ->numeric()
                    // muestra en la tabla y permite ocultar la columna
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mina.nombre')
                    ->label('Mina')
                    ->numeric()
                    // muestra en la tabla y permite ocultar la columna
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mineral.nombre')
                    ->label('Mineral')
                    ->numeric()
                    ->hidden(true)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('propietario.nombre')
                    ->label('Propietario')
                    ->numeric()
                    // muestra en la tabla y permite ocultar la columna
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('categoria')
                    ->label('Categoría')
                    ->hidden(true)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pertenencia')
                    ->label('Pertenencia')
                    ->hidden(true)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('superficie')
                    ->label('Superficie Ha')
                    ->hidden(true)
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('estadoExp.nombre')
                    ->label('Estado Expte')
                    ->numeric()
                    // muestra en la tabla y permite ocultar la columna
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('anioPago')
                    ->label('Año Pago'),
                Tables\Columns\TextColumn::make('monto')
                    ->label('Monto $')
                    ->numeric()
                    // muestra en la tabla y permite ocultar la columna
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->searchable()
                    ->sortable()
                    ->money('ARS') // O 'USD', 'PEN', etc. (Opcional, para dar formato de moneda)
                    ->summarize(
                        Sum::make()
                            ->label('Total') // Etiqueta que aparecerá antes del número
                            ->money('ARS')   // Importante: Dale formato de moneda también al total
                    ),
                Tables\Columns\TextColumn::make('archivo_adjunto')
                    ->label('Archivo')
                    ->formatStateUsing(fn($state) => $state ? 'Ver' : 'Sin archivo')
                    ->icon(fn($state) => $state ? 'heroicon-m-paper-clip' : '')
                    ->color(fn($state) => $state ? 'primary' : 'gray')
                    ->url(fn($record) => $record->archivo_adjunto ? asset('storage/' . $record->archivo_adjunto) : null)
                    ->openUrlInNewTab(), // Abre el PDF en otra pestaña al hacer clic
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado')
                    ->dateTime('d/m/y H:i')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Modificado')
                    ->dateTime('d/m/y H:i')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            // agrega filtros por los campos definidos
            ->filters([
                SelectFilter::make('localidad')
                    ->relationship('localidad', 'nombre'),

                SelectFilter::make('propietario')
                    ->relationship('propietario', 'nombre'),

                SelectFilter::make('anioPago')
                    ->options([
                        '2023' => '2023',
                        '2024' => '2024',
                        '2025' => '2025',
                        '2026' => '2026',
                    ]),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
                Tables\Actions\EditAction::make()
                    ->iconButton() // <--- Esto elimina el texto y ajusta el estilo a solo ícono
                    ->tooltip('Editar'), // (Opcional) Muestra texto al pasar el mouse

                Tables\Actions\DeleteAction::make()
                    ->iconButton()
                    ->tooltip('Eliminar'),
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
            'index' => Pages\ListPagos::route('/'),
            'create' => Pages\CreatePago::route('/create'),
            'edit' => Pages\EditPago::route('/{record}/edit'),
        ];
    }
}
