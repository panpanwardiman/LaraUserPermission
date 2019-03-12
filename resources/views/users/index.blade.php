@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <a href="{{ route('user.create') }}" class="btn btn-primary float-right mb-3">Add new users</a>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    <?php $no = ($users->currentPage() - 1) * $users->perPage() + 0; ?>
                    @if(count($users) > 0)
                        @foreach($users as $user)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $u)
                                            <span class="badge badge-primary">{{ $u }}</span>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                                    @if(Auth::user()->id != $user->id)
                                        {!! Form::model($user, ['route' => ['user.destroy', $user], 'method' => 'DELETE', 'style' => 'display: inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Anda yakin ?')"]) !!}
                                        {!! Form::close() !!}
                                    @endif
                                    
                                </td>
                            </tr>
                        @endforeach
                    @else 
                        <tr>
                            <td colspan="5">Tidak ada data users</td>
                        </tr>
                    @endif
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection