@extends('layouts.main')
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                    <div class="col-lg-12 d-flex flex-row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="seo-fact sbg1">
                                    <div class="p-4 d-flex justify-content-between align-items-center mb-3">
                                        <div class="seofct-icon">
                                            <h2><i class="menu-icon mdi mdi-coin"></i>
                                                Saldo</h2>
                                        </div>
                                        <h2>Rp.
                                            {{ number_format($wallet->saldo, 0, ',', '.') }},00
                                        </h2>
                                    </div>
                                    <div class="float-right">
                                        <button type="button" class="btn btn-warning my-3 mr-3" data-toggle="modal"
                                            data-target="#topupModal"><i class="menu-icon mdi mdi-database-plus"></i>
                                            Top Up</button>

                                        <button type="button" class="btn btn-warning my-3 mr-3" data-toggle="modal"
                                            data-target="#tariktunaiModal"><i class="menu-icon mdi mdi-exit-to-app"></i>
                                            Tarik Tunai</button>
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
    {{-- modal topup --}}
    <div class="modal fade" id="topupModal" tabindex="-1" role="dialog" aria-labelledby="topupModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="topupModalLabel">Top Up</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <form action="{{ route('topup.request') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="rekening">Rekening</label>
                            <input id="rekening" name="rekening" type="text" placeholder="" class="form-control"
                                required value="{{ $wallet->rekening }}">
                        </div>

                        <div class="form-group">
                            <label for="nominal">Mau Topup Berapa!!!</label>
                            <input type="text" id="nominal" class="form-control" placeholder="" name="nominal"
                                required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-warning" data-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Batal</span>
                        </button>
                        <button type="submit" class="btn btn-warning ms-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Top Up</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end Topup --}}

    {{-- modal tarik tunai --}}
    <div class="modal fade" id="tariktunaiModal" tabindex="-1" role="dialog" aria-labelledby="tariktunaiModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="tariktunaiModalLabel">Tarik Tunai</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <form action="{{ route('withdrawal.request') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input id="rekening" name="rekening" type="hidden" placeholder="" class="form-control"
                                required value="{{ $wallet->rekening }}">
                        </div>

                        <div class="form-group">
                            <label for="nominal">Mau Tarik Berapa!!!</label>
                            <input type="text" id="nominal" class="form-control" placeholder="" name="nominal"
                                required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-warning" data-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Batal</span>
                        </button>
                        <button type="submit" class="btn btn-warning ms-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Tarik Tunai</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end Tatik tunai --}}
@endsection
