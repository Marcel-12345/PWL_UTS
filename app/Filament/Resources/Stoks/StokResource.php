<?php

namespace App\Filament\Resources\Stoks;

use App\Filament\Resources\Stoks\Pages\CreateStok;
use App\Filament\Resources\Stoks\Pages\EditStok;
use App\Filament\Resources\Stoks\Pages\ListStoks;
use App\Filament\Resources\Stoks\Schemas\StokForm;
use App\Filament\Resources\Stoks\Tables\StoksTable;
use App\Models\Stok;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Columns\TextColumn;

class StokResource extends Resource
{
    protected static ?string $model = Stok::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $form): Schema
    {
        return $form->schema([
            Select::make('supplier_id')->relationship('supplier', 'supplier_nama'),
            Select::make('barang_id')->relationship('barang', 'barang_nama'),
            Select::make('user_id')->relationship('user', 'nama'),

            DateTimePicker::make('stok_tanggal')->required(),
            TextInput::make('stok_jumlah')->numeric()->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('barang.barang_nama'),
            TextColumn::make('supplier.supplier_nama'),
            TextColumn::make('stok_jumlah'),
            TextColumn::make('stok_tanggal'),
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
            'index' => ListStoks::route('/'),
            'create' => CreateStok::route('/create'),
            'edit' => EditStok::route('/{record}/edit'),
        ];
    }
}
