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
                <h1 class="h3 mb-0 text-gray-800">{{ __('recipe detail')}}</h1>
                <a href="{{ route('admin.recipe.index') }}" class="btn btn-primary btn-sm shadow-sm">{{ __('Go Back') }}</a>
            </div>
        </div>
        <div class="card-body">

            <div class="form-group">
                <label for="recipe_text">{{ __('Recipe Name') }}</label>
                <input type="text" class="form-control" id="recipe_text" placeholder="{{ __('recipe name') }}" name="recipe_name" value="{{ $info->recipe_name }}" readonly />
            </div>
            <div class="form-group">
                <label for="ingredients">{{ __('Ingredients') }}</label>
                <textarea class="form-control" id="ingredients" placeholder="{{ __('recipe ingredients') }}" name="ingredients" readonly>{{ $info->ingredients }}</textarea>
            </div>
            <div class="form-group">
                <label for="instructions">{{ __('Instructions') }}</label>
                <textarea class="form-control" id="instructions" placeholder="{{ __('recipe instructions') }}" name="instructions" readonly>{{ $info->instructions }}</textarea>
            </div>
        </div>
    </div>

    <!-- Content Row -->

</div>
@endsection


