@extends('layouts.main')
@section('content')

    <!-- partial -->
    <div class="container">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <div class="home-tab">
                        <div class="row justify-content-center">
                            <div class="tab-content tab-content-basic">
                                <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                    aria-labelledby="overview">

                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header" style="background-color: #B7950B ; font-weight: bold">
                                                <div class="row">
                                                    <div class="col mt-3 ml-3" style="color: rgb(255, 255, 255)">
                                                        Menu
                                                    </div>
                                                    <div class="col d-flex justify-content-end">

                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-secondary mt-2"
                                                            data-toggle="modal" data-target="#tambah">
                                                            Tambah Menu
                                                        </button>

                                                        <!-- Modal tambah-->
                                                        <div class="modal fade" id="tambah" tabindex="-1"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Tambah Menu</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <form method="POST"
                                                                        action="{{ route('produk.store') }}"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <label>Nama Produk</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="nama_produk">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="formFile"
                                                                                    class="form-label">Foto Produk</label>
                                                                                <input class="form-control" type="file"
                                                                                    id="formFile" name="foto">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <select name="id_kategori" id="">
                                                                                    @foreach ($kategoris as $kategori)
                                                                                        <option value="{{ $kategori->id }}">
                                                                                            {{ $kategori->nama_kategori }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Deskripsi</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="desc">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Harga</label>
                                                                                <input type="number" class="form-control"
                                                                                    name="harga">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Stok</label>
                                                                                <input type="number" class="form-control"
                                                                                    name="stok">
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Tutup</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Simpan</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end --}}

                                            {{-- Tabel --}}
                                            <div class="card-body">
                                                <table class="table table-bordered border-dark table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Nama Produk</th>
                                                            <th class="text-center">Gambar</th>
                                                            <th>Kategori</th>
                                                            <th>Deskripsi</th>
                                                            <th>Harga</th>
                                                            <th>Stok</th>
                                                            <th class="text-center">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($produks as $key => $produk)
                                                            <tr class="text-center">
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>{{ $produk->nama_produk }}</td>
                                                                <td class="text-center">
                                                                    <img width="100" height="75"
                                                                        src={{ Asset('storage/produk/' . $produk->foto) }}
                                                                        alt="not found" />
                                                                </td>
                                                                <td>{{ $produk->kategori->nama_kategori }}</td>
                                                                <td>{{ $produk->desc }}</td>
                                                                <td>{{ $produk->harga }}</td>
                                                                <td>{{ $produk->stok }}</td>
                                                                <td>
                                                                    <!-- Button trigger modal -->
                                                                    <button type="button" class="btn btn-navy ml-1"
                                                                        data-toggle="modal"
                                                                        data-target="#edit-{{ $produk->id }}">
                                                                        Edit
                                                                    </button>

                                                                    <!-- Modal edit-->
                                                                    <div class="modal fade" id="edit-{{ $produk->id }}"
                                                                        tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        id="exampleModalLabel">Rubah Menu
                                                                                        {{ $produk->name }}</h5>
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <form method="POST"
                                                                                    action="{{ route('produk.update', $produk->id) }}"
                                                                                    enctype="multipart/form-data">
                                                                                    @csrf
                                                                                    @method('put')
                                                                                    <div class="modal-body">
                                                                                        <div class="form-group">
                                                                                            <label>Produk</label>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                name="nama_produk"
                                                                                                value="{{ $produk->nama_produk }}">
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <label for="formFile"
                                                                                                class="form-label">Foto
                                                                                                Produk</label>
                                                                                            <input class="form-control"
                                                                                                type="file"
                                                                                                id="formFile"
                                                                                                name="foto">
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <select name="id_kategori"
                                                                                                id="id_kategori">
                                                                                                @foreach ($kategoris as $kategori)
                                                                                                    <option
                                                                                                        value="{{ $kategori->id }}">
                                                                                                        {{ $kategori->nama_kategori }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label>Deskripsi</label>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                name="desc"
                                                                                                value="{{ $produk->desc }}">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label>Harga</label>
                                                                                            <input type="number"
                                                                                                class="form-control"
                                                                                                name="harga"
                                                                                                value="{{ $produk->harga }}">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label>Stok</label>
                                                                                            <input type="number"
                                                                                                class="form-control"
                                                                                                name="stok"
                                                                                                value="{{ $produk->stok }}">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button"
                                                                                            class="btn btn-secondary"
                                                                                            data-dismiss="modal">Tutup</button>
                                                                                        <button type="submit"
                                                                                            class="btn btn-primary">Simpan</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{-- end --}}


                                                                    <!-- Button trigger modal -->
                                                                    <button type="button" class="btn btn-danger ml-1"
                                                                        data-toggle="modal"
                                                                        data-target="#delete-{{ $produk->id }}">
                                                                        Delete
                                                                    </button>

                                                                    <!-- Modal Delete -->
                                                                    <div class="modal fade"
                                                                        id="delete-{{ $produk->id }}" tabindex="-1"
                                                                        aria-labelledby="exampleModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        id="exampleModalLabel">Hapus Menu
                                                                                        {{ $produk->name }}</h5>
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body"> Apakah anda yakin
                                                                                    menghapus
                                                                                    {{ $produk->name }}?
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-dismiss="modal">No</button>
                                                                                    <form
                                                                                        action="{{ route('produk.destroy', $produk->id) }}"
                                                                                        method="post">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        <button type="submit"
                                                                                            class="btn btn-primary">Yes</a>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- main-panel ends -->
    </div>
@endsection
