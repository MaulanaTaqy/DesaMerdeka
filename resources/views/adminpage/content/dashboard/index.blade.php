@extends('adminpage.layout.main')

@section('title', 'Dashboard')

@section('css')
    <link href="{{ asset('adminpage/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('toolbar')
    <!--begin::Page title-->
    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
        <!--begin::Title-->
        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Dashboard</h1>
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
            <li class="breadcrumb-item text-muted">Dashboards</li>
            <!--end::Item-->
        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Page title-->
@endsection

@section('content')
<div class="row row-sm">
    @role(['admin', 'member'])
        @role(['admin'])
        <div class="col-xxl-3 col-xl-4 col-lg-6 col-sm-12">
            <div class="d-flex border border-gray-300 border-dashed rounded p-6 mb-6">
                <!--begin::Block-->
                <div class="d-flex align-items-center flex-grow-1 me-2 me-sm-5">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-50px me-4">
                        <span class="symbol-label">
                            <i class="ki-duotone ki-chart fs-2qx text-primary">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Section-->
                    <div class="me-2">
                        <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">Desa</a>
                        <span class="text-gray-400 fw-bold d-block fs-7">Data yang terverifikasi</span>
                    </div>
                    <!--end::Section-->
                </div>
                <!--end::Block-->
                <!--begin::Info-->
                <div class="d-flex align-items-center">
                    <span class="text-dark fw-bolder fs-2x">{{ $countDesaSemua }}</span>
                    <span class="fw-semibold fs-2 text-gray-600 mx-1 pt-1">/</span>
                    <span class="text-gray-600 fw-semibold fs-2 me-3 pt-2">{{ $countDesaSemua + $countDesa }}</span>
                    <span class="badge badge-lg badge-light-success align-self-center px-2">{{ (int)($countDesaSemua / (($countDesaSemua + $countDesa) == 0 ?: 1) * 100) }}%</span>
                </div>
                <!--end::Info-->
            </div>
        </div>
        @endrole
        @if(Auth::user()->hasRole('admin') || Auth::user()->can('member-account'))
        <div class="col-xxl-3 col-xl-4 col-lg-6 col-sm-12">
            <div class="d-flex border border-gray-300 border-dashed rounded p-6 mb-6">
                <!--begin::Block-->
                <div class="d-flex align-items-center flex-grow-1 me-2 me-sm-5">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-50px me-4">
                        <span class="symbol-label">
                            <i class="ki-duotone ki-chart fs-2qx text-primary">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Section-->
                    <div class="me-2">
                        <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">UMKM</a>
                        <span class="text-gray-400 fw-bold d-block fs-7">Data yang terverifikasi</span>
                    </div>
                    <!--end::Section-->
                </div>
                <!--end::Block-->
                <!--begin::Info-->
                <div class="d-flex align-items-center">
                    <span class="text-dark fw-bolder fs-2x">{{ $countUmkmSemua }}</span>
                    <span class="fw-semibold fs-2 text-gray-600 mx-1 pt-1">/</span>
                    <span class="text-gray-600 fw-semibold fs-2 me-3 pt-2">{{ $countUmkmSemua + $countUmkm }}</span>
                    <span class="badge badge-lg badge-light-success align-self-center px-2">{{ (int)($countUmkmSemua / (($countUmkmSemua + $countUmkm) == 0 ?: 1) * 100) }}%</span>
                </div>
                <!--end::Info-->
            </div>
        </div>
        <div class="col-xxl-3 col-xl-4 col-lg-6 col-sm-12">
            <div class="d-flex border border-gray-300 border-dashed rounded p-6 mb-6">
                <!--begin::Block-->
                <div class="d-flex align-items-center flex-grow-1 me-2 me-sm-5">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-50px me-4">
                        <span class="symbol-label">
                            <i class="ki-duotone ki-chart fs-2qx text-primary">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Section-->
                    <div class="me-2">
                        <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">Komunitas</a>
                        <span class="text-gray-400 fw-bold d-block fs-7">Data yang terverifikasi</span>
                    </div>
                    <!--end::Section-->
                </div>
                <!--end::Block-->
                <!--begin::Info-->
                <div class="d-flex align-items-center">
                    <span class="text-dark fw-bolder fs-2x">{{ $countKomunitasSemua }}</span>
                    <span class="fw-semibold fs-2 text-gray-600 mx-1 pt-1">/</span>
                    <span class="text-gray-600 fw-semibold fs-2 me-3 pt-2">{{ $countKomunitasSemua + $countKomunitas }}</span>
                    <span class="badge badge-lg badge-light-success align-self-center px-2">{{ (int)($countKomunitasSemua / (($countKomunitasSemua + $countKomunitas) == 0 ?: 1) * 100) }}%</span>
                </div>
                <!--end::Info-->
            </div>
        </div>
        <div class="col-xxl-3 col-xl-4 col-lg-6 col-sm-12">
            <div class="d-flex border border-gray-300 border-dashed rounded p-6 mb-6">
                <!--begin::Block-->
                <div class="d-flex align-items-center flex-grow-1 me-2 me-sm-5">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-50px me-4">
                        <span class="symbol-label">
                            <i class="ki-duotone ki-chart fs-2qx text-primary">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Section-->
                    <div class="me-2">
                        <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">Industri</a>
                        <span class="text-gray-400 fw-bold d-block fs-7">Data yang terverifikasi</span>
                    </div>
                    <!--end::Section-->
                </div>
                <!--end::Block-->
                <!--begin::Info-->
                <div class="d-flex align-items-center">
                    <span class="text-dark fw-bolder fs-2x">{{ $countIndustriSemua }}</span>
                    <span class="fw-semibold fs-2 text-gray-600 mx-1 pt-1">/</span>
                    <span class="text-gray-600 fw-semibold fs-2 me-3 pt-2">{{ $countIndustriSemua + $countIndustri }}</span>
                    <span class="badge badge-lg badge-light-success align-self-center px-2">{{ (int)($countIndustriSemua / (($countIndustriSemua + $countIndustri) == 0 ?: 1) * 100) }}%</span>
                </div>
                <!--end::Info-->
            </div>
        </div>
        @endif
    @endrole
