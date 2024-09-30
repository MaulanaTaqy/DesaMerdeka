@extends('adminpage.layout.main')

@section('title', 'Event Speaker')

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
                    <span class="card-label fw-bold fs-3 mb-1">Management @yield("title")</span>
                </h3>
                <div class="card-toolbar">
                    <a href="{{ route('meta.speakers.create') }}" class="btn btn-primary">
                        <i class="ki-duotone ki-plus fs-2"></i>Add @yield("title")
                    </a>
                </div>
            </div>
            
            <div class="card-body py-3">
                <div class="table-responsive">
                    <table id="datatable" class="table align-middle gs-0 gy-5">
                        <thead>
                            <tr class="fw-bold text-muted bg-light">
                                <th class="text-center min-w-50px">No</th>
                                <th class="text-center min-w-150px">Nama</th>
                                <th class="text-center min-w-125px">Title</th>
                                <th class="text-center min-w-125px">Image</th>
                                <th class="text-center min-w-100px">Option</th>
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

<script>
    var $table;
    
    $(document).ready(function() {
        
        table = $("#datatable").DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: "{{ route('meta.speakers.datatable') }}",
            columnDefs: [
            {
                targets: 0,
                className: 'text-center',
                render: function(data, type, full, meta) {
                    return (meta.row + 1);
                }
            }, 
            {
                targets: 3,
                className: 'text-center',
                render: function(data, type, full, meta) {
                    return data ? `<img class="img-thumbnail wd-100p wd-sm-200" src="{{ asset('/') }}${data}">` : `<img class="img-thumbnail wd-100p wd-sm-200" src="{{ asset('virtual/assets/img/default.png') }}">`;
                }
            },
            {
                targets: -1,
                className: 'text-center',
                render: function(data, type, full, meta) {
                    let btn = `
                    <div class="btn-list">
                        <a href="{{ route('meta.speakers.edit', ':id') }}" class="btn btn-sm btn-primary"><span class="fa fa-edit"> </span></a>
                        <a href="javascript:void(0)" onclick="destroy('${data}')" class="btn btn-sm btn-danger btn-delete"><span class="fa fa-trash"> </span></a>
                    </div>
                    `;

                    btn = btn.replaceAll(':id', data);

                    return btn;
                },
            }, ],
            columns: [
                { data: null },
                { data: 'name'},
                { data: 'title'},
                { data: 'image' },
                { data: 'id'}, 
            ],
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            }
        });
    })

    function destroy(id) {
        var url = "{{ route('meta.speakers.destroy',":id") }}";
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
                        table.ajax.reload();
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: 'Data berhasil dihapus',
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