@extends('layout.main')

@section('title', 'Register Event')

@section('css')
<style>
    .card-img-top {
        height: 300px !important;
        object-fit: cover !important;
    }
</style>
@endsection

@section('breadcumb')
<div class="breadcrumb-header justify-content-between">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page"> Management Event</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')

<div class="row row-sm">
    @foreach ($event as $item)
        <div class="col-xl-4 col-lg-4 col-md-12">
            <div class="card">
                <img class="card-img-top w-100" src="{{ asset($item->image) }}" alt="">
                <div class="card-body">
                    <h4 class="card-title mb-3">{{ $item->title }}</h4>
                    <p class="card-text">{!! limitString($item->desc,100) !!}</p>
                    @if(date('Y-m-d') >= $item->start_datetime)
                        <button type="button" class="btn btn-warning">Selesai</button>
                    @else
                        <button type="button" data-id="{{ $item->id }}" class="btn btn-register btn-primary">Daftar</button>
                    @endif
                </div>
                <div class="card-footer bd-t tx-center">
                    <a href="{{ route('home.event.detail', $item->id) }}" target="_blank">Read more</a>
                </div>
            </div>
        </div>
    @endforeach
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
    $(document).ready(function(){
        $('.btn-register').on('click', function(e){
            e.preventDefault();
            let id = $(this).data('id');
            let guestId = `{{ auth()->user()->guest->id }}`
            let url = `{{ route('event.store-register-event') }}`
            
            Swal.fire({
                title: "Yakin ingin mendaftar?",
                text: "Anda akan terdaftar dalam event ini",
                icon: "warning",
                showCancelButton  : true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor : "#d33",
                confirmButtonText : "Ya",
                cancelButtonText : "Tidak"
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url    : url,
                        type   : "POST",
                        data: {
                            eventId: id,
                            guestId: guestId  
                        },
                        success: function(data) {
                            if(data.status) {
                                window.location.reload();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: data.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            }
                        }
                    })
                }
            })
        })
    })
</script>
@endsection