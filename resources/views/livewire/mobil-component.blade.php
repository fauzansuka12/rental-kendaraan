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
            <h6 class="mb-4">Data Mobil</h6>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">No Polisi</th>
                        <th scope="col">Merk</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Mesin</th>
                        <th scope="col">Kursi</th>
                        <th scope="col">BBM</th>
                        <th scope="col">Harga</th>
                        <th>Foto</th>
                   <th> Proses</th>
                </thead>
                <tbody>
                    @forelse ($mobil as $data)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$data->nopolisi}}</td>
                        <td>{{$data->merk}}</td>
                        <td>{{$data->jenis}}</td>
                        <td>{{$data->mesin}}</td>
                        <td>{{$data->kursi}}</td>
                        <td>{{$data->bbm}}</td>
                        <td>{{$data->harga}}</td>
                        <td>
                            <img src="{{ asset('storage/uploads/mobil/' . $data->foto) }}" style="width: 150px;" alt="{{ $data->foto }}">
                        </td>
                    <td>
                        <button wire:click="edit({{ $data->id }})" class="btn btn-success">Edit</button>
                        <button class="btn btn-danger"wire:click="destroy({{$data->id}})">Delete</button>
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
        <div class="container-fluid pt-4 px-4">
            {{$mobil->links()}}
            <button wire:click="create" class="btn btn-primary">Tambah</button>
            @if ($addPage)
                @include('mobil.create')
            @endif
            @if ($editPage)
                @include('mobil.edit')
            @endif
</div>
    </div>
</div>
</div>
        </div>
    </div>
</div>