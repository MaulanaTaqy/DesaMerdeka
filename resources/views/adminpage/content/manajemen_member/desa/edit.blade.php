@extends('adminpage.layout.main')

@section('title', 'Profile Akun Desa')

@section('css')
<link rel="stylesheet" href="{{ asset('adminpage/assets/plugins/custom/dropify/css/dropify.min.css') }}">
@endsection

@section('toolbar')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
        @yield("title")
    </h1>
    
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Home</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ url('/desa') }}" class="text-muted text-hover-primary">Desa</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Update Data</li>
    </ul>
</div>
@endsection

@section('content')

<div class="row g-5 g-xl-8">
    <div class="col-xl-12">
        <div class="card mb-5 mb-xl-10">
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">
                        Manajemen Profil Desa
                    </span>
                </h3>
            </div>
            <form id="form" action="{{ route('desa.update', $member->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <input id="id" name="id" type="hidden" value="{{ $member->id }}">
                <div class="card-body border-top p-9">
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle gs-0 gy-4">
                            <thead>
                                <tr class="fw-bold text-muted bg-light">
                                    <th class="text-center">TIME REG. AKTIF EMAIL</th>
                                    <th class="text-center">TIME REG. AKTIF APPROVE</th>
                                    <th>ADMIN</th>
                                    <th class="text-center">NO. TELP</th>
                                    <th>EMAIL REG.</th>
                                    <th class="text-center">STATUS REG.</th>
                                    @if (empty($approved))
                                    <th class="text-center">Order</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">{{ $member->created_at }}</td>
                                    <td class="text-center">{{ $member->registered_at }}</td>
                                    <td>{{ $member->administrator_name ? $member->administrator_name : '-' }}</td>
                                    <td class="text-center">{{ $member->phone_admin ? $member->phone_admin : '-' }}</td>
                                    <td>{{ $member->email_admin ? $member->email_admin : '-' }}</td>
                                    <td class="text-center">
                                        @if ($member->admin)
                                            <span class="badge badge-success">
                                                Mandiri
                                            </span>
                                        @elseif($member->member_core)
                                        <span class="badge badge-success">
                                            Paguyuban
                                        </span>
                                        @else
                                        -
                                        @endif
                                    </td>
                                    @if (empty($approved))
                                    <td class="text-center">
                                        <span class="badge badge-success">
                                            Approved
                                        </span>
                                    </td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <h3>Informasi Desa</h3>
                    <div class="form-group mb-3">
                        <label for="name" class="form-label mb-2"> Nama Desa </label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama Desa" required value="{{ old('name') ?? $member->name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="address" class="form-label mb-2"> Alamat </label>
                        <textarea name="address" class="form-control" id="address" placeholder="Masukkan Alamat" rows="3">{{ old('address') ?? $member->address }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" class="form-label mb-2"> Email Desa </label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Masukkan Email" value="{{ old('email') ?? $member->email }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone" class="form-label mb-2"> No Telp Kantor / Office </label>
                        <input type="number" class="form-control" name="phone" value="{{ old('phone') ?? $member->phone }}">
                    </div>
                    <div class="row form-group mb-3">
                        <div class="col-6 mb-3">
                            <div class="row">
                                <div class="col-3">
                                    <label class="form-label" for="start_day"> Day Open From: </label>
                                </div>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="start_day" id="start_day" placeholder="Start Day" value="{{ old('start_day') ?? $member->start_day }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="row">
                                <div class="col-3">
                                    <label for="end_day" class="form-label"> Day Open To</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="end_day" id="end_day" value="{{ old('end_day') ?? $member->end_day }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group mb-3">
                        <div class="col-6 mb-3">
                            <div class="row">
                                <div class="col-3">
                                    <label for="start_time" class="form-label"> Time Open From: </label>
                                </div>
                                <div class="col-9">
                                    <input type="time" name="start_time" class="form-control" value="{{ old('start_time') ?? $member->start_time }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="row">
                                <div class="col-3">
                                    <label for="end_time" class="form-label"> Time Open To </label>
                                </div>
                                <div class="col-9">
                                    <input type="time" name="end_time" class="form-control" value="{{ old('end_time') ?? $member->end_time }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="desc" class="form-label"> Profile Singkat Company </label>
                        <div id="short_about_desc" class="min-h-200px mb-2"></div>
                    </div>
                    
                    <div class="row mb-6 mt-5">
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
                                            <input class="form-check-input" type="checkbox" name="category_ids[]" value="{{ $item->id }}"> <span>{{ $item->name }}</span>
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>
                    
                    <h4>INFORMASI PIMPINAN Desa COMPANY</h4>
                    
                    <div class="form-group mb-3 mt-5">
                        <label for="director_name" class="form-label"> Nama Pimpinan / Direktur / CEO </label>
                        <input type="text" class="form-control" name="director_name" id="director_name" placeholder="Director Name" value="{{ old('director_name') ?? $member->director_name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email_director" class="form-label"> Email Pimpinan / Direktur / CEO </label>
                        <input type="text" class="form-control" name="email_director" id="email_director" placeholder="Email Director" value="{{ old('email_director') ?? $member->email_director }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone_director" class="form-label"> No. Telp Pimpinan / Direktur / CEO </label>
                        <input type="text" class="form-control" name="phone_director" id="phone_director" placeholder="Phone Director" value="{{ old('phone_director') ?? $member->phone_director }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="domicile_director" class="form-label"> Kota Domisili Bertempat Tinggal </label>
                        <input type="text" class="form-control" name="domicile_director" id="domicile_director" placeholder="Domicile Director" value="{{ old('domicile_director') ?? $member->domicile_director }}">
                    </div>
                    
                    <h4>INFORMASI ADMIN</h4>
                    <div class="form-group mb-3 mt-5">
                        <label for="administrator_name" class="form-label"> Nama Admin </label>
                        <input type="text" class="form-control" name="administrator_name" id="administrator_name" placeholder="Administrator Name" value="{{ old('administrator_name') ?? $member->administrator_name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email_admin" class="form-label"> Email Admin </label>
                        <input type="email" class="form-control" name="email_admin" id="email_admin" placeholder="Email Admin" value="{{ old('email_admin') ?? $member->email_admin }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone_admin" class="form-label"> No. Telp Admin </label>
                        <input type="text" class="form-control" name="phone_admin" id="phone_admin" placeholder="No. Telp Admin" value="{{ old('phone_admin') ?? $member->phone_admin }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="domicile_admin" class="form-label"> Kota Domisili Bertempat Tinggal </label>
                        <input type="text" class="form-control" name="domicile_admin" id="domicile_admin" placeholder="Domicile Admin" value="{{ old('domicile_admin') ?? $member->domicile_admin }}">
                    </div>
                    
                    <h4>INFORMASI KELENGKAPAN DOKUMEN DESA</h4>
                    
                    <div class="form-group mb-3">
                        <label for="deed_number" class="form-label"> Nomor Akte Pendirian / Akte Perusahaan <small class="text-danger">(Optional)</small> </label>
                        <input type="text" class="form-control" name="deed_number" id="deed_number" placeholder="Deed Number" value="{{ old('deed_number') ?? $member->deed_number }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="notary_name" class="form-label"> Nama Desa Di NIB / Akte Perusahaan </label>
                        <input type="text" class="form-control" name="notary_name" id="notary_name" placeholder="Notary Name" value="{{ old('notary_name') ?? $member->notary_name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="since" class="form-label"> Tahun Berdiri </label>
                        <input type="number" class="form-control" name="since" id="since" placeholder="Since" value="{{ old('since') ?? $member->since }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="website_url" class="form-label"> Website URL </label>
                        <input type="text" class="form-control" name="website_url" id="website_url" placeholder="Website URL" value="{{ old('website_url') ?? $member->website_url }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="image" class="form-label"> Logo Image </label>
                        <input type="file" class="dropify" name="image" id="image" data-max-file-size="2M" data-default-file="{{ asset($member->image) }}" data-allowed-file-extensions="jpeg jpg png webp svg" />
                        <small class="text-danger">Recomended image svg, 512 x 512</small>
                    </div>
                    <div class="form-group mb-3">
                        <label for="company_profile_file" class="form-label"> File Company Profile (PDF) </label>
                        <input type="file" class="dropify" name="company_profile_file" id="company_profile_file" max-file-size="10000" data-max-file-size="10M" data-allowed-file-extensions="pdf" accept=".pdf" data-default-file="{{ asset($member->company_profile_file) }}" value="{{ old('company_profile_file')  }}" />
                        <small class="text-secondary">max file size 10MB{!! $member->company_profile_file != ''? ' This member has upload the file. <a href="'.asset($member->company_profile_file).'">download</a>' : ''!!}</small>
                    </div>
                    <div class="form-group mb-3">
                        <label for="org_structure_file" class="form-label"> File Struktur Organisasi (PDF) </label>
                        <input type="file" class="dropify" name="org_structure_file" id="org_structure_file" max-file-size="10000" data-max-file-size="10M" data-allowed-file-extensions="pdf" accept=".pdf" data-default-file="{{ asset($member->org_structure_file) }}" value="{{ old('org_structure_file')  }}" />
                        <small class="text-secondary">max file size 10MB{!! $member->org_structure_file != ''? ' This member has upload the file. <a href="'.asset($member->org_structure_file).'">download</a>' : ''!!}</small>
                    </div>
                    <div class="form-group mb-3">
                        <label for="deed_file" class="form-label"> File Akta Pendirian (PDF) </label>
                        <input type="file" class="dropify" name="deed_file" id="deed_file" max-file-size="10000" data-max-file-size="10M" data-allowed-file-extensions="pdf" accept=".pdf" data-default-file="{{ asset($member->deed_file) }}" value="{{ old('deed_file')  }}" />
                        <small class="text-secondary">max file size 10MB{!! $member->deed_file != ''? ' This member has upload the file. <a href="'.asset($member->deed_file).'">download</a>' : ''!!}</small>
                    </div>
                    <h4>INFORMASI GOOGLE MAP, SOSIAL MEDIA DAN FOTO 360</h4>
                    <div class="form-group mb-3">
                        <label for="gmap_url" class="form-label"> Google Maps Url </label>
                        <input type="text" class="form-control" name="gmap_url" id="gmap_url" value="{{ old('gmap_url') ?? $member->gmap_url }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="fb_url" class="form-label"> Facebook Url </label>
                        <input type="text" class="form-control" name="fb_url" id="fb_url" value="{{ old('fb_url') ?? $member->fb_url }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="ig_url" class="form-label"> Instagram Url </label>
                        <input type="text" class="form-control" name="ig_url" id="ig_url" value="{{ old('ig_url') ?? $member->ig_url }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="google_plus_url" class="form-label"> Google Plus Url </label>
                        <input type="text" class="form-control" name="google_plus_url" id="google_plus_url" value="{{ old('google_plus_url') ?? $member->google_plus_url }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="twitter_url">Twitter URL</label>
                        <input type="text" name="twitter_url" class="form-control" value="{{ old('twitter_url') ?? $member->twitter_url }}" >
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="view_1_url"> Google Street View 360 - (1) URL </label>
                        <input type="text" name="view_1_url" class="form-control" value="{{ old('view_1_url') ?? $member->view_1_url }}" >
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="view_2_url"> Google Street View 360 - (2) URL </label>
                        <input type="text" name="view_2_url" class="form-control" value="{{ old('view_2_url') ?? $member->view_2_url }}" >
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="view_3_url"> Google Street View 360 - (3) URL </label>
                        <input type="text" name="view_3_url" class="form-control" value="{{ old('view_3_url') ?? $member->view_3_url }}" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="checkbox" name="agree"> <span>Agree Terms And Condition</span>
                        <button id="btn-submit" class="btn btn-primary btn-sm float-end"> Send </button>
                    </div>
                    <div class="form-group mb-3" style="margin-top: 30px;">
                        <textarea class="form-control" rows="5" name="address" disabled> Syarat dan Ketentuan Desa Merdeka
                            
                            Penerimaan Syarat dan Ketentuan Dengan mendaftar dan bergabung sebagai anggota Desa Merdeka : 
                            Anda setuju untuk mematuhi dan terikat dengan Syarat dan Ketentuan yang ditetapkan dalam dokumen ini.
                            Kelayakan Anda harus memenuhi persyaratan yang ditetapkan oleh Desa Merdeka untuk menjadi anggota. Informasi yang Anda berikan saat pendaftaran harus akurat dan lengkap.
                            
                            Hak dan Tanggung Jawab Anggota :
                            Anggota bertanggung jawab atas kegiatan yang terjadi dalam akun mereka. Anda harus menjaga kerahasiaan akun dan tidak memberikan akses ke pihak ketiga tanpa izin. Anda bertanggung jawab untuk menginformasikan Desa Merdeka jika ada penggunaan yang tidak sah atau pelanggaran keamanan terhadap akun Anda. 
                            
                            Penggunaan Informasi dan Data :
                            Dalam rangka menjalankan platform Desa Merdeka, kami dapat mengumpulkan informasi pribadi Anda. Informasi ini akan digunakan sesuai dengan Kebijakan Privasi kami. Dengan mendaftar dan menggunakan platform ini, Anda setuju dengan pengumpulan, penggunaan, dan pengolahan informasi pribadi Anda sebagaimana diatur dalam Kebijakan Privasi.
                            
                            Konten Pengguna :
                            Anda bertanggung jawab sepenuhnya atas konten yang Anda bagikan atau unggah ke platform Desa Merdeka. Anda menjamin bahwa konten yang Anda berikan tidak melanggar hak kekayaan intelektual pihak ketiga, tidak melanggar hukum yang berlaku, dan tidak mengandung konten yang memfitnah, melecehkan, atau merugikan pihak lain.
                            
                            Perubahan dan Penghentian :
                            Desa Merdeka berhak untuk mengubah atau menghentikan layanan, fitur, atau fungsi dalam platform ini tanpa pemberitahuan sebelumnya. Kami juga berhak untuk mengubah Syarat dan Ketentuan ini dari waktu ke waktu. Perubahan tersebut akan efektif setelah diterbitkan dalam platform.
                            
                            Batasan Tanggung Jawab :
                            Desa Merdeka tidak bertanggung jawab atas kerugian, cedera, atau kerusakan yang timbul akibat penggunaan platform ini. Anda menggunakan platform ini sepenuhnya atas risiko Anda sendiri.
                            
                            Hukum yang Berlaku :
                            Syarat dan Ketentuan ini diatur oleh hukum yang berlaku di wilayah hukum yang relevan. Anda setuju untuk tunduk pada yurisdiksi wilayah hukum tersebut dalam hal terjadi perselisihan yang timbul
                        </textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('modal')

@endsection

@section('javascript')

<script src="{{ asset('adminpage/assets/plugins/custom/dropify/js/dropify.min.js') }}"></script>
<script>
    $(document).ready(function () {
        let cetak = `{!! $member->desc !!}`
        $('.dropify').dropify();
        $("#short_about_desc").html(cetak);
        editorInitiator(['short_about_desc'])
        $("#btn-submit").on("click", function(e) {
            e.preventDefault();
            $("#form").submit();
        });
    });
</script>

@endsection