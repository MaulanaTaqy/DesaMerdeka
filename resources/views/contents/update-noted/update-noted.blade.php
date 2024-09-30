@extends('adminpage.layout.main')

@section('title', 'Update Noted')

@section('css')
    {{-- Custom CSS --}}
    <link href="{{ asset('adminpage/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('adminpage/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('adminpage/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('adminpage/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('adminpage/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcumb')
<!-- PAGE-HEADER Breadcrumbs -->
<div class="breadcrumb-header justify-content-between">
    <div>
      
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page"> Update Noted</li>
            </ol>
        </nav>
    
    </div>
</div>
<!-- PAGE-HEADER Breadcumbs END -->
@endsection

@section('content')
<!-- Row -->
@role('admin')
<div class="row g-5 g-xl-8">
    <!--begin::Col-->
    <div class="col-xl-12">
        <!--begin::Tables Widget 1-->
        <div class="card card-xl-stretch mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">List Product Category </span>
                </h3>
                <div class="card-toolbar">
                    <div class="d-flex align-items-center position-relative my-1">
                        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                        </i>
                        <input type="text" data-kt-docs-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search member" />
                    </div>
                    <a href="#" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal" onclick="create()">
                        <i class="ki-duotone ki-plus fs-2"></i>New Member</a>
                    <!--begin::Menu-->
                    <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <i class="ki-duotone ki-category fs-6">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                        </i>
                    </button>
                    <!--begin::Menu 1-->
                    <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_64b776349d3e9">
                        <!--begin::Header-->
                        <div class="px-7 py-5">
                            <div class="fs-5 text-dark fw-bold">Filter Options</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Menu separator-->
                        <div class="separator border-gray-200"></div>
                        <!--end::Menu separator-->
                        <!--begin::Form-->
                        <div class="px-7 py-5">
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-semibold">Status:</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div>
                                    <select class="form-select form-select-solid" multiple="multiple" data-kt-select2="true" data-close-on-select="false" data-placeholder="Select option" data-dropdown-parent="#kt_menu_64b776349d3e9" data-allow-clear="true">
                                        <option></option>
                                        <option value="1">Approved</option>
                                        <option value="2">Pending</option>
                                        <option value="2">In Process</option>
                                        <option value="2">Rejected</option>
                                    </select>
                                </div>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-semibold">Member Type:</label>
                                <!--end::Label-->
                                <!--begin::Options-->
                                <div class="d-flex">
                                    <!--begin::Options-->
                                    <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                        <input class="form-check-input" type="checkbox" value="1" />
                                        <span class="form-check-label">Author</span>
                                    </label>
                                    <!--end::Options-->
                                    <!--begin::Options-->
                                    <label class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                                        <span class="form-check-label">Customer</span>
                                    </label>
                                    <!--end::Options-->
                                </div>
                                <!--end::Options-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-semibold">Notifications:</label>
                                <!--end::Label-->
                                <!--begin::Switch-->
                                <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked" />
                                    <label class="form-check-label">Enabled</label>
                                </div>
                                <!--end::Switch-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                                <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Form-->
                    </div>
                    <!--end::Menu 1-->
                    <!--end::Menu-->
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">

                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table align-middle gs-0 gy-5" id="datatable">
                        <!--begin::Table head-->
                        <thead>
                            <tr>
                                <th class="min-w-25px ">No</th>
                                <th class="min-w-225px">Update Title</th>
                                <th class="min-w-225px">Update Description</th>
                                <th class="min-w-150px">Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- COL END -->

    <div class="modal fade" id="modal_form">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Add new data</h6>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                        <form id="form" method="POST">
                            @csrf
                        <div class="form-group">
                            <input type="hidden" id="id" name="id">
                            <div class="mb-3">
                                <label for="name" class="form-label">Title</label>
                                <input type="text" placeholder="Judul Noted.." value="" name="title" class="form-control" id="title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label text-dark">Description</label>
                            <textarea id="kt_docs_tinymce_hidden"  class="tox-target" name="desc"></textarea>
                        </div>
                    </div>
                </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button  id="btnSave" class="btn btn-primary">Simpan</button>
                    </div>
            </div>
        </div>
    </div>
</div>
@endrole
@role('member')

<div class="row g-5 g-xl-8">
    <div class="col-xl-12">
        <!--begin::Tables Widget 1-->
        <div class="card card-xl-stretch mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <div class="main-content-label mb-0 mg-t-8">Updated List</div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="card overflow-hidden">
                <div class="card-header pb-0">
                    <div class="card-title flex-column">
                        <h2 class="mb-1">List Update Terbaru</h2>
                        <div class="fs-6 fw-semibold text-muted">Updated Terbaaru Desa Merdeka</div>
                    </div>
                </div>
                <div class="card-body d-flex flex-column">
                    @foreach ( $guides as  $item)
                    <div class="panel-group1" id="accordion11">
                        <div class="panel panel-default  mb-4 ">
                            <div class="panel-heading1 bg-light-primary rounded border-primary border border-dashed flex-stack h-xl-100 mb-10 p-6" id="kt_followers_show_more_button">
                                <h4 class="panel-title1 mb-md-0 fw-semibold" style="display: flex; justify-content: space-between;">
                                    <a class="accordion-toggle collapsed text-gray-900 fw-bold" data-bs-toggle="collapse"
                                        data-bs-parent="#accordion11" href="#collapseFour{{ $loop->iteration }}"
                                        aria-expanded="false"><i class="fa fa-arrow-right me-2 text-gray-900 fw-bold"></i>{{ $item->title }}</a>
                                    <i class="fa fa-plus text-gray-900 fw-bold"></i>
                                </h4>
                            </div>                            
                            <div id="collapseFour{{ $loop -> iteration }}" class="panel-collapse collapse" role="tabpanel"
                                aria-expanded="false">
                                <div class="panel-body border">
                                            {!! $item->desc !!}
                                </div>
                            </div>   
                        </div>
                    </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
