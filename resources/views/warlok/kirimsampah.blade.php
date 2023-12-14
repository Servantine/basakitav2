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
        <div class="header"> Selamat Datang <b> {{ $nama }} </b></div>
        <div class="info">
            @if ($langganan == 'null')
                <div class="alert alert-danger" role="alert">
                    KAMU HARUS BERLANGGANAN DAHULU DI <a href="/warlok">DASHBOARD</a>
                </div>
            @endif
            <div class="content">
                <div class="form-control">
                    <form action="/simpantransaksi" method="POST" id="formsampah">
                        @csrf
                        <br>
                        <h2> Detail Sampah </h2>
                        <br>
                        <b> Nama Pengirim </b>
                        <br>
                        <br>
                        <input type="text" class="form-control" name="nama_pengirim" value=" {{ $nama }}"
                            readonly required>
                        <br>
                        <br>
                        <b> Alamat </b>
                        <br>
                        <br>
                        <input type="text" class="form-control" name="alamat_pengirim" value=" {{ $alamat }}"
                            readonly required>
                        <br>
                        <br>
                        <b> Tujuan Bank </b>
                        <br>
                        <br>
                        <input type="text" class="form-control" name="tujuan_bank" value=" {{ $langganan }}"
                            readonly required>
                        <br>
                        <br>
                        <b> Jenis Sampah </b>
                        <br>
                        <br>
                        <select class="form-control" name="jenis_sampah" required>
                            <option value="oraganik"> Organik </option>
                            <option value="nonoraganik"> Non Organik </option>
                        </select>
                        <br>
                        <br>
                        <b> Berat Sampah </b>
                        <br>
                        <br>
                        <input type="number" class="form-control" id="berat" name="berat_sampah" required>
                        <p>/kg</p>
                        <br>
                        <br>
                        <b> Harga Sampah </b>
                        <br>
                        <br>
                        <input type="number" class="form-control" id="harga" value="{{ $harga }}" readonly>
                        <p>/kg</p>
                        <br>
                        <br>
                        <b> Total Tagihan </b>
                        <br>
                        <br>
                        <input type="number" class="form-control" id="tagihan" name="tagihan" value="result" readonly required>
                        <br>
                        <br>
                        <button type="button" class="btn btn-info" onclick="calculate()"> Hitung </button>
                        <br>
                        <br>
                        <br>
                        <h2> Detail Pengantaran </h2>
                        <br>
                        <b> Tanggal Pengantaran </b>
                        <br>
                        <input type="date" class="form-control" name="tanggal_diantar" required>
                        <br>
                        <br>
                        <b> Cara Pengantaran </b>
                        <br>
                        <br>
                        <select class="form-control" name="cara_pengantaran" required>
                            <option value="antar sendiri"> Antar Sendiri </option>
                            <option value="diantarkan"> Diantarkan </option>
                        </select>
                        <br>
                        <br>
                        <b> Nama Pengantar </b>
                        <br>
                        <br>
                        <select class="form-control" name="nama_pengantar">
                            <option value="1" disabled selected> Silahkan Pilih Pengantar Jika Diantarkan</option>
                            @foreach ($pengantar as $user)
                                <option value="{{ $user->name }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <br>
                        <br>
                        <button class="btn btn-info"type="submit" @if ($langganan == 'null') disabled @endif>
                            Kirim </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>

    </div>

</body>

<script>
    function calculate(){
        var value1 = parseFloat(document.getElementById('berat').value);
        var value2 = parseFloat(document.getElementById('harga').value);

        var result = value1 * value2;

        var form = document.getElementById('formsampah');
        form.elements['tagihan'].value = result;
    }
</script>
</html>
