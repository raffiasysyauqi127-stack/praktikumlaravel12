@extends('layouts.master')

@section('content')

<h1>Detail Produk</h1>
<hr>

<div class="card">
    <div class="card-header">
        Detail Produk
    </div>

    <div class="card-body">
        <h5>{{ $detail_produk->name_product }}</h5>

        <ul class="list-group">
            <li class="list-group-item">
                Harga: Rp.
                {{ number_format($detail_produk->price_product, 0, ',', '.') }}
            </li>

            <li class="list-group-item">
                Stok: {{ $detail_produk->stock_product }} pcs
            </li>

            <li class="list-group-item">
                Deskripsi: {{ $detail_produk->desc_product }}
            </li>
        </ul>

        <a href="/product" class="btn btn-primary mt-3">
            Kembali ke Product
        </a>
    </div>
</div>

@endsection