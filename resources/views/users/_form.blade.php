<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => $errors->has('name') ? 'form-control is-invalid':'form-control']) !!}
        @if($errors->has('name'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
        @endif 
    </div>   
</div>

<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
    <div class="col-md-6">
        {!! Form::email('email', null, ['class' => $errors->has('email') ? 'form-control is-invalid':'form-control']) !!}
        @if($errors->has('email'))
            <div class="invalid-feedback">{{ $errors->first('emailemail') }}</div>
        @endif 
    </div>   
</div>

<div class="form-group row">
    <label for="role" class="col-md-4 col-form-label text-md-right">Role</label>
    <div class="col-md-6 pt-2">
        @if(isset($roles))
            @foreach($roles as $role)
                {!! Form::radio('role_id', $role->name, isset($userRole) ? (in_array($role->name, $userRole) ? true : false) : false, ['id' => $role->name]) !!}
                <label for="{{ $role->name }}">{{ ucwords($role->name) }}</label><br>
            @endforeach
        @endif
    </div>
</div>

@if(!isset($model->exists))
<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
    <div class="col-md-6">
        {!! Form::password('password', ['class' => $errors->has('password') ? 'form-control is-invalid':'form-control']) !!}
        @if($errors->has('password'))
            <div class="invalid-feedback">{{ $errors->first('password') }}</div>
        @endif    
    </div>
</div>

<div class="form-group row">
    <label for="password_confirm" class="col-md-4 col-form-label text-md-right">Password Confirmation</label>
    <div class="col-md-6">
        {!! Form::password('password_confirm', ['class' => $errors->has('password_confirm') ? 'form-control is-invalid':'form-control']) !!}
        @if($errors->has('password_confirm'))
            <div class="invalid-feedback">{{ $errors->first('password_confirm') }}</div>
        @endif 
    </div>   
</div>
@endif

{!! Form::submit(isset($model) ? 'Update':'Save', ['class'=>'btn btn-primary float-right']) !!}