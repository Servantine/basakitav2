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
                <div class="form-control">
                    <form action="/simpankendaraan" method="POST">
                        @csrf
                        <b> Plat Nomor </b>
                        <br>
                        <br>
                        <input type="text" class="form-control" name="plat_kendaraan" required>
                        <br>
                        <br>
                        <b> Nama Pemilik </b>
                        <br>
                        <br>
                        <input type="text" class="form-control" name="pemilik_kendaraan" value=" {{ $pemilik }}"
                            readonly required>
                        <br>
                        <br>
                        <b> Jenis Kendaraan </b>
                        <br>
                        <br>
                        <select class="form-control" name="jenis_kendaraan" required>
                            <option value="Truck"> Truck </option>
                            <option value="Mobil"> Mobil </option>
                            <option value="Motor"> Motor </option>
                        </select>
                        <br>
                        <br>
                        <b> Kapasitas Maksimal </b>
                        <br>
                        <br>
                        <input type="number" class="form-control" name="kapasitas_maksimal" required>
                        <p> kg </p>
                        <br>
                        <br>
                        <button class="btn btn-info" type="submit">
                            Kirim </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>

</body>

</html>
