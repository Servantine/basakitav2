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
                            <th scope="col">Nama Bank </th>
                            <th scope="col">Alamat Bank </th>
                            <th scope="col">Jumlah Sampah </th>
                            <th scope="col">Harga </th>
                            <th scope="col">Kapasitas Sampah </th>
                            <th scope="col">Status </th>
                            <th scope="col">Aksi </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bank as $no => $u)
                            <tr>
                                <th scope="row">{{ $bank->firstitem() + $no }}</th>
                                <td>{{ $u->nama_bank }}</td>
                                <td>{{ $u->alamat_bank }}</td>
                                <td>{{ $u->jumlah_sampah }}</td>
                                <td>{{ $u->harga_sampah }}</td>
                                <td>{{ $u->kapasitas_sampah }}</td>
                                <td>{{ $u->status }}</td>
                                <td>
                                    <a href="editbanksampah/{{ $u->id }}" class="btn btn-warning"
                                        method="POST">
                                        Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="/buatbanksampah"> <button class="btn btn-info" @if($bank->firstitem() >= 1) disabled @endif> Buat Baru</button> </a>
                
            </div>
        </div>
    </div>

    </div>

</body>

</html>
