@extends('layouts.main')

@section('content')
    <!-- main content area start -->
    <div class="container">
        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
            <div class="col-lg-12 d-flex flex-row">
                <div class="main-content-inner" style="overflow-x: auto;">
                    <!-- sales report area start -->
                    <div class="sales-report-area sales-style-two">
                        <div class="row">
                            <!-- data table start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Riwayat Transaksi</h4>
                                        <div class="data-tables">
                                            <table id="table1" class="table table-bordered table-hover">
                                                <thead class="bg-light text-capitalize">
                                                    <tr>
                                                        <th class="col-1">No.</th>
                                                        <th>Produk</th>
                                                        <th>Harga</th>
                                                        <th>Kuantitas</th>
                                                        <th>Tanggal</th>
                                                        <th>Total harga</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($transaksis as $i => $transaksi)
                                                        <tr>
                                                            <td>{{ $i + 1 }}</td>
                                                            <td>{{ $transaksi->produk->nama_produk }}</td>
                                                            <td>{{ $transaksi->harga }}</td>
                                                            <td>{{ $transaksi->kuantitas }}</td>
                                                            <td>{{ $transaksi->tgl_transaksi }}</td>
                                                            <td>Rp. {{ number_format($transaksi->total_harga, 0, ',', '.') }},00</td>
                                                            <td>{{ $transaksi->status }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="text-right mt-3">
                                                <a href="{{ route('cetak.transaksi') }}" class="btn btn-warning col-2 btn-sm">Cetak</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- data table end -->
                        </div>
                    </div>
                    <!-- sales report area end -->
                </div>
            </div>
        </div>
    </div>
    <!-- main content area end -->
@endsection
