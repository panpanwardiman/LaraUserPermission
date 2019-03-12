@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Name</th>
                        <th>Permissions</th>
                        <th>Action</th>
                    </tr>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>
                                <?php $permissions = $role->permissions->pluck('name') ?>
                                @for($i = 0; $i < count($permissions); $i++)
                                    <span class="badge badge-primary">{{ $permissions[$i] }}</span>
                                @endfor
                            </td>
                            <td width="250">
                                {!! Form::model($role, ['route' => ['role.destroy', $role], 'method' => 'DELETE']) !!}
                                    <a href="{{ route('role.edit', $role->id) }}" class="btn btn-warning">Edit</a>
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Anda yakin ?')"]) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection