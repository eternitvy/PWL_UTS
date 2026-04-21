<?php

namespace App\Filament\Resources\Stoks\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class StoksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // Menampilkan Nama Supplier dari relasi
                TextColumn::make('supplier.supplier_nama')
                    ->label('Supplier')
                    ->sortable()
                    ->searchable(),

                // Menampilkan Nama Barang dari relasi
                TextColumn::make('barang.barang_nama')
                    ->label('Barang')
                    ->sortable()
                    ->searchable(),

                // Menampilkan Nama User dari relasi
                TextColumn::make('user.nama')
                    ->label('Petugas')
                    ->sortable(),

                TextColumn::make('stok_jumlah')
                    ->label('Jumlah')
                    ->alignCenter()
                    ->badge()
                    ->color('success'),

                TextColumn::make('stok_tanggal')
                    ->label('Tanggal')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                // Tambahkan filter jika diperlukan
            ]);
    }
}