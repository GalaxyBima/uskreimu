@extends('layouts.main')
@section('content')

    {{-- content area --}}
    <div class="container">
        <div class="content-wrapper">
            <div class="row">
                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                    <div class="row">
                        <div class="col-lg-12 d-flex flex-row">
                            <div class="row flex-grow">

                                {{-- table start --}}
                                <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                                    <div class="card-body d-flex flex-row gap-3 flex-wrap col-12">
                                        @foreach ($produks as $key => $produk)
                                            <div class="card" style="width: 14.5rem;">
                                                <td class="text-center">
                                                    <img src={{ Asset('storage/produk/' . $produk->foto) }} alt="not found"
                                                        style="width:100%; height:15rem; object-fit:cover;" />
                                                </td>
                                                <div class="card-body">
                                                    <h5 class="card-title text-center">
                                                        {{ $produk->nama_produk }}
                                                    </h5>
                                                    <p class="card-text">
                                                        <td>Rp.
                                                            {{ number_format($produk->harga, 0, ',', '.') }},00
                                                        </td>
                                                    </p>
                                                    <p class="card-text">
                                                        <td>Deskripsi: {{ $produk->desc }}</td>
                                                    </p>
                                                    <p class="card-text">
                                                        <td>Stok: {{ $produk->stok }}</td>
                                                    </p>
                                                    <button type="button" class="btn btn-warning btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#addToCart-{{ $produk->id }}">beli
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                {{-- end table --}}

                                {{-- Modal AddToCart --}}
                                @foreach ($produks as $produk)
                                    <div class="modal fade" id="addToCart-{{ $produk->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="addToCartModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="addToCartModalLabel">Tambah ke Keranjang
                                                    </h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span>&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('addToCart', $produk->id) }}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id_user"
                                                            value="{{ auth()->user()->id }}">
                                                        <input type="hidden" name="id_produk" value="{{ $produk->id }}">
                                                        <input type="hidden" name="harga" value="{{ $produk->harga }}">
                                                        <div class="form-group">
                                                            <label for="jumlah_produk">Mau Pesan Berapa!!</label>
                                                            <input type="number" id="jumlah_produk" class="form-control"
                                                                min="1" max="{{ $produk->stok }}"
                                                                name="jumlah_produk" value="1" required>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light-secondary"
                                                            data-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Batal</span>
                                                        </button>
                                                        <button type="submit" class="btn btn-warning ms-1">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Tambah</span>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{-- end ModalAddToCart --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end content area --}}
@endsection