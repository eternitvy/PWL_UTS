<?php

namespace App\Observers;

use App\Models\Stok;
use App\Models\PenjualanDetail;

class PenjualanDetailObserver
{
    /**
     * Berjalan otomatis saat item penjualan baru disimpan.
     */
    public function created(PenjualanDetail $penjualanDetail): void
    {
        $stok = Stok::where('barang_id', $penjualanDetail->barang_id)->first();

        if ($stok) {
            $stok->decrement('stok_jumlah', $penjualanDetail->jumlah);
        }
    }

    /**
     * Berjalan otomatis jika item penjualan dihapus (opsional).
     */
    public function deleted(PenjualanDetail $penjualanDetail): void
    {
        $stok = Stok::where('barang_id', $penjualanDetail->barang_id)->first();

        if ($stok) {
            $stok->increment('stok_jumlah', $penjualanDetail->jumlah);
        }
    }
}