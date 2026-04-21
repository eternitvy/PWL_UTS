<div style="padding: 15px; font-family: sans-serif;">
    <h3 style="margin-bottom: 15px; border-bottom: 1px solid; padding-bottom: 10px;">
        Rincian Belanja
    </h3>

    <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 14px;">
        <thead>
            <tr style="background-color: #323844;">
                <th style="padding: 8px; border: 1px solid;">Nama Barang</th>
                <th style="padding: 8px; border: 1px solid;">Harga</th>
                <th style="padding: 8px; border: 1px solid;">Jumlah</th>
                <th style="padding: 8px; border: 1px solid;">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($record->penjualan_detail as $item)
            <tr>
                <td style="padding: 8px; border: 1px solid;">
                    {{ $item->barang->barang_nama }}
                </td>
                <td style="padding: 8px; border: 1px solid;">
                    Rp {{ number_format($item->harga, 0, ',', '.') }}
                </td>
                <td style="padding: 8px; border: 1px solid;">
                    {{ $item->jumlah }}
                </td>
                <td style="padding: 8px; border: 1px solid;">
                    Rp {{ number_format($item->harga * $item->jumlah, 0, ',', '.') }}
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr style="font-weight: bold; background-color: #323844;">
                <td colspan="3" style="padding: 8px; border: 1px solid; text-align: right;">
                    Total Keseluruhan:
                </td>
                <td style="padding: 8px; border: 1px solid #ddd;">
                    Rp {{ number_format($record->penjualan_detail->sum(fn($d) => $d->harga * $d->jumlah), 0, ',', '.') }}
                </td>
            </tr>
        </tfoot>
    </table>
</div>