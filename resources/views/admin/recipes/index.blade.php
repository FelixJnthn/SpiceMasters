@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->


    <!-- Content Row -->
        <div class="card">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ __('List of Recipes') }}
                </h6>
                <div class="ml-auto">
                    <a href="{{ route('admin.recipe.create') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">{{ __('New recipe') }}</span>
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable datatable-question" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Cuisine Name</th>
                                <th>Ingredients</th>
                                <th>Instructions</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($informations as $info)
                            <tr data-entry-id="{{ $info->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $info->recipe_name }}</td>
                                <td>{{ strlen($info->ingredients) > 60 ? substr($info->ingredients, 0, 60) . '...' : $info->ingredients }}</td>
                                <td>{{ strlen($info->instructions) > 60 ? substr($info->instructions, 0, 60) . '...' : $info->instructions }}</td>

                                <td>
                                <div class="btn-group btn-group-sm">
                                        <a href="{{ route('admin.recipe.edit', $info->id) }}" class="btn btn-info">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        &nbsp
                                        <a href="{{ route('admin.recipe.show', $info->id) }}" class="btn btn-success">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">{{ __('Data Empty') }}</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
