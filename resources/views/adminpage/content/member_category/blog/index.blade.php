@extends('adminpage.layout.main')

@section('title', 'Blog Category')

@section('css')
    {{-- Custom CSS --}}
    <link href="{{ asset('adminpage/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('toolbar')
<!-- PAGE-HEADER Breadcrumbs -->
<div class="breadcrumb-header justify-content-between">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page"> Blog Category</li>
            </ol>
        </nav>
    </div>
</div>
<!-- PAGE-HEADER Breadcumbs END -->
@endsection

@section('content')
<!-- Row -->
<div class="row g-5 g-xl-8">
    <!--begin::Col-->
    <div class="col-xl-12">
        <!--begin::Tables Widget 1-->
        <div class="card card-xl-stretch mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">List Blog Category </span>
                </h3>
                <div class="card-toolbar">
                    <div class="d-flex align-items-center position-relative my-1">
                        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                        </i>
                        <input type="text" data-kt-docs-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search" />
                    </div>
                    <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" onclick="create()">
                        <i class="ki-duotone ki-plus fs-2"></i>New Data</a>
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
                                <th class="min-w-200px">Name</th>
                                <th >Action</th>
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
                                <label for="name" class="form-label">Name</label>
                                <input type="text" placeholder="Nama.." value="" name="name" class="form-control" id="name">
                            </div>
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
<!-- End Row -->
@endsection

@section('javascript')

<!-- DATA TABLE JS-->
<script src="{{ asset('adminpage/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('adminpage/assets/js/scripts.bundle.js') }}"></script>

<script src="{{ asset('adminpage/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>

<script>
    var dt;
    var KTDatatablesServerSide = function () {
        // Shared variables
        var table;
        
        var filterPayment;

        // Private functions
        var initDatatable = function () {
            dt = $("#datatable").DataTable({
                processing: true,
                serverSide: true,
                // scrollX: true,
                order:[[0,'desc']],
                ajax: "{{ route('meta.blog-category.datatable') }}",
                columnDefs: [
                {
                    targets: 0,
                    width: '50px',
                    render: function(data, type, full, meta) {
                        return (meta.row + 1);
                    }
                }, 
                {
                    targets: -1,
                    render: function(data, type, full, meta) {
                        return `
                        <div class="btn-list">
                            <a href="javascript:void(0)" onclick="edit('${data}')" class="btn btn-sm btn-primary modal-effect btn-edit" data-bs-effect="effect-super-scaled"><span class="fa fa-pencil "> </span></a>
                            <a href="javascript:void(0)" onclick="destroy('${data}')" class="btn btn-sm btn-danger btn-delete"><span class="fa fa-trash "> </span></a>
                        </div>
                        `;
                    },
                }, ],
                "initComplete": function (settings, json) {  
                    dt.columns.adjust()
                },
                columns: [
                    { data: 'updated_at' },
                    { data: 'name'},
                    { data: 'id'}, 
                ],
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                }
            });

            $('#btnSave').on('click', function () {
            submit();
        })
        
        $('#form').on('submit', function(e){
            e.preventDefault();

            submit();
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
        $('.modal-title').text('Add Data Blog Category');
        $('#btnSave').text('Save');
        $('#btnSave').attr('disabled', false);
    }
    
    function edit(id){
        submit_method = 'edit';

        $('#form')[0].reset();
        var url = "{{ route('meta.blog-category.edit',":id") }}";
        url = url.replace(':id', id);
        
        $.get(url, function (response) {
            response = response.data;
            
            $('#id').val(response.id);
            $('#modal_form').modal('show');
            $('.modal-title').text('Edit Data Blog Category');

            $('#name').val(response.name);
            $('#btnSave').text('Update');
            $('#btnSave').attr('disabled', false);
        });
    }

    function submit() {
        var id          = $('#id').val();
        // var regency_id  = $('#city').val();
        var name        = $('#name').val();
        // var username    = $('#username').val();

        var url = "{{ route('meta.blog-category.store') }}";
    
        $('#btnSave').text('Saving...');
        $('#btnSave').attr('disabled', true);

        if(submit_method == 'edit'){
            url = "{{ route('meta.blog-category.update',":id") }}";
            url = url.replace(':id', id);
        }

        $.ajax({
            url: url,
            type: submit_method == 'create' ? 'POST' : 'PUT',
            dataType: 'json',
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                name: name
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
        var url = "{{ route('meta.blog-category.destroy',":id") }}";
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
                        dt.ajax.reload();
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