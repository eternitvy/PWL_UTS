<?php

namespace App\Filament\Resources\Levels\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;

class LevelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                Section::make('Informasi Level')
                    ->description('Lengkapi data Level di bawah ini.') 
                    ->schema([
                        Group::make([
                            TextInput::make('level_nama')
                                ->label('Nama')
                                ->required(),
                            TextInput::make('level_kode')
                                ->label('Kode')
                                ->required()
                                ->unique(ignoreRecord: true),
                        ])->columns(2),
                    ])
                    ->columnSpanFull()
            ]);
    }
}
