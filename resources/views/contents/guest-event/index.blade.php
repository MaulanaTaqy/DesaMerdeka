@extends('layout.main')

@section('title', 'Management Event Members')

@section('css')

@endsection

@section('breadcumb')
<div class="breadcrumb-header justify-content-between">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page">Event Members</li>
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
                <h3 class="card-title">List Event Members</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="border-top-0 table table-bordered border-bottom w-100">
                        <thead>
                            <tr>
                                <th class="border-bottom-0">No</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Email</th>
                                <th class="border-bottom-0">Phone</th>
                                <th class="border-bottom-0">Address</th>
                                <th class="border-bottom-0">Action</th>
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
        let url = "{{ route('guest-event.datatable') }}";
        if(`{{ $id }}` !== ''){
            url = "{{ route('guest-event.datatable', $id) }}";
        }
        
        table = $("#datatable").DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: url,
            columnDefs: [
            {
                targets: 0,
                render: function(data, type, full, meta) {
                    return (meta.row + 1);
                }
            },
            {
                targets: [3,4],
                render: function(data, type, full, meta) {
                    return data ?? '-';
                },
            },
            {
                targets: -1,
                render: function(data, type, full, meta) {

                    let btn = `
                    <div class="btn-list">
                        <a href="{{ route('guest-event.show', ':id') }}" class="btn btn-primary">List Event Joined</a>
                    </div>
                    `;

                    btn = btn.replaceAll(':id', data);

                    return btn;
                },
            }],
            columns: [
                { data: null },
                { data: 'name'},
                { data: 'email'},
                { data: 'phone'},
                { data: 'address'},
                { data: 'id'},
            ],
        });
    })

</script>
@endsection