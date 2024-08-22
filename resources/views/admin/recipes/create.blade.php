@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    


<!-- Content Row -->
        <div class="card shadow">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">{{ __('create recipe') }}</h1>
                    <a href="{{ route('admin.recipe.index') }}" class="btn btn-primary btn-sm shadow-sm">{{ __('Go Back') }}</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.recipe.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="recipe_text">{{ __('Recipe Name') }}</label>
                        <input type="text" class="form-control" id="recipe_text" placeholder="{{ __('recipe name') }}" name="recipe_name" value="{{ old('recipe_name') }}" />
                    </div>
                    <div class="form-group">
                        <label for="recipe_text">{{ __('Ingredients') }}</label>
                        <textarea class="form-control" id="ingredients" placeholder="{{ __('recipe ingredients') }}" name="ingredients" value="{{ old('ingredients') }}"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="recipe_text">{{ __('Instructions') }}</label>
                        <textarea class="form-control" id="instructions" placeholder="{{ __('recipe instructions') }}" name="instructions">{{ old('instructions') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">{{ __('Save') }}</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>


@endsection