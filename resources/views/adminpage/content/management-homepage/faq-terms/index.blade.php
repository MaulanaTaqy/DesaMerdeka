@extends('adminpage.layout.main')

@section('title', 'FAQ & Term Conditions')

@section('css')
    
<link href="{{ asset('adminpage/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
<style>
    
</style>
@endsection

@section('toolbar')
    <!--begin::Page title-->
    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
        <!--begin::Title-->
        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">FAQ & Term Conditions</h1>
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
            <li class="breadcrumb-item text-muted">FAQ & Term Conditions</li>
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
                                <th class="ps-4 min-w-50px rounded-start">No</th>
                                <th class="min-w-125px">Question</th>
                                <th class="min-w-125px">Answer</th>
                                <th class="ps-4 min-w-50px">Actions</th>
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

<div class="row g-7">
    <!--begin::Content-->
        <div class="col-xl-6">
        <!--begin::Basic info-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#terms" aria-expanded="true" aria-controls="terms">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">Term & Conditions</h3>
                </div>
                <!--end::Card title-->
            </div>
            <!--begin::Card header-->
            <!--begin::Content-->
            <div id="terms" class="collapse show">
                <!--begin::Form-->
                <form class="form"  action="{{ route('faq.term-condition') }}" method="POST">
                    @csrf
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <div id="term_conditions" class="min-h-200px mb-2">
                            {!! old('term_conditions') ?: (isset($termConditions) ? $termConditions->term_conditions : ' ') !!}
                        </div>
                    </div>
                    <!--end::Card body-->
                    <!--begin::Actions-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Content-->
        </div>
    <!--end::Basic info-->
    </div>
    <!--end::Content-->
    <div class="col-xl-6">
        <!--begin::Basic info-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">Privacy Policy</h3>
                </div>
                <!--end::Card title-->
            </div>
            <!--begin::Card header-->
            <!--begin::Content-->
            <div id="kt_account_settings_profile_details" class="collapse show">
                <!--begin::Form-->
                <form class="form"  action="{{ route('faq.privacy-policy') }}" method="POST" >
                    @csrf
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <div class="card-body border-top p-9">
                            <div id="privacy_policies" class="min-h-200px mb-2">
                                {!! old('privacy_policies') ?: (isset($privacyPolicy) ? $privacyPolicy->privacy_policies : ' ') !!}
                            </div>
                        </div>
                    </div>
                    <!--end::Card body-->
                    <!--begin::Actions-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Basic info-->
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
                        <h1 class="mb-3" id="modal_title">Add Data</h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
                    <input type="hidden" name="id" id="id">
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Question</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="Enter the question">
                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <!--end::Label-->
                        <input type="text" value="{{ old('question')}}" class="form-control form-control-solid" placeholder="question..." id="question" name="question" />
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-8">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Answer</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="Answer of the question">
                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <!--end::Label-->
                        <div id="answer" class="min-h-200px mb-2">
                        </div>
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
<script type="text/javascript">
    var table;
    var submit_method;
    $(document).ready(function() {
        editorInitiator(['answer'])
        editorInitiator(['term_conditions'])
        editorInitiator(['privacy_policies'])

        table = $("#datatable").DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: "{{ route('faq.datatable') }}",
            columnDefs: [
                {
                    targets: 0,
                    className: "text-center",
                    width: 50,
                    render: function(data, type, full, meta) {
                        return `<span class="text-muted fw-semibold text-muted d-block fs-5">${meta.row + 1}</span>`;
                    }
                },
                {
                    targets: -1,
                    width: '150px',
                    render: function(data, type, row) {
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
                    targets: [1,2],
                    width: 300,
                    createdCell: function(td, cellData, rowData, row, col) {
                        $(td).html($(td).text())
                        if($(td).text().length > 150) {
                            let txt = $(td).text()
                            $(td).text(txt.substr(0, 150) + '...')
                        }
                    },
                },
            ],
            columns: [
                { data: null },
                { data: 'question'},
                { data: 'answer'},
                { data: 'id'}, 
            ],
        });

        const filterSearch = document.querySelector('[data-kt-inbox-listing-filter="search"]');
            filterSearch.addEventListener('keyup', function (e) {
                table.search(e.target.value).draw();
        });


        $(document).ready(function() {
            $("#addButton").on('click', function () { 
                submit_method = 'create';
                $('#id').val('');
                $('#modal_form').modal('show');
                
                $('#form')[0].reset();
                $('#modal_title').text('Add FAQ');
                $('#answer .ql-editor').html('');
                $('#question').val('');
            })

            $("#form").submit(function(e) {
                e.preventDefault();

                var form = $("#form")[0];
                var id = $("#id").val();
                var formData = new FormData(form);

                if (submit_method == 'edit') {
                    formData.append("_method", 'put');
                    var url = `{{ route('faq.update',":id") }}`;
                    url = url.replace(':id', id);
                }

                $("#btnSave").text("Menyimpan...");
                $("#btnSave").attr("disabled", true);

                $.ajax({
                    url: submit_method == 'edit' ? url : `{{ route('faq.store') }}`,
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
                                timer: 30000
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

        $('#form');
        var url = "{{ route('faq.edit',":id") }}";
        url = url.replace(':id', id);

        $.get(url, function (response) {
            response = response.data;
			console.log(response)

            $('#id').val(response.id);
            $('#modal_form').modal('show');
            $('#modal_title').text('Edit FAQ');
            $('#answer .ql-editor').html(response.answer);
            $('#question').val(response.question);
        });
    }

    function destroy(id) {
        var url = "{{ route('faq.destroy',":id") }}";
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