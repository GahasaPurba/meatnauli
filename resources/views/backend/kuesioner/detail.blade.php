@extends('backend.template.master')

@section('title', 'User Feedback (Questionnaire Result Detail)')

@section('content')

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-note icon-gradient bg-warm-flame">
                    </i>
                </div>
                <div>Questionnaire Result Detail
                    <div class="page-title-subheading">Berikut Detail Hasil Kuesioner Yang Telah Diisi Pengunjung Website MeatNauli
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-8">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title mb-5">Questionnaire Result Detail</h5>
                    <div class="position-relative form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control" value="{{ $questionnaires->user->name }}" readonly>
                    </div>
                    <div class="position-relative form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" class="form-control" value="{{ $questionnaires->user->email }}" readonly>
                    </div>
                    <div class="position-relative form-group">
                        <label for="question1">Menurut Anda, Apakah Website Ini Bermanfaat ?</label>
                        <input type="text" id="question1" class="form-control" value="{{ $questionnaires->question1 }}" readonly>
                    </div>
                    <div class="position-relative form-group">
                        <label for="question2">Menurut Anda, Apakah Blog Yang Ada Di Website Ini Informatif ?</label>
                        <input type="text" id="question2" class="form-control" value="{{ $questionnaires->question2 }}" readonly>
                    </div>
                    <div class="position-relative form-group">
                        <label for="question3">Menurut Anda, Apakah Forum Tanya Jawab Yang Ada Di Website Ini Berguna ?</label>
                        <input type="text" id="question3" class="form-control" value="{{ $questionnaires->question3 }}" readonly>
                    </div>
                    <div class="position-relative form-group">
                        <label for="question4">Menurut Anda, Bagaimana Kelengkapan Informasi Tentang Desa Meat Di Website Ini ?</label>
                        <input type="text" id="question4" class="form-control" value="{{ $questionnaires->question4 }}" readonly>
                    </div>
                    <div class="position-relative form-group">
                        <label for="suggestion">Suggestion</label>
                        <textarea id="suggestion" class="form-control" style="min-height:150px" readonly>{{ $questionnaires->suggestion }}</textarea>
                    </div>
                    <a href="{{ route('questionnaire.index') }}" class="mt-1 btn btn-info btn-block">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
