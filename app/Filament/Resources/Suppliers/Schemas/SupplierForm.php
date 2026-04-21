<?php

namespace App\Filament\Resources\Suppliers\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;

class SupplierForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                Section::make('Informasi Supplier')
                    ->description('Lengkapi data supplier di bawah ini.') 
                    ->schema([
                        Group::make([
                            TextInput::make('supplier_nama')
                                ->label('Nama')
                                ->required(),
                            TextInput::make('supplier_kode')
                                ->label('Kode')
                                ->required()
                                ->unique(ignoreRecord: true),
                            TextInput::make('supplier_alamat')
                                ->label('Alamat')
                                ->required(),

                        ]),
                    ])
                    ->columnSpanFull()
            ]);
    }
}
