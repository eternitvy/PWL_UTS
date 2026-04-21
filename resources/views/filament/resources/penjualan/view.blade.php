<div class="p-6 bg-white dark:bg-gray-900 shadow-sm rounded-xl">
    <div class="flex flex-col md:flex-row justify-between mb-8 pb-6 border-b border-gray-100 dark:border-gray-800">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Detail Penjualan</h2>
            <p class="text-sm text-gray-500 mt-1 uppercase tracking-wider font-semibold">
                ID Transaksi: {{ $record->penjualan_kode }}
            </p>
        </div>
        <div class="mt-4 md:mt-0 md:text-right">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                <span class="font-medium">Pembeli:</span> {{ $record->pembeli }}
            </p>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                <span class="font-medium">Tanggal:</span> {{ \Carbon\Carbon::parse($record->penjualan_tanggal)->format('d F Y, H:i') }}
            </p>
            <p class="text-sm text-gray-600 dark:text-gray-400 uppercase">
                <span class="font-medium">Kasir:</span> {{ $record->user->name ?? $record->user->nama ?? '-' }}
            </p>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 dark:bg-gray-800/50 text-gray-700 dark:text-gray-300">
                    <th class="p-4 border-b border-gray-100 dark:border-gray-800 font-semibold">Nama Barang</th>
                    <th class="p-4 border-b border-gray-100 dark:border-gray-800 text-right font-semibold">Harga Satuan</th>
                    <th class="p-4 border-b border-gray-100 dark:border-gray-800 text-center font-semibold">Jumlah</th>
                    <th class="p-4 border-b border-gray-100 dark:border-gray-800 text-right font-semibold">Subtotal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                @foreach($record->penjualan_detail as $item)
                <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-800/30 transition-colors">
                    <td class="p-4 text-gray-800 dark:text-gray-200">
                        {{ $item->barang->barang_nama ?? 'Barang tidak ditemukan' }}
                    </td>
                    <td class="p-4 text-right text-gray-600 dark:text-gray-400">
                        Rp {{ number_format($item->harga, 0, ',', '.') }}
                    </td>
                    <td class="p-4 text-center font-medium text-gray-800 dark:text-gray-200">
                        {{ $item->jumlah }}
                    </td>
                    <td class="p-4 text-right font-semibold text-gray-900 dark:text-white">
                        Rp {{ number_format($item->harga * $item->jumlah, 0, ',', '.') }}
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="bg-primary-50/30 dark:bg-primary-900/10">
                    <td colspan="3" class="p-4 text-right font-bold text-gray-700 dark:text-gray-300 uppercase tracking-tight">
                        Total Keseluruhan
                    </td>
                    <td class="p-4 text-right text-xl font-black text-primary-600 dark:text-primary-400">
                        Rp {{ number_format($record->penjualan_detail->sum(fn($d) => $d->harga * $d->jumlah), 0, ',', '.') }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="mt-8 pt-4 border-t border-gray-100 dark:border-gray-800 text-center">
        <p class="text-xs text-gray-400 italic">Terima kasih telah melakukan transaksi.</p>
    </div>
</div>