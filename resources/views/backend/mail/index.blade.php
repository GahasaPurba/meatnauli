@extends('backend.template.master')

@section('title', 'Subscription (Mailing List)')

@section('content')

@if (Auth::check() && Auth::user()->role == 'Administrator')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-mail icon-gradient bg-warm-flame">
                    </i>
                </div>
                <div>Mailing List
                    <div class="page-title-subheading">Berikut Daftar Email Yang Terdaftar Untuk Berlangganan Di Website MeatNauli
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <form method="GET" action="{{ route('mailsearch') }}">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="search" id="search" class="form-control form-control-sm" placeholder="Cari Email" value="{{ old('search') }}">
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
                    Mailing List
                </div>
                <div class="table-responsive">
                    <table class="mb-0 table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mails as $mail => $result)
                            <tr>
                                <td class="text-center"><b>{{ $mail + $mails->firstitem() }}</b></td>
                                <td>{{ $result->email }}</td>
                                <td class="text-center">
                                    <form method="POST" action="{{ route('mail.destroy', $result->id) }}">
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
                    {{ $mails->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection
