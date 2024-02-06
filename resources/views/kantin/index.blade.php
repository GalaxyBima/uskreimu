@extends('layouts.main')
@section('content')
    
<!-- partial -->
<div class="container">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-sm-12">
        <div class="home-tab">
          <div class="tab-content tab-content-basic">
            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
              <div class="row">
                <div class="col-lg-12 d-flex flex-row">
                  <div class="row flex-grow">
                    <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                      {{-- <div class="card card-rounded"> --}}
                        <div class="card-body d-flex flex-row gap-3 flex-wrap col-12">

                          @foreach($produks as $key => $produk)
                          <div class="card" style="width: 16rem;">
                            <td class="text-center">
                              <img src={{ Asset('storage/produk/' . $produk->foto) }}
                                alt="not found" style="width:100%; height:15rem; object-fit:cover;"/>
                              </td>
                            <div class="card-body">
                              <h5 class="card-title text-center">
                                {{ $produk->nama_produk }}
                              </h5>                              
                              <p class="card-text">
                                <td>Rp. {{ number_format($produk->harga, 0, ',', '.') }},00</td>
                              </p>
                              <p class="card-text">
                                <td>Stok: {{ $produk->stok }}</td>
                              </p>

                              {{-- Button modal --}}
                              <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#detail{{ $produk->id }}">
                                Detail
                              </button>
                            </div>
                          </div>
                          @endforeach              

                          @foreach ($produks as $produk)
                          
                         
                          {{-- Modal --}}
                          <div class="modal fade" id="detail{{ $produk->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Detail</h1>
                                  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="card" style="width: 100%;">                                  
                                  <td class="text-center">
                                    <img src={{ Asset('storage/produk/' . $produk->foto) }}
                                      alt="not found" style="width:100%; height:15rem; object-fit:cover;"/>
                                    </td>
                                    <p class="cart-text text-center">
                                      <td>{{ $produk->nama_produk }}</td>
                                    </p>
                                    <div class="card-body">
                                    <p class="card-text">
                                      <td>Rp. {{ number_format($produk->harga, 0, ',', '.') }},00</td>
                                    </p>                                    
                                    <p class="card-text">
                                      <td>Kategori: {{ $produk->kategoris }}</td>
                                    </p>
                                    <p class="card-text">
                                      <td>Deskripsi: {{ $produk->desc }}</td>
                                    </p>
                                    <p class="card-text">
                                      <td>Stok: {{ $produk->stok }}</td>
                                    </p>
                                  </div>
                                  </div>
                                </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          {{-- End --}}                               
                          @endforeach
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
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
  <!-- partial -->
</div>
<!-- main-panel ends -->
</div>
@endsection
