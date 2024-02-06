@extends('layouts.main')

@section('content')
    <!-- main content area start -->
    <div class="content-wrapper">
        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
            <div class="col-lg-12 d-flex flex-row">
                <div class="main-content-inner">
                    <!-- sales report area start -->
                    <div class="sales-report-area sales-style-two">
                        <div class="row">
                            <!-- data table start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Tarik Tunai</h4>
                                        <div class="data-tables">
                                            {{-- <table id="table1" class="table table-bordered table-hover">
                                                <thead class="bg-light text-capitalize">
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Customer</th>
                                                        <th>Rekening</th>
                                                        <th>Nominal</th>
                                                        <th>Kode Unik</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($withdrawals as $i => $withdrawal)
                                                        <tr>
                                                            <td>{{ $i + 1 }}</td>
                                                            <td>{{ $withdrawal->wallet->user->nama }}</td>
                                                            <td>{{ $withdrawal->rekening }}</td>
                                                            <td>Rp.
                                                                {{ number_format($withdrawal->nominal, 0, ',', '.') }},00
                                                            </td>
                                                            <td>{{ $withdrawal->kode_unik }}</td>
                                                            <td>{{ $withdrawal->status }}</td>
                                                            <td class="col-2">
                                                                @if ($withdrawal->status === 'menunggu')
                                                                    <form
                                                                        action="{{ route('konfirmasi.withdrawal', $withdrawal->id) }}"
                                                                        method="post" style="display: inline;">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button type="submit"
                                                                            class="btn btn-warning btn-sm">Konfirmasi</button>
                                                                    </form>

                                                                    <form
                                                                        action="{{ route('tolak.withdrawal', $withdrawal->id) }}"
                                                                        method="post" style="display: inline;">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button type="submit"
                                                                            class="btn btn-danger btn-sm">Tolak</button>
                                                                    </form>
                                                                @elseif($withdrawal->status === 'dikonfirmasi')
                                                                    <button type="submit"
                                                                        class="btn btn-success btn-sm col-12">{{ $withdrawal->status }}</button>
                                                                @else
                                                                    <button type="submit"
                                                                        class="btn btn-danger btn-sm col-12">{{ $withdrawal->status }}</button>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table> --}}

                                            {{-- withdrawal user --}}
                                            <form action="{{ route('withdrawal.request') }}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input id="rekening" name="rekening" type="text" placeholder="Nomor Rekening" class="form-control"
                                                            required>
                                                    </div>
                            
                                                    <div class="form-group">
                                                        <input type="text" id="nominal" class="form-control" placeholder="Nominal" name="nominal"
                                                            required>
                                                    </div>
                            
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-warning btn-sm">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Tarik Tunai</span>
                                                    </button>
                                                </div>
                                            </form>
                                            {{-- end --}}
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