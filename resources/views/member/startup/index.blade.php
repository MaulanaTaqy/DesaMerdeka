@extends('layout.main')

@section('title', 'Member / UMKM')

@section('css')

@endsection

@section('breadcumb')
<div class="breadcrumb-header justify-content-between">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page">Management UMKM</li>
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
                <h3 class="card-title">Member UMKM
                </h3>
            </div>
            <div class="card-body">
                <a href="{{ route('umkm.create') }}" class="btn btn-primary mb-4 data-table-btn"><i class="fa fa-plus"></i> UMKM</a>
                <table id="datatable" class="border-top-0  table table-bordered text-nowrap border-bottom w-100">
                    <thead>
                        <tr>
                            <tr>
                                <th class="border-bottom-0">No</th>
                                <th class="border-bottom-0">Option</th>
                                <th class="border-bottom-0">Show</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Image</th>
                                <th class="border-bottom-0">Email</th>
                                <th class="border-bottom-0">Phone</th>
                                <th class="border-bottom-0">Registered To</th>
                            </tr>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_form">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title"></h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="main-content-body main-content-body-contacts card custom-card">
                    <div class="main-contact-info-header pt-3">
                        <div class="media">
                            <div class="main-img-user">
                                <img alt="No Image" id="logo" src="{{ asset('virtual/assets/img/default.png') }}">
                            </div>
                            <div class="media-body">
                                <h5 id="name"></h5>
                                <p id="type"></p>
                                <nav class="contact-info">
                                    <a id="fb_url" target="_blank" href="javascript:void(0);" class="contact-icon border tx-inverse" data-bs-toggle="tooltip" title="" data-bs-original-title="Facebook" aria-label="Facebook"><i class="fe fe-facebook"></i></a>
                                    <a id="ig_url" target="_blank" href="javascript:void(0);" class="contact-icon border tx-inverse" data-bs-toggle="tooltip" title="" data-bs-original-title="Instagram" aria-label="Instagram"><i class="fe fe-instagram"></i></a>
                                    <a id="website_url" target="_blank" href="javascript:void(0);" class="contact-icon border tx-inverse" data-bs-toggle="tooltip" title="" data-bs-original-title="Website" aria-label="Website"><i class="fe fe-globe"></i></a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="main-contact-action btn-list pt-3 pe-3">
                        <div class="media-body">
                            <h5>Registered To</h5>
                            <h6 style="font-weight: normal" id="registered_by_member_id"></h6>
                        </div>
                    </div>
                    <div class="main-contact-info-body p-4 ps">
                        <div>
                            <h6>Biography</h6>
                            <p id="desc"></p>
                        </div>
                        <div class="media-list pb-0">
                            <div class="media">
                                <div class="media-body">
                                    <div>
                                        <label>Phone</label> <span class="tx-medium" id="phone"></span>
                                    </div>
                                    <div>
                                        <label>Member Category / Services</label> <span class="tx-medium" id="category"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-body">
                                    <div>
                                        <label>Email</label> <span class="tx-medium" id="email"></span>
                                    </div>
                                    <div>
                                        <label>Username</label> <span class="tx-medium" id="username"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-body">
                                    <div>
                                        <label>Address</label> <span class="tx-medium" id="address"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
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
            ajax: "{{ route('umkm.datatable') }}",
            columnDefs: [
            {
                targets: 0,
                render: function(data, type, full, meta) {
                    return (meta.row + 1);
                }
            },
            {
                targets: 1,
                width: 200,
                render: function(data, type, full, meta) {
                    let state = ``;
                    if(full.user.permissions.findIndex(item => item.name === 'approved') < 0){
                        state = `<button type="button" data-id="${full.user.id}" data-update="1" class="btn btn-icon btn-success btn-approval" title="Approve"><span class="fe fe-check"> </span></button>`;
                    }

                    let btn = `
                    <div class="btn-list">
                        ${state}
                        <a href="{{ route('umkm.edit', ':id') }}" class="btn btn-primary" title="Profile Member">Profile</a>
                        <a href="javascript:void(0)" onclick="destroy('${data}')" class="btn btn-danger btn-delete" title="Delete Member"><span class="fe fe-trash-2"> </span></a>
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
                        state = `<button type="button" data-id="${data}" data-update="1" class="btn btn-icon btn-success btn-is-show" title="Show this item on Homepage"><span class="fe fe-check"> </span></button>`;
                    
                        if(!!+full.is_showed)
                            state = `<button type="button" data-id="${data}" data-update="0" class="btn btn-icon btn-warning btn-is-show" title="Hide this item on Homepage"><span class="fe fe-x-circle"> </span></button>`;
                    }

                    return state;
                },
            },
            {
                targets: 4,
                render: function(data, type, full, meta) {
                    return data ? `<img class="img-thumbnail wd-100p wd-sm-100" src="{{ asset('/') }}${data}">` : `<img class="img-thumbnail wd-100p wd-sm-200" src="{{ asset('virtual/assets/img/default.png') }}">`;
                }
            },
            {
                targets: -1,
                render: function(data, type, full, meta) {
                    return data ? data.name : 'Desa Merdeka';
                }
            }
            ],
            "initComplete": function (settings, json) {  
                table.columns.adjust()
            },
            columns: [
                { data: null },
                { data: 'id'},
                { data: 'id'}, 
                { data: 'name'},
                { data: 'image'}, 
                { data: 'user.email'}, 
                { data: 'phone' },
                { data: 'member_core'},
            ],
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            }
        });

        $(document).on('click', '.btn-approval', function(){
            let id = $(this).data('id')
            let state = $(this).data('update')

            Swal.fire({
                title: "Yakin ingin mengapprove member ini?",
                text: "Saat anda memilih YA, maka member ini akan di bawah naungan anda.",
                icon: "warning",
                showCancelButton  : true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor : "#d33",
                confirmButtonText : "Ya!"
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url    : `{{ route('auth.approval') }}`,
                        type   : "POST",
                        data: { 
                            "id": id,
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

        $(document).on('click', '.btn-is-show', function(){
            let id = $(this).data('id')
            let state = $(this).data('update')

            console.log(id);

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
                        url    : `{{ route('member.is-showed') }}`,
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

    function edit(id){
        var url = "{{ route('umkm.show',":id") }}";
        url = url.replace(':id', id);
        
        $.get(url, function (response) {
            
            $('#modal_form').modal('show');
            $('.modal-title').text('Detail member');

            $('#logo').attr('src', response.image ?? `{{ asset('virtual/assets/img/default.png') }}`);

            $('#name').html(response.name);
            $('#type').html(response.member_type.name);

            $('#fb_url').attr('href', validateUrl(response.fb_url));
            $('#ig_url').attr('href', validateUrl(response.ig_url));
            
            $('#registered_by_member_id').html(response.member_core?.name ?? '<a class="badge bg-danger me-1" href="javascript:void(0);">No Data</a>' );
            $('#desc').html(response.desc ?? '-');
            $('#phone').html(response.phone ?? '-');

            $('#website_url').attr('href', validateUrl(response.website_url));
            $('#email').html(response.user.email);
            $('#username').html(response.user.username);
            $('#address').html(response.address ?? '-');

            let cat = ``;
            response.category.map(function(item){
                cat += `<a class="badge bg-primary me-1" href="javascript:void(0);">${item.meta_name.name}</a>`;
            })
            
            $('#category').html(cat != `` ? cat : '-');
        });
    }

    function destroy(id) {
    var url = "{{ route('umkm.destroy',':id') }}";
    url = url.replace(':id', id);

    Swal.fire({
        title: "Yakin ingin menghapus data ini?",
        text: "Ketika data terhapus, anda tidak bisa mengembalikan data tersebut!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Hapus!"
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url,
                type: "DELETE",
                data: { "id": id },
                dataType: "JSON",
                success: function (data) {
                    table.ajax.reload();
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Data berhasil dihapus',
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
                error: function (xhr, status, error) {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        title: 'Terjadi kesalahan saat menghapus data',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        }
    });
}

</script>
@endsection