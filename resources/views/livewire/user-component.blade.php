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
            <h6 class="mb-4">Data Users</h6>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                    </tr>
                    Proses
                </thead>
                <tbody>
                    {{-- @dd($user) --}}
                    @foreach ($user as $data)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        @foreach ($data->roles as $role)
                            <td>{{$role->name}}</td>
                        @endforeach
                    <td>
                            {{-- <button wire:click="edit({{ $data->id }})" class="btn btn-success">Edit</button>
                        <button class="btn btn-danger"wire:click="destroy({{$data->id}})">Delete</button> --}}
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    {{-- <div class="col-sm-12 col-xl-12">
        <div class="container-fluid pt-4 px-4">
            {{$user->links()}}
            <button wire:click="create" class="btn btn-primary">Tambah</button>
            @if ($addPage)
                @include('users.create')
            @endif
            @if ($editPage)
                @include('users.edit')
            @endif
</div> --}}
    </div>
</div>
</div>
        </div>
    </div>
</div>