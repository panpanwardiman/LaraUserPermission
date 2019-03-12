@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit role</div>

                <div class="card-body">
                    {!! Form::model($role, ['route' => ['role.update', $role], 'method' => 'PATCH']) !!}
                        @include('roles._form', ['model' => $role]);
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
