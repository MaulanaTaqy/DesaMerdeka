@extends('adminpage.layout.main')

@section('title', 'Management Homepage')

@section('css')
<link rel="stylesheet" href="{{ asset('adminpage/assets/plugins/custom/dropify/css/dropify.min.css') }}">
<style>
    .termsx {
        overflow-y: scroll;
        height: 350px;
        width: 100%;
        border: 1px solid #ddd;
        border-radius: 10px;
    }

    
</style>
@endsection

@section('toolbar')
    <!--begin::Page title-->
    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
        <!--begin::Title-->
        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Management Homepage</h1>
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
<div class="row g-5 g-xl-8">
    <div class="col-xl-12">
        <!--begin::Basic info-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">INFORMASI {{ strtoupper(Auth::user()->member->member_type->name ?? '') }} </h3>
                </div>
                <!--end::Card title-->
            </div>
            <!--begin::Card header-->
            <!--begin::Content-->
            <div id="kt_account_settings_profile_details" class="collapse show">
                <!--begin::Form-->
                <form id="form" class="form" action="{{ route('profile-member.update', $member->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        {{-- <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="col-lg-6 fv-row">
                                        <input type="text" name="fname" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="First name" value="Max" />
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-lg-6 fv-row">
                                        <input type="text" name="lname" class="form-control form-control-lg form-control-solid" placeholder="Last name" value="Smith" />
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group--> --}}
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nama {{ ucwords(Auth::user()->member->member_type->name ?? '') }}</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input value="{{ old('name') ?? $member->name }}" required type="text" name="name" class="form-control form-control-lg form-control-solid" placeholder="Company name" value="Keenthemes" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span>Address</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Enter your address">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <textarea name="address" class="form-control form-control-solid" placeholder="address..">
                                    {{ old('$member->address') ?? $member->address }}
                                </textarea>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span >Email {{ ucwords(Auth::user()->member->member_type->name ?? '') }}</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Enter your email">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input value="{{ old('email') ?? $member->user->email }}" required type="email" name="email" class="form-control form-control-lg form-control-solid" placeholder="Company website" value="keenthemes.com" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="required">No Telp Kantor / Office</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Country of origination">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input class="form-control form-control-lg form-control-solid" type="number" name="phone" value="{{ old('$member->phone') ?? $member->phone }}"/>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <div class="col-lg-6">
                                <div class="row">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                        <span >Day Open From:</span>
                                        <span class="ms-1" data-bs-toggle="tooltip" title="Isi dengan hari Anda buka cth: Senin">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                        </span>
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="text" name="start_day" class="form-control form-control-lg form-control-solid" value="{{ old('start_day') ?? $member->start_day }}" >
                                    </div>
                                </div>
                            </div>
                            <!--end::Label-->
                            <!--begin::Label-->
                            <div class="col-lg-6">
                                <div class="row">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                        <span >Day Open To:</span>
                                        <span class="ms-1" data-bs-toggle="tooltip" title="Isi dengan hari Anda tutup cth: Sabtu">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                        </span>
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="text" name="end_day" class="form-control form-control-lg form-control-solid" value="{{ old('end_day') ?? $member->end_day }}" >
                                    </div>
                                </div>
                            </div>
                            <!--end::Label-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <div class="col-lg-6">
                                <div class="row">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                        <span >Time Open Form: </span>
                                        <span class="ms-1" data-bs-toggle="tooltip" title="Isi dengan waktu Anda buka cth: 08:00">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                        </span>
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="time" id="start_time" name="start_time" class="form-control form-control-lg form-control-solid" value="{{ old('start_time') ?? $member->start_time }}" >
                                    </div>
                                </div>
                            </div>
                            <!--end::Label-->
                            <!--begin::Label-->
                            <div class="col-lg-6">
                                <div class="row">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                        <span >Time Open To: </span>
                                        <span class="ms-1" data-bs-toggle="tooltip" title="Isi dengan hari Anda tutup cth: 16:00">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                        </span>
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="time" id="end_time" name="end_time" class="form-control form-control-lg form-control-solid" value="{{ old('end_time') ?? $member->end_time }}" >
                                    </div>
                                </div>
                            </div>
                            <!--end::Label-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="fw-semibold fs-6">
                                <span class="required">Profil Singkat</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Short profile">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-12 mt-4">
                                {{-- <textarea class="form-control form-control-lg form-control-solid" id="desc" name="desc">{!! old('') ?? $member->desc !!}</textarea> --}}
                                <div class="min-h-150px mb-2" id="desc">{!! old('desc') ?? $member->desc !!}</div>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6" style="margin-top: 80px">
                            <!--begin::Label-->
                            <label class="fw-semibold fs-6">
                                <span class="">Kategori Layanan / Solusi Bidang</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="You can check more then one category">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-12 fv-row">
                                <div class="row pt-4 mt-4 border-1 border" style="border-radius: 10px">
                                    @foreach ($category as $item)
                                    <div class="col-lg-3 mb-3">
                                        <div class="form-check form-check-custom form-check-solid form-check-sm">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" name="category_id[]" value="{{ $item->id }}" @if(in_array($item->id, $selectedCategoryIds)) checked @endif> <span>{{ $item->name }}</span>
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <div class="border-bottom my-6 row border-1">
                            <h3 class="fw-bold mb-4">INFORMASI PIMPINAN {{ strtoupper(Auth::user()->member->member_type->name ?? '') }}</h3>
                        </div>

                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="">Nama Pimpinan / Direktur / CEO </span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Leader's name">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="director_name" class="form-control form-control-lg form-control-solid" value="{{ old('director_name') ?? $member->director_name }}" >
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="">Email Pimpinan / Direktur / CEO</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Leader's email">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="email_director" class="form-control form-control-lg form-control-solid" value="{{ old('email_director') ?? $member->email_director }}" >
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="">No. Telp Pimpinan / Direktur / CEO</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Phone number">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="phone_director" class="form-control form-control-lg form-control-solid" value="{{ old('phone_director') ?? $member->phone_director }}" >
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="">Kota Domisili Bertempat Tinggal</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Country of origination">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="domicile_director" class="form-control form-control-lg form-control-solid" value="{{ old('domicile_director') ?? $member->domicile_director  }}" >
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <div class="border-bottom my-6 row border-1">
                            <h3 class="fw-bold mb-4">INFORMASI ADMIN</h3>
                        </div>

                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="">Nama Admin</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Admin's name">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="administrator_name" class="form-control form-control-lg form-control-solid" value="{{ old('administrator_name') ?? $member->administrator_name }}" >
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="">Email Admin</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Admin's email">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="email_admin" class="form-control form-control-lg form-control-solid" value="{{ old('email_admin') ?? $member->email_admin }}" >
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="">No. Telp Admin</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Phone number">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="phone_admin" class="form-control form-control-lg form-control-solid" value="{{ old('phone_admin') ?? $member->phone_admin }}" >
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="">Kota Domisili Bertempat Tinggal</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Admin's name">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="domicile_admin" class="form-control form-control-lg form-control-solid" value="{{ old('domicile_admin') ?? $member->domicile_admin  }}" >
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <div class="border-bottom my-6 row border-1">
                            <h3 class="fw-bold mb-4">INFORMASI KELENGKAPAN DOKUMEN {{ Strtoupper(Auth::user()->member->member_type->name) ?? '' }}</h3>
                        </div>

                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="">Nomor Akte Pendirian / Akte Perusahaan (optional)</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Deed of Establishment">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="deed_number" class="form-control form-control-lg form-control-solid" value="{{ old('deed_number') ?? $member->deed_number }}" required>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="">Name {{ ucwords(Auth::user()->member->member_type->name ?? '') }} Di NIB / Akte Perusahaan</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Name in deed">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="notary_name" class="form-control form-control-lg form-control-solid" value="{{ old('notary_name') ?? $member->notary_name  }}" required>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="">Tahun Berdiri</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Year of Establishment">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="number" name="since" class="form-control form-control-lg form-control-solid" value="{{ old('since') ?? $member->since  }}" required>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="">Website URL</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Year of Establishment">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text"  class="form-control form-control-lg form-control-solid" name="website_url" value="{{ old('$member->website_url') ?? $member->website_url }}" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="">Logo Image</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Year of Establishment">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <!--begin::Image input-->
                                {{-- <div class="image-input image-input-outline bgsize-contain" data-kt-image-input="true" style="background-image: url(adminpage/assets/media/svg/files/blank-image.svg)">
                                    <!--begin::Image preview wrapper-->
                                    <div class="image-input-wrapper bgsize-contain w-500px h-250px" id="imageWrapper" style="background-image: url(adminpage/assets/media/svg/files/blank-image.svg)"></div>
                                    <!--end::Image preview wrapper-->

                                    <!--begin::Edit button-->
                                    <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change"
                                    data-bs-toggle="tooltip"
                                    data-bs-dismiss="click"
                                    title="Change avatar">
                                        <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span class="path2"></span></i>

                                        <!--begin::Inputs-->
                                        <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png, .webp, .svg" />
                                        <input type="hidden" name="avatar_remove" />
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Edit button-->

                                    <!--begin::Cancel button-->
                                    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel"
                                    data-bs-toggle="tooltip"
                                    data-bs-dismiss="click"
                                    title="Cancel avatar">
                                        <i class="ki-outline ki-cross fs-3"></i>
                                    </span>
                                    <!--end::Cancel button-->

                                    <!--begin::Remove button-->
                                    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove"
                                    data-bs-toggle="tooltip"
                                    data-bs-dismiss="click"
                                    title="Remove avatar">
                                        <i class="ki-outline ki-cross fs-3"></i>
                                    </span>
                                    <!--end::Remove button-->
                                </div> --}}
                                <input id="image" class="dropify" type="file" name="image" data-max-file-size="2M" data-default-file="{{ asset($member->image) }}" data-allowed-file-extensions="jpeg jpg png webp svg" accept=".jpg, .jpeg, .png, .webp, .svg"/>

                                <!--end::Image input-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="">File Company Profile (PDF)</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Company Profile PDF file ">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="file" max-file-size="10000" name="company_profile_file" class="dropify form-control form-control-lg form-control-solid" value="{{ old('company_profile_file')  }}" data-max-file-size="10M" data-allowed-file-extensions="pdf" accept=".pdf" data-default-file="{{ asset($member->company_profile_file) }}">
                                <small class="text-secondary">max file size 10MB{!! $member->company_profile_file != ''? ' This member has upload the file. <a href="'.asset($member->company_profile_file).'">download</a>' : ''!!}</small>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="">File Struktur Organisasi (PDF)</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Organization Structure PDF file ">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="file" max-file-size="10000" name="org_structure_file" class="dropify form-control form-control-lg form-control-solid" value="{{ old('org_structure_file')  }}" data-max-file-size="10M" data-allowed-file-extensions="pdf" accept=".pdf" data-default-file="{{ asset($member->org_structure_file) }}">
                                <small class="text-secondary">max file size 10MB{!! $member->org_structure_file != ''? ' This member has upload the file. <a href="'.asset($member->org_structure_file).'">download</a>' : ''!!}</small>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="">File Akta Pendirian (PDF)</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Deed Of Establishment PDF file ">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="file" max-file-size="10000" name="deed_file" class="dropify form-control-lg form-control form-control-solid" value="{{ old('deed_file')  }}" data-max-file-size="10M" data-allowed-file-extensions="pdf" accept=".pdf" data-default-file="{{ asset($member->deed_file) }}">
                                <small class="text-secondary">max file size 10MB{!! $member->deed_file != ''? ' This member has upload the file. <a href="'.asset($member->deed_file).'">download</a>' : ''!!}</small>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <div class="border-bottom my-6 row border-1">
                            <h3 class="fw-bold mb-4">INFORMASI GOOGLE MAP, SOSIAL MEDIA DAN FOTO 360</h3>
                        </div>

                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="">Google Maps URL</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Google maps url">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input class="form-control form-control-lg form-control-solid" type="text" name="gmap_url" value="{{ old('$member->gmap_url') ?? $member->gmap_url }}" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="">Facebook URL</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="facebook url">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input class="form-control form-control-lg form-control-solid" type="text" name="fb_url" value="{{ old('$member->fb_url') ?? $member->fb_url }}" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="">Instagram URL</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Instagram url">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input class="form-control form-control-lg form-control-solid" type="text" name="ig_url" value="{{ old('$member->ig_url') ?? $member->ig_url }}" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="">Google Plus URL</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Google Plus url">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="google_plus_url" class="form-control form-control-lg form-control-solid" value="{{ old('google_plus_url') ?? $member->google_plus_url  }}" >
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="">Twitter URL</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Twitter url">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="twitter_url" class="form-control form-control-lg form-control-solid" value="{{ old('twitter_url') ?? $member->twitter_url }}" >
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="">Google Street View 360 - (1) URL</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Google street view url">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input class="form-control form-control-lg form-control-solid" type="text" name="view_1_url"  value="{{ old('$member->view_1_url') ?? $member->view_1_url }}"/>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="">Google Street View 360 - (2) URL</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Google street view url">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input class="form-control form-control-lg form-control-solid" type="text" name="view_3_url" value="{{ old('$member->view_3_url') ?? $member->view_3_url }}" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row my-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="">Google Street View 360 - (3) URL</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Google street view url">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input class="form-control form-control-lg form-control-solid" type="text" name="view_3_url" value="{{ old('$member->view_3_url') ?? $member->view_3_url }}" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <div class="border-top pt-6 my-6 row border-1">
                            <h3 class="fw-bold mb-4">TERMS & CONDITIONS</h3>
                        </div>

                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Col-->
                            <div class="col-lg-12 fv-row">
                                <div class="termsx">
                                    @foreach ($termCondition as $term)
                                    {!! $term->term_conditions !!}
                                    @endforeach
                                </div>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                    </div>
                    <!--end::Card body-->
                    <!--begin::Actions-->
                    <div class="card-footer d-flex py-6 px-9">
                        <div class="form-check form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" name="agree" id="flexCheckDefault"/>
                            <label class="form-check-label text-dark" for="flexCheckDefault">
                                Agree Terms and Condition
                            </label>
                        </div>
                        <div class="ms-auto">
                            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
                        </div>
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

@endsection

@section('javascript')
<script src="{{ asset('adminpage') }}/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js"></script>
<script src="{{ asset('adminpage/assets/plugins/custom/dropify/js/dropify.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.dropify').dropify();
        $("#start_time, #end_time").flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
        });

        editorInitiator(['desc'])

    
        // ClassicEditor.create(document.querySelector('#desc'))
        // .then(editor => {
        //     console.log(editor);
        // })
        // .catch(error => {
        //     console.error(error);
        // });
    });
</script>
@endsection