@extends('layouts.main')
@section('content')
    {{-- conntent --}}

    <div class="container">
        <div class="content-wrapper">
            <div class="row">
                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                    <div class="col-lg-12 d-flex flex-row">
                        <div class="row flex-grow">
                            <div class="row">
                                <div class="card" style="width:70rem">
                                    <div class="card-body">
                                        <div class="single-table">
                                            <div class="table-responsive">
                                                <table class="table text-center">
                                                    <thead class="text-uppercase bg-dark">
                                                        <tr class="text-white">
                                                            <th scope="col">Gambar</th>
                                                            <th scope="col">Produk</th>
                                                            <th scope="col">Harga</th>
                                                            <th scope="col">Qty</th>
                                                            <th scope="col">Total Harga </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($keranjangs as $keranjang)
                                                            <tr class="text-center">
                                                                <td style="vertical-align: middle;">
                                                                    <img width="100px"
                                                                        src="{{ asset('storage/produk/' . $keranjang->produk->foto) }}"
                                                                        alt="">
                                                                </td>
                                                                <td style="vertical-align: middle;">
                                                                    {{ $keranjang->produk->nama_produk }}
                                                                </td>
                                                                <td style="vertical-align: middle;">
                                                                    Rp.{{ number_format($keranjang->produk->harga, 0, ',', '.') }},00
                                                                </td>
                                                                <td style="vertical-align: middle;">
                                                                    {{ $keranjang->jumlah_produk }}
                                                                </td>
                                                                <td style="vertical-align: middle;">
                                                                    Rp.{{ number_format($keranjang->total_harga, 0, ',', '.') }},00
                                                                </td>
                                                                <td style="vertical-align: middle;">
                                                                    <!-- Change the form method to DELETE -->
                                                                    <form
                                                                        action="{{ route('keranjang.destroy', $keranjang->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            style="background: transparent; border: none; padding: 0;"
                                                                            onclick="return confirm('Anda yakin ingin menghapus produk ini?')">
                                                                            <a href=""><i class="menu-icon mdi mdi-delete"></i></a>
                                                                        </button>
                                                                    </form>

                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr class="font-weight-bold">
                                                            <td colspan="4" class="text-right">TOTAL HARGA :</td>
                                                            <td>Rp.{{ number_format($totalHarga, 0, ',', '.') }},00
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>

                                            </div>
                                        </div>
                                        <div class="text-right mt-3">
                                            <form action="{{ route('checkout') }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-warning col-2">Beli</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    <!-- main content area end -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkoutForm = document.getElementById('checkoutForm');
            const submitButton = document.getElementById('submitButton');

            submitButton.addEventListener('click', function() {
                // Lakukan submit form secara manual
                checkoutForm.submit();
            });
        });
    </script>
    {{-- end --}}
@endsection
