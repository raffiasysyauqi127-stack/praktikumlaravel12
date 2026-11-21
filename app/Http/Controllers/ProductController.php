<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $data_toko = [
            'nama_toko' => 'Tulis Nama Kamu',
            'alamat_toko' => 'Jl. Terus Jadian Kagak',
            'status_toko' => 'Belum Pasti'
        ];

        $data_product = Product::orderBy('id_product', 'desc')->paginate(10);

        return view('pages.product.show', [
            'data_toko' => $data_toko,
            'data_produk' => $data_product,
        ]);
    }

    public function addProduct()
    {
        return view('pages.product.addProduct');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_product' => 'required|min:4|max:20',
            'stock_product' => 'required|integer|min:0',
            'price_product' => 'required|integer|min:0',
            'desc_product' => 'required',
        ], [
            'name_product.required' => 'Nama produk wajib diisi.',
            'name_product.min' => 'Nama produk minimal 4 karakter.',
            'name_product.max' => 'Nama produk maksimal 20 karakter.',
            'stock_product.required' => 'Stok produk wajib diisi.',
            'stock_product.integer' => 'Stok produk harus berupa angka bulat.',
            'stock_product.min' => 'Stok produk tidak boleh kurang dari 0.',
            'price_product.required' => 'Harga produk wajib diisi.',
            'price_product.integer' => 'Harga produk harus berupa angka bulat.',
            'price_product.min' => 'Harga produk tidak boleh kurang dari 0.',
            'desc_product.required' => 'Deskripsi produk wajib diisi.',
        ]);

        Product::create([
            'name_product' => $request->name_product,
            'stock_product' => $request->stock_product,
            'price_product' => $request->price_product,
            'desc_product' => $request->desc_product,
            'id_category' => rand(1, 3),
        ]);

        return redirect('/product')->with(
            'message',
            'Data Berhasil Ditambahkan'
        );
    }

    // Menampilkan detail produk
public function show($id)
{
    $produk_detail = Product::findOrFail($id);

    return view('pages.product.detail', [
        'detail_produk' => $produk_detail
    ]);
}

// Menampilkan form edit
public function edit($id)
{
    $data_product = Product::findOrFail($id);

    return view('pages.product.editProduct', [
        'updated_produk' => $data_product
    ]);
}

// Menyimpan perubahan produk
public function update($id, Request $request)
{
    $request->validate([
        'name_product' => 'required|min:4|max:20',
        'stock_product' => 'required|integer|min:0',
        'price_product' => 'required|integer|min:0',
        'desc_product' => 'required',
    ]);

    Product::findOrFail($id)->update([
        'name_product' => $request->name_product,
        'stock_product' => $request->stock_product,
        'price_product' => $request->price_product,
        'desc_product' => $request->desc_product,
    ]);

    return redirect('/product')
        ->with('message', 'Data Berhasil Diupdate');
}

// Menghapus produk
public function destroy($id)
{
    Product::findOrFail($id)->delete();

    return redirect('/product')
        ->with('message', 'Data Berhasil Dihapus');
}
}
