@extends("layouts.app")
@section("style") @endsection
@section("wrapper")
    <div class="page-wrapper">
        <div class="page-content">

            <div>

                @if(session('info'))
                    <div class="alert alert-success">
                        {{session('info')}}
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
                        <h5 class="card-title">Alta de </h5>
                        <h6 class="card-subtitle mb-2 text-muted">Permiso</h6>
                        {!! Form::open(['route'=>'permisos.store']) !!}
                            @include('permisos.partials.form')
                            {!! Form::submit('Dar de alta',  ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>

                    <div class="card-footer">
                        card-footer
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section("script") @endsection