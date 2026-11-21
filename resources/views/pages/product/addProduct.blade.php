@extends('layouts.master')

@section('content')

<h1>Tambah Produk</h1>
<hr>

<div class="card">
    <div class="card-header">
        Form Tambah Produk
    </div>

    <div class="card-body">

        <form action="/product" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text"
                    name="name_product"
                    class="form-control"
                    placeholder="Masukkan nama produk"
                    value="{{ old('name_product') }}">

                @error('name_product')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Stok Produk</label>
                <input type="number"
                    name="stock_product"
                    class="form-control"
                    placeholder="Masukkan stok"
                    value="{{ old('stock_product') }}">

                @error('stock_product')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Harga Produk</label>
                <input type="number"
                    name="price_product"
                    class="form-control"
                    placeholder="Masukkan harga"
                    value="{{ old('price_product') }}">

                @error('price_product')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi Produk</label>
                <textarea
                    name="desc_product"
                    class="form-control"
                    placeholder="Masukkan deskripsi">{{ old('desc_product') }}</textarea>

                @error('desc_product')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Tambah Data
            </button>

            <a href="/product" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>

@endsection
