@extends('adminpage.layout.main')

@section('title', 'Industri')

@section('css')

<link rel="stylesheet" href="{{ asset('adminpage/partials/css/style.min.css') }}">

@endsection

@section('toolbar')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
        @yield("title")
    </h1>

    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Home</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">
            @yield("title")
        </li>
    </ul>
</div>
@endsection

@section('content')

<div class="row g-5 g-xl-8">
    <div class="col-xl-12">
        <div class="card card-xl-stretch mb-xl-8">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">
                        Manajemen @yield("title")
                    </span>
                </h3>
                <div class="card-toolbar">
                    <a href="{{ url('/industri/create') }}" class="btn btn-primary">
                        <i class="ki-duotone ki-plus fs-2"></i> Add @yield("title")
                    </a>
                </div>
            </div>
            <div class="card-body py-3">
                <div class="table-responsive">
                    <table id="example" class="table align-middle gs-0 gy-5">
                        <thead>
                            <tr class="fw-bold text-muted bg-light">
                                <th class="text-center min-w-50px">No.</th>
                                <th class="text-center min-w-150px">Option</th>
                                <th class="text-center min-w-50px">Show</th>
                                <th class="min-w-125px">Name</th>
                                <th class="text-center min-w-125px">Image</th>
                                <th class="min-w-125px">Email</th>
                                <th class="text-center min-w-150px">Phone</th>
                                <th class="min-w-150px">Registered To</th>
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

@section('modal')

@endsection

@section('javascript')

<script src="{{ asset('adminpage/partials/javascript/dataTables.min.js') }}"></script>
<script src="{{ asset('adminpage/partials/javascript/style.min.js') }}"></script>
<script type="text/javascript">
    var $table;
    $(document).ready(function() {
        
        table = $("#example").DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: "{{ route('industri.datatable') }}",
            columnDefs: [
            {
                targets: 0,
                render: function(data, type, full, meta) {
                    return `<div style="text-align: center">`+ (meta.row + 1) +`.</div>`;
                }
            },
            {
                targets: 1,
                width: 200,
                render: function(data, type, full, meta) {
                    let state = ``;
                    if(full.user.permissions.findIndex(item => item.name === 'approved') < 0){
                        state = `<a href="javascript:void(0)" onclick="approve('${full.user.id}')" class="text-center btn btn-icon btn-success btn-sm btn-approval" title="Approve"><span class="fa fa-check"> </span></a>`;
                    }

                    let btn = `
                    <div class="btn-list">
                        ${state}
                        <a href="{{ route('industri.edit', ':id') }}" class="text-center btn btn-primary btn-sm" title="Profile Member">Profile</a>
                        <a href="javascript:void(0)" onclick="destroy('${data}')" class="text-center btn btn-danger btn-delete btn-sm" title="Delete Member"><span class="fa fa-trash"> </span></a>
                    </div>
                    `;

                    btn = btn.replaceAll(':id', data);

                    return btn;
                },
            }, 
            {
                targets: 2,
                className: 'text-center',
                render: function(data, type, full, meta) {
                    let role = `{{ getRoleName() }}`;
                    let is_can = `{{ auth()->user()->can('member-account') }}`;
                    
                    let state = `-`;
                    if(role == 'admin' || is_can){
                        state = `<a href="javascript:void(0)" onclick="check('${data}')" class="text-center btn btn-icon btn-success btn-is-show btn-sm" title="Show this item on Homepage"><span class="fa fa-check"> </span></a>`;
                    
                        if(!!+full.is_showed)
                            state = `<a href="javascript:void(0)" onclick="uncheck('${data}')" class="text-center btn btn-icon btn-sm btn-warning btn-is-show" title="Hide this item on Homepage"><span class="fa fa-times"> </span></a>`;
                    }

                    return state;
                },
            },
            {
                targets: 4,
                render: function(data, type, full, meta) {
                    return data ? `<img class="text-center img-thumbnail wd-100p wd-sm-100" src="{{ asset('/') }}${data}">` : `<img class="text-center img-thumbnail wd-100p wd-sm-200" src="{{ asset('virtual/assets/img/default.png') }}">`;
                }
            },
            {
                targets: -1,
                render: function(data, type, full, meta) {
                    return data ? data.name : 'Desa Merdeka';
                }
            }],
            "initComplete": function (settings, json) {  
                table.columns.adjust()
            },
            columns: [
                { data: null },
                { data: 'id'},
                { data: 'id'}, 
                { data: 'name'},
                { 
                    data: 'image',
                }, 
                { data: 'user.email'}, 
                { 
                    data: 'phone',
                    render: function(data) {
                        return `<div style="text-align: center">`+ data +`</div>`
                    }
                },
                { data: 'member_core'},             
            ],
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            }
        });
    });

    function approve(id) {
        Swal.fire({
            title: `Yakin ingin mengapprove member ini?`,
            text: "Saat anda memilih YA, maka member ini akan di bawah naungan anda.",
            icon: "warning",
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: "Ya",
            cancelButtonText: 'Kembali',
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: 'btn btn-danger'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url    : `{{ route('auth.approval') }}`,
                    type   : "POST",
                    data: {
                        "id": id,
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "JSON",
                    success: function(data) {
                        Swal.fire({
                            text: "Data berhasil diupdate",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Kembali Ke Halaman",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });

                        $("#example").DataTable().ajax.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                })
            }
        });
    }

    function check(id) {
        Swal.fire({
            title: `Yakin ingin mengupdate status data ini?`,
            text: "Anda bisa merubah status approval data ini kapanpun.",
            icon: "warning",
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: "Ya",
            cancelButtonText: 'Kembali',
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: 'btn btn-danger'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url    : `{{ route('member.is-showed') }}`,
                    type   : "POST",
                    data: {
                        "id": id,
                        "state":1,
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "JSON",
                    success: function(data) {
                        Swal.fire({
                            text: "Data berhasil diupdate",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Kembali Ke Halaman",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });

                        $("#example").DataTable().ajax.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                })
            }
        });
    }

    function uncheck(id) {
        Swal.fire({
            title: `Yakin ingin mengupdate status data ini?`,
            text: "Anda bisa merubah status approval data ini kapanpun.",
            icon: "warning",
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: "Ya",
            cancelButtonText: 'Kembali',
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: 'btn btn-danger'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url    : `{{ route('member.is-showed') }}`,
                    type   : "POST",
                    data: {
                        "id": id,
                        "state":0,
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "JSON",
                    success: function(data) {
                        Swal.fire({
                            text: "Data berhasil diupdate",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Kembali Ke Halaman",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });

                        $("#example").DataTable().ajax.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                })
            }
        });
    }

    function destroy(id) {
        var url = "{{ route('industri.destroy',':id') }}";
        url = url.replace(':id', id);
        Swal.fire({
            title: `Yakin ingin menghapus data ini?`,
            text: "Ketika data terhapus, anda tidak bisa mengembalikan data tersebut!",
            icon: "warning",
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: "Ya, Hapus",
            cancelButtonText: 'Kembali',
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: 'btn btn-danger'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url    : url,
                    type   : "delete",
                    data: { "id":id, "_token": "{{ csrf_token() }}" },
                    dataType: "JSON",
                    success: function(data) {
                        Swal.fire({
                            text: "Data berhasil dihapus",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Kembali Ke Halaman",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });

                        $("#example").DataTable().ajax.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                })
            }
        });
    }
</script>

@endsection