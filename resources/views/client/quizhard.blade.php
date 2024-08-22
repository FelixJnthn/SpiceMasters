@extends('layouts.client')

@section('content')

<style>
    /* Tambahkan gaya tambahan di sini */
    .center-image {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 100px; /* Sesuaikan lebar gambar sesuai keinginan */
        height: 100px; /* Sesuaikan tinggi gambar sesuai keinginan */
    }

.background-image {
        background-image: url("images/SpiceIndo4.png");
        background-size: cover;
        background-repeat: no-repeat;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0.5; /* Sesuaikan opacity sesuai keinginan */
        z-index: -1; /* Pastikan gambar background berada di belakang konten */
    }
</style>

<div class="background-image"></div> <!-- Tambahkan ini di dalam container -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-body">
                @if(session('status'))
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('client.quiz.store') }}">

                    @csrf
                    @foreach($difficulties as $difficulty)
                    <img src="{{ asset('images/SpiceMasterLogo.png') }}" class="center-image" alt="">

                        <div class="card mb-3">
                            <div class="card-header text-white bg-danger ">{{ $difficulty->name }}</div>
            
                            <div class="card-body">
                                @foreach($difficulty->difficultyQuestions as $question)
                                    <div class="card @if(!$loop->last)mb-3 @endif">
                                        <div class="card-header">{{ $question->question_text }}</div>
                    
                                        <div class="card-body">
                                            <input type="hidden" name="questions[{{ $question->id }}]" value="">
                                            @foreach($question->questionOptions as $option)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="questions[{{ $question->id }}]" id="option-{{ $option->id }}">
                                                    <label class="form-check-label" for="option-{{ $option->id }}">
                                                        {{ $option->option_text }}
                                                    </label>
                                                </div>
                                            @endforeach

                                            @if($errors->has("questions.$question->id"))
                                                <span style="margin-top: .25rem; font-size: 80%; color: #e3342f;" role="alert">
                                                    <strong>{{ $errors->first("questions.$question->id") }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                    <div class="form-group row mb-0">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-danger">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
