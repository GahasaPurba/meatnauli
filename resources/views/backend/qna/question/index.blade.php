@extends('backend.template.master')

@section('title', 'QnA (Question List)')

@section('content')

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-comment icon-gradient bg-warm-flame">
                    </i>
                </div>
                <div>Question List
                    <div class="page-title-subheading">Berikut Daftar Pertanyaan Yang Ada Di Website MeatNauli
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="{{ route('question.create') }}" class="btn btn-sm btn-primary">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-plus fa-w-20"></i>
                        </span>
                        Add Question
                    </a>
                </div>
                @if(Auth::user()->role == 'Administrator')
                &nbsp;
                <div class="d-inline-block dropdown">
                    <form method="GET" action="{{ route('questionsearch') }}">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="search" id="search" class="form-control form-control-sm" placeholder="Search Question" value="{{ old('search') }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Question List
                </div>
                <div class="table-responsive">
                    <table class="mb-0 table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Question</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Asked By</th>
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
                                    <form method="POST" action="{{ route('question.destroy', $result->id) }}">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('question.edit', $result->id) }}" class="mr-2 btn-icon btn-icon-only btn btn-outline-warning text-warning"><i class="pe-7s-pen btn-icon-wrapper"> </i></a>
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
