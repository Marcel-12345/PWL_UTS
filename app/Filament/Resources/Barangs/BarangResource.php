<?php

namespace App\Filament\Resources;

use App\Models\Supplier;
use Filament\Resources\Resource;

use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class SupplierResource extends Resource
{
    protected static ?string $model = Supplier::class;

    public static function form(Schema $form): Schema
    {
        return $form->schema([
            TextInput::make('supplier_kode')->required(),
            TextInput::make('supplier_nama')->required(),
            TextInput::make('supplier_alamat')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('supplier_kode'),
            TextColumn::make('supplier_nama'),
            TextColumn::make('supplier_alamat'),
        ]);
    }
}