@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">
        Edit Data Produk
    </div>

    <div class="card-body">

        <form action="/product/{{ $updated_produk->id_product }}"
              method="POST">

            @method('PUT')
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text"
                    name="name_product"
                    class="form-control"
                    value="{{ old('name_product', $updated_produk->name_product) }}">

                @error('name_product')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Stok Produk</label>
                <input type="number"
                    name="stock_product"
                    class="form-control"
                    value="{{ old('stock_product', $updated_produk->stock_product) }}">

                @error('stock_product')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Harga Produk</label>
                <input type="number"
                    name="price_product"
                    class="form-control"
                    value="{{ old('price_product', $updated_produk->price_product) }}">

                @error('price_product')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi Produk</label>
                <textarea name="desc_product"
                    class="form-control"
                    rows="5">{{ old('desc_product', $updated_produk->desc_product) }}</textarea>

                @error('desc_product')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Update Data
            </button>

            <a href="/product" class="btn btn-secondary">
                Batal
            </a>

        </form>
    </div>
</div>

@endsection