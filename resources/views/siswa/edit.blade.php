@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit siswa</div>

                <div class="card-body">
                    {!! Form::model($siswa, ['route' => ['siswa.update', $siswa], 'method' => 'PATCH','autocomplete' => 'off']) !!}
                        @include('siswa._form', ['model' => $siswa]);
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
