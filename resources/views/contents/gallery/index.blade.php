@extends('layout.main')

@section('title', 'Management Gallry')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.9.1-beta-0/css/lightgallery.min.css" integrity="sha512-gk6oCFFexhboh5r/6fov3zqTCA2plJ+uIoUx941tQSFg6TNYahuvh1esZVV0kkK+i5Kl74jPmNJTTaHAovWIhw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    a > img {
        height: 300px;
        object-fit: cover;
    }
    /* .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
    }

    a:hover > div.middle {
        opacity: 1;
    }

    .text {
        background-color: #04AA6D;
        color: white;
        font-size: 16px;
        padding: 16px 32px;
    } */
</style>
@endsection

@section('breadcumb')
<div class="breadcrumb-header justify-content-between">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page"> Management Gallery</li>
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
                <h3 class="card-title">List Gallery</h3>
            </div>
            <div class="card-body">

                <a class="btn btn-primary modal-effect" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#modal_form"><i class="fa fa-user-plus me-1"></i> Add Gallery</a>
                <table id="datatable" class="border-top-0 table table-bordered border-bottom w-100">
                    <thead>
                        <tr>
                            <th class="border-bottom-0">No</th>
                            <th class="border-bottom-0">Action</th>
                            <th class="border-bottom-0">Titile</th>
                            <th class="border-bottom-0">Description</th>
                            <th class="border-bottom-0">Category</th>    
                            <th class="border-bottom-0">Thumnail Image</th> 
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
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Add Gallery</h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form id="form" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="name" class="form-label">Album Name</label>
                            <input type="text" value="{{ old('name')}}" name="name" class="form-control" id="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="name" class="form-label">Description (optional)</label>
                            <textarea name="desc" class="form-control" id="desc" value="{{ old('desc') }}"> </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="name" class="form-label">Album Banner & Thumbnail</label>
                            <input id="image" class="dropify" type="file" name="image" data-default-file="" data-allowed-file-extensions="jpeg jpg png webp svg">
                            <small class="text-danger">recomended image svg, 1200x600</small> 
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label class="form-label text-dark">Category</label>
                            <select id="category" name="category_id[]" class="form-control select2 form-select" multiple="multiple" ></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" value="" name="location" class="form-control" id="location">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" value="" name="date" class="form-control" id="date">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button  id="btnSave" class="btn btn-primary">Simpan</button>
                </div>
            </form>
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

<script src="{{ asset('virtual/assets/js/script.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/gallery/lightgallery-all.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/gallery/jquery.mousewheel.min.js') }}"></script>

<!-- INTERNAL Select2 js -->
<script src="{{ asset('virtual/assets/plugins/select2/js/select2.min.js') }}"></script>
{{-- <script src="{{ asset('virtual/assets/js/select2.js') }}"></script> --}}

<!-- FILE UPLOADES JS -->
<script src="{{ asset('virtual/assets/plugins/fileuploads/js/fileupload.js') }}"></script>

<script>
var $table;

$(document).ready(function() {

    table = $("#datatable").DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        ajax: "{{ route('gallery.datatable') }}",
        columnDefs: [
            {
                targets: 0,
                render: function(data, type, full, meta) {
                    return meta.row + 1;
                }
            },
            {
                targets: 1,
                render: function(data, type, row) {
                    let state = "";
                    let editUrl = "{{ route('gallery.edit', ':id') }}";
                        let showUrl = "{{ route('galleryImages.showDetail', ':id') }}";
                        let showUrlVideo = "{{ route('gallery_video.show', ':id') }}";

                        let btn = `
                            <div class="btn-list">
                                <a href="${editUrl.replace(':id', data)}" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                                <a href="${showUrl.replace(':id', data)}" class="btn btn-sm btn-info"><i class="bi bi-eye">Image</i></a>
                                <a href="${showUrlVideo.replace(':id', data)}" class="btn btn-sm btn-info"><i class="bi bi-eye">Video</i></a>
                                <a href="javascript:void(0)" onclick="destroy('${data}')" class="btn btn-sm btn-danger btn-delete"><i class="bi bi-trash"></i></a>
                            </div>
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
                    return data ? `<img class="img-thumbnail wd-100p wd-sm-200" src="{{ asset('/') }}${data}">` : `<img class="img-thumbnail wd-100p wd-sm-200" src="{{ asset('virtual/assets/img/default.png') }}">`;
                }
            },

            {
                targets: 4,
                render: function(data, type, full, meta) {
                    let cat = '';
                    data.map(function(item){
                        cat += `<a class="badge bg-primary me-1" href="javascript:void(0);">${item.meta_name.name}</a>`;
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

    $(document).ready(function() {
        ajaxSelect2Initiator("category", false, "{{ route('meta.gallery-category.select2') }}");

        $("#btn-add-upload").on("click", function(e) {
            $("#initiator").append(`
                <div class="col-12">
                    <input class="dropify" type="file" name="gallery_image[]" data-allowed-file-extensions="jpeg jpg png webp svg" data-max-file-size="2M"/>
                    <textarea class="form-control"> </textarea>
                </div>
            `);

            $('.dropify').dropify();
        });

        $("#btn-add-video").on("click", function(e) {
            $("#video-initiator").append(`
                <input type="text" value="{{ old('video[]') }}" name="video_url[]" class="form-control mb-2 video" id="">
            `);

            $('.dropify').dropify();
        });

        var dr = $('.dropify').dropify();

        $("#form").submit(function(e) {
            e.preventDefault();

            var form = $("#form")[0];
            var formData = new FormData(form);

            // append the image file to FormData object
            var image = $("#image")[0].files[0];
            formData.append("image", image);

            $("#btnSave").text("Menyimpan...");
            $("#btnSave").attr("disabled", true);

            $.ajax({
                url: "{{ route('gallery.store') }}",
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
                        let detailUri = `{{ route('gallery.show', ':id') }}'`;
                        detailUri = detailUri.replace(":id", data.gallery.id);

                        $("#prepand").prepend(`
                            <li class="col-sm-12 col-lg-4" data-id="${data.gallery.id}" data-responsive="${data.gallery.image}" data-src="${data.gallery.image}" 
                                data-sub-html="
                                    <h4>${data.gallery.title}</h4>
                                    <p>${data.gallery.desc}</p>
                                ">
                                <a href="${detailUri}">
                                    <img class="img-responsive" src="${data.gallery.image}" alt="Image Cannot be loaded">
                                </a>
                            </li>
                        `);

                        Swal.fire({
                            toast: true,
                            position: "top-end",
                            icon: "success",
                            title: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            $("#modal_form").modal("hide");
                            $("#form")[0].reset();
                            $(".dropify-clear").click();
                            table.ajax.reload()
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
});

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