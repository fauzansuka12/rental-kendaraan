<div>
    <div class="col-sm-12 col-xl-12">
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
        <div class="bg-light rounded h-100 p-4">
            @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
                  </div>
            @endif
            <h6 class="mb-4">Data Transaksi</h6>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pemesan</th>
                        <th scope="col">Merk</th>
                        {{-- <th scope="col">Jenis</th> --}}
                        <th scope="col">Ponsel</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Tanggal Pesan</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Total</th>
                        <th scope="col">Lama</th>
                        <th scope="col">Status</th>
                   <th> Proses</th>
                </thead>
                <tbody>
                    @forelse ($transaksi as $data)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$data->user->name}}</td>
                        <td>{{$data->mobil->merk}}</td>
                        <td>{{$data->user->telephone}}</td>
                        <td>{{$data->alamat}}</td>
                        <td>{{$data->tgl_pesan}}</td>
                        <td>{{$data->mobil->harga}}</td>
                        <td>{{$data->total}}</td>
                        <td>{{$data->lama}}</td>
                        <td>{{$data->status}}</td>
                        <td>
                           <form action="{{ route('transaksi.updateStatus', $data->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="status" onchange="this.form.submit()" class="border p-2 rounded">
                                    <option value="PROSES" {{ $data->status == 'PROSES' ? 'selected' : '' }}>PROSES</option>
                                    <option value="SELESAI" {{ $data->status == 'SELESAI' ? 'selected' : '' }}>SELESAI</option>
                                    <option value="TOLAK" {{ $data->status == 'TOLAK' ? 'selected' : '' }}>TOLAK</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td coolspan="6">Data Mobil Belum Ada</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
                <div class="col-sm-12 col-xl-12">
                    <div class="container-fluid pt-4 px-4 flex">
                        {{$transaksi->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>