</div>
<div class="row row-sm">
    <div class="col-xxl-3 col-xl-4 col-lg-6 col-sm-12">
        <div class="d-flex border border-gray-300 border-dashed rounded p-6 mb-6">
            <!--begin::Block-->
            <div class="d-flex align-items-center flex-grow-1 me-2 me-sm-5">
                <!--begin::Symbol-->
                <div class="symbol symbol-50px me-4">
                    <span class="symbol-label">
                        <i class="ki-duotone ki-chart fs-2qx text-primary">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </span>
                </div>
                <!--end::Symbol-->
                <!--begin::Section-->
                <div class="me-2">
                    <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">Blog</a>
                    <span class="text-gray-400 fw-bold d-block fs-7">Blog Terpublish</span>
                </div>
                <!--end::Section-->
            </div>
            <!--end::Block-->
            <!--begin::Info-->
            <div class="d-flex align-items-center">
                <span class="text-dark fw-bolder fs-2x">{{ $countBlogSemua }}</span>
                <span class="fw-semibold fs-2 text-gray-600 mx-1 pt-1">/</span>
                <span class="text-gray-600 fw-semibold fs-2 me-3 pt-2">{{ $countBlogSemua + $countBlog }}</span>
                <span class="badge badge-lg badge-light-success align-self-center px-2">{{ (int)($countBlogSemua / (($countBlogSemua + $countBlog) == 0 ?: 1) * 100) }}%</span>
            </div>
            <!--end::Info-->
        </div>
    </div>
    <div class="col-xxl-3 col-xl-4 col-lg-6 col-sm-12">
        <div class="d-flex border border-gray-300 border-dashed rounded p-6 mb-6">
            <!--begin::Block-->
            <div class="d-flex align-items-center flex-grow-1 me-2 me-sm-5">
                <!--begin::Symbol-->
                <div class="symbol symbol-50px me-4">
                    <span class="symbol-label">
                        <i class="ki-duotone ki-chart fs-2qx text-primary">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </span>
                </div>
                <!--end::Symbol-->
                <!--begin::Section-->
                <div class="me-2">
                    <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">Produk</a>
                    <span class="text-gray-400 fw-bold d-block fs-7">Produk Terpublish</span>
                </div>
                <!--end::Section-->
            </div>
            <!--end::Block-->
            <!--begin::Info-->
            <div class="d-flex align-items-center">
                <span class="text-dark fw-bolder fs-2x">{{ $countProductSemua }}</span>
                <span class="fw-semibold fs-2 text-gray-600 mx-1 pt-1">/</span>
                <span class="text-gray-600 fw-semibold fs-2 me-3 pt-2">{{ $countProductSemua + $countProduct }}</span>
                <span class="badge badge-lg badge-light-success align-self-center px-2">{{ (int)($countProductSemua / (($countProductSemua + $countProduct) == 0 ?: 1) * 100) }}%</span>
            </div>
            <!--end::Info-->
        </div>
    </div>
    <div class="col-xxl-3 col-xl-4 col-lg-6 col-sm-12">
        <div class="d-flex border border-gray-300 border-dashed rounded p-6 mb-6">
            <!--begin::Block-->
            <div class="d-flex align-items-center flex-grow-1 me-2 me-sm-5">
                <!--begin::Symbol-->
                <div class="symbol symbol-50px me-4">
                    <span class="symbol-label">
                        <i class="ki-duotone ki-chart fs-2qx text-primary">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </span>
                </div>
                <!--end::Symbol-->
                <!--begin::Section-->
                <div class="me-2">
                    <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">Event</a>
                    <span class="text-gray-400 fw-bold d-block fs-7">Event Terpublish</span>
                </div>
                <!--end::Section-->
            </div>
            <!--end::Block-->
            <!--begin::Info-->
            <div class="d-flex align-items-center">
                <span class="text-dark fw-bolder fs-2x">{{ $countEventSemua }}</span>
                <span class="fw-semibold fs-2 text-gray-600 mx-1 pt-1">/</span>
                <span class="text-gray-600 fw-semibold fs-2 me-3 pt-2">{{ $countEventSemua + $countEvent }}</span>
                <span class="badge badge-lg badge-light-success align-self-center px-2">{{ (int)($countEventSemua / (($countEventSemua + $countEvent) == 0 ?: 1) * 100) }}%</span>
            </div>
            <!--end::Info-->
        </div>
    </div>
    <div class="col-xxl-3 col-xl-4 col-lg-6 col-sm-12">
        <div class="d-flex border border-gray-300 border-dashed rounded p-6 mb-6">
            <!--begin::Block-->
            <div class="d-flex align-items-center flex-grow-1 me-2 me-sm-5">
                <!--begin::Symbol-->
                <div class="symbol symbol-50px me-4">
                    <span class="symbol-label">
                        <i class="ki-duotone ki-chart fs-2qx text-primary">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </span>
                </div>
                <!--end::Symbol-->
                <!--begin::Section-->
                <div class="me-2">
                    <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">Member Event</a>
                    <span class="text-gray-400 fw-bold d-block fs-7">Member Event terdaftar</span>
                </div>
                <!--end::Section-->
            </div>
            <!--end::Block-->
            <!--begin::Info-->
            <div class="d-flex align-items-center">
                <span class="text-dark fw-bolder fs-2x">{{ $countGuestSemua }}</span>
            </div>
            <!--end::Info-->
        </div>
    </div>
