<?php

namespace App\Filament\Resources;

use App\Models\User;
use Filament\Resources\Resource;

use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    public static function form(Schema $form): Schema
    {
        return $form->schema([
            Select::make('level_id')
                ->relationship('level', 'level_nama')
                ->required(),

            TextInput::make('username')->required(),
            TextInput::make('nama')->required(),

            TextInput::make('password')
                ->password()
                ->required()
                ->dehydrateStateUsing(fn ($state) => bcrypt($state)),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('username'),
            TextColumn::make('nama'),
            TextColumn::make('level.level_nama'),
        ]);
    }
}