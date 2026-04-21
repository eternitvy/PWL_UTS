<?php

namespace App\Filament\Resources\Stoks\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Group;

class StokForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Stok Barang')
                    ->description('Masukkan detail stok masuk di bawah ini.')
                    ->schema([
                        Group::make([
                            Select::make('supplier_id')
                                ->relationship('supplier', 'supplier_nama') 
                                ->label('Supplier')
                                ->required()
                                ->searchable()
                                ->preload(),
                            Select::make('barang_id')
                                ->relationship('barang', 'barang_nama')
                                ->label('Nama Barang')
                                ->required()
                                ->searchable()
                                ->preload(),
                            Select::make('user_id')
                                ->relationship('user', 'nama')
                                ->label('Petugas')
                                ->required()
                                ->searchable()
                                ->preload(),
                            DateTimePicker::make('stok_tanggal')
                                ->label('Tanggal Stok')
                                ->default(now())
                                ->required(),
                            TextInput::make('stok_jumlah')
                                ->label('Jumlah Stok')
                                ->numeric()
                                ->required()
                                ->columnSpanFull(),
                        ])->columns(2),
                    ])
                    ->columnSpanFull()
            ]);
    }
}