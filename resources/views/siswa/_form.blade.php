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
    <label for="birth" class="col-md-4 col-form-label text-md-right">Birth</label>
    <div class="col-md-6">
        {!! Form::text('birth', isset($siswa) ? $siswa->birth->format('d-m-Y') : null, ['class' => $errors->has('birth') ? 'form-control is-invalid':'form-control', 'id' => 'datepicker']) !!}
        @if($errors->has('birth'))
            <div class="invalid-feedback">{{ $errors->first('birth') }}</div>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
    <div class="col-md-6 pt-2">
        {!! Form::radio('gender', 'laki - laki', null, ['id' => 'laki']) !!}
        <label for="laki">Laki - Laki</label>
        {!! Form::radio('gender', 'perempuan', null, ['id' => 'perempuan']) !!}
        <label for="perempuan">Perempuan</label>
    </div>
</div>

<div class="form-group row">
    <label for="class" class="col-md-4 col-form-label text-md-right">Class</label>
    <div class="col-md-6">
        {!! Form::select('kelas_id', App\Kelas::all()->pluck('name', 'id'), null, ['class' => $errors->has('class') ? 'form-control is-invalid':'form-control']) !!}
        @if($errors->has('class'))
            <div class="invalid-feedback">{{ $errors->first('class') }}</div>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
    <div class="col-md-6">
        {!! Form::textarea('address', null, ['class' => 'form-control', 'rows' => '4']) !!}
        @if($errors->has('address'))
            <div class="invalid-feedback">{{ $errors->first('address') }}</div>
        @endif
    </div>
</div>

{!! Form::submit(isset($model) ? 'Update' : 'Save', ['class' => 'btn btn-primary float-right']) !!}

@push('scripts')
    <script>
        jQuery(document).ready(function($) {
            $('#datepicker').datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: "-50:+10",
                dateFormat: "dd-mm-yy"
            });
        });
    </script>
@endpush