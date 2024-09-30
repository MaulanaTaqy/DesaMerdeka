@extends('adminpage.layout.main')

@section('title', 'Gallery')

@section('css')
    
<link href="{{ asset('adminpage/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('adminpage/assets/plugins/custom/dropify/css/dropify.min.css') }}">
<style>
    
</style>
@endsection

@section('toolbar')
    <!--begin::Page title-->
    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
        <!--begin::Title-->
        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Gallery</h1>
        <!--end::Title-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
            <!--begin::Item-->
            <li class="breadcrumb-item text-muted">
                <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Home</a>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-400 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-muted">Gallery</li>
            <!--end::Item-->
        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Page title-->
@endsection

@section('content')

<div class="row g-5 g-xl-8">
    <!--begin::Col-->
    <div class="col-xl-12">
        <!--begin::Tables Widget 1-->
        <div class="card card-xl-stretch mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <div class="d-flex align-items-center position-relative">
                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <input type="text" data-kt-inbox-listing-filter="search" class="form-control form-control-sm form-control-solid mw-100 min-w-125px min-w-lg-150px min-w-xxl-200px ps-11" placeholder="Search Gallery" />
                </div>
                <div class="card-toolbar">
                    <a class="btn btn-sm btn-light-primary" id="addButton">
                    <i class="ki-duotone ki-plus fs-2"></i>New Gallery</a>
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
                                <th class="ps-4 min-w-50px  rounded-start">No</th>
                                <th class="ps-4 min-w-250px">Actions</th>
                                <th class="min-w-125px">Title</th>
                                <th class="min-w-125px">Description</th>
                                <th class="min-w-50px">Category</th>
                                <th class="min-w-100px">Thumbnail</th>
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
<!--begin::Modal - New Target-->
<div class="modal fade" id="modal_form" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <!--begin:Form-->
                <form id="form" class="form" method="POST">
                    @csrf
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3" id="modal_title">Add Gallery</h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
                    <input type="hidden" name="id" id="id">
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Album name</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="Enter your album name">
                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <!--end::Label-->
                        <input type="text" value="{{ old('name')}}" class="form-control form-control-solid" placeholder="album name..." id="name" name="name" />
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-8">
                        <label class="fs-6 fw-semibold mb-2">Description</label>
                        <textarea class="form-control form-control-solid" rows="3" id="desc" name="desc" placeholder="album description..."></textarea>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Image input-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Thumbnail</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="Enter your album thumbnail">
                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <!--end::Label-->
                        <input type="file" name="image" class="dropify" id="image">
                        <small class="text-danger">recomended image svg, 1200x600</small> 
                    </div>
                    <!--end::Image input-->

                    <div class="mt-3 d-flex flex-column mb-8">
                        <label class="required fs-6 fw-semibold mb-2">Category</label>
                        <select class="form-select form-select-solid" id="category"  data-control="select2" data-placeholder="Select category" multiple="multiple" name="category_id[]">
                        </select>
                    </div>

                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Location</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="Enter your location">
                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <!--end::Label-->
                        <input type="text" value="{{ old('location')}}" class="form-control form-control-solid" placeholder="location..." id="location" name="location" />
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="required fs-6 fw-semibold mb-2">Due Date</label>
                        <!--begin::Input-->
                        <div class="position-relative d-flex align-items-center">
                            <!--begin::Icon-->
                            <i class="ki-duotone ki-calendar-8 fs-2 position-absolute mx-4">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                                <span class="path6"></span>
                            </i>
                            <!--end::Icon-->
                            <!--begin::Datepicker-->
                            <input class="form-control form-control-solid ps-12" placeholder="Select a date" name="date" id="date"/>
                            <!--end::Datepicker-->
                        </div>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">Cancel</button>
                        <button id="btnSave" class="btn btn-primary">
                            Simpan
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - New Target-->
@endsection

