@extends("layouts.app")
@section("style") @endsection
@section("wrapper")
    <div class="page-wrapper">
        <div class="page-content">

            <div>

                @if(session('info'))
                    <div class="alert alert-success">
                        <strong>{{session('info')}}</strong>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        {{--
                        <ul class="nav nav-tabs card-header-tabs justify-content-end" >
                            <li class="nav-item">
                                @can('users.create')
                                <a class="nav-link active" href="{{route('users.create')}}">Alta de usuario</a>
                                @endcan
                            </li>
                        </ul>
                        --}}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Edición de </h5>
                        <h6 class="card-subtitle mb-2 text-muted">Permiso</h6>
                        
                        {!! Form::model($permiso, ['route' => ['permisos.update', $permiso], 'method' => 'put' ]) !!}
                        <div class="row mb-3">
                            <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 position-relative input-icon">
                                {!! Form::label('name', 'Nombre') !!}
                                {!! Form::text('name', isset($permiso->name) ? $permiso->name : null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
                                @error('name')
                                    <small class="text-danger"> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4 col-md-3 col-lg-3 col-xl-3">
                                {!! Form::submit('Actualizar Permiso', ['class' => 'btn btn-primary mt-2']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                        
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection

@section("script")

@endsection