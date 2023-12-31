@include('layouts.main4')
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
               <center>
                    <div style="width:80%;">
                         <canvas id="senderComparisonChart"></canvas>
                     </div>
               </center>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tujuan Bank </th>
                            <th scope="col">Nama Pengirim</th>
                            <th scope="col">Alamat Pengirim</th>
                            <th scope="col">Jenis Sampah</th>
                            <th scope="col">Berat Sampah</th>
                            <th scope="col">Cara Pengantaran</th>
                            <th scope="col">Nama Pengantar</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $no => $u)
                            <tr>
                                <th scope="row">{{ $transaksi->firstitem() + $no }}</th>
                                <td>{{ $u->tujuan_bank }}</td>
                                <td>{{ $u->nama_pengirim }}</td>
                                <td>{{ $u->alamat_pengirim }}</td>
                                <td>{{ $u->jenis_sampah }}</td>
                                <td>{{ $u->berat_sampah }} KG</td>
                                <td>{{ $u->cara_pengantaran }}</td>
                                <td>{{ $u->nama_pengantar }}</td>
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
            </div>
        </div>
    </div>

    </div>
    <script>
     var ctx = document.getElementById('senderComparisonChart').getContext('2d');
     var data = @json($data);

     var uniqueBanks = [...new Set(data.map(item => item.tujuan_bank))];

     var datasets = uniqueBanks.map(bank => {
         var bankData = data.filter(item => item.tujuan_bank === bank);

         return {
             label: bank,
             data: bankData.map(item => item.total),
             backgroundColor: getRandomColor(),
             borderColor: getRandomColor(),
             borderWidth: 1
         };
     });

     function getRandomColor() {
         var letters = '0123456789ABCDEF';
         var color = '#';
         for (var i = 0; i < 6; i++) {
             color += letters[Math.floor(Math.random() * 16)];
         }
         return color;
     }

     var chart = new Chart(ctx, {
         type: 'bar',
         data: {
             labels: data.map(item => item.nama_pengirim),
             datasets: datasets
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
