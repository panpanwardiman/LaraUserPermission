@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ ucwords($siswa->name) }}</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama</th>
                                <td>{{ ucwords($siswa->name) }}</td>
                            </tr>
                            <tr>
                                <th>Birth</th>
                                <td>{{ $siswa->birth->format('d F Y') }}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>{{ ucwords($siswa->gender) }}</td>
                            </tr>
                            <tr>
                                <th>Class</th>
                                <td>{{ $siswa->kelas->name }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection