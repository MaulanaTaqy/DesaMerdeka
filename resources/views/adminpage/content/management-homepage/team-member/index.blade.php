@extends('adminpage.layout.main')

@section('title', 'Team Member')

@section('css')

<link rel="stylesheet" href="{{ asset('adminpage/partials/css/style.min.css') }}">
<link href="{{ asset('adminpage/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>

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
                    <span class="card-label fw-bold fs-3 mb-1">Management @yield("title")</span>
                </h3>
                <div class="card-toolbar">
                    <a href="{{ route('team-member.create') }}" class="btn btn-primary">
                        <i class="ki-duotone ki-plus fs-2"></i>Add @yield("title")
                    </a>
                </div>
            </div>
            
            <div class="card-body py-3">
                <div class="table-responsive">
                    <table id="example" class="table align-middle gs-0 gy-5">
                        <thead>
                            <tr class="fw-bold text-muted bg-light">
                                <th class="text-center min-w-50px">No</th>
                                <th class="text-center min-w-150px">Nama</th>
                                <th class="text-center min-w-125px">Position</th>
                                <th class="text-center min-w-125px">Image</th>
                                <th class="text-center min-w-125px">Link Facebook</th>
                                <th class="text-center min-w-125px">Link Instagram</th>
                                <th class="text-center min-w-150px">Link Youtube</th>
                                <th class="text-center">Option</th>
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

<script src="{{ asset('adminpage/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('adminpage/partials/javascript/dataTables.min.js') }}"></script>
<script src="{{ asset('adminpage/partials/javascript/style.min.js') }}"></script>
<script type="text/javascript">
    var $table;


    $(document).ready(function() {
        
        table = $("#example").DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: "{{ route('team-member.datatable') }}",
            columnDefs: [
            {
                targets: 0,
                render: function(data, type, full, meta) {
                    return `<div style="text-align: center;">`+ (meta.row + 1) +`.</div>`;
                }
            }, 
            {
                targets: 3,
                render: function(data, type, full, meta) {
                    return data ? `<img class="img-thumbnail wd-100p wd-sm-200" src="{{ asset('/') }}${data}">` : `<img class="img-thumbnail wd-100p wd-sm-200" src="{{ asset('virtual/assets/img/default.png') }}">`;
                }
            },
            {
                targets: -1,
                render: function(data, type, full, meta) {
                    let btn = `
                    <div class="btn-list">
                        <a href="{{ route('team-member.edit', ':id') }}" class="text-center btn btn-sm btn-primary"><span class="fa fa-edit"> </span></a>
                        <a href="javascript:void(0)" onclick="destroy('${data}')" class="text-center btn btn-sm btn-danger btn-delete"><span class="fa fa-trash"> </span></a>
                    </div>
                    `;

                    btn = btn.replaceAll(':id', data);

                    return btn;
                },
            }, ],
            columns: [
                { data: null },
                { data: 'name'},
                { 
                    data: 'position',
                    render: function(data) {
                        return `<div style="text-align: center;">`+ data +`</div>`
                    }
                },
                { data: 'image' },
                { 
                    data: 'fb_url',
                    render: function(data) {
                        return `<div style="text-align: center;">`+ data +`</div>`
                    }
                },
                { 
                    data: 'ig_url',
                    render: function(data) {
                        return `<div style="text-align: center;">`+ data +`</div>`
                    }
                },
                { 
                    data: 'yt_url',
                    render: function(data) {
                        return `<div style="text-align: center;">`+ data +`</div>`
                    }
                },
                { data: 'id'}, 
            ],
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            }
        });
    });

    function destroy(id) {
        let url = "{{ route('team-member.destroy',":id") }}";
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