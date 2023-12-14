@include('layouts.main3')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/eee4f26c1d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Dashboard</title>
</head>

<body>
    @if (session('flash2'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('flash2') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="main_content">
        <div class="header"> Selamat Datang </div>
        <div class="info">
            <div class="content">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Pengantar</th>
                            <th scope="col">Tujuan Bank </th>
                            <th scope="col">Nama Pengirim</th>
                            <th scope="col">Alamat Pengirim</th>
                            <th scope="col">Jenis Sampah</th>
                            <th scope="col">Berat Sampah</th>
                            <th scope="col">Cara Pengantaran</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $no => $u)
                            <tr>
                                <th scope="row">{{ $transaksi->firstitem() + $no }}</th>
                                <td>{{ $u->nama_pengantar }}</td>
                                <td>{{ $u->tujuan_bank }}</td>
                                <td>{{ $u->nama_pengirim }}</td>
                                <td>{{ $u->alamat_pengirim }}</td>
                                <td>{{ $u->jenis_sampah }}</td>
                                <td>{{ $u->berat_sampah }} KG</td>
                                <td>{{ $u->cara_pengantaran }}</td>
                                <td>
                                    @if ($u->status == 'Belum Dibayar')
                                        <div class="alert alert-danger" role="alert">
                                            Belum Dibayar
                                        </div>
                                    @endif
                                    @if ($u->status == 'Diantarkan')
                                        <div class="alert alert-warning" role="alert">
                                            Diantar
                                        </div>
                                    @endif
                                    @if ($u->status == 'Menunggu')
                                        <div class="alert alert-warning" role="alert">
                                            Menunggu
                                        </div>
                                    @endif
                                    @if ($u->status == 'Diterima')
                                        <div class="alert alert-success" role="alert">
                                            Diterima
                                        </div>
                                    @endif
                                    @if ($u->status == 'Ditolak')
                                        <div class="alert alert-danger" role="alert">
                                            Ditolak
                                        </div>
                                    @endif
                                    @if ($u->status == 'Diselesaikan')
                                        <div class="alert alert-info" role="alert">
                                            Diselesaikan
                                        </div>
                                    @endif
                                    @if ($u->status == 'Dibayar')
                                    <div class="alert alert-success" role="alert">
                                        Dibayar
                                    </div>
                                @endif
                                </td>
                                <td>
                                    <a href="/antartransaksi/{{ $u->id }}"> <button class="btn btn-warning" 
                                        @if ($u->status != 'Dibayar') disabled @endif method="POST"> Antar
                                    </button> </a>
                                    <a href="/tolaktransaksi2/{{ $u->id }}"> <button class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?')"
                                        @if ($u->status == 'Ditolak' || $u->status == 'Diantarkan') disabled @endif method="POST"> Tolak
                                    </button> </a>
                                    <a href="/selesaitransaksi2/{{ $u->id }}"> <button class="btn btn-info" onclick="return confirm('Apakah Anda Yakin?')"
                                        @if ($u->status == 'Diselesaikan' || $u->status == 'Ditolak' || $u->status == 'Menunggu'|| $u->status == 'Dibayar' ) disabled @endif method="POST"> Selesai
                                    </button> </a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    </div>

</body>

</html>
