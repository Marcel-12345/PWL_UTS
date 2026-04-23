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
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;


class PenjualanDetailResource extends Resource
{
    protected static ?string $model = \App\Models\PenjualanDetail::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $form): Schema
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPenjualanDetails::route('/'),
            'create' => CreatePenjualanDetail::route('/create'),
            'edit' => EditPenjualanDetail::route('/{record}/edit'),
        ];
    }

    
}

