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