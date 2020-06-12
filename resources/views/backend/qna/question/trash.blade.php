@extends('backend.template.master')

@section('title', 'QnA (Question Trash)')

@section('content')

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-comment icon-gradient bg-warm-flame">
                    </i>
                </div>
                <div>Question Trash
                    <div class="page-title-subheading">Berikut Daftar Pertanyaan Yang Telah Dihapus Dari Website MeatNauli
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Question Trash
                </div>
                <div class="table-responsive">
                    <table class="mb-0 table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Question</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Author</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($questions as $question => $result)
                            <tr>
                                <td class="text-center"><b>{{ $question + $questions->firstitem() }}</b></td>
                                <td>{{ $result->question }}</td>
                                <td>{{ $result->qna_category->name }}</td>
                                <td>{{ $result->user->name }}</td>
                                <td class="text-center">
                                    <form method="POST" action="{{ route('question.kill', $result->id) }}">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('question.restore', $result->id) }}" class="mr-2 btn-icon btn-icon-only btn btn-outline-info text-info"><i class="pe-7s-refresh-2 btn-icon-wrapper"> </i></a>
                                        <button type="submit" class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $questions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
