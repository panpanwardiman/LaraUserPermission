@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add new permission</div>
                    <div class="card-body">
                    {!! Form::open(['route' => 'permission.store']) !!}
                        @include('permissions._form')
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection