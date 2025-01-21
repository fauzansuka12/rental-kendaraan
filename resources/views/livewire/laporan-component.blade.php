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
            <h6 class="mb-4">Data Laporan Transaksi</h6>
            <div class="row">
                <div class="col-md-4">
                    <input type="date"  wire:model="tanggal1" class="form-control" placeholder="tanggal"/>
                </div>
                <div class="col-md-4">
                    <input type="date"  wire:model="tanggal2" class="form-control" placeholder="s/d tanggal"/>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-sm btn-primary" wire:click="cari">Filter</button>
                </div>

            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">No Polisi</th>
                        <th scope="col">Nama Pemesan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Tanggal Pesan</th>
                        <th scope="col">Lama</th>
                        <th scope="col">Total</th>
                </thead>
                <tbody>
                    @forelse ($transaksi as $data)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$data->mobil->nopolisi}}</td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->alamat}}</td>
                        <td>{{$data->tgl_pesan}}</td>
                        <td>{{$data->lama}}</td>
                        <td>@rupiah($data->total)   </td>
                    {{-- <td>
                        <button wire:click="edit({{ $data->id }})" class="btn btn-success">Edit</button>
                        <button class="btn btn-danger"wire:click="destroy({{$data->id}})">Delete</button>
                    </td> --}}
                    </tr>
                    @empty 
                    <tr>
                        <td coolspan="6">Data transaksi Belum Ada</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
    <div class="col-sm-12 col-xl-12">
        <div class="container-fluid pt-4 px-4">
                    {{$transaksi->links()}}
                    <button class="btn btn-primary"wire:click="exportpdf">Eksport PDF</button>     
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>