@extends('adminpage.layout.main')

@section('title', 'Gallery Videos')

@section('css')
    
<link href="{{ asset('adminpage') }}/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />

@endsection

@section('toolbar')
    <!--begin::Page title-->
    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
        <!--begin::Title-->
        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Gallery Videos</h1>
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
            <li class="breadcrumb-item text-muted">Gallery Videos</li>
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
                    <i class="ki-duotone ki-plus fs-2"></i>New Image</a>
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
                                <th class="ps-4 min-w-30px  rounded-start">No</th>
                                <th class="ps-4 min-w-200px">Actions</th>
                                <th class="min-w-125px">Video URL</th>
                                <th class="min-w-125px">Video Thumbnail</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- <tr>
                                <td class="text-center">
                                    <span class="text-muted fw-semibold text-muted d-block fs-5">1</span>
                                </td>
                                <td>
                                    <a href="">
                                        <span class="badge badge-light-success fs-6 p-2">Videos</span>
                                    </a>
                                    <a href="">
                                        <span class="badge badge-light-info fs-6 p-2">Videos</span>
                                    </a>
                                    <a href="#" title="Edit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <i class="ki-duotone ki-pencil fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </a>
                                    <a href="#" title="Delete" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                        <i class="ki-duotone ki-trash fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                            <span class="path5"></span>
                                        </i>
                                    </a>
                                </td>
                                <td class="fw-semibold text-dark">
                                    Contoh Title
                                </td>
                                <td class="fw-semibold text-dark">
                                    Contoh Deskripsi
                                </td>
                                <td>
                                    <span class="badge badge-light-primary fs-6 p-2">Cats</span>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-100px me-5">
                                            <span class="symbol-label bg-light">
                                                <img src="assets/media/svg/avatars/001-boy.svg" class="h-75 align-self-end" alt="" />
                                            </span>
                                        </div>
                                    </div>
                                </td>
                            </tr> --}}
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
                <form id="form" class="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3" id="modal_title">Add Video</h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
                    <input id="gallery_id" name="gallery_id" value="{{ $id }}" type="hidden">
                    <input id="video_id" name="video_id" type="hidden">
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Video URL</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="Enter your video URL">
                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" placeholder="video URL..." id="video" name="video_url[]" />
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
<script src="{{ asset('adminpage') }}/assets/plugins/custom/datatables/datatables.bundle.js"></script>

<script type="text/javascript">
    var table;
    var submit_method

    $(document).ready(function() {
        var url = "{{ route('gallery_video.datatable', ':id') }}";
        url = url.replace(':id', "{{ $id }}");

        table = $("#datatable").DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: url,
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
                    width: 50,
                    render: function(data, type, row) {
                        let state = "";
                        let btn = `
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
                    targets: [2,3],
                    width: 300,
                    createdCell: function(td, cellData, rowData, row, col) {
                        if ($(td).text().length > 50) {
                            let txt = $(td).text();
                            $(td).text(txt.substr(0, 50) + "...");
                        }
                    },
                },
            ],
            columns: [
                { data: null },
                { data: "id" },
                { data: "video" },
                { data: "video_thumbnail" },
            ],
        });

        

        const filterSearch = document.querySelector('[data-kt-inbox-listing-filter="search"]');
            filterSearch.addEventListener('keyup', function (e) {
                table.search(e.target.value).draw();
        });


        $(document).ready(function() {
            $("#addButton").on('click', function () { 
                $("#modal_form").modal('show')
                $('#form')[0].reset();
                $('#modal_title').text('Add Video');

            })
            $("#date").flatpickr();

            $("#form").submit(function(e) {
                e.preventDefault();

                var form = $("#form")[0];
                var formData = new FormData(form);


                $("#btnSave").text("Menyimpan...");
                $("#btnSave").attr("disabled", true);

                $.ajax({
                    url:`{{ route('gallery_video.store') }}`,
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

    function edit(id) {
            var submit_method = 'edit';
            var url = "{{ route('gallery_video.edit', ':id') }}";
            url = url.replace(':id', id);

            $.get(url, function (response) {
                var data = response.data;
                console.log(data);       
                $('#video_id').val(data.id);
                $('#modal_form').modal('show');
                $('#modal_title').text('Edit Video URL');
                $('#video').val(data.video); 
            }).fail(function() {
                console.log("Data not found.");
            });

            $('#btnSave').on('click', function(e) {
                e.preventDefault();

                $("#btnSave").text("Menyimpan...");
                $("#btnSave").attr("disabled", true);

                $.ajax({
                    url: "{{ route('gallery_video.update', ':id') }}".replace(':id', id),
                    type: "PUT",
                    dataType: "json",
                    // processData: false,
                    // contentType: false,
                    data: {
                        video_url : $('#video').val()
                    },
                    beforeSend: function() {
                        $("#btnSave").text("Menyimpan...");
                        $("#btnSave").attr("disabled", true);
                    },
                    success: function(data) {
                        if (data.status == true) {
                            $("#modal_form").modal("hide");
                            $("#form")[0].reset();
                            table.ajax.reload();
                            Swal.fire({
                                toast: true,
                                position: "top-end",
                                icon: "success",
                                title: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
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
                        Swal.fire({
                            toast: true,
                            position: "top-end",
                            icon: "error",
                            title: "ERROR !",
                            text: "Gagal menyimpan data.",
                            showConfirmButton: false,
                            timer: 2000
                        });
                        $("#btnSave").text("Simpan");
                        $("#btnSave").attr("disabled", false);
                    }
                });
            });
        }

    function destroy(id) {
        var url = "{{ route('gallery_video.destroy',":id") }}";
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

    function destroy(id) {
        var url = "{{ route('gallery_video.destroy',":id") }}";
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