@extends('layouts.main')
@section('content')
    
<!-- partial -->
<div class="container">
  <div class="content-wrapper">
    <div class="row">
      <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #B7950B; font-weight: bold" >
                    <div class="row">
                        <div class="col mt-3 ml-3" style="color: rgb(255, 255, 255)" >
                            Kategori
                        </div>
                        <div class="col d-flex justify-content-end">

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-secondary mt-2" data-toggle="modal"
                                data-target="#tambah">
                                Tambah
                            </button>
                    
                            <!-- Modal tambah-->
                            <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                                            <button type="button" class="btn-close" data-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="{{ route('kategori.store') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Kategori</label>
                                                    <input type="text" class="form-control" name="nama_kategori">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
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
                                <th>No</th>
                                <th class="text-center">Nama Kategori</th>
                                <th class="text-center">Akasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategoris as $key => $kategori)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td class="text-center">{{ $kategori->nama_kategori }}</td>
                                    <td class="text-center">
                                        
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger sm" data-toggle="modal"
                                            data-target="#delete-{{ $kategori->id }}">
                                            Delete
                                        </button>

                                        <!-- Modal Delete -->
                                        <div class="modal fade" id="delete-{{ $kategori->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus
                                                            {{ $kategori->nama_kategori }}</h5>
                                                        <button type="button" class="btn-close"
                                                            data-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body"> Apakah anda yakin menghapus
                                                        {{ $kategori->nama_kategori }}?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">No</button>
                                                            <form action="{{ route('kategori.destroy', $kategori->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-primary">Yes</a>
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
  <!-- content-wrapper ends -->
</div>
<!-- main-panel ends -->
</div>
@endsection
