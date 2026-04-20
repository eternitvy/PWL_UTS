<?php

namespace App\Filament\Resources\Barangs\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Actions\Action;

class BarangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Wizard::make([
                    Step::make('Info Barang')
                        ->icon('heroicon-o-information-circle')
                        ->description('Isi Informasi Barang')
                        ->schema([
                            Group::make([
                                Group::make([
                                    Select::make('kategori_id')
                                        ->relationship('kategori', 'kategori_nama')
                                        ->label('Nama Kategori')
                                        ->required()
                                        ->searchable()
                                        ->preload(),

                                    TextInput::make('barang_nama')
                                        ->label('Nama Barang')
                                        ->required(),

                                    TextInput::make('barang_kode')
                                        ->label('Kode Barang')
                                        ->required(),
                                ])->columnSpan(1),
                                Group::make([
                                    FileUpload::make('image')
                                        ->label('Foto Barang')
                                        ->image()
                                        ->directory('barang-images'),
                                ])->columnSpan(1),
                            ])->columns(2),
                        ]),

                    Step::make('Harga')
                        ->icon('heroicon-o-currency-dollar')
                        ->description('Isi Harga Produk')
                        ->schema([
                            Group::make([
                                TextInput::make('harga_beli')
                                    ->label('Harga Beli')
                                    ->numeric()
                                    ->prefix('Rp')
                                    ->required(),
                                TextInput::make('harga_jual')
                                    ->label('Harga Jual')
                                    ->numeric()
                                    ->prefix('Rp')
                                    ->required(),
                            ])->columns(2),
                        ]),
                ])
                ->columnSpanFull()
            ]);
    }
}