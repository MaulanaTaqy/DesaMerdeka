@extends('layout.main')

@section('title', 'Edit Member Desa')

@section('css')
<style>
    .bg-gray{
        background: rgba(155, 155, 155, 0.3);
        padding: 10px;
        margin-bottom: 20px;
    }
</style>
@endsection

@section('breadcumb')
<div class="breadcrumb-header justify-content-between">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page"> Profile UMKM</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-8 col-md-8">
        <div class="card blog-edit">
            <form id="form" action="{{ route('umkm.update', $member->id) }}" method="POST" enctype="multipart/form-data">
            <div class="card-header">
                    <h3>PROFILE UMKM COMPANY</h3>
                </div>
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <input id="id" name="id" type="hidden" value="{{ $member->id }}">

                    <h5 class="bg-gray">INFORMASI STATUS REGISTRASI UMKM</h5>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered mg-b-1 text-md-nowrap">
                            <thead>
                                <tr>
                                    <th>TIME REG. AKTIF EMAIL</th>
                                    <th>TIME REG. AKTIF APPROVE</th>
                                    <th>ADMIN</th>
                                    <th>NO. TELP</th>
                                    <th>EMAIL REG.</th>
                                    <th class="text-center">STATUS REG.</th>
                                    <th class="text-center">ORDER</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>2023-10-10 07:00:12</th>
                                    <td>2023-10-11 07:00:12</td>
                                    <td>Associate Developer</td>
                                    <td>0895336482990</td>
                                    <td>admin.x@gmail.com</td>
                                    <td class="text-center">
                                        <button class="btn btn-success">Mandiri</button>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-primary">Approve</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h5 class="bg-gray mt-4">INFORMASI UMKM</h5>
                    <div class="form-group mb-4">
                        <label class="form-label text-dark">Nama UMKM</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') ?? $member->name }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Alamat</label>
                        <textarea class="form-control" rows="3" name="address">{{ old('$member->address') ?? $member->address }}</textarea>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label text-dark">Email UMKM</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email') ?? $member->user->email }}" required>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label text-dark">No Telp Kantor / Office</label>
                        <div>
                            <input class="form-control" type="number" name="phone" value="{{ old('$member->phone') ?? $member->phone }}"/>
                        </div>
                    </div>
                    <div class="row row-sm">
                        <div class="col-6 ">
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-3">
                                        <label class="form-label text-dark">Day Open From: </label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="start_day" class="form-control form-inline" value="{{ old('start_day') ?? $member->start_day }}" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 ">
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-3">
                                        <label class="form-label text-dark">Day Open To </label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="end_day" class="form-control form-inline" value="{{ old('end_day') ?? $member->end_day }}" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-sm">
                        <div class="col-6 ">
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-3">
                                        <label class="form-label text-dark">Time Open From: </label>
                                    </div>
                                    <div class="col-9">
                                        <input type="time" name="start_time" class="form-control form-inline" value="{{ old('start_time') ?? $member->start_time }}" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 ">
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-3">
                                        <label class="form-label text-dark">Time Open To </label>
                                    </div>
                                    <div class="col-9">
                                        <input type="time" name="end_time" class="form-control form-inline" value="{{ old('end_time') ?? $member->end_time }}" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label text-dark">Profile Singkat Company</label>
                        <textarea id="summernote" name="desc">{{ old('') ?? $member->desc }}</textarea>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label text-dark">Kategori Layanan / Solusi Bidang</label>
                        <div class="row pt-4 border-1 border">
                            @foreach ($category as $item)
                            <div class="col-lg-3 mb-3">
                                <label class="ckbox">
                                    <input type="checkbox" name="category_ids[]" value="{{ $item->id }}"> <span>{{ $item->name }}</span>
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <h5 class="bg-gray mt-4">INFORMASI PIMPINAN UMKM COMPANY</h5>
                    <div class="mb-3">
                        <label class="form-label text-dark">Nama Pimpinan / Direktur / CEO</label>
                        <input type="text" name="director_name" class="form-control" value="{{ old('director_name') ?? $member->director_name }}" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-dark">Email Pimpinan / Direktur / CEO</label>
                        <input type="text" name="email_director" class="form-control" value="{{ old('email_director') ?? $member->email_director }}" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-dark">No. Telp Pimpinan / Direktur / CEO</label>
                        <input type="text" name="phone_director" class="form-control" value="{{ old('phone_director') ?? $member->phone_director }}" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-dark">Kota Domisili Bertempat Tinggal</label>
                        <input type="text" name="domicile_director" class="form-control" value="{{ old('domicile_director') ?? $member->domicile_director  }}" >
                    </div>
                    
                    <h5 class="bg-gray mt-4">INFORMASI ADMIN</h5>
                    <div class="mb-3 mt-4">
                        <label class="form-label text-dark">Nama Admin</label>
                        <input type="text" name="administrator_name" class="form-control" value="{{ old('administrator_name') ?? $member->administrator_name }}" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-dark">Email Admin</label>
                        <input type="text" name="email_admin" class="form-control" value="{{ old('email_admin') ?? $member->email_admin }}" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-dark">No. Telp Admin</label>
                        <input type="text" name="phone_admin" class="form-control" value="{{ old('phone_admin') ?? $member->phone_admin }}" >
                    </div>
                    <div class="mb-4">
                        <label class="form-label text-dark">Kota Domisili Bertempat Tinggal</label>
                        <input type="text" name="domicile_admin" class="form-control" value="{{ old('domicile_admin') ?? $member->domicile_admin  }}" >
                    </div>
                    
                    <h5 class="bg-gray mt-4">INFORMASI KELENGKAPAN DOKUMEN UMKM</h5>
                    <div class="form-group">
                        <label class="form-label text-dark">Nomor Akte Pendirian / Akte Perusahaan (optional)</label>
                        <input type="text" name="deed_number" class="form-control" value="{{ old('deed_number') ?? $member->deed_number }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Name UMKM Di NIB / Akte Perusahaan</label>
                        <input type="text" name="notary_name" class="form-control" value="{{ old('notary_name') ?? $member->notary_name  }}" required>
                    </div>
                    <div class="form-group row row-sm">
                        <label class="col-md-4 col-form-label text-dark">Tahun Berdiri</label>
                        <div class="">
                            <input type="number" name="since" class="form-control" value="{{ old('since') ?? $member->since  }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Website URL</label>
                        <div>
                            <input type="text"  class="form-control" name="website_url" value="{{ old('$member->website_url') ?? $member->website_url }}" />
                        </div>
                    </div>
                    <div class="p-4 border mb-4 form-group">
                        <label class="form-label text-dark">Logo Image</label>
                        <div>
                            <input id="file-upload-2" class="dropify" type="file" name="image" data-max-file-size="2M" data-default-file="{{ asset($member->image) }}" data-allowed-file-extensions="jpeg jpg png webp svg" accept=".jpg, .jpeg, .png, .webp, .svg"/>
                        </div>
                        <small class="text-danger">Recomended image svg, 512 x 512</small>
                    </div>
                    <div class="p-4 border mb-4 form-group">
                        <label class="form-label text-dark">File Company Profile (PDF)</label>
                        <input type="file" max-file-size="10000" name="company_profile_file" class="dropify" value="{{ old('company_profile_file')  }}" data-max-file-size="10M" data-allowed-file-extensions="pdf" accept=".pdf" data-default-file="{{ asset($member->company_profile_file) }}">
                        <small class="text-secondary">max file size 10MB{!! $member->company_profile_file != ''? ' This member has upload the file. <a href="'.asset($member->company_profile_file).'">download</a>' : ''!!}</small>
                    </div>
                    <div class="p-4 border mb-4 form-group">
                        <label class="form-label text-dark">File Struktur Organisasi (PDF)</label>
                        <input type="file" max-file-size="10000" name="org_structure_file" class="dropify" value="{{ old('org_structure_file')  }}" data-max-file-size="10M" data-allowed-file-extensions="pdf" accept=".pdf" data-default-file="{{ asset($member->org_structure_file) }}">
                        <small class="text-secondary">max file size 10MB{!! $member->org_structure_file != ''? ' This member has upload the file. <a href="'.asset($member->org_structure_file).'">download</a>' : ''!!}</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-dark">File Akta Pendirian (PDF)</label>
                        <input type="file" max-file-size="10000" name="deed_file" class="dropify" value="{{ old('deed_file')  }}" data-max-file-size="10M" data-allowed-file-extensions="pdf" accept=".pdf" data-default-file="{{ asset($member->deed_file) }}">
                        <small class="text-secondary">max file size 10MB{!! $member->deed_file != ''? ' This member has upload the file. <a href="'.asset($member->deed_file).'">download</a>' : ''!!}</small>
                    </div>
                    
                    <h5 class="bg-gray mt-4">INFORMASI GOOGLE MAP, SOSIAL MEDIA DAN FOTO 360</h5>
                    <div class="form-group">
                        <label class="form-label text-dark">Google Maps Url</label>
                        <div>
                            <input class="form-control" type="text" name="gmap_url" value="{{ old('$member->gmap_url') ?? $member->gmap_url }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Facebook URL</label>
                        <div>
                            <input class="form-control" type="text" name="fb_url" value="{{ old('$member->fb_url') ?? $member->fb_url }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Instagram URL</label>
                        <div>
                            <input class="form-control" type="text" name="ig_url" value="{{ old('$member->ig_url') ?? $member->ig_url }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Google Plus URL</label>
                        <input type="text" name="google_plus_url" class="form-control" value="{{ old('google_plus_url') ?? $member->google_plus_url  }}" >
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Twitter URL</label>
                        <input type="text" name="twitter_url" class="form-control" value="{{ old('twitter_url') ?? $member->twitter_url }}" >
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Google Street View 360 - (1) URL</label>
                        <div>
                            <input class="form-control" type="text" name="view_1_url"  value="{{ old('$member->view_1_url') ?? $member->view_1_url }}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Google Street View 360 - (2) URL</label>
                        <div>
                            <input class="form-control" type="text" name="view_2_url"  value="{{ old('$member->view_2_url') ?? $member->view_2_url }}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Google Street View 360 - (3) URL</label>
                        <div>
                            <input class="form-control" type="text" name="view_3_url" value="{{ old('$member->view_3_url') ?? $member->view_3_url }}" />
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    <!-- <hr class="bg-dark"> -->
                    <!-- <div class="form-group">
                        <label class="form-label text-dark">Nama Notaris (optional)</label>
                        <input type="text" name="notary_name" class="form-control" value="{{ old('notary_name') ?? $member->notary_name }}" required>
                    </div> -->
                    <!-- <div class="form-group">
                        <label class="form-label text-dark">Approve Admin</label>
                        <select class="form-control mb-3" name="approve_admin" id="">
                            <option value="">-</option>
                            <option value="Aktif"{{ $member->approve_admin == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="Non Aktif"{{ $member->approve_admin == 'Non Aktif' ? 'selected' : '' }}>Non Aktif</option>
                            <option value="Suspend" {{ $member->approve_admin == 'Suspend' ? 'selected' : '' }}>Suspend</option>
                        </select>
                    </div> -->
                    
                    
                </div>
                <div class="card-footer">
                    <label class="ckbox">
                        <input type="checkbox" name="agree"> <span>Agree Terms and Condition</span>
                    </label>
                    <label class="form-switch float-end mb-0">
                        <button id="btn-submit" class="btn btn-primary float-end my-2">Send</button>
                    </label>
                    <div class="form-group">
                        <textarea class="form-control" rows="5" name="address" disabled>
                        Syarat dan Ketentuan Desa Merdeka

                        Penerimaan Syarat dan Ketentuan
                        Dengan mendaftar dan bergabung sebagai anggota Desa Merdeka, Anda setuju untuk mematuhi dan terikat dengan Syarat dan Ketentuan yang ditetapkan dalam dokumen ini.

                        Kelayakan
                        Anda harus memenuhi persyaratan yang ditetapkan oleh Desa Merdeka untuk menjadi anggota. Informasi yang Anda berikan saat pendaftaran harus akurat dan lengkap.

                        Hak dan Tanggung Jawab Anggota
                        Anggota bertanggung jawab atas kegiatan yang terjadi dalam akun mereka. Anda harus menjaga kerahasiaan akun dan tidak memberikan akses ke pihak ketiga tanpa izin. Anda bertanggung jawab untuk menginformasikan Desa Merdeka jika ada penggunaan yang tidak sah atau pelanggaran keamanan terhadap akun Anda.

                        Penggunaan Informasi dan Data
                        Dalam rangka menjalankan platform Desa Merdeka, kami dapat mengumpulkan informasi pribadi Anda. Informasi ini akan digunakan sesuai dengan Kebijakan Privasi kami. Dengan mendaftar dan menggunakan platform ini, Anda setuju dengan pengumpulan, penggunaan, dan pengolahan informasi pribadi Anda sebagaimana diatur dalam Kebijakan Privasi.

                        Konten Pengguna
                        Anda bertanggung jawab sepenuhnya atas konten yang Anda bagikan atau unggah ke platform Desa Merdeka. Anda menjamin bahwa konten yang Anda berikan tidak melanggar hak kekayaan intelektual pihak ketiga, tidak melanggar hukum yang berlaku, dan tidak mengandung konten yang memfitnah, melecehkan, atau merugikan pihak lain.

                        Perubahan dan Penghentian
                        Desa Merdeka berhak untuk mengubah atau menghentikan layanan, fitur, atau fungsi dalam platform ini tanpa pemberitahuan sebelumnya. Kami juga berhak untuk mengubah Syarat dan Ketentuan ini dari waktu ke waktu. Perubahan tersebut akan efektif setelah diterbitkan dalam platform.

                        Batasan Tanggung Jawab
                        Desa Merdeka tidak bertanggung jawab atas kerugian, cedera, atau kerusakan yang timbul akibat penggunaan platform ini. Anda menggunakan platform ini sepenuhnya atas risiko Anda sendiri.

                        Hukum yang Berlaku
                        Syarat dan Ketentuan ini diatur oleh hukum yang berlaku di wilayah hukum yang relevan. Anda setuju untuk tunduk pada yurisdiksi wilayah hukum tersebut dalam hal terjadi perselisihan yang timbul
                        </textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection



@section('script')
<script src="{{ asset('virtual/assets/js/script.js') }}"></script>

<!--Internal File Upload js-->
<script src="{{ asset('virtual/assets/plugins/fileuploads/js/fileupload.js') }}"></script>

<!-- INTERNAL Summernote Editor js -->
<script src="{{ asset('virtual/assets/plugins/summernote-editor/summernote1.js') }}"></script>

<script>
    $(document).ready(function () {
        $('.dropify').dropify();
        $('#summernote').summernote();

        $('#btn-submit').on('click', function(e) {
            e.preventDefault();

            if($('#summernote').summernote('isEmpty'))  toast('About cannot be null!');
            else $('#form').submit();
        })
    });
</script>
@endsection