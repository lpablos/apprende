<div class="row">
    <div class="col-12 text-center h5 text-muted">
        <label>Datos generales</label>
        <hr>
    </div>
</div>

<div class="row mb-3">
    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 position-relative input-icon">
        {!! Form::label('name', 'Nombre') !!}
        {!! Form::text('name', isset($role->name) ? $role->name : null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
        @error('name')
            <small class="text-danger"> {{ $message }} </small>
        @enderror
    </div>
</div>