</div
@endrole
<!-- End Row -->
@endsection

@section('javascript')

<!-- DATA TABLE JS-->
<script src="{{ asset('adminpage/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('adminpage/assets/js/scripts.bundle.js') }}"></script>

<script src="{{ asset('adminpage/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>



<!-- INTERNAL Summernote Editor js -->
<script src="{{ asset('adminpage/assets/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>

<!-- FILE UPLOADES JS -->
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>

<script>
   var KTDatatablesServerSide = function () {
        // Shared variables
        var table;
        var dt;
        var filterPayment;

        // Private functions
        var initDatatable = function () {
            dt = $("#datatable").DataTable({
                processing: true,
                serverSide: true,
                // scrollX: true,
                 ajax: "{{ route('update-noted.datatable') }}",
            columnDefs: [
            {
                targets: 0,
                render: function(data, type, full, meta) {
                    return (meta.row + 1);
                }
            }, 
            {
                targets: 2,
                createdCell: function(td, cellData, rowData, row, col) {
                    $(td).html($(td).text())
                    if($(td).text().length > 150) {
                        let txt = $(td).text()
                        $(td).text(txt.substr(0, 150) + '...')
                    }
                },
                
            },
            {
                targets: -1,
                render: function(data, type, full, meta) {
                    return `
                    <div class="btn-list">
                        <a href="javascript:void(0)" onclick="edit('${data}')" class="btn btn-sm btn-primary modal-effect btn-edit" data-bs-effect="effect-super-scaled"><span class="fa fa-pencil"> </span></a>
                        <a href="javascript:void(0)" onclick="destroy('${data}')" class="btn btn-sm btn-danger btn-delete"><span class="fa fa-trash"> </span></a>
                    </div>
                    `;
                },
            }, ],
            columns: [
                { data: null },
                { data: 'title'},
                { data: 'desc' },
                { data: 'id'}, 
            ],
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                }
            });
	        tinymce.init({
            selector: "#kt_docs_tinymce_hidden", height : "480",
            menubar: false,
            toolbar: ["styleselect fontselect fontsizeselect",
                "undo redo | cut copy paste | bold italic | link image | alignleft aligncenter alignright alignjustify",
                "bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview |  code"],
            plugins : "advlist autolink link image lists charmap print preview code"
                });
        function isTinyEditorEmpty() {
            var content = tinymce.get("kt_docs_tinymce_hidden").getContent();
            return !content.trim();
        }

        function refreshDataTable() {
            dt.ajax.reload();
        }

        $('#btnSave').on('click', function(e) {
            e.preventDefault();
  
            if (isTinyEditorEmpty()) {
                e.preventDefault();
                alert("Desc content cannot be null!");
            }
            else submit();
        })
        
            table = dt.$;

        }

        // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
        var handleSearchDatatable = function () {
            const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
            filterSearch.addEventListener('keyup', function (e) {
                dt.search(e.target.value).draw();
            });
        }

        // Public methods
        return {
            init: function () {
                initDatatable();
                handleSearchDatatable();
            }
        }
    }();

    // On document ready
    KTUtil.onDOMContentLoaded(function () {
        KTDatatablesServerSide.init();
    });
    function create(){
        submit_method = 'create';

        $('#id').val('');
        $('#form')[0].reset();

        $('#modal_form').modal('show');
        $('.modal-title').text('Add Data Update Noted');
    }
    
    function edit(id){
        submit_method = 'edit';

        $('#form')[0].reset();
        var url = "{{ route('update-noted.edit',":id") }}";
        url = url.replace(':id', id);
        
        $.get(url, function (response) {
            response = response.data;
            
            $('#id').val(response.id);
            $('#modal_form').modal('show');
            $('.modal-title').text('Edit Data Update Noted');

            $('#title').val(response.title);
            $('#kt_docs_tinymce_hidden').val(response.desc);
            tinymce.get('kt_docs_tinymce_hidden').setContent(response.desc);
        });
    }

    function submit() {
        var id      = $('#id').val();
        var title   = $('#title').val();
        var desc = tinymce.get('kt_docs_tinymce_hidden').getContent();

        var url = "{{ route('update-noted.store') }}";
    
        $('#btnSave').text('Menyimpan...');
        $('#btnSave').attr('disabled', true);

        if(submit_method == 'edit'){
            url = "{{ route('update-noted.update',":id") }}";
            url = url.replace(':id', id);
        }
        console.log(url, submit_method, id, title, desc);

        $.ajax({
            url: url,
            type: submit_method == 'create' ? 'POST' : 'PUT',
            dataType: 'json',
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                title: title,
                desc:desc
            },
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
                    dt.ajax.reload();

                    $('#btnSave').text('Simpan');
                    $('#btnSave').attr('disabled', false);
                }
                else{
                    for (var i = 0; i < data.inputerror.length; i++) 
                    {
                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                
                $('#btnSave').text('Simpan');
                $('#btnSave').attr('disabled',false); //set button enable 
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
        var url = "{{ route('update-noted.destroy',":id") }}";
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
                    data: {
                        _token: '{{ csrf_token() }}',
                        "id":id
                    },
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