@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
   

    <!-- Content Row -->
        <div class="card">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ __('List of Questions') }}
                </h6>
                <div class="ml-auto">
                    <a href="{{ route('admin.questions.create') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">{{ __('New question') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable datatable-question" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Difficulty</th>
                                <th>Question Text</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($questions as $question)
                            <tr data-entry-id="{{ $question->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $question->difficulty->name }}</td>
                                <td>{{ $question->question_text }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('admin.questions.edit', $question->id) }}" class="btn btn-info">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        &nbsp
                                        <a href="{{ route('admin.questions.show', $question->id) }}" class="btn btn-success">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        &nbsp
                                        <form onclick="return confirm('are you sure ? ')" class="d-inline" action="{{ route('admin.questions.destroy', $question->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
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
    <!-- Content Row -->

</div>
@endsection

