@extends('layouts.main')
@section('content')
    <!-- main content area start -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="home-tab">
                        <div class="tab-content tab-content-basic">
                            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                                <div class="row">
                                    <div class="col-lg-12 d-flex flex-row">
                                        <div class="row flex-grow">
                                            <div class="main-content">
                                                <div class="main-content-inner">
                                                    <div class="row">
                                                        <div class="col-lg-12 mt-5">
                                                            <div class="card" style="width:70rem">
                                                                <div class="card-body">
                                                                    <div class="invoice-area">
                                                                        <div class="row align-items-center">
                                                                            <div class="col-md-6">
                                                                                <div class="invoice-address">
                                                                                    <h3>Checkout</h3>
                                                                                    <h5>{{ auth()->user()->nama }}</h5>
                                                                                    <p>{{ auth()->user()->email }}</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 text-md-right">
                                                                                <ul class="invoice-date">
                                                                                    <li>{{ $invoice }}</li>
                                                                                    <li>{{ now()->format('d F Y') }}</li>                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                        <div class="invoice-table table-responsive mt-5">
                                                                            <table
                                                                                class="table table-bordered table-hover text-right">
                                                                                <thead>
                                                                                    <tr class="text-capitalize text-center">
                                                                                        <th scope="col">Produk</th>
                                                                                        <th scope="col">Harga</th>
                                                                                        <th scope="col">Jumlah Barang</th>
                                                                                        <th scope="col">Total Harga</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @foreach ($selectedProducts as $selectedProduct)
                                                                                        <tr>
                                                                                            <td style="vertical-align: middle;">
                                                                                                {{ $selectedProduct->produk->nama_produk }}
                                                                                            </td>
                                                                                            <td style="vertical-align: middle;">
                                                                                                Rp.{{ number_format($selectedProduct->produk->harga, 0, ',', '.') }},00
                                                                                            </td>
                                                                                            <td style="vertical-align: middle;">
                                                                                                {{ $selectedProduct->jumlah_produk }}
                                                                                            </td>
                                                                                            <td style="vertical-align: middle;">
                                                                                                Rp.{{ number_format($selectedProduct->total_harga, 0, ',', '.') }},00
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endforeach
                                                                                </tbody>
                                                                                <tfoot>
                                                                                    <tr>
                                                                                        <td colspan="3">Total Harga :</td>
                                                                                        <td>Rp.{{ number_format($totalHarga, 0, ',', '.') }},00
                                                                                        </td>
                                                                                    </tr>
                                                                                </tfoot>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <div class="text-right mt-3">
                                                                        <button type="button" id="printInvoiceBtn" class="btn btn-warning col-2 btn-lg">Cetak</button>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main content area end -->


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var printBtn = document.getElementById('printInvoiceBtn');
    
            printBtn.addEventListener('click', function() {
                window.location.href = "{{ route('cetak.transaksi') }}"; // Perbaikan disini
            });
        });
    </script>
@endsection
