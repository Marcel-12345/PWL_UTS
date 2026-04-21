<?php

namespace App\Filament\Resources;

use App\Models\Kategori;
use Filament\Resources\Resource;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class KategoriResource extends Resource
{
    protected static ?string $model = Kategori::class;

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('kategori_kode')->required(),
            TextInput::make('kategori_nama')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('kategori_kode'),
            TextColumn::make('kategori_nama'),
        ]);
    }
}