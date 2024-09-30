@extends('adminpage.layout.main')

@section('title', 'Profile Akun Komunitas Asosiasi')

@section('css')
<link rel="stylesheet" href="{{ asset('adminpage/assets/plugins/custom/dropify/css/demo.css') }}">
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
            <a href="{{ url('/komunitas-asosiasi') }}" class="text-muted text-hover-primary">Komunitas Asosiasi</a>
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
        <div class="card card-xl-stretch mb-xl-8">
            <form id="form" action="{{ route('komunitas-asosiasi.update', $member->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <input id="id" name="id" type="hidden" value="{{ $member->id }}">
                <div class="card-body py-3">
                    <div class="form-group mb-3">
                        <label for="name" class="form-label mb-2"> Name </label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama UMKM" required value="{{ old('name') ?? $member->name }}">
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
                        <label for="director_name" class="form-label"> Director Name </label>
                        <input type="text" class="form-control" name="director_name" id="director_name" placeholder="Director Name" value="{{ old('director_name') ?? $member->director_name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email_phone_director" class="form-label"> Email / Phone Number </label>
                        <input type="text" class="form-control" name="email_phone_director" id="email_phone_director" placeholder="Email / Phone Number" value="{{ old('email_phone_director') ?? $member->email_phone_director }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="domicile_director" class="form-label"> Domicile </label>
                        <input type="text" class="form-control" name="domicile_director" id="domicile_director" placeholder="Domicile" value="{{ old('domicile_director') ?? $member->domicile_director }}">
                    </div>
                    
                    <hr>
                    
                    <div class="form-group mb-3">
                        <label for="administrator_name" class="form-label"> Administrator Name </label>
                        <input type="text" class="form-control" name="administrator_name" id="administrator_name" placeholder="Administrator Name" value="{{ old('administrator_name') ?? $member->administrator_name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email_phone_admin" class="form-label"> Email / Phone Number </label>
                        <input type="email" class="form-control" name="email_phone_admin" id="email_phone_admin" placeholder="Email / Phone Number" value="{{ old('email_phone_admin') ?? $member->email_phone_admin }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="domicile_admin" class="form-label"> Domicile </label>
                        <input type="text" class="form-control" name="domicile_admin" id="domicile_admin" placeholder="Domicile Admin" value="{{ old('domicile_admin') ?? $member->domicile_admin }}">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="deed_number" class="form-label"> Nomor Akte Pendirian <small class="text-danger">(Optional)</small> </label>
                        <input type="text" class="form-control" name="deed_number" id="deed_number" placeholder="Deed Number" value="{{ old('deed_number') ?? $member->deed_number }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="notary_name" class="form-label"> Nama Notaris <small class="text-danger">(Optional)</small> </label>
                        <input type="text" class="form-control" name="notary_name" id="notary_name" placeholder="Notary Name" value="{{ old('notary_name') ?? $member->notary_name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="notary_name" class="form-label"> Nama Notaris <small class="text-danger">(Optional)</small> </label>
                        <input type="text" class="form-control" name="notary_name" id="notary_name" placeholder="Notary Name" value="{{ old('notary_name') ?? $member->notary_name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="name" class="form-label"> Name </label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ old('name') ?? $member->name }}">
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
                        <label for="desc" class="form-label"> About </label>
                        <div id="short_about_desc" class="min-h-200px mb-2"></div>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="phone" class="form-label"> Phone </label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="{{ old('phone') ?? $member->phone }}">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="address" class="form-label"> Address </label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="{{ old('address') ?? $member->address }}">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="image" class="form-label"> Image </label>
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
                    
                    <div class="form-group mb-3">
                        <label for="approve_admin" class="form-label"> Approve Admin </label>
                        <select name="approve_admin" class="form-control" id="approve_admin">
                            <option value="Aktif"{{ $member->approve_admin == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="Non Aktif"{{ $member->approve_admin == 'Non Aktif' ? 'selected' : '' }}>Non Aktif</option>
                            <option value="Suspend" {{ $member->approve_admin == 'Suspend' ? 'selected' : '' }}>Suspend</option>
                        </select>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="gmap_url" class="form-label"> Google Maps Url </label>
                        <input type="text" class="form-control" name="gmap_url" id="gmap_url" value="{{ old('gmap_url') ?? $member->gmap_url }}">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="view_1_url" class="form-label"> View Url (1) </label>
                        <input type="text" class="form-control" name="view_1_url" id="view_1_url" value="{{ old('view_1_url') ?? $member->view_1_url }}">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="view_2_url" class="form-label"> View Url (2) </label>
                        <input type="text" class="form-control" name="view_2_url" id="view_2_url" value="{{ old('view_2_url') ?? $member->view_2_url }}">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="view_3_url" class="form-label"> View Url (3) </label>
                        <input type="text" class="form-control" name="view_3_url" id="view_3_url" value="{{ old('view_3_url') ?? $member->view_3_url }}">
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
                    <div class="form-group">
                        <button id="btn-submit" class="btn btn-primary mb-3 btn-sm float-end"> Send </button>
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
        $("#short_about_desc").html(cetak)
        editorInitiator(['short_about_desc'])
        $("#btn-submit").on("click", function(e) {
            e.preventDefault();
            $("#form").submit();
        });
    });
</script>

@endsection