</div>

<div class="row row-sm mt-6">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-dark">User Daftar</span>
                    <span class="text-gray-400 mt-1 fw-semibold fs-6">Grafik User Mendaftar Setiap Bulan</span>
                </h3>
            </div>
            <div class="card-body">
                <div class="row row-sm mt-6 ">
                    <div class="col-sm-12 col-md-12">
                        <div class="card overflow-hidden">
                            <div class="card-body">
                                {!! $chart->container() !!}
                            </div>
                        </div>
                    </div><!-- col-6 -->            
                </div>
                <!-- /row -->
            </div>
        </div>
    </div>
</div>

<div class="row row-sm mt-6">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-dark">Berita</span>
                    <span class="text-gray-400 mt-1 fw-semibold fs-6">10 Berita Terbaru</span>
                </h3>
            </div>
            <div class="card-body">
                <!--begin::Table container-->
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                    </i>
                    <input type="text" data-kt-docs-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search" />
                </div>
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table align-middle gs-0 gy-5" id="datatable">
                        <!--begin::Table head-->
                        <thead>
                            <tr>
                                <th class="min-w-25px ">No</th>
                                <th class="min-w-200px">title</th>
                                <th class="min-w-200px">Author</th>
                                <th class="min-w-200px">Category</th>
                                <th class="min-w-200px">Date</th>
                                <th class="min-w-200px">Status</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row row-sm mt-6">
    <div class="col-xxl-4 col-md-6 col-sm-12">
        <div class="card h-100">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-dark">Top Event</span>
                    <span class="text-gray-400 mt-1 fw-semibold fs-6">Event dengan total peserta terbanyak</span>
                </h3>
            </div>
            <div class="card-body">
                <div class="timeline ms-n1">
                    @foreach ( $topEvents->take(5) as $item )
                    <!--begin::Timeline item-->
                    <div class="timeline-item align-items-center mb-4">
                        <!--begin::Timeline content-->
                        <div class="timeline-content m-0">
                            <!--begin::Label-->
                            <span class="fs-8 fw-bolder text-success text-uppercase">{{ $item->created_at }}</span>
                            <!--begin::Label-->
                            <!--begin::Title-->
                            <a href="#" class="fs-6 text-gray-800 fw-bold d-block text-hover-primary">{{ $item->title }}</a>
                            <!--end::Title-->
                            <!--begin::Title-->
                            <span class="fw-semibold text-gray-400">{{ limittext($item->desc, 5) }}</span>
                            <!--end::Title-->
                        </div>
                        <!--end::Timeline content-->
                    </div>
                    <!--end::Timeline item-->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-4 col-md-6 col-sm-12">
        <div class="card h-100">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-dark">User Baru</span>
                    <span class="text-gray-400 mt-1 fw-semibold fs-6">User Baru bergabung di Desa Merdeka</span>
                </h3>
            </div>
            <div class="card-body">
                @foreach ($pengguna as $item)
                <div class="border border-dashed border-gray-300 rounded px-4 py-3 mb-1">
                    <!--begin::Info-->
                    <div class="d-flex flex-stack mb-3">
                        <!--begin::Wrapper-->
                        <div class="me-3">
                            <!--begin::Icon-->
                            <img src="{{ asset($item->guest->image ?? $item->member->image ?? 'adminpage/assets/media/icons/default.png') }}" class="w-50px ms-n1 me-1" alt="">
                            <!--end::Icon-->
                            <!--begin::Title-->
                            <a href="javascript:void(0);" class="text-gray-800 text-hover-primary fw-bold">{{ $item->guest->name ?? $item->member->name ?? 'Nama Tidak Tersedia' }}</a>
                            <!--end::Title-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Info-->
                    <!--begin::Customer-->
                    <div class="d-flex flex-stack">
                        <!--begin::Name-->
                        <span class="text-gray-400 fw-bold">Mendaftar pada :
                        <a href="javascript:void(0);" class="text-gray-800 text-hover-primary fw-bold">{{ $item->created_at->format('d M Y H:i') }}</a></span>
                        <!--end::Name-->
                        <!--begin::Label-->
                        <span class="badge {{ $item->status_user->name === 'unverified' ? 'badge-light-danger' : 'badge-light-success' }}">{{ $item->status_user->name }}</span>
                        <!--end::Label-->
                    </div>
                    <!--end::Customer-->
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-xxl-4 col-md-6 col-sm-12">
        <div class="card h-100">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-dark">Top Kategori Event</span>
                    <span class="text-gray-400 mt-1 fw-semibold fs-6">Kategori dengan Event terbanyak</span>
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <!--begin::Items-->
                        <div class="bg-danger bg-opacity-70 rounded-2 px-6 py-5 text-center">
                            <!--begin::Symbol-->
                            
                            <!--end::Symbol-->
                            <!--begin::Stats-->
                            <div class="m-0">
                                <!--begin::Number-->
                                <span class="text-white fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $event->count() }}</span>
                                <!--end::Number-->
                                <!--begin::Desc-->
                                <span class="text-white fw-semibold fs-6">Event</span>
                                <!--end::Desc-->
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Items-->
                    </div>
                    <div class="col-6">
                        <!--begin::Items-->
                        <div class="bg-info bg-opacity-70 rounded-2 px-6 py-5 text-center">
                            <!--begin::Symbol-->
                            
                            <!--end::Symbol-->
                            <!--begin::Stats-->
                            <div class="m-0">
                                <!--begin::Number-->
                                <span class="text-white fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $meta->count() }}</span>
                                <!--end::Number-->
                                <!--begin::Desc-->
                                <span class="text-white fw-semibold fs-6">Kategori</span>
                                <!--end::Desc-->
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Items-->
                    </div>
                </div>
                <div class="row">
                    @foreach ( $meta->take(5) as $item )
                    <div class="d-flex fs-6 fw-semibold align-items-center {{ $loop->iteration == 1 ? 'mt-8' : 'mt-4' }}">
                        <!--begin::Bullet-->
                        <i class="ki-duotone ki-right-square fs-6 text-gray-600 me-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <!--end::Bullet-->
                        <!--begin::Label-->
                        <div class="text-gray-500 flex-grow-1 me-4">{{ $item->name }}</div>
                        <!--end::Label-->
                        <!--begin::Stats-->
                        <div class="fw-bolder text-gray-700 text-xxl-end">{{ $item->category->count() }}</div>
                        <!--end::Stats-->
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row row-sm mt-6">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-dark">Statistic Event</span>
                    <span class="text-gray-400 mt-1 fw-semibold fs-6">Statistik Event Setiap Bulan</span>
                </h3>
            </div>
            <div class="card-body">
                <div class="row row-sm mt-6 ">
                    <div class="col-sm-12 col-md-12">
                        <div class="card overflow-hidden">
                            <div class="card-body">
                                @if(auth()->user()->member)
                                    @if(auth()->user()->member->member_type->name != 'Desa')
                                    <div>{!! $grafikMemberEvent->container() !!}</div>
                                    @else
                                    <div>{!! $desaBar->container() !!}</div>
                                    @endif
                                @elseif(auth()->user()->admin)
                                <div>{!! $grafik->container() !!}</div>
                                @endif
                            </div>
                        </div>
                    </div><!-- col-6 -->            
                </div>
                <!-- /row -->
            </div>
        </div>
    </div>
