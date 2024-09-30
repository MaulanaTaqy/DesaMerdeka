@extends('layout.main')

@section('title', 'FAQ')

@section('css')
    {{-- Custom CSS --}}
@endsection

@section('breadcumb')
<!-- PAGE-HEADER Breadcrumbs -->
<div class="breadcrumb-header justify-content-between">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page">FAQ</li>
            </ol>
        </nav>
    </div>
</div>
<!-- PAGE-HEADER Breadcumbs END -->
@endsection

@section('content')
<!-- Row -->
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List FAQ</h3>
            </div>
            <div class="card-body">
                <a class="btn btn-primary modal-effect mb-3 data-table-btn ms-4" data-bs-effect="effect-super-scaled" onclick="create()">
                    <span class="fe fe-plus"> </span>Add new data
                </a>
                <table id="datatable" class="table table-bordered text-nowrap border-bottom">
                    <thead>
                        <tr>
                            <th style="width: 5%">No</th>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- COL END -->

    <!-- PRIVACY -->
    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
        <form id="form-privacy" action="{{ route('faq.privacy-policy') }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Privacy policy</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <textarea id="privacy" name="privacy_policies">{{ old('privacy_policies') ?: (isset($privacyPolicy) ? $privacyPolicy->privacy_policies : ' ') }}</textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-privacy float-end my-2">Save Now</button>
                </div>
            </div>
        </form>
    </div>
    <!-- PRIVACY END -->

    <!-- POLICY -->
    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
        <form id="form-term" action="{{ route('faq.term-condition') }}" method="POST">
            @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Term & Conditions</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <textarea id="term" name="term_conditions">{{ old('term_conditions') ?: (isset($termConditions) ? $termConditions->term_conditions : ' ') }}</textarea>
                </div>
            </div>
            <div class="card-footer">
                <button  class="btn btn-primary btn-term float-end my-2">Save Now</button>
            </div>
        </div>
    </div>
    <!-- POLICY END -->

    <div class="modal fade" id="modal_form">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Add new data</h6>
                    <button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <form id="form" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" id="id" name="id">
                            <div class="mb-3">
                                <label for="question" class="form-label">question</label>
                                <input type="text" placeholder="question.." value="{{ old('question') }}" name="question" class="form-control" id="question">
                            </div>
                            <div class="form-group">
                                <label class="form-label text-dark">Answer</label>
                                <textarea id="summernote" name="answer">{{ old('answer') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="btnSave" class="btn btn-primary">Save Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>
<!-- End Row -->
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

<!-- INTERNAL Summernote Editor js -->
<script src="{{ asset('virtual/assets/plugins/summernote-editor/summernote1.js') }}"></script>

<script>
    var $table;

    $(document).ready(function() {
        $('#modal_form').modal({
            show: false
        });
        $('#summernote').summernote();
        $('#privacy').summernote();
        $('#term').summernote();
        // Contoh Inisiator datatable severside
        table = $("#datatable").DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: "{{ route('faq.datatable') }}",
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
                        <a href="javascript:void(0)" onclick="edit('${data}')" class="btn btn-sm btn-primary modal-effect btn-edit" data-bs-effect="effect-super-scaled"><span class="fe fe-edit"> </span></a>
                        <a href="javascript:void(0)" onclick="destroy('${data}')" class="btn btn-sm btn-danger btn-delete"><span class="fe fe-trash-2"> </span></a>
                    </div>
                    `;
                },
            }, ],
            columns: [
                { data: null },
                { data: 'question'},
                { data: 'answer'},
                { data: 'id'}, 
            ]
        });

        $('#btnSave').on('click', function () {
            if($('#summernote').summernote('isEmpty'))  toast('Answer cannot be null!');
            else submit();
        })

        $('.btn-privacy').on('click', function(e) {
            e.preventDefault();
            if($('#privacy').summernote('isEmpty'))  toast('Privacy policy cannot be null!');
            else $('#form-privacy').submit();
        })

        $('.btn-term').on('click', function(e) {
            e.preventDefault();
            if($('#term').summernote('isEmpty'))  toast('Term & Conditions cannot be null!');
            else $('#form-term').submit();
        })
    });

    function create() {
        submit_method = 'create';

        $('#id').val('');
        $('#modal_form').modal('show');
        
        $('#form')[0].reset();
        $('.modal-title').text('Add FAQ');
    }
    
    function edit(id){
        submit_method = 'edit';

        $('#form');
        var url = "{{ route('faq.edit',":id") }}";
        url = url.replace(':id', id);
        
        $.get(url, function (response) {
            response = response.data;

            // console.log(response);
            
            $('#id').val(response.id);
            $('#modal_form').modal('show');
            $('.modal-title').text('Edit FAQ');

            $('#question').val(response.question);
            $('#summernote').summernote('code', response.answer);
        });
    }

    function submit() {
        var id          = $('#id').val();
        var question    = $('#question').val();
        var answer      = $('#summernote').val();

        var url = "{{ route('faq.store') }}";
    
        $('#btnSave').text('Menyimpan...');
        $('#btnSave').attr('disabled', true);

        if(submit_method == 'edit'){
            url = "{{ route('faq.update',":id") }}";
            url = url.replace(':id', id);
        }

        $.ajax({
            url: url,
            type: submit_method == 'create' ? 'POST' : 'PUT',
            dataType: 'json',
            data: {
                id: id,
                question: question,
                answer: answer,
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
                    table.ajax.reload();

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