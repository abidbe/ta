@extends('layouts.template')
@section('title', 'Data User - PT. Jambi Bara Sejahtera')
@section('content')
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Data User</h3>
        <div class="card shadow">
            <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold"></p>
            </div>
            <div class="card-body">
                <div class="row d-flex justify-content-end">
                    <div class="col-xl-12 d-flex justify-content-end" style="width: 50%">
                        <form action="{{ route('user.index') }}" method="get">
                            <div class="text-md-end">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Search.." name="search">
                                    <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th style="border-bottom-color: rgb(0,0,0);">ID</th>
                                <th style="border-bottom-color: rgb(0,0,0);">Nama</th>
                                <th style="border-bottom-color: rgb(0,0,0);">Email</th>
                                <th style="border-bottom-color: rgb(0,0,0);">Role</th>
                                <th style="border-bottom-color: rgb(0,0,0);">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->is_admin == 1)
                                            Admin
                                        @else
                                            User
                                        @endif
                                        <i class="fa-solid fa-right-left"></i>
                                    </td>
                                    <td class="d-xl-flex">
                                        @if ($user->is_admin)
                                            <form action="{{ route('user.removeadmin', $user) }}" method="Post">
                                                @csrf
                                                @method('PATCH')
                                                <button class="btn btn-primary btn-circle ms-1 delete_confirm"
                                                    type="submit" style="text-align: justify;">
                                                    <i class="fas fa-lock text-white"></i>
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('user.makeadmin', $user) }}" method="Post">
                                                @csrf
                                                @method('PATCH')
                                                <button class="btn btn-success btn-circle ms-1 delete_confirm"
                                                    type="submit" style="text-align: justify;">
                                                    <i class="fas fa-lock-open text-white"></i>
                                                </button>
                                            </form>
                                        @endif
                                        <form action="{{ route('user.destroy', $user) }}" method="post"
                                            id="deleteForm-{{ $user->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-circle ms-1 delete_confirm" type="button"
                                                style="text-align: justify;" onclick="confirmDelete({{ $user->id }})">
                                                <i class="fas fa-trash text-white"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No data available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                            Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} entries
                        </p>
                    </div>

                    <div class="col-md-12 mt-3">
                        <div class="d-flex justify-content-end">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
