@extends('adminpage.layout.main')

@section('title', 'Management Banner')

@section('css')
<!--begin::Vendor Stylesheets(used for this page only)-->
<link href="{{ asset('adminpage') }}/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('adminpage/assets/plugins/custom/dropify/css/dropify.min.css') }}">
<!--begin::Image input placeholder-->
<style>
    .image-input-placeholder {
        background-image: url('svg/avatars/blank.svg');
    }

    [data-bs-theme="dark"] .image-input-placeholder {
        background-image: url('svg/avatars/blank-dark.svg');
    }
    
</style>
<!--end::Image input placeholder-->
<!--end::Vendor Stylesheets-->
@endsection

@section('toolbar')
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Banner</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Banner</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
@endsection

@section('content')
<!--begin::Inbox App - Messages -->
<div class="d-flex flex-column flex-lg-row">
    @include('adminpage.content.management-homepage.management-banner.index')
    <!--begin::Content-->
    <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
        <div class="card card-xl-stretch mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <div class="d-flex align-items-center position-relative">
                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <input type="text" data-kt-inbox-listing-filter="search" class="form-control form-control-sm form-control-solid mw-100 min-w-125px min-w-lg-150px min-w-xxl-200px ps-11" placeholder="Search banner" />
                </div>
                <div class="card-toolbar">
                    <a class="btn btn-sm btn-light-primary" onclick="create()">
                    <i class="ki-duotone ki-plus fs-2"></i>New Banner</a>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table id="datatable" class="table align-middle gs-0 gy-5">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="fw-bold text-muted bg-light">
                                <th class="ps-4 min-w-30px">No</th>
                                <th class="min-w-300px rounded-start">Banner</th>
                                <th class="min-w-75px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--end::Content-->
</div>
<!--end::Inbox App - Messages -->
@endsection

@section('modal')
<!--begin::Modal - New Address-->
<div class="modal fade" id="modal_form" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form" method="POST" id="form">
                @csrf
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_new_address_header">
                    <!--begin::Modal title-->
                    <h2>Add New Banner</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body text-center py-10 px-lg-17">
                    <input type="hidden" id="id" name="id">
                    <!--begin::Image input-->
                    <input type="file" name="image" class="dropify" id="image">
                    <!--end::Image input-->
                    <small class="text-danger">recomended image svg, 1200x600</small> 

                </div>
                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="reset" id="kt_modal_new_address_cancel" data-bs-dismiss="modal" class="btn btn-light me-3">cancel</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" id="btnSave" class="btn btn-primary">
                        Simpan
                        {{-- <span class="indicator-label">Submit</span> --}}
                        {{-- <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span> --}}
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Modal footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
<!--end::Modal - New Address-->
@endsection

@section('javascript')

<!--begin::Vendors Javascript(used for this page only)-->
<script src="{{ asset('adminpage') }}/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="{{ asset('adminpage/assets/plugins/custom/dropify/js/dropify.min.js') }}"></script>
<!--end::Vendors Javascript-->

<script type="text/javascript">
    var table
    $(document).ready(function() {
        // Contoh Inisiator datatable severside

        table = $("#datatable").DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: "{{ route('faq-banner.datatable') }}",
            columnDefs: [
            {
                targets: 0,
                className: "text-center",
                render: function(data, type, full, meta) {
                    return `<span class="text-muted fw-semibold text-muted d-block fs-5">${meta.row + 1}</span>`;
                }
            },
            {
                targets: 1,
                render: function(data, type, full, meta) {
                    return data ? `<img class='img-thumbnail wd-50px w-sm-150px' src="{{ asset('/') }}${data}">` : `<img class='img-thumbnail w-100px w-sm-150px' src="{{ asset('virtual/assets/img/default.png') }}">`;
                }
            },             
            {
                targets: -1,
                render: function(data, type, full, meta) {
                    return `
                    <a href="javascript:void(0)" onclick="edit('${data}')" class="btn btn-sm btn-primary me-1">
                        <span class="fa fa-edit"> </span>
                    </a>
                    <a href="javascript:void(0)" onclick="destroy('${data}')" class="btn btn-sm btn-danger btn-delete">
                        <span class="fa fa-trash"> </span>
                    </a>
                    `;
                },
            } ],
            columns: [
                { data: null },
                { data: 'image'},
                { data: 'id'}, 
            ]
        });

        $('#btnSave').on('click', function () {
            submit();
        })
        
        $('#form').on('submit', function(e){
            e.preventDefault();

            submit();
            console.log('ya ini');
        })

        const filterSearch = document.querySelector('[data-kt-inbox-listing-filter="search"]');
            filterSearch.addEventListener('keyup', function (e) {
                table.search(e.target.value).draw();
        });
    });

    function create(){
        submit_method = 'create';
        var df = "";
        df = $('#image').dropify();
        df = df.data('dropify');
        df.resetPreview();
        df.clearElement();

        $('#id').val('');
        $('#form')[0].reset();

        $('#modal_form').modal('show');
        $('.modal-title').text('Add Data Blog Banner');
    }

    function edit(id){
        submit_method = 'edit';

        $('#form')[0].reset();
        var df = "";
        df = $('#image').dropify();

        var url = "{{ route('faq-banner.edit',":id") }}";
        url = url.replace(':id', id);
        
        $.get(url, function (response) {
            response = response.data;
            var image = `{{ asset('${response.image}') }}`;
            
            $('#id').val(response.id);
            $('#modal_form').modal('show');
            $('.modal-title').text('Edit Blod Banner ');

            df = df.data('dropify');
            df.resetPreview();
            df.clearElement();
            df.settings.defaultFile = image;
            df.destroy();
            df.init();
        });
    }

    function submit() {
        var id = $('#id').val();
        var form = $('#form')[0];
        var formData = new FormData(form);

        var url = "{{ route('faq-banner.store') }}";
        
        $('#btnSave').text('Menyimpan...');
        $('#btnSave').attr('disabled', true);

        if(submit_method == 'edit'){
            url = "{{ route('faq-banner.update',':id') }}";
            url = url.replace(':id', id);
            formData.append('_method', 'PUT');
        }

        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: formData,
            success: function (data) {
                if(data.status) {
                    $('#modal_form').modal('hide');
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    table.ajax.reload();
                    $('#btnSave').text('Simpan');
                    $('#btnSave').attr('disabled', false);
                }else{
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        title: 'ERROR !',
                        text: data.message,
                        showConfirmButton: false,
                        timer: 2000
                    });
                    $('#btnSave').text('Simpan');
                    $('#btnSave').attr('disabled',false); //set button enable 
                }
            }, 
            error: function(data){
                var error_message = "";
                error_message += " ";
                
                $.each( data.responseJSON.errors, function( key, value ) {
                    error_message +=" "+value+" ";
                });

                error_message +=" ";
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    title: 'ERROR !',
                    text: error_message,
                    showConfirmButton: false,
                    timer: 2000
                });
                $('#btnSave').text('Simpan');
                $('#btnSave').attr('disabled', false);
            },
        });
    }

    function destroy(id) {
        var url = "{{ route('faq-banner.destroy',":id") }}";
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