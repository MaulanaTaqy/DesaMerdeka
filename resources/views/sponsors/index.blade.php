@extends('layout.main')

@section('title', 'Management Sponsors')

@section('css')

@endsection

@section('breadcumb')
<div class="breadcrumb-header justify-content-between">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page"> Management Sponsors</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')

<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Sponsors
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <a href="{{ route('sponsors.create') }}" class="btn btn-primary mb-4 data-table-btn"><i class="fa fa-plus"></i> Sponsors</a>
                    <table id="datatable" class="border-top-0  table table-bordered text-nowrap border-bottom">
                        <thead>
                            <tr>
                                <th class="border-bottom-0">No</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Logo</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Is Show</th>
                                <th class="border-bottom-0">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



@section('script')
<!-- DATA TABLE JS-->
<script src="{{ asset('virtual/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>

<script src="{{ asset('virtual/assets/js/script.js') }}"></script>

<script>
    var $table;
    
    $(document).ready(function() {
        
        table = $("#datatable").DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: "{{ route('sponsors.datatable') }}",
            columnDefs: [
            {
                targets: 0,
                render: function(data, type, full, meta) {
                    return (meta.row + 1);
                }
            }, 
            {
                targets: 2,
                render: function(data, type, full, meta) {
                    return data ? `<img class="img-thumbnail wd-100p wd-sm-200" src="{{ asset('/') }}${data}">` : `<img class="img-thumbnail wd-100p wd-sm-200" src="{{ asset('virtual/assets/img/default.png') }}">`;
                }
            },
            {
                targets: 3,
                render: function(data, type, full, meta) {
                    if(!!+data) return `<a class="badge bg-success" href="javascript:void(0);">Approved</a>`;
                    else return `<a class="badge bg-danger" href="javascript:void(0);">Unapproved</a>`;
                }
            }, 
            {
                targets: 4,                
                className: 'text-center',
                render: function(data, type, full, meta) {
                    let role = `{{ getRoleName() }}`;
                    let is_can = `{{ auth()->user()->can('member-account') }}`;
                    // console.log(full.id);
                    let state2 = ``;
                    if(role == 'admin' || is_can){
                        state2 = `<button type="button" data-id="${full.id}" data-update="1" class="btn btn-icon btn-success btn-is-show" title="Show this item on Homepage"><span class="fe fe-check"> </span></button>`;
                    
                        if(!!+full.is_showed)
                            state2 = `<button type="button" data-id="${full.id}" data-update="0" class="btn btn-icon btn-warning btn-is-show" title="Hide this item on Homepage"><span class="fe fe-x-circle"> </span></button>`;
                    }

                    return state2;
                },
            },
            {
                targets: 5,
                render: function(data, type, full, meta) {

                        let role = `{{ getRoleName() }}`;
                        let is_can = `{{ auth()->user()->can('member-account') }}`;
                        
                        let state1 = ``;
                        if(role == 'admin' || is_can){
                            state1 = `<button type="button" data-id="${data}" data-update="1" class="btn btn-icon btn-success btn-approval" title="Approve"><span class="fe fe-check"> </span></button>`;
                            
                            if(!!+full.is_approved)
                                state1 = `<button type="button" data-id="${data}" data-update="0" class="btn btn-icon btn-warning btn-approval" title="Disapprove"><span class="fe fe-x-circle"> </span></button>`;
                        }

                    let btn = `
                    <div class="btn-list">
                        ${state1}
                        <a href="{{ route('sponsors.edit', ':id') }}" class="btn btn-md btn-primary"><span class="fe fe-edit"> </span></a>
                        <a href="javascript:void(0)" onclick="destroy('${data}')" class="btn btn-md btn-danger btn-delete"><span class="fe fe-trash-2"> </span></a>
                    </div>
                    `;

                    btn = btn.replaceAll(':id', data);

                    return btn;
                },
            }, ],
            columns: [
                { data: null },
                { data: 'name'},
                { data: 'image' },
                { data: 'is_approved'},
                { data: 'is_showed'},
                { data: 'id'}, 
            ],
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            }
        });

        $(document).on('click', '.btn-approval', function(){
            let id = $(this).data('id')
            let state1 = $(this).data('update')
            // console.log(id);

            Swal.fire({
                title: "Yakin ingin mengupdate status data ini?",
                text: "Anda bisa merubah status approval data ini kapanpun.",
                icon: "warning",
                showCancelButton  : true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor : "#d33",
                confirmButtonText : "Ya!"
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url    : `{{ route('sponsors.approval') }}`,
                        type   : "POST",
                        data: { 
                            "id": id,
                            "state1": state1,
                        },
                        dataType: "JSON",
                        success: function(data) {
                            table.ajax.reload( null, false );
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                title: 'Data berhasil diupdate',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    })
                }
            })
        })

        $(document).on('click', '.btn-is-show', function(){
            let is_showed = $(this).data('id')
            let state2 = $(this).data('update')

            // console.log(is_showed);

            Swal.fire({
                title: "Yakin ingin mengupdate status data ini?",
                text: "Anda bisa merubah status approval data ini kapanpun.",
                icon: "warning",
                showCancelButton  : true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor : "#d33",
                confirmButtonText : "Ya!"
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url    : `{{ route('sponsors.is-showed') }}`,
                        type   : "POST",
                        data: { 
                            "is_showed": is_showed,
                            "state2": state2,
                        },
                        dataType: "JSON",
                        success: function(data) {
                            table.ajax.reload( null, false );
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                title: 'Data berhasil diupdate',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    })
                }
            })
        })
    })

    function destroy(id) {
        var url = "{{ route('sponsors.destroy',":id") }}";
        url = url.replace(':id', id);
    
        Swal.fire({
            title: "Yakin ingin menghapus data ini?",
            text: "Ketika data terhapus, anda tidak bisa mengembalikan data tersbut!",
            icon: "warning",
            showCancelButton  : true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor : "#d33",
            confirmButtonText : "Ya, Hapus!"
        }).then((result) => {
            // console.log(result);
            if (result.value) {
                $.ajax({
                    url    : url,
                    type   : "delete",
                    data: { "id":id },
                    dataType: "JSON",
                    success: function(data) {
                        table.ajax.reload( null, false );
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: 'Data berhasil dihapus',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    },
                    error: function(data){
                        table.ajax.reload( null, false );
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            title: 'Data gagal dihapus',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }

                })
            }
        })
    } 
</script>
@endsection