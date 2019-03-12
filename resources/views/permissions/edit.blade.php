@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add new permission</div>
                    <div class="card-body">
                    {!! Form::model($permission, ['route' => ['permission.update', $permission], 'method' => 'PATCH']) !!}
                        @include('permissions._form', ['model' => $permission])
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection