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
                <div class="form-control">
                    <form action="/saveeditbanksampah/{{ $bank->id }}" method="PUT">
                        @csrf
                        <b> Nama Bank </b>
                        <br>
                        <br>
                        <input type="text" class="form-control" name="nama_bank" value="{{ $bank->nama_bank }}"
                            required>
                        <br>
                        <br>
                        <b> Nama Pemilik </b>
                        <br>
                        <br>
                        <input type="text" class="form-control" name="nama_pemilik" value=" {{ $pemilik }}"
                            readonly required>
                        <br>
                        <br>
                        <b> Alamat Bank </b>
                        <br>
                        <br>
                        <input type="text" class="form-control" name="alamat_bank" value="{{ $bank->alamat_bank }}"
                            required>
                        <br>
                        <br>
                        <b> Harga Sampah </b>
                        <br>
                        <br>
                        <input type="number" class="form-control" name="harga_sampah" value="{{ $bank->harga_sampah }}"
                            required>
                        <b> Harga per KG </b>
                        <br>
                        <br>
                        <b> Kapasitas Bank Sampah </b>
                        <br>
                        <br>
                        <select class="form-control" name="kapasitas_sampah" required>
                         <option value="100"> 100 KG </option>
                         <option value="200"> 200 KG </option>
                         <option value="300"> 300 KG </option>
                     </select>
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
