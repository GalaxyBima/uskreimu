<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Invoice</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <div class="">
        <div class="card-body m-5">
            <div class="mt-3">
                <div class="border-top">
                    <div class="row my-2 mx-1 justify-content-center">
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
                                @foreach ($transaksi as $i => $transaksi)
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
                    </div>
                    <hr class="mt-5" />
                    <div class="row">
                        <div class="col-12 text-center">
                            <p>Terimakasih telah belanja ditoko kami.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.print();

            window.addEventListener('afterprint', function() {

                window.location.href = '{{ route('kantin.index') }}';
            });

        });
    </script>

</body>

</html>