</div>

<div class="row row-sm mt-6">
    <div class="col-xxl-4 col-md-6 col-sm-12">
        <div class="card h-100">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-dark">Event Terbaru</span>
                    <span class="text-gray-400 mt-1 fw-semibold fs-6">10 Data Event Terbaru</span>
                </h3>
            </div>
            <div class="card-body">
                @foreach ($eventSekarang as $item )
                <div class="d-flex flex-stack">
                    <!--begin::Wrapper-->
                    <div class="d-flex align-items-center me-3">
                        <!--begin::Logo-->
                        <img src="{{ asset($item->image ?? $item->image ?? 'adminpage/assets/media/icons/default.png') }}" class="me-4 w-30px" alt="">
                        <!--end::Logo-->
                        <!--begin::Section-->
                        <div class="flex-grow-1">
                            <!--begin::Text-->
                            <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">{{ $item->title }}</a>
                            <!--end::Text-->
                            <!--begin::Description-->
                            <span class="text-gray-400 fw-semibold d-block fs-6">{{ $item->admin->name ?? $item->member->name ?? "tidak ada" }}</span>
                            <!--end::Description=-->
                        </div>
                        <!--end::Section-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Statistics-->
                    <div class="d-flex align-items-center w-100 mw-125px">
                        <!--begin::Progress-->
                        <div class="d-flex gap-2 mb-2">
                            <a href="{{ urlCheck($item->ig_url) }}">
                                <img src="{{ asset('adminpage/assets/media/svg/brand-logos/facebook-4.svg') }}" class="w-20px" alt="">
                            </a>
                            <a href="{{ urlCheck($item->fb_url) }}">
                                <img src="{{ asset('adminpage/assets/media/svg/brand-logos/instagram-2-1.svg') }}" class="w-20px" alt="">
                            </a>
                            <a href="{{ urlCheck($item->yt_url) }}">
                                <img src="{{ asset('adminpage/assets/media/svg/brand-logos/youtube-3.svg') }}" class="w-20px" alt="">
                            </a>
                            <a href="{{ urlCheck($item->tk_url) }}">
                                <img src="{{ asset('virtual/assets/plugins/fontawesome-free/svgs/brands/tiktok.svg') }}" class="w-20px" alt="">
                            </a>
                        </div>
                        <!--end::Value-->
                    </div>
                    <!--end::Statistics-->
                </div>
                <div class="separator separator-dashed my-3"></div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-xxl-4 col-md-6 col-sm-12">
        <div class="card h-100">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-dark">Event Mendatang</span>
                    <span class="text-gray-400 mt-1 fw-semibold fs-6">Event yang akan datang</span>
                </h3>
            </div>
            <div class="card-body">
                @foreach ($eventSoon as $item )
                <div class="d-flex flex-stack">
                    <!--begin::Wrapper-->
                    <div class="d-flex align-items-center me-3">
                        <!--begin::Logo-->
                        <img src="{{ asset($item->admin->image ?? $item->member->image ?? 'adminpage/assets/media/icons/default.png') }}" class="me-4 w-30px" alt="">
                        <!--end::Logo-->
                        <!--begin::Section-->
                        <div class="flex-grow-1">
                            <!--begin::Text-->
                            <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">{{ $item->admin->name ?? $item->member->name ?? "tidak ada" }}</a>
                            <!--end::Text-->
                            <!--begin::Description-->
                            <span class="text-gray-400 fw-semibold d-block fs-6">{{ $item->title }}</span>
                            <!--end::Description=-->
                        </div>
                        <!--end::Section-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Statistics-->
                    <div class="d-flex align-items-center w-100 mw-125px">
                        <!--begin::Progress-->
                        <div class="d-flex gap-2 mb-2">
                            <a href="{{ urlCheck($item->ig_url) }}">
                                <img src="{{ asset('adminpage/assets/media/svg/brand-logos/facebook-4.svg') }}" class="w-20px" alt="">
                            </a>
                            <a href="{{ urlCheck($item->fb_url) }}">
                                <img src="{{ asset('adminpage/assets/media/svg/brand-logos/instagram-2-1.svg') }}" class="w-20px" alt="">
                            </a>
                            <a href="{{ urlCheck($item->yt_url) }}">
                                <img src="{{ asset('adminpage/assets/media/svg/brand-logos/youtube-3.svg') }}" class="w-20px" alt="">
                            </a>
                            <a href="{{ urlCheck($item->tk_url) }}">
                                <img src="{{ asset('virtual/assets/plugins/fontawesome-free/svgs/brands/tiktok.svg') }}" class="w-20px" alt="">
                            </a>
                        </div>
                        <!--end::Value-->
                    </div>
                    <!--end::Statistics-->
                </div>
                <div class="separator separator-dashed my-3"></div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-xxl-4 col-md-6 col-sm-12">
        <div class="card h-100">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-dark">Statistik Event</span>
                    <span class="text-gray-400 mt-1 fw-semibold fs-6">Event yang telah selesai dan akan dantang</span>
                </h3>
            </div>
            <div class="card-body">
                <div class="row justify-content-md-center">
                    <div class="col-sm-12">
                        @if(auth()->user()->member)
                        <div class="">
                            {{-- <span > {!! $totalEvent->container() !!}</span> --}}
                            {{-- @if(auth()->user()->member->member_type->name != 'Desa') --}}
                            @if(auth()->user()->member->member_type->name != 'Desa')
                            <span > {!! $totalEventMembers->container() !!}</span>
                            @else
                                <span> {!! $desaTotal->container() !!}</span>
                            @endif
                        </div>
                        @else
                        <div class="">
                            <span > {!! $totalEvent->container() !!}</span>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="mt-8">
                    <div class="row ">
                        <div class="col-sm-8 ">
                            <h5 class="mb-0 tx-15 d-flex"><span
                                    class="legend bg-primary-gradient brround"></span>Ended Event
                                </h6>
                                <p class="text-muted  tx-13 mb-0">Event Has Been Ended</p>
                        </div>
                        @if(auth()->user()->member)
                        <div class="col-sm-4 ">
                            {{-- @if(auth()->user()->member->member_type->name != 'Desa') --}}
                            @if(auth()->user()->member->member_type->name != 'Desa')
                            <span> {!! $doneEvent->container() !!}</span>
                            @else
                            <span> {!! $desaDone->container() !!}</span>
                            @endif
                        </div>
                        @else
                        <div class="col-sm-4 ">

                            <span> {!! $endEvent->container() !!}</span>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="pt-3">
                    <div class="row ">
                        <div class="col-sm-8 ">
                            <h6 class="mb-0 tx-15 d-flex"><span
                                    class="legend bg-success-gradient brround"></span>Event Up
                                Coming</h6>
                            <p class="text-muted tx-13 mb-0">UpComing Event</p>
                        </div>
                        @if(auth()->user()->member)
                        <div class="col-sm-4 ">
                            {{-- @if(auth()->user()->member->member_type->name != 'Desa') --}}
                            @if(auth()->user()->member->member_type->name != 'Desa')
                            <span >{!! $upcomingEventMember->container() !!}</span>
                            @else
                            <span >{!! $desaUpcoming->container() !!}</span>
                            @endif
                        </div>
                        @else
                        <div class="col-sm-4 ">                                                      
                            <span >{!! $incomingEvent->container() !!}</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row row-sm mt-6">
    <div class="col-xxl-8 col-sm-12">
        <div class="card h-100">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-dark">Produk</span>
                    <span class="text-gray-400 mt-1 fw-semibold fs-6">Produk Terbaru</span>
                </h3>
            </div>
            <div class="card-body">
                @foreach ( $app->take(5) as $item)
                <div class="border border-dashed border-gray-300 rounded px-4 py-3 mb-1">
                    <!--begin::Info-->
                    <div class="d-flex flex-stack mb-3">
                        <!--begin::Wrapper-->
                        <div class="me-3">
                            <!--begin::Icon-->
                            <img src="{{ asset($item->image ?? 'adminpage/assets/media/icons/default.png') }}" class="w-50px ms-n1 me-1" alt="">
                            <!--end::Icon-->
                            <!--begin::Title-->
                            <a href="javascript:void(0);" class="text-gray-800 text-hover-primary fw-bold">{{ $item->title }}</a>
                            <!--end::Title-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Info-->
                    <!--begin::Customer-->
                    <div class="d-flex flex-stack">
                        <!--begin::Name-->
                        <div class="d-flex flex-start">
                            <span class="text-gray-400 fw-bold">Owner :
                            <a href="javascript:void(0);" class="text-gray-800 text-hover-primary fw-bold">{{ $item->member->name ?? $item->admin->name ?? "nama tidak ada" }}</a></span>
                        </div>
                        <!--end::Name-->
                        <div class="d-flex flex-end">
                            @foreach ($item->category as $meta )
                            <!--begin::Label-->
                            <span class="badge badge-light-success me-2">{{ $meta->meta_name->name }}</span>
                            <!--end::Label-->
                            @endforeach
                        </div>
                    </div>
                    <!--end::Customer-->
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-xxl-4 col-sm-12">
        <div class="card h-100">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-dark">Top Kategori Produk</span>
                    <span class="text-gray-400 mt-1 fw-semibold fs-6">Kategori dengan Produk terbanyak</span>
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <!--begin::Items-->
                        <div class="bg-danger bg-opacity-70 rounded-2 px-6 py-5 text-center">
                            <!--begin::Symbol-->
                            
                            <!--end::Symbol-->
                            <!--begin::Stats-->
                            <div class="m-0">
                                <!--begin::Number-->
                                <span class="text-white fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $app->count() }}</span>
                                <!--end::Number-->
                                <!--begin::Desc-->
                                <span class="text-white fw-semibold fs-6">Produk</span>
                                <!--end::Desc-->
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Items-->
                    </div>
                    <div class="col-6">
                        <!--begin::Items-->
                        <div class="bg-info bg-opacity-70 rounded-2 px-6 py-5 text-center">
                            <!--begin::Symbol-->
                            
                            <!--end::Symbol-->
                            <!--begin::Stats-->
                            <div class="m-0">
                                <!--begin::Number-->
                                <span class="text-white fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $metaProduct->count() }}</span>
                                <!--end::Number-->
                                <!--begin::Desc-->
                                <span class="text-white fw-semibold fs-6">Kategori</span>
                                <!--end::Desc-->
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Items-->
                    </div>
                </div>
                <div class="row">
                    @foreach ($metaProduct as $item)
                    <div class="d-flex fs-6 fw-semibold align-items-center {{ $loop->iteration == 1 ? 'mt-8' : 'mt-4' }}">
                        <!--begin::Bullet-->
                        <i class="ki-duotone ki-right-square fs-6 text-gray-600 me-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <!--end::Bullet-->
                        <!--begin::Label-->
                        <div class="text-gray-500 flex-grow-1 me-4">{{ $item->name }}</div>
                        <!--end::Label-->
                        <!--begin::Stats-->
                        <div class="fw-bolder text-gray-700 text-xxl-end">{{ $item->category_count }}</div>
                        <!--end::Stats-->
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('modal')

