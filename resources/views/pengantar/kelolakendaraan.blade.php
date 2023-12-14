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

    <div class="main_content">
        <div class="header"> Selamat Datang </div>
        <div class="info">
            <div class="content">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No </th>
                            <th scope="col">Plat Nomor </th>
                            <th scope="col">Pemilik Kendaraan </th>
                            <th scope="col">Jenis Kendaraan </th>
                            <th scope="col">Kapasitas Maksimal </th>
                            <th scope="col">Kapasitas Ditampung </th>
                            <th scope="col">Aksi </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kendaraan as $no => $u)
                            <tr>
                                <th scope="row">{{ $kendaraan->firstitem() + $no }}</th>
                                <td>{{ $u->plat_nomor }}</td>
                                <td>{{ $u->pemilik_kendaraan }}</td>
                                <td>{{ $u->jenis_kendaraan }}</td>
                                <td>{{ $u->kapasitas_maksimal }}</td>
                                <td>{{ $u->kapasitas_ditampung }}</td>
                                <td>
                                    <a href="editkendaraan/{{ $u->id }}" class="btn btn-warning"
                                        method="POST">
                                        Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="/buatkendaraan"> <button class="btn btn-info" @if($kendaraan->firstitem() >= 1) disabled @endif> Buat Baru</button> </a>
                
            </div>
        </div>
    </div>

    </div>

</body>

</html>
