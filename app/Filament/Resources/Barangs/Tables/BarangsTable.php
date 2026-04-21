<?php

namespace App\Filament\Resources\Barangs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class BarangsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image') 
                    ->label('Foto')
                    ->disk('public')
                    ->square(),
                TextColumn::make('kategori.kategori_nama')
                ->label('Kategori'), 
                TextColumn::make('barang_kode')
                ->label('Kode'),
                TextColumn::make('barang_nama')
                ->label('Nama'),
                TextColumn::make('harga_beli')
                ->label('Harga Beli'),
                TextColumn::make('harga_jual')
                ->label('Harga Jual'),
                
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
