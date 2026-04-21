<?php

namespace App\Filament\Resources;

use App\Models\Penjualan;
use Filament\Resources\Resource;

use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class PenjualanResource extends Resource
{
    protected static ?string $model = Penjualan::class;

    public static function form(Schema $form): Schema
    {
        return $form->schema([
            TextInput::make('pembeli')->required(),

            Repeater::make('detail')
                ->relationship()
                ->schema([
                    Select::make('barang_id')
                        ->relationship('barang', 'barang_nama')
                        ->required(),

                    TextInput::make('harga')->numeric()->required(),
                    TextInput::make('jumlah')->numeric()->required(),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('penjualan_kode'),
            TextColumn::make('pembeli'),
            TextColumn::make('penjualan_tanggal'),
        ]);
    }
}