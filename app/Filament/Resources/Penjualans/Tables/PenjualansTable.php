<?php

namespace App\Filament\Resources\Penjualans\Tables;

use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PenjualansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('penjualan_kode')->label('Kode')->searchable(),
                TextColumn::make('pembeli')->label('Pembeli'),
                TextColumn::make('user.name')->label('Kasir'),
                TextColumn::make('penjualan_tanggal')->label('Tanggal')->dateTime(),
                
                // Menghitung Total Harga secara otomatis
                TextColumn::make('total_harga')
                    ->label('Total Harga')
                    ->money('idr')
                    ->state(fn ($record) => $record->penjualan_detail->sum(fn($d) => $d->harga * $d->jumlah)),
            ])
            ->actions([
                ViewAction::make()
                    ->label('View Detail')
                    ->modalHeading('Rincian Belanja')
                    ->modalContent(fn ($record) => view('filament.resources.penjualan.view', [
                        'record' => $record,
                    ]))
                    ->modalSubmitAction(false),
            ]);
    }
}