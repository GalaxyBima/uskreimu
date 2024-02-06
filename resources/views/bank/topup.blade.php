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
                                        <h4 class="header-title">Topup</h4>
                                        <div class="data-tables">
                                            
                                            {{-- Topupin User --}}
                                            <form action="{{ route('topup.request') }}" method="post">
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
                                                        <span class="d-none d-sm-block">Topup</span>
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
    </div>
    <!-- main content area end -->
@endsection