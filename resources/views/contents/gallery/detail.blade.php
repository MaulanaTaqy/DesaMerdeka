@extends('layout.main')

@section('title', 'Management Gallry Image')

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
                <li class="breadcrumb-item active" aria-current="page"> Management Gallery Image</li>
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
                <h3 class="card-title">List Album Gallery Image</h3>
            </div>
            <div class="card-body">

                <a class="btn btn-primary modal-effect" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#modal_form"><i class="fa fa-user-plus me-1"></i> Add Gallery</a>
                <table id="datatable" class="border-top-0 table table-bordered border-bottom w-100">
                    <thead>
                        <tr>
                            <th class="border-bottom-0">No</th>
                            <th class="border-bottom-0">Action</th>
                            <th class="border-bottom-0">Album Image</th>
                            <th class="border-bottom-0">Description</th>
                            <th class="border-bottom-0">Title</th>
                            <th class="border-bottom-0">Lokasi</th>  
                            <th class="border-bottom-0">Date</th>  
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
            <form id="form" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input id="gallery_id" name="gallery_id" type="hidden" value="{{ $id }}">
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="name" class="form-label">Image Title</label>
                            <input type="text" value="" name="name" class="form-control" id="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="name" class="form-label">Image Description (optional)</label>
                            <textarea name="desc" class="form-control" id="desc"></textarea>
                        </div>
                    </div>
                    <label class="form-label text-dark">Image</label>
                    <div class="p-4 border mb-4 form-group">
                        <div class="row justify-content-center" id="initiator">
                            <div class="col-6">
                                <div>
                                    <input id="file-upload" class="dropify" type="file" name="image" data-allowed-file-extensions="jpeg jpg png webp svg" data-max-file-size="2M"/>
                                </div>
                            </div>
                        </div>
                        <small class="text-danger">Recomended image svg, 1200 x 600</small>
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
    
var table;

$(document).ready(function() {
    var url = "{{ route('galleryImages.datatable', ':id') }}";
    url = url.replace(':id', "{{ $id }}");
    console.log(url);

    table = $("#datatable").DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        ajax: url,

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
                    let btn = `
                        <div class="btn-list">
                            <a href="{{ route('galleryImages.edit', ':id') }}"  class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                            <a href="javascript:void(0)" onclick="destroy('${data}')" class="btn btn-sm btn-danger btn-delete"><i class="bi bi-trash"></i></a>
                        </div>
                    `;
                    btn = btn.replace(":id", data);
                    return btn;
                }
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
                targets: 4,
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
                width: 300,
                createdCell: function(td, cellData, rowData, row, col) {
                    if ($(td).text().length > 50) {
                        let txt = $(td).text();
                        $(td).text(txt.substr(0, 50) + "...");
                    }
                },
            },
            {
                targets: 6,
                width: 300,
                createdCell: function(td, cellData, rowData, row, col) {
                    if ($(td).text().length > 50) {
                        let txt = $(td).text();
                        $(td).text(txt.substr(0, 50) + "...");
                    }
                },
            },
            {
                targets: 2,
                render: function(data, type, full, meta) {
                    return data ? '<img class="img-thumbnail wd-100p wd-sm-200" src="{{ asset('/') }}' + data + '">' : '<img class="img-thumbnail wd-100p wd-sm-200" src="{{ asset('virtual/assets/img/default.png') }}">';
                }
            },
        ],
        columns: [
            { data: null },
            { data: "id" },
            { data: "image" },
            { data: "desc" },
            { data: "titile" },
            { data: "lokasi" },
            { data: "date" },
        ],
    });

    $(".dropify").dropify();

    $("#form").submit(function(e) {
        e.preventDefault();

        var form = $(this);
        var formData = new FormData(form[0]);

        $("#btnSave").text("Menyimpan...");
        $("#btnSave").attr("disabled", true);

        $.ajax({
            url: "{{ route('galleryImages.store') }}",
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

function destroy(id) {
        var url = "{{ route('galleryImages.destroy',":id") }}";
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