@section('javascript')
<script src="{{ asset('adminpage/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('adminpage/assets/plugins/custom/dropify/js/dropify.min.js') }}"></script>
<script type="text/javascript">
    var table;
    var submit_method

    $(document).ready(function() {

        table = $("#datatable").DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: "{{ route('gallery.datatable') }}",
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
                    width: '150px',
                    render: function(data, type, row) {
                        let state = "";
                        let editUrl = "{{ route('gallery.edit', ':id') }}";
                            let showUrl = "{{ route('galleryImages.showDetail', ':id') }}";
                            let showUrlVideo = "{{ route('gallery_video.show', ':id') }}";

                            let btn = `
                                <a href="${showUrl.replace(':id', data)}">
                                    <span class="badge badge-light-success fs-6 p-2">Images</span>
                                </a>
                                <a href="${showUrlVideo.replace(':id', data)}">
                                    <span class="badge badge-light-info fs-6 p-2">Videos</span>
                                </a>
                                <a  onclick="edit('${data}')" title="Edit" class="btn btn-primary btn-sm me-1">
                                    <span class="fa fa-edit"></span>
                                </a>
                                <a href="javascript:void(0)"  onclick="destroy('${data}')"  title="Delete" class="btn btn-danger btn-delete btn-sm">
                                    <span class="fa fa-trash"></span>
                                </a>
                            `;

                            return btn;

                    }
                },
                {
                    targets: 2,
                    width: 300,
                    createdCell: function(td, cellData, rowData, row, col) {
                        if ($(td).text().length > 50) {
                            let txt = $(td).text();
                            $(td).text(txt.substr(0, 50) + "...");
                        }
                    },
                },
                {
                    targets: 3,
                    width: 300,
                    createdCell: function(td, cellData, rowData, row, col) {
                        if ($(td).text().length > 50) {
                            let txt = $(td).text();
                            $(td).text(txt.substr(0, 50) + "...");
                        }
                    },
                },
                {
                    targets: 5,
                    render: function(data, type, full, meta) {
                        return data ? `<img class='img-thumbnail wd-50px w-sm-200px' src="{{ asset('/') }}${data}">` : `<img class='img-thumbnail w-100px w-sm-200px' src="{{ asset('virtual/assets/img/default.png') }}">`;
                    }
                },

                {
                    targets: 4,
                    render: function(data, type, full, meta) {
                        let cat = '';
                        data.map(function(item){
                            cat += `<span class="badge badge-light-primary fs-6 p-2">${item.meta_name.name}</span>`;
                        })
                        return cat;
                    }
                }
            ],
            columns: [
                { data: null },
                { data: "id" },
                { data: "title" },
                { data: "desc" },
                { data: "category" },
                { data: "image" },
            ],
        });

        const filterSearch = document.querySelector('[data-kt-inbox-listing-filter="search"]');
            filterSearch.addEventListener('keyup', function (e) {
                table.search(e.target.value).draw();
        });


        $(document).ready(function() {
            $("#addButton").on('click', function () { 
                $("#modal_form").modal('show')
                df = $('#image').dropify();
                df = df.data('dropify');
                df.resetPreview();
                df.clearElement();
                submit_method = 'create'

                $('#category').empty();
                $('#id').val('');
                $('#form')[0].reset();
                $('#modal_title').text('Add Gallery');
            })
            ajaxSelect2Initiator("category", false, "{{ route('meta.gallery-category.select2') }}");
            $("#date").flatpickr();

            $("#form").submit(function(e) {
                e.preventDefault();

                var form = $("#form")[0];
                var id = $("#id").val();
                var formData = new FormData(form);

                // append the image file to FormData object
                var image = $("#image")[0].files[0];
                formData.append("image", image);
                if (submit_method == 'edit') {
                    formData.append("_method", 'put');
                    var url = `{{ route('gallery.update',":id") }}`;
                    url = url.replace(':id', id);
                }

                $("#btnSave").text("Menyimpan...");
                $("#btnSave").attr("disabled", true);

                $.ajax({
                    url: submit_method == 'edit' ? url : `{{ route('gallery.store') }}`,
                    type: "POST",
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    data: formData,
                    beforeSend: function() {
                        $("#btnSave").text("Menyimpan...");
                        $("#btnSave").attr("disabled", true);
                    },
                    success: function(data) {
                        if (data.status == true) {
                            $("#modal_form").modal('hide');
                            $("#form")[0].reset();
                            table.ajax.reload()
                            Swal.fire({
                                toast: true,
                                position: "top-end",
                                icon: "success",
                                title: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        } else {
                            Swal.fire({
                                toast: true,
                                position: "top-end",
                                icon: "error",
                                title: "ERROR !",
                                text: data.message,
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }
                        $("#btnSave").text("Simpan");
                        $("#btnSave").attr("disabled", false);
                    },
                    error: function(data) {
                        console.log(data);
                        var error_message = "";
                        if (data.status == false && data.responseJSON.message == "Link video is not valid!") {
                            error_message = "Link video is not valid!";
                        } else {
                            error_message += " ";
                            $.each(data.responseJSON.errors, function(key, value) {
                                error_message += " " + value + " ";
                            });
                        }
                        Swal.fire({
                            toast: true,
                            position: "top-end",
                            icon: "error",
                            title: "ERROR !",
                            text: error_message,
                            showConfirmButton: false,
                            timer: 2000
                        });
                        $("#btnSave").text("Simpan");
                        $("#btnSave").attr("disabled", false);
                    },
                });
            });
        });
    })

    function edit(id){
        submit_method = 'edit';

        $('#form')[0].reset();
        $('#category').empty();
        var df = "";
        df = $('#image').dropify();

        var url = "{{ route('gallery.edit',":id") }}";
        url = url.replace(':id', id);
        
        $.get(url, function (response) {
            response = response.data;
            
            for (let i = 0; i < response.category.length; i++) {
                var newOption = new Option(response.category[i].meta_name.name, response.category[i].meta_name.id, true, true);
                
                $('#category').append(newOption).trigger('change'); // Set dan pilih opsi
            }

            var image = `{{ asset('${response.image}') }}`;

            $('#id').val(response.id);
            $('#modal_form').modal('show');
            $('#modal_title').text('Edit Gallery');
            $('#name').val(response.title)
            $('#desc').val(response.desc)
            $('#location').val(response.location)
            $('#date').val(response.date)
        
            // $('#imageWrapper').css('background-image',  `url(${response.image})`)
            df = df.data('dropify');
            df.resetPreview();
            df.clearElement();
            df.settings.defaultFile = image;
            df.destroy();
            df.init();
        
        });
    }

    function destroy(id) {
        var url = "{{ route('gallery.destroy',":id") }}";
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