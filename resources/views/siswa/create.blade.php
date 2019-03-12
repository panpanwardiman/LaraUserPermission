@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add new siswa</div>

                <div class="card-body">
                    {!! Form::open(['route' => 'siswa.store', 'autocomplete' => 'off']) !!}
                        @include('siswa._form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

