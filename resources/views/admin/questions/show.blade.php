@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<!-- Content Row -->
        <div class="card shadow">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">{{ __('detail question')}}</h1>
                    <a href="{{ route('admin.questions.index') }}" class="btn btn-primary btn-sm shadow-sm">{{ __('Go Back') }}</a>
                </div>
            </div>
            <div class="card-body">
                    <div class="form-group">
                        <label for="question_text">{{ __('question text') }}</label>
                        <input type="text" class="form-control" id="question_text" placeholder="{{ __('question text') }}" name="question_text" value="{{ old('question_text', $question->question_text) }}" readonly />
                    </div>
                    <div class="form-group">
                        <label for="difficulty">{{ __('Difficulty') }}</label>
                        <input type="text" class="form-control" value="{{ $question->difficulty->name }}" readonly />
                    </div>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection
