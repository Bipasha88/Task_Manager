@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <p class="float-left">{{ __('Task list') }}</p>
                        <a href="{{route('task.create')}}" class="float-right" style="text-decoration: none">+</a>
                    </div>
                    @include('includes.tasks.list')
                </div>
            </div>
        </div>
    </div>
@endsection
