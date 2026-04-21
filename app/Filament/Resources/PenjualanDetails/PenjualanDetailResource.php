<?php

namespace App\Filament\Resources\PenjualanDetails;

use App\Filament\Resources\PenjualanDetails\Pages\CreatePenjualanDetail;
use App\Filament\Resources\PenjualanDetails\Pages\EditPenjualanDetail;
use App\Filament\Resources\PenjualanDetails\Pages\ListPenjualanDetails;
use App\Filament\Resources\PenjualanDetails\Schemas\PenjualanDetailForm;
use App\Filament\Resources\PenjualanDetails\Tables\PenjualanDetailsTable;
use App\Models\PenjualanDetail;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class PenjualanDetailResource extends Resource
{
    protected static ?string $model = \App\Models\PenjualanDetail::class;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('penjualan_id')
                ->relationship('penjualan', 'penjualan_kode'),

            Select::make('barang_id')
                ->relationship('barang', 'barang_nama'),

            TextInput::make('harga')->numeric(),
            TextInput::make('jumlah')->numeric(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('penjualan.penjualan_kode'),
            TextColumn::make('barang.barang_nama'),
            TextColumn::make('jumlah'),
        ]);
    }
}