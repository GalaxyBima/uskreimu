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
                                    <th>Nama</th>
                                    <th>Rekening</th>
                                    <th>Tanggal</th>
                                    <th>Nominal</th>
                                    <th>Kode Unik</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $i => $topup)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $topup->wallet->user->nama }}</td>
                                        <td>{{ $topup->wallet->rekening }}</td>
                                        <td>{{ $topup->created_at }}</td>
                                        <td>Rp.
                                            {{ number_format($topup->nominal, 0, ',', '.') }},00</td>
                                        <td>{{ $topup->kode_unik }}</td>
                                        <td>{{ $topup->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <hr class="mt-5" />
                    <div class="row">
                        <div class="col-12 text-center">
                            <p>Terimakasih.</p>
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

                window.location.href = '{{ route('bank.index') }}';
            });

        });
    </script>

</body>

</html>