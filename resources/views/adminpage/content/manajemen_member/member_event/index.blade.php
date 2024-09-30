@extends('adminpage.layout.main')

@section('title', 'Guest Event')

@section('css')

    <link rel="stylesheet" href="{{ asset('adminpage/partials/css/style.min.css') }}">

@endsection

@section('toolbar')
    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
            @yield('title')
        </h1>

        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
            <li class="breadcrumb-item text-muted">
                <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Home</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-400 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-muted">
                @yield('title')
            </li>
        </ul>
    </div>
@endsection

@section('content')

    <div class="row g-5 g-xl-8">
        <div class="col-xl-12">
            <div class="card card-xl-stretch mb-xl-8">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold fs-3 mb-1">
                            Manajemen @yield('title')
                        </span>
                    </h3>
                    <div class="card-toolbar">
                        <a href="{{ url('/umkm/create') }}" class="btn btn-primary">
                            <i class="ki-duotone ki-plus fs-2"></i> Add @yield('title')
                        </a>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-3">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table id="example" class="table align-middle gs-0 gy-5">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="fw-bold text-muted bg-light">
                                    <th class="text-center min-w-50px">No.</th>
                                    <th class="min-w-125px">Name</th>
                                    <th class="min-w-125px">Email</th>
                                    <th class="text-center min-w-125px">Phone</th>
                                    <th class="min-w-125px">Address</th>
                                    <th class="text-center min-w-125px">Action</th>
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

@endsection

@section('javascript')

    <script src="{{ asset('adminpage/partials/javascript/dataTables.min.js') }}"></script>
    <script src="{{ asset('adminpage/partials/javascript/style.min.js') }}"></script>
    <script type="text/javascript">
        var $table;
        $(document).ready(function() {

            let url = "{{ route('guest-event.datatable') }}";
            if (`{{ $id }}` !== '') {
                url = "{{ route('guest-event.datatable', $id) }}";
            }

            table = $("#example").DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: url,
                columnDefs: [{
                        targets: 0,
                        render: function(data, type, full, meta) {
                            return `<div style="text-align: center">` + (meta.row + 1) + `</div>`;
                        }
                    },
                    {
                        targets: [3, 4],
                        render: function(data, type, full, meta) {
                            return data ?? '-';
                        },
                    },
                    {
                        targets: -1,
                        render: function(data, type, full, meta) {

                            let btn = `
                    <div class="btn-list">
                        <a href="{{ route('guest-event.show', ':id') }}" class="text-center btn btn-primary">List Event Joined</a>
                    </div>
                    `;

                            btn = btn.replaceAll(':id', data);

                            return btn;
                        },
                    }
                ],
                "initComplete": function(settings, json) {
                    table.columns.adjust()
                },
                columns: [{
                        data: null
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'phone'
                    },
                    {
                        data: 'address'
                    },
                    {
                        data: 'id'
                    },
                ],
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                }
            });

            const button = document.getElementById('kt_docs_sweetalert_basic');

            console.log(button);
        });
    </script>

@endsection
