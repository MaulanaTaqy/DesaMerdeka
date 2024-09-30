@extends('adminpage.layout.main')

@section('title', 'Event')

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
                    <a href="{{ route('event.create') }}" class="btn btn-primary">
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
                                <th class="text-center min-w-200px">Action</th>
                                <th class="text-center min-w-125px">Status</th>
                                <th class="text-center min-w-125px">Event</th>
                                <th class="text-center min-w-125px">H</th>
                                <th class="text-center min-w-125px">Thumbnail</th>
                                <th class="text-center min-w-150px">Title</th>
                                <th class="text-center min-w-150px">Content</th>
                                <th class="text-center min-w-150px">Speaker</th>
                                <th class="text-center min-w-150px">Sponsor</th>
                                <th class="text-center min-w-150px">Category</th>
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
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: "{{ route('event.datatable') }}",
            columnDefs: [
            {
                targets: 0,
                render: function(data, type, full, meta) {
                    return (meta.row + 1);
                }
            }, 
            {
                targets: 1,
                visible: `{{ getRoleName() }}` == 'guest'? false:true,
                width: 200,
                className: 'text-center',
                render: function(data, type, full, meta) {
                    let role = `{{ getRoleName() }}`;
                    let is_can = `{{ auth()->user()->can('member-account') }}`;
                    
                    let state = ``;
                    if(role == 'admin' || is_can){
                        state = `<button type="button" data-id="${data}" data-update="1" class="btn btn-icon btn-success btn-approval" title="Approve"><span class="fa fa-check"> </span></button>`;
                    
                        if(!!+full.is_approved)
                            state = `<button type="button" data-id="${data}" data-update="0" class="btn btn-icon btn-warning btn-approval" title="Disapprove"><span class="fa fa-times"> </span></button>`;
                    }

                    let btn = `
                    <div class="btn-list">
                        ${state}
                        <a href="{{ route('event.edit', ':id') }}" class="btn btn-icon btn-primary"><span class="fa fa-edit"> </span></a>
                        <a href="{{ route('guest-event.index', ':id') }}" class="btn btn-icon btn-info"><span class="fa fa-users"> </span></a>
                        
                        <a href="javascript:void(0)" onclick="destroy('${data}')" class="btn btn-icon btn-danger btn-delete"><span class="fa fa-trash"> </span></a>
                    </div>
                    `;

                    btn = btn.replaceAll(':id', data);

                    return btn;
                },
            },
            {
                targets: 2,
                render: function(data, type, full, meta) {
                    if(!!+data) return `<a class="badge badge-success" href="javascript:void(0);">Approved</a>`;
                    else return `<a class="badge badge-danger" href="javascript:void(0);">Unapproved</a>`;
                }
            },
            {
                targets: 3,
                render: function(data, type, full, meta) {
                    if (data) return `<a href="javascript:void(0);" class="btn btn-sm btn-outline-dark">${data.name}</a>`
                    else return `<a href="javascript:void(0);" class="btn btn-sm btn-outline-primary">Admin</a>`
                }
            },
            {
                targets: 4,
                render: function(data, type, full, meta) {
                    var carbon_start_datetime = moment(data);
                    var carbon_now = moment(); // membuat instance Carbon dari waktu sekarang

                    var carbon_end_datetime = moment(full.end_datetime); // menggunakan full.end_datetime

                    var duration = moment.duration(carbon_now.diff(carbon_start_datetime)); // menggunakan carbon_end_datetime dan carbon_start_datetime
                    var days = Math.round(duration.asDays());

                    // membandingkan waktu sekarang dengan start_datetime dan end_datetime
                    if (carbon_now.isBefore(carbon_start_datetime)) {
                        // event belum dimulai
                       // menampilkan jarak hari
                        return `<a class="badge badge-warning me-1" href="javascript:void(0);">H ${days}</a>`;
                    } else if (carbon_now.isBefore(carbon_end_datetime)) {
                        // event sedang berlangsung
                        return '<a class="badge badge-primary me-1" href="javascript:void(0);">On Going</a>';
                    } else {
                        // event sudah selesai
                        return '<a class="badge badge-success me-1" href="javascript:void(0);">Pass</a>';
                    }
                }
            },
            {
                targets: 5,
                render: function(data, type, full, meta) {
                    return data ? `<img class="img-thumbnail wd-100p wd-sm-200" src="{{ asset('/') }}${data}">` : `<img class="img-thumbnail wd-100p wd-sm-200" src="{{ asset('virtual/assets/img/default.png') }}">`;
                }
            }, 
            {
                targets: 6,
                width: 300,
                createdCell: function(td, cellData, rowData, row, col) {
                    if($(td).text().length > 50) {
                        let txt = $(td).text()
                        $(td).text(txt.substr(0, 50) + '...')
                    }
                },
                
            },
            {
                targets: 7,
                width: 300,
                createdCell: function(td, cellData, rowData, row, col) {
                    $(td).html($(td).text())
                    if($(td).text().length > 50) {
                        let txt = $(td).text()
                        $(td).text(txt.substr(0, 50) + '...')
                    }
                },
                
            },
            {
                targets: 8,
                render: function(data, type, full, meta) {
                    let speaker = '';
                    data.map(function(item){
                        speaker += `<a class="badge badge-${!!+item.is_keynote ? 'success' : 'primary'} me-1" href="javascript:void(0);">${item.speaker.name}</a>`;
                    })
                    return speaker;
                }
            }, 
            {
                targets: 9,
                render: function(data, type, full, meta) {
                    let sponsor = '';
                    data.map(function(item){
                        sponsor += `<a class="badge badge-primary me-1" href="javascript:void(0);">${item.sponsor.name}</a>`;
                    })
                    return sponsor;
                }
            }, 
            {
                targets: 10,
                render: function(data, type, full, meta) {
                    let cat = '';
                    data.map(function(item){
                        cat += `<a class="badge badge-primary me-1" href="javascript:void(0);">${item.meta_name.name}</a>`;
                    })
                    return cat;
                }
            }],
            columns: [
                { data: null },
                { data: 'id'},
                { data: 'is_approved'},
                { data: 'member'},
                { data: 'start_datetime'},
                { data: 'image'},
                { data: 'title'},
                { data: 'desc'},
                { data: 'event_speaker'},
                { data: 'event_sponsor'},
                { data: 'category'},
            ],
        });

        $(document).on('click', '.btn-approval', function(){
            let id = $(this).data('id')
            let state = $(this).data('update')

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
                        url    : `{{ route('event.approval') }}`,
                        type   : "POST",
                        data: { 
                            "id": id,
                            "state": state,
                        },
                        dataType: "JSON",
                        success: function(data) {
                            table.ajax.reload();
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
        var url = "{{ route('event.destroy',":id") }}";
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