@extends('backend.template.master')

@section('title', 'Announcement (Announcement List)')

@section('content')

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-display2 icon-gradient bg-warm-flame">
                    </i>
                </div>
                <div>Announcement List
                    <div class="page-title-subheading">Berikut Daftar Pengumuman Yang Ada Di Website MeatNauli
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                @if (Auth::user()->role == 'Administrator')
                <div class="d-inline-block dropdown">
                    <a href="{{ route('announcement.create') }}" class="btn btn-sm btn-primary">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-plus fa-w-20"></i>
                        </span>
                        Add Announcement
                    </a>
                </div>
                &nbsp;
                @endif
                <div class="d-inline-block dropdown">
                    <form method="GET" action="{{ route('announcementsearch') }}">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="search" id="search" class="form-control form-control-sm" placeholder="Search Title" value="{{ old('search') }}">
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
                    Announcement List
                </div>
                <div class="table-responsive">
                    <table class="mb-0 table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($announcements as $announcement => $result)
                            <tr>
                                <td class="text-center"><b>{{ $announcement + $announcements->firstitem() }}</b></td>
                                <td>{{ $result->title }}</td>
                                <td class="text-center">
                                    @if (Auth::user()->role == 'Administrator')
                                    <form method="POST" action="{{ route('announcement.destroy', $result->id) }}">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('announcement.edit', $result->id) }}" class="mr-2 btn-icon btn-icon-only btn btn-outline-warning text-warning"><i class="pe-7s-pen btn-icon-wrapper"> </i></a>
                                        <button type="submit" class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                                    </form>
                                    <br>
                                    @endif
                                    <a href="{{ route('announcement.show', $result->id) }}" class="mr-2 btn-icon btn-icon-only btn btn-outline-info text-info"><i class="pe-7s-info btn-icon-wrapper"> </i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $announcements->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
