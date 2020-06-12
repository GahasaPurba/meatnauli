@extends('backend.template.master')

@section('title', 'User Feedback (Questionnaire Result)')

@section('content')

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-note icon-gradient bg-warm-flame">
                    </i>
                </div>
                <div>Questionnaire Result
                    <div class="page-title-subheading">Berikut Daftar Hasil Kuesioner Yang Telah Diisi Pengunjung Website MeatNauli
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Questionnaire Result
                </div>
                <div class="table-responsive">
                    <table class="mb-0 table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Responden</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($questionnaires as $questionnaire => $result)
                            <tr>
                                <td class="text-center"><b>{{ $questionnaire + $questionnaires->firstitem() }}</b></td>
                                <td>{{ $result->user->name }}</td>
                                <td class="text-center">
                                    <form method="POST" action="{{ route('questionnaire.destroy', $result->id) }}">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('questionnaire.show', $result->id) }}" class="mr-2 btn-icon btn-icon-only btn btn-outline-info text-info"><i class="pe-7s-info btn-icon-wrapper"> </i></a>
                                        <button type="submit" class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $questionnaires->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
