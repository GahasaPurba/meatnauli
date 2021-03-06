@extends('backend.template.master')

@section('title', 'Role (User)')

@section('content')

@if (Auth::check() && Auth::user()->role == 'Administrator')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-user icon-gradient bg-warm-flame">
                    </i>
                </div>
                <div>User
                    <div class="page-title-subheading">Berikut Daftar User Yang Terdaftar di Website MeatNauli
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <form method="GET" action="{{ route('usersearch') }}">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="search" id="search" class="form-control form-control-sm" placeholder="Cari User" value="{{ old('search') }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    User
                </div>
                <div class="table-responsive">
                    <table class="mb-0 table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Foto Profil</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Jenis Kelamin</th>
                                <th class="text-center">Tanggal Lahir</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">No. Telepon</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user => $result)
                            <tr>
                                <td class="text-center"><b>{{ $user + $users->firstitem() }}</b></td>
                                <td class="text-center">
                                    <img alt="Profile Photo" class="img-responsive img-fluid rounded-circle" width="70" src="{{ asset('upload/profilephoto/' . $result->avatar) }}">
                                </td>
                                <td>{{ $result->name }}</td>
                                <td class="text-center">{{ $result->gender }}</td>
                                <td class="text-center">{{ $result->dateofbirth }}</td>
                                <td>{{ $result->email }}</td>
                                <td>{{ $result->telephone }}</td>
                                <td class="text-center">
                                    <form method="POST" action="{{ route('user.edits', $result->id) }}">
                                        @csrf
                                        @method('get')
                                        <button type="submit" class="mr-2 btn-icon btn-icon-only btn btn-outline-warning">Jadikan Seller</button>
                                    </form>
                                    &nbsp;
                                    <form method="POST" action="{{ route('user.update', $result->id) }}">
                                        @csrf
                                        @method('patch')
                                        <button type="submit" class="mr-2 btn-icon btn-icon-only btn btn-outline-warning">Jadikan Author</button>
                                    </form>
                                    &nbsp;
                                    <form method="POST" action="{{ route('user.destroy', $result->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection
