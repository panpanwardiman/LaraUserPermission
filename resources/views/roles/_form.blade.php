<div class="form-group row">
    <label for="role" class="col-md-4 col-form-label text-md-right">Role</label>
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => $errors->has('name') ? 'form-control is-invalid':'form-control']) !!}
        @if($errors->has('name'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="permission" class="col-md-4 col-form-label text-md-right">Permissions</label>
    <div class="col-md-6">
        @foreach($permissions as $permission)
            {!! Form::checkbox('permission[]', $permission->name, isset($rolePermissions) ? (in_array($permission->id, $rolePermissions, true) ? true : false) : false, ['id' => $permission->name]) !!}
            <label for="{{ $permission->name }}">{{ ucwords($permission->name) }}</label><br>
        @endforeach
    </div>
</div>

{!! Form::submit(isset($model) ? 'Update' : 'Save', ['class' => 'btn btn-primary float-right']) !!}