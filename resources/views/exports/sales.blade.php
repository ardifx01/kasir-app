<table>
    <thead>
        <tr>
            <th>No. Transaksi</th>
            <th>Tanggal</th>
            <th>Total Harga</th>
            <th>Produk</th>
            <th>Kuantitas</th>
            <th>Harga Per Item</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sales as $sale)
            @foreach($sale->items as $item)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->created_at->format('Y-m-d H:i') }}</td>
                    <td>{{ $sale->total_price }}</td>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price_per_item }}</td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>