@extends('layout.main')

@section('title', 'Management Event')

@section('css')

@endsection

@section('breadcumb')
<div class="breadcrumb-header justify-content-between">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page"> Management Event</li>
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
                <h3 class="card-title">List Event</h3>
            </div>
            <div class="card-body">
                <a href="{{ route('event.create') }}" class="btn btn-primary mb-4 data-table-btn"><i class="fa fa-plus"></i> Event</a>
                <table id="datatable" class="border-top-0 table table-bordered border-bottom">
                    <thead>
                        <tr>
                            <th class="border-bottom-0">No</th>
                            <th class="border-bottom-0">Action</th>
                            <th class="border-bottom-0">Status</th>
                            <th class="border-bottom-0">Event By</th>
                            <th class="border-bottom-0">H</th>
                            <th class="border-bottom-0">Thumbnail</th>
                            <th class="border-bottom-0">Title</th>
                            <th class="border-bottom-0">Content</th>
                            <th class="border-bottom-0">Speaker</th>
                            <th class="border-bottom-0">Sponsor</th>
                            <th class="border-bottom-0">Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
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
                        state = `<button type="button" data-id="${data}" data-update="1" class="btn btn-icon btn-success btn-approval" title="Approve"><span class="fe fe-check"> </span></button>`;
                    
                        if(!!+full.is_approved)
                            state = `<button type="button" data-id="${data}" data-update="0" class="btn btn-icon btn-warning btn-approval" title="Disapprove"><span class="fe fe-x-circle"> </span></button>`;
                    }

                    let btn = `
                    <div class="btn-list">
                        ${state}
                        <a href="{{ route('event.edit', ':id') }}" class="btn btn-icon btn-primary"><span class="fe fe-edit"> </span></a>
                        <a href="{{ route('guest-event.index', ':id') }}" class="btn btn-icon btn-secondary"><span class="fe fe-users"> </span></a>
                        
                        <a href="javascript:void(0)" onclick="destroy('${data}')" class="btn btn-icon btn-danger btn-delete"><span class="fe fe-trash-2"> </span></a>
                    </div>
                    `;

                    btn = btn.replaceAll(':id', data);

                    return btn;
                },
            },
            {
                targets: 2,
                render: function(data, type, full, meta) {
                    if(!!+data) return `<a class="badge bg-success" href="javascript:void(0);">Approved</a>`;
                    else return `<a class="badge bg-danger" href="javascript:void(0);">Unapproved</a>`;
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
                        return `<a class="badge bg-warning me-1" href="javascript:void(0);">H ${days}</a>`;
                    } else if (carbon_now.isBefore(carbon_end_datetime)) {
                        // event sedang berlangsung
                        return '<a class="badge bg-primary me-1" href="javascript:void(0);">On Going</a>';
                    } else {
                        // event sudah selesai
                        return '<a class="badge bg-success me-1" href="javascript:void(0);">Pass</a>';
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
                        speaker += `<a class="badge bg-${!!+item.is_keynote ? 'success' : 'primary'} me-1" href="javascript:void(0);">${item.speaker.name}</a>`;
                    })
                    return speaker;
                }
            }, 
            {
                targets: 9,
                render: function(data, type, full, meta) {
                    let sponsor = '';
                    data.map(function(item){
                        sponsor += `<a class="badge bg-primary me-1" href="javascript:void(0);">${item.sponsor.name}</a>`;
                    })
                    return sponsor;
                }
            }, 
            {
                targets: 10,
                render: function(data, type, full, meta) {
                    let cat = '';
                    data.map(function(item){
                        cat += `<a class="badge bg-primary me-1" href="javascript:void(0);">${item.meta_name.name}</a>`;
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