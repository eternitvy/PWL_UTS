<div class="max-w-3xl mx-auto p-8 bg-white dark:bg-gray-900 shadow-xl rounded-2xl border border-gray-100 dark:border-gray-800">
    <div class="flex flex-col md:flex-row justify-between items-start mb-10 pb-8 border-b-2 border-dashed border-gray-200 dark:border-gray-700">
        <div>
            <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white tracking-tight">Rincian Belanja</h2>
            <div class="mt-2 inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400 uppercase tracking-widest">
                ID: {{ $record->penjualan_kode }}
            </div>
        </div>
        <div class="mt-6 md:mt-0 space-y-1 text-left md:text-right">
            <p class="text-sm text-gray-500 dark:text-gray-400">
                <span class="font-semibold text-gray-700 dark:text-gray-200">Pembeli:</span> {{ $record->pembeli }}
            </p>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                <span class="font-semibold text-gray-700 dark:text-gray-200">Tanggal:</span> {{ \Carbon\Carbon::parse($record->penjualan_tanggal)->format('d M Y, H:i') }}
            </p>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                <span class="font-semibold text-gray-700 dark:text-gray-200">Kasir:</span> {{ $record->user->name ?? $record->user->nama ?? '-' }}
            </p>
        </div>
    </div>

    <div class="overflow-hidden">
        <table class="w-full text-left border-separate border-spacing-y-2">
            <thead>
                <tr class="text-gray-400 text-xs uppercase tracking-widest font-bold">
                    <th class="px-4 py-3">Barang</th>
                    <th class="px-4 py-3 text-center">Harga</th>
                    <th class="px-4 py-3 text-center">Qty</th>
                    <th class="px-4 py-3 text-right">Total</th>
                </tr>
            </thead>
            <tbody class="text-sm">
                @foreach($record->penjualan_detail as $item)
                <tr class="bg-gray-50 dark:bg-gray-800/40 rounded-lg overflow-hidden group hover:bg-gray-100 dark:hover:bg-gray-800 transition-all">
                    <td class="px-4 py-4 font-semibold text-gray-800 dark:text-gray-100 rounded-l-xl">
                        {{ $item->barang->barang_nama ?? 'Barang tidak ditemukan' }}
                    </td>
                    <td class="px-4 py-4 text-center text-gray-600 dark:text-gray-400">
                        Rp {{ number_format($item->harga, 0, ',', '.') }}
                    </td>
                    <td class="px-4 py-4 text-center font-medium text-gray-800 dark:text-gray-200">
                        {{ $item->jumlah }}
                    </td>
                    <td class="px-4 py-4 text-right font-bold text-gray-900 dark:text-white rounded-r-xl">
                        Rp {{ number_format($item->harga * $item->jumlah, 0, ',', '.') }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-10 p-6 bg-gray-900 dark:bg-white rounded-2xl text-white dark:text-gray-900 shadow-lg">
        <div class="flex justify-between items-center">
            <span class="text-sm font-bold uppercase tracking-[0.2em] opacity-80">Total Keseluruhan</span>
            <span class="text-3xl font-black italic">
                Rp {{ number_format($record->penjualan_detail->sum(fn($d) => $d->harga * $d->jumlah), 0, ',', '.') }}
            </span>
        </div>
    </div>

    <div class="mt-10 text-center">
        <div class="inline-block px-6 py-2 border-t border-gray-100 dark:border-gray-800">
            <p class="text-sm text-gray-400 italic">Terima kasih telah melakukan transaksi di toko kami.</p>
        </div>
    </div>
</div>