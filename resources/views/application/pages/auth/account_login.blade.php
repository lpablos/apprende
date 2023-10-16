@extends('application.layout.default')
<!-- {{ asset('') }} -->

@section('content')
@if (\Session::has('success'))
   @php alert()->success('Success', \Session::get('success')); @endphp
@endif
<div class="block mt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex flex-column">
                <div class="card flex-grow-1 mb-md-0">
                    <div class="card-body">
                        <h3 class="card-title">Iniciar Sessión</h3>
                        @include('application.pages.forms.login')                    
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex flex-column mt-4 mt-md-0">
                <div class="card flex-grow-1 mb-0">
                    <div class="card-body">
                        <h3 class="card-title">Registrarme</h3>
                        @include('application.pages.forms.registro')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop