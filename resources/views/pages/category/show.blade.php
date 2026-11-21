@extends('layouts.master')

@section('content')

<h1>Daftar Kategori</h1>
<hr>

@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<div class="card">
    <div class="card-header">
        Kategori Kami
    </div>

    <div class="card-body">

        <table class="table table-striped table-bordered">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($kategori as $item)

                <tr>
                    <th>
                        {{ ($kategori->perPage() *
                        ($kategori->currentPage()-1)) +
                        $loop->iteration }}
                    </th>

                    <td>{{ $item->category_name }}</td>

                    <td>{{ $item->description }}</td>

                    <td>
                        <button class="btn btn-warning">
                            Edit
                        </button>

                        <button class="btn btn-danger">
                            Hapus
                        </button>
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="4" class="text-center">
                        Data yang anda cari tidak ada
                    </td>
                </tr>
                @endforelse

            </tbody>

        </table>

        {{ $kategori->links('pagination::bootstrap-5') }}

        Halaman : {{ $kategori->currentPage() }} <br>
        Jumlah Data : {{ $kategori->total() }} <br>
        Data Per Halaman : {{ $kategori->perPage() }}

    </div>
</div>

@endsection