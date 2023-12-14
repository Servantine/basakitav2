@include('layouts.main2')
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
    {{-- @if (session('flash2'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('flash2') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif --}}

    <div class="main_content">
        <div class="header"> Selamat Datang </div>
        <div class="info">
            <div class="content">

               
               <center>
                    <h3> GRAFIK PERBANDINGAN ORGANIK DAN ANORGANIK</h3>
                    <div style="width:80%;">
                         <canvas id="wasteChart"></canvas>
                     </div>
               </center>
               <a href="/download1bulanyanglalu"><button class="btn btn-info">1 Bulan yang Lalu</button></a>
               <a href="/download1tahunyanglalu"><button class="btn btn-info">1 Tahun yang Lalu</button></a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Alamat Pengirim</th>
                            <th scope="col">Tujuan Bank </th>
                            <th scope="col">Jenis Sampah</th>
                            <th scope="col">Berat Sampah</th>
                            <th scope="col">Cara Pengantaran</th>
                            <th scope="col">Nama Pengantar</th>
                            <th scope="col">Tagihan</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $no => $u)
                            <tr>
                                <th scope="row">{{ $transaksi->firstitem() + $no }}</th>
                                <td>{{ $u->tanggal_diantar }}</td>
                                <td>{{ $u->alamat_pengirim }}</td>
                                <td>{{ $u->tujuan_bank }}</td>
                                <td>{{ $u->jenis_sampah }}</td>
                                <td>{{ $u->berat_sampah }}</td>
                                <td>{{ $u->cara_pengantaran }}</td>
                                <td>{{ $u->nama_pengantar }}</td>
                                <td> Rp {{ $u->tagihan }}</td>
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="/downloadluaranwarlok"><button class="btn btn-info">Download Laporan</button></a>
                {{-- <div id="modalDetail" style="display: none;" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            @foreach ($transaksi as $no => $u)
                                <div class="modal-header">
                                    <h2>Detail Transaksi</h2>
                                </div>
                                <p> ID Tagihan : {{ $u->id }}</p>
                                <p> Total Tagihan : Rp {{ $u->tagihan }}</p>
                                <a href=""><button class="btn btn-info">Lakukan Pembayaran</button></a>
                            @endforeach
                        </div> --}}
                <!-- Tambahan informasi transaksi lainnya -->

                <!-- Tombol untuk mengunggah bukti pembayaran -->

            </div>
        </div>
    </div>
    </div>

    </div>
    </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
     var ctx = document.getElementById('wasteChart').getContext('2d');
     var data = @json($data);

     var labels = data.map(function(item) {
         return item.jenis_sampah;
     });

     var values = data.map(function(item) {
         return item.total;
     });

     var chart = new Chart(ctx, {
         type: 'bar',
         data: {
             labels: labels,
             datasets: [{
                 label: 'Waste Count',
                 data: values,
                 backgroundColor: [
                     'rgba(75, 192, 192, 0.2)',
                     'rgba(255, 99, 132, 0.2)',
                 ],
                 borderColor: [
                     'rgba(75, 192, 192, 1)',
                     'rgba(255, 99, 132, 1)',
                 ],
                 borderWidth: 1
             }]
         },
         options: {
             scales: {
                 y: {
                     beginAtZero: true
                 }
             }
         }
     });
 </script>

</body>

</html>