@endsection

@section('javascript')
    <script src="{{ asset('adminpage/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}

    {{ $grafik->script() }}

    {{ $endEvent->script() }}

    {{ $nowEvent->script() }}

    {{ $incomingEvent->script() }}

    {{ $totalEvent->script() }}


    {{ $grafikMemberEvent->script() }}

    {{ $ongoingEvent->script() }}

    {{ $doneEvent->script() }}

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
                    order:[[0,'desc']],
                    ajax: "{{ route('dashboard.datatable') }}",
                    columnDefs: [
                        {
                            targets: 0,
                            width: '50px',
                            render: function(data, type, full, meta) {
                                return (meta.row + 1);
                            }
                        }, 
                        {
                            targets: 5,
                            render: function(data, type, full, meta) {
                                if(!!+data) return `<a class="badge badge-success" href="javascript:void(0);">Approved</a>`;
                                else return `<a class="badge badge-danger" href="javascript:void(0);">Unapproved</a>`;
                            }
                        },
                        
                        {
                            targets: 2,
                            render: function(data, type, full, meta) {
                                if (data != 'Admin') return `<a href="javascript:void(0);" class="btn btn-sm btn-outline-dark">${data}</a>`
                                else return `<a href="javascript:void(0);" class="btn btn-sm btn-outline-primary">${data}</a>`
                            }
                        },

                        {
                            targets: 3,
                            render: function(data, type, full, meta) {
                                let cat = '';
                                data.map(function(item){
                                    cat += `<a class="badge badge-primary me-1" href="javascript:void(0);">${item.meta_name.name}</a>`;
                                })
                                return cat;
                            }
                        },

                        {
                            targets: 4,
                            createdCell: function(td, cellData, rowData, row, col) {
                                if (cellData) {
                                    let date = new Date(cellData);
                                    let day = date.getDate();
                                    let month = date.getMonth() + 1;
                                    let year = date.getFullYear();
                                    
                                    let formattedDate = `${day}-${month}-${year}`;

                                    $(td).text(formattedDate);
                                }
                            }
                        },
                        {
                            targets: 1,
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
                        { data: 'created_at'},
                        { data: 'title'},
                        { data: 'member_name'},
                        { data: 'category'},
                        { data: 'created_at'},
                        { data: 'is_approved'},
                    ],
                    language: {
                        searchPlaceholder: 'Search...',
                        sSearch: '',
                    }
                });

            
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
    </script>
    
@endsection