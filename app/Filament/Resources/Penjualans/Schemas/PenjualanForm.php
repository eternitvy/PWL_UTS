<?php

namespace App\Filament\Resources\Penjualans\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Set;

class PenjualanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Informasi Utama')
                ->schema([
                    Group::make([
                        TextInput::make('penjualan_kode')
                            ->label('Kode Penjualan')
                            ->default('PJN-' . date('YmdHis'))
                            ->required(),
                        DateTimePicker::make('penjualan_tanggal')
                            ->label('Tanggal')
                            ->default(now())
                            ->required(),
                        TextInput::make('pembeli')
                            ->label('Nama Pembeli')
                            ->required(),
                        Select::make('user_id')
                            ->label('Kasir')
                            ->relationship('user', 'nama')
                            ->required(),
                    ])->columns(2),
                ]),

            Section::make('Daftar Belanja')
                ->schema([
                    Repeater::make('penjualan_detail')
                        ->relationship() 
                        ->schema([
                    Select::make('barang_id')
                        ->relationship('barang', 'barang_nama')
                        ->label('Barang')
                        ->required()
                        ->searchable()
                        ->preload()
                        ->reactive() 
                       ->afterStateUpdated(function ($state, $set) { 
                            $barang = \App\Models\Barang::find($state);
                            
                            if ($barang) {
                                $set('harga', $barang->harga_jual); 
                            } else {
                                $set('harga', 0);
                            }
                        })
                        ->columnSpan(2),

                    TextInput::make('harga')
                        ->label('Harga Satuan')
                        ->numeric()
                        ->required()
                        ->prefix('Rp')
                        ->readOnly() 
                        ->columnSpan(1),
                            TextInput::make('jumlah')
                                ->label('Qty')
                                ->numeric()
                                ->default(1)
                                ->required()
                                ->columnSpan(1),
                        ])
                        ->columns(4)
                        ->defaultItems(1),
                ]),
        ]);
    }
}