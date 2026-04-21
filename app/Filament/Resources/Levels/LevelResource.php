<?php

namespace App\Filament\Resources;

use App\Models\Level;
use Filament\Resources\Resource;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class LevelResource extends Resource
{
    protected static ?string $model = Level::class;

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('level_kode')->required(),
            TextInput::make('level_nama')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('level_kode'),
            TextColumn::make('level_nama'),
        ]);
    }
}