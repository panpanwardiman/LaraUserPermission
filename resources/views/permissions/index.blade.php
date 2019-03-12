@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <a href="{{ route('permission.create') }}" class="btn btn-primary float-right mb-3">Add new permissions</a>

                <table class="table table-bordered table-striped">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>

                    <?php $no = ($permissions->currentPage() - 1) * $permissions->perPage() + 0 ?>
                    @if(count($permissions) > 0)
                        @foreach($permissions as $permission)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>
                                    {!! Form::model($permission, ['route' => ['permission.destroy', $permission], 'method' => 'DELETE']) !!}
                                        <a href="{{ route('permission.edit', $permission->id) }}" class="btn btn-warning">Edit</a>
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Anda yakin ?')"]) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @else 
                        <tr>
                            <td colspan="3">Tidak ada data permissions</td>
                        </tr>
                    @endif
                </table>
                {{ $permissions->links() }}
            </div>
        </div>
    </div>
@endsection