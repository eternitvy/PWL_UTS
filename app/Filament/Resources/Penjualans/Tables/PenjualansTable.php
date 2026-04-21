<?php

namespace App\Filament\Resources\Penjualans\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class PenjualansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('penjualan_kode')->label('Kode')->searchable(),
                TextColumn::make('pembeli')->label('Pembeli'),
        
                TextColumn::make('lihat_detail')
                    ->label('Aksi')
                    ->default('Lihat Detail')
                    ->color('primary')
                    ->weight('bold')
                    ->icon('heroicon-m-eye')
                    ->action(function ($record) {
                        return \Filament\Tables\Actions\ViewAction::make()
                            ->modalContent(view('filament.resources.penjualan.view', ['record' => $record]));
                    }),

                TextColumn::make('total_harga')
                    ->label('Total Harga')
                    ->money('idr')
                    ->state(fn ($record) => $record->penjualan_detail->sum(fn($d) => $d->harga * $d->jumlah)),
            ]);
    }
}