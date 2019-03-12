@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                @can('siswa create')
                    <a href="{{ route('siswa.create') }}" class="btn btn-primary float-right mb-3">Add new siswa</a>
                @endcan
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Birth</th>
                        <th>Gender</th>
                        <th>Class</th>
                        <th>Action</th>
                    </tr>
                    <?php $no = ($siswa->currentPage() - 1) * $siswa->perPage() + 0 ?>
                    @if(count($siswa) > 0)
                        @foreach($siswa as $row)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->birth->format('d F Y') }}</td>
                                <td>{{ $row->gender }}</td>
                                <td>{{ $row->kelas->name }}</td>
                                <td>
                                    @can('siswa detail')
                                        <a href="{{ route('siswa.show', $row->id) }}" class="btn btn-success">Details</a>
                                    @endcan

                                    @can('siswa edit')
                                        <a href="{{ route('siswa.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                                    @endcan

                                    @can('siswa delete')
                                        {!! Form::model($row, ['route' => ['siswa.destroy', $row], 'method' => 'DELETE', 'style' => 'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Anda yakin ?')"]) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">Tidak ada data siswa !</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection