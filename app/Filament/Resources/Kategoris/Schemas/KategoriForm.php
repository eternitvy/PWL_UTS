<?php

namespace App\Filament\Resources\Kategoris\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;

class KategoriForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                Section::make('Informasi Kategori')
                    ->description('Lengkapi data kategori di bawah ini.') 
                    ->schema([
                        Group::make([
                            TextInput::make('kategori_nama')
                                ->label('Nama')
                                ->required(),
                            TextInput::make('kategori_kode')
                                ->label('Kode')
                                ->required()
                                ->unique(ignoreRecord: true),
                        ])->columns(2),
                    ])
                    ->columnSpanFull()
            ]);
    }
}