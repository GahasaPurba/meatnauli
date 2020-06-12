@extends('backend.template.master')

@section('title', 'Profile (Edit Profile)')

@section('content')

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-id icon-gradient bg-warm-flame">
                    </i>
                </div>
                <div>Edit Profile
                    <div class="page-title-subheading">Silahkan Edit Profile Anda
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-6">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title mb-5">Edit Profile</h5>
                    <form method="POST" action="{{ route('editprofile.update', $users->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="position-relative form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap" value="{{ $users->name }}" autofocus>
                            @error('name')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="position-relative form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                                <option value="">Jenis Kelamin</option>
                                <option value="Laki-laki" @if($users->gender == 'Laki-laki') selected @endif>Laki-laki</option>
                                <option value="Perempuan" @if($users->gender == 'Perempuan') selected @endif>Perempuan</option>
                            </select>
                            @error('gender')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="position-relative form-group">
                            <label for="dateofbirth">Date of Birth</label>
                            <input type="date" name="dateofbirth" id="dateofbirth" class="form-control @error('dateofbirth') is-invalid @enderror" placeholder="Tanggal Lahir" value="{{ $users->dateofbirth }}">
                            @error('dateofbirth')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="position-relative form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ $users->email }}">
                            @error('email')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="position-relative form-group">
                            <label for="telephone">Phone Number</label>
                            <input type="number" name="telephone" id="telephone" class="form-control @error('telephone') is-invalid @enderror" placeholder="Nomor Telepon" value="{{ $users->telephone }}">
                            @error('telephone')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="position-relative form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Edit Password">
                            @error('password')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="position-relative form-group">
                            <img name="output" id="output" alt="Profile Photo" class="img-fluid rounded" width="200" src="{{ asset('upload/profilephoto/' . $users->avatar) }}">
                        </div>
                        <div class="position-relative form-group">
                            <label for="avatar">Profile Photo</label>
                            <input type="text" onfocus="this.type='file'" onchange="loadFile(event)" accept="image/*" name="avatar" id="avatar" class="form-control @error('avatar') is-invalid @enderror" placeholder="Edit Foto Profil">
                            @error('avatar')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <small class="form-text text-muted">
                                Direkomendasikan Untuk Mengupload Foto Yang Berdimensi 1 X 1
                            </small>
                        </div>
                        <button type="submit" class="mt-1 btn btn-warning btn-block">Edit</button>
                        <a href="{{ route('home') }}" class="mt-1 btn btn-primary btn-block">Cancel</a>
                    </form>
                    <form method="POST" action="{{ route('editprofile.destroy', $users->id) }}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="mt-4 btn btn-danger btn-block">DELETE ACCOUNT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };

</script>

@endsection
