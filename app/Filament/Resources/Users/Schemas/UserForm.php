<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi User')
                    ->description('Lengkapi data user di bawah ini.') 
                    ->schema([
                        Group::make([
                            Select::make('level_id')
                                ->relationship('level', 'level_nama')
                                ->label('Nama Level')
                                ->required()
                                ->searchable()
                                ->preload()
                                ->columnSpanFull(), 

                            TextInput::make('nama')
                                ->label('Nama')
                                ->required(),

                            TextInput::make('username')
                                ->label('Username')
                                ->required(),

                            TextInput::make('email')
                                ->label('Email')
                                ->required()
                                ->unique(ignoreRecord:true),

                            TextInput::make('password')
                                ->label('Password')
                                ->password()
                                ->required(fn (string $context): bool => $context === 'create'),
                        ])->columns(2),
                    ])
                    ->columnSpanFull()
            ]);
    }
}