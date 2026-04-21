<?php

namespace App\Filament\Resources;

use App\Models\Stok;
use Filament\Resources\Resource;

use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class StokResource extends Resource
{
    protected static ?string $model = Stok::class;

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
}