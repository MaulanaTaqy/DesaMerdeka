@extends('adminpage.layout.main')

@section('title', 'Management Partner')

@section('css')
<link href="{{ asset('adminpage/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

@endsection

@section('toolbar')
<div class="breadcrumb-header justify-content-between">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page"> Management Partner</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')

<div class="row g-5 g-xl-8">
    <!--begin::Col-->
    <div class="col-xl-12">
        <!--begin::Tables Widget 1-->
        <div class="card card-xl-stretch mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">List Partner </span>
                </h3>
                <div class="card-toolbar">
                    <div class="d-flex align-items-center position-relative my-1">
                        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                        </i>
                        <input type="text" data-kt-docs-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search" />
                    </div>
<a href="{{ route('sponsors.create') }}" class="btn btn-primary mb-4 data-table-btn"><i class="fa fa-plus"></i> Partner</a>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">

                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table align-middle gs-0 gy-5" id="datatable">
                        <!--begin::Table head-->
                        <thead>
                            <tr>
                                <th class="border-bottom-0">No</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Email</th>
                                <th class="border-bottom-0">Phone</th>
                                <th class="border-bottom-0">Desc</th>
                                <th class="border-bottom-0">Logo</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Is Show</th>
                                <th class="border-bottom-0">Option</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('javascript')
<!-- DATA TABLE JS-->
<script src="{{ asset('adminpage/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('adminpage/assets/js/scripts.bundle.js') }}"></script>

<script src="{{ asset('adminpage/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>

<script>
var dt;
var KTDatatablesServerSide = function () {
    // Shared variables
    var table;

    // Private functions
    var initDatatable = function () {
        dt = $("#datatable").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('sponsors.datatable') }}",
            columnDefs: [
                {
                    targets: 0,
                    render: function (data, type, full, meta) {
                        return meta.row + 1;
                    }
                },
                {
                    targets: 4,
                    createdCell: function(td, cellData, rowData, row, col) {
                        $(td).html($(td).text())
                        if($(td).text().length > 30) {
                            let txt = $(td).text()
                            $(td).text(txt.substr(0, 30) + '...')
                        }
                    },
                    
                },
                {
                    targets: 5,
                    render: function (data, type, full, meta) {
                        return data ? `<img class='img-thumbnail wd-50p w-sm-200px' src="{{ asset('/') }}${data}">` : `<img class='img-thumbnail w-100px w-sm-200px' src="asset('virtual/assets/img/default.png')">`;
                    }
                },
                {
                    targets: 6,
                    render: function (data, type, full, meta) {
                        if (!!+data) return `<a class="badge badge-success text-light" href="javascript:void(0);">Approved</a>`;
                        else return `<a class="badge badge-danger text-light" href="javascript:void(0);">Unapproved</a>`;
                    }
                },
                {
                    targets: 7,
                    className: 'text-center',
                    render: function (data, type, full, meta) {
                        let role = '{{ getRoleName() }}';
                        let is_can = '{{ auth()->user()->can('member-account') }}';
                        let state2 = '';
                        if (role === 'admin' || is_can) {
                            state2 = `<button type="button" data-id="${full.id}" data-update="1" class="btn btn-icon btn-success btn-is-show" title="Show this item on Homepage"><span class="fa fa-check"> </span></button>`;

                            if (!!+full.is_showed)
                                state2 = `<button type="button" data-id="${full.id}" data-update="0" class="btn btn-icon btn-warning btn-is-show" title="Hide this item on Homepage"><span class="fa fa-times-circle"> </span></button>`;
                        }

                        return state2;
                    },
                },
                {
                    targets: 8,
                    render: function (data, type, full, meta) {
                        let role = '{{ getRoleName() }}';
                        let is_can = '{{ auth()->user()->can('member-account') }}';
                        let state1 = '';
                        if (role === 'admin' || is_can) {
                            state1 = `<button type="button" data-id="${data}" data-update="1" class="btn btn-icon btn-success btn-approval" title="Approve"><span class="fa fa-check"> </span></button>`;

                            if (!!+full.is_approved)
                                state1 = `<button type="button" data-id="${data}" data-update="0" class="btn btn-icon btn-warning btn-approval" title="Disapprove"><span class="fa fa-times-circle"> </span></button>`;
                        }

                        let btn = `
                        <div class="btn-list">
                            ${state1}
                            <a href="{{ route('sponsors.edit', ':id') }}" class="btn btn-md btn-primary"><span class="fa fa-edit"> </span></a>
                            <a href="javascript:void(0)" onclick="destroy('${data}')" class="btn btn-md btn-danger btn-delete"><span class="fa fa-trash"> </span></a>
                        </div>
                        `;

                        btn = btn.replaceAll(':id', data);

                        return btn;
                    },
                },
            ],
            columns: [
                { data: null },
                { data: 'name' },
                { data: 'email' },
                { data: 'phone' },
                { data: 'desc' },
                { data: 'image' },
                { data: 'is_approved' },
                { data: 'is_showed' },
                { data: 'id' },
            ],
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            }
        });

        table = dt.$;
    };

    // Search Datatable
    var handleSearchDatatable = function () {
        const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            dt.search(e.target.value).draw();
        });
    };

    // Public methods
    return {
        init: function () {
            initDatatable();
            handleSearchDatatable();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTDatatablesServerSide.init();
});

$(document).on('click', '.btn-approval', function () {
    let id = $(this).data('id');
    let state1 = $(this).data('update');

    Swal.fire({
        title: "Yakin ingin mengupdate status data ini?",
        text: "Anda bisa merubah status approval data ini kapanpun.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya!"
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: '{{ route('sponsors.approval') }}',
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    "id": id,
                    "state1": state1,
                },
                dataType: "JSON",
                success: function (data) {
                    dt.ajax.reload(null, false);
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Data berhasil diupdate',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        }
    });
});

$(document).on('click', '.btn-is-show', function () {
    let is_showed = $(this).data('id');
    let state2 = $(this).data('update');

    Swal.fire({
        title: "Yakin ingin mengupdate status data ini?",
        text: "Anda bisa merubah status approval data ini kapanpun.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya!"
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: '{{ route('sponsors.is-showed') }}',
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    "is_showed": is_showed,
                    "state2": state2,
                },
                dataType: "JSON",
                success: function (data) {
                    dt.ajax.reload(null, false);
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Data berhasil diupdate',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        }
    });
});


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
                    data: { 
                        _token: '{{ csrf_token() }}',
                        "id":id
                    },
                    dataType: "JSON",
                    success: function(data) {
                        dt.ajax.reload( null, false );
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