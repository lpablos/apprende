@extends("layouts.app")
@section("style")
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" >
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css" >
@endsection

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
                        <ul class="nav nav-tabs card-header-tabs justify-content-end" >
                            <li class="nav-item">
                                {{-- @can('users.create') --}}
                                <a class="nav-link active" href="{{route('users.create')}}">Alta de usuario</a>
                                {{-- @endcan --}}
                            </li>
                        </ul>
                    </div>
                    {{-- @if($users->count() > 0) --}}
                        <div class="card-body">
                            <h5 class="card-title">Usuarios</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Actuales</h6>
                            <div class="table-responsive">
                                <table class="table table-striped" id="users">
                                    <thead>
                                        <tr>
                                            <th> Id </th>
                                            <th> </th>
                                            <th> Nombre </th>
                                            <th> Email </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th> Id </th>
                                            <th> </th>
                                            <th> Nombre </th>
                                            <th> Email </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            card-footer
                        </div>
                    {{-- @else
                        <div class="card-body">
                            <strong>No hay registros</strong>
                        </div>
                    @endif --}}
                </div>
            </div>

        </div>
    </div>
@endsection

@section("script")
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@8" ></script>

    <script>
        $(document).ready(function() {

            function loading(){
                Swal.fire({
                    title: '¡Por favor espera!',
                    html: 'Actualizando información',// add html attribute if you want or remove
                    allowOutsideClick: false,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                    },
                });
            }

            function fetchData() {
                loading();
                $.ajax({
                    url: "{{url('/users/show')}}", /* get-users */
                    context: document.body
                }).done(function( rawData ) {
                    // console.log(rawData);
                    const finalData = rawData.data.map(data => data).flat(1);
                    console.log(finalData);
                    var table = $('#users').DataTable();
                    table.clear();
                    finalData.forEach(data => {
                        table.row.add({
                            "id": data.id,
                            "btn": data.btn,
                            "name": data.name,
                            "email": data.email,

                        });
                    });
                    // table.rows.add(data);
                    // buildSelectLists();
                    table.draw();
                    swal.close();
                });
                
            }

            function initTable() {
                $('#users').DataTable({
                    destroy: true,
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'excelHtml5',
                            exportOptions: {
                                // columns: ':visible'
                                // columns: [ 0, ':visible' ]
                                // columns: [ 1, 2, 5 ]
                            }
                        },
                        'colvis'
                    ],
                    /*
                    columnDefs: [
                        {
                            'targets': 0,
                            'checkboxes': {
                                'selectRow': true
                            }
                        }
                    ],
                    */
                    pageLength : 20,
                    /*
                    select: {
                        'style': 'multi'
                    },
                    */
                    "language": { "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json" },
                    columns: [
                        { data: "id" },
                        {
                            data: "btn", "render": function (data, type, row) {
                                return data;
                            }
                        },
                        { data: "name" },
                        { data: "email" },
                        /*
                        {
                            data: "btn", "render": function (data, type, row) {
                                return data;
                            }
                        },
                        */
                    ],
                    "initComplete": function() {
                        fetchData();
                    }
                });
            }


            initTable();



            /*
            $('#table_users').DataTable({
                responsive: true,
                autoWidth: false,
                "language": { "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json" },
            });
            */


            $(document).on('click', 'form #trash', function(e) {
                let $form = $(this).closest('form');

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false,
                })

                swalWithBootstrapButtons.fire({
                    title: 'Estas seguro?',
                    text: "revisa este cambio",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'OK',
                    cancelButtonText: 'Cancelar',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        swalWithBootstrapButtons.fire(
                                'Finalizado',
                                'Success',
                                'success',
                            );                     
                        $form.submit();
                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Cancelado',
                            ':)',
                            'error'
                        );
                    }
                });

            });

        });
    </script>
@endsection