@extends('layout.main')

@section('title', 'Edit Member Industri')

@section('css')

@endsection

@section('breadcumb')
<div class="breadcrumb-header justify-content-between">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page"> Edit Industri</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-8 col-md-8">
        <div class="card blog-edit">
            <form id="form" action="{{ route('industri.update', $member->id) }}" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <input id="id" name="id" type="hidden" value="{{ $member->id }}">
                    <div class="form-group">
                        <div class="mb-4">
                            <label class="form-label text-dark">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') ?? $member->name }}" required>
                        </div>
                        {{-- <label class="form-label text-dark mb-1">Hari Kerja</label> --}}
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
                        {{-- <label class="form-label text-dark mb-1">Jam Kerja</label> --}}
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
                        <div class="mb-3">
                            <label class="form-label text-dark">Director Name</label>
                            <input type="text" name="director_name" class="form-control" value="{{ old('director_name') ?? $member->director_name }}" >
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-dark">Email/Phone Number</label>
                            <input type="text" name="email_phone_director" class="form-control" value="{{ old('email_phone_director') ?? $member->email_phone_director }}" >
                        </div>
                        <div class="mb-5">
                            <label class="form-label text-dark">Domicile</label>
                            <input type="text" name="domicile_director" class="form-control" value="{{ old('domicile_director') ?? $member->domicile_director  }}" >
                        </div>
                        <hr class="bg-dark">
                        <div class="mb-3 mt-4">
                            <label class="form-label text-dark">Administrator Name</label>
                            <input type="text" name="administrator_name" class="form-control" value="{{ old('administrator_name') ?? $member->administrator_name }}" >
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-dark">Email/Phone Number</label>
                            <input type="text" name="email_phone_admin" class="form-control" value="{{ old('email_phone_admin') ?? $member->email_phone_admin }}" >
                        </div>
                        <div class="mb-4">
                            <label class="form-label text-dark">Domicile</label>
                            <input type="text" name="domicile_admin" class="form-control" value="{{ old('domicile_admin') ?? $member->domicile_admin  }}" >
                        </div>
                        <div class="form-group">
                            <label class="form-label text-dark">Nomor Akte Pendirian (optional)</label>
                            <input type="text" name="deed_number" class="form-control" value="{{ old('deed_number') ?? $member->deed_number }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label text-dark">Nama Notaris (optional)</label>
                            <input type="text" name="notary_name" class="form-control" value="{{ old('notary_name') ?? $member->notary_name }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label text-dark">Name Industri Di Akta</label>
                            <input type="text" name="comunity_name" class="form-control" value="{{ old('comunity_name') ?? $member->comunity_name  }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label text-dark">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('$member->name') ?? $member->name }}" required>
                        </div>
                        <div class="form-group row row-sm">
                            <label class="col-md-4 col-form-label text-dark">Tahun Berdiri</label>
                            <div class="">
                              <input type="number" name="since" class="form-control" value="{{ old('since') ?? $member->since  }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label text-dark">Website Url</label>
                            <div>
                                <input type="text"  class="form-control" name="website_url" value="{{ old('$member->website_url') ?? $member->website_url }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label text-dark">About</label>
                            <textarea id="summernote" name="desc">{{ old('') ?? $member->desc }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label text-dark">Phone</label>
                            <div>
                                <input class="form-control" type="number" name="phone" value="{{ old('$member->phone') ?? $member->phone }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label text-dark">Address</label>
                            <div>
                                <input class="form-control" type="text" name="address"  value="{{ old('$member->address') ?? $member->address }}"/>
                            </div>
                        </div>
                        <div class="p-4 border mb-4 form-group">
                            <label class="form-label text-dark">Image</label>
                            <div>
                                <input id="file-upload-2" class="dropify" type="file" name="image" data-max-file-size="2M" data-default-file="{{ asset($member->image) }}" data-allowed-file-extensions="jpeg jpg png webp svg" accept=".jpg, .jpeg, .png, .webp, .svg"/>
                            </div>
                            <small class="text-danger">Recomended image svg, 600 x 600</small>
                        </div>
                        <div class="p-4 border mb-4 form-group">
                            <<label class="form-label text-dark">File Company Profile (PDF)</label>
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
                        <div class="form-group">
                            <label class="form-label text-dark">Approve Admin</label>
                            <select class="form-control mb-3" name="approve_admin" id="">
                                <option value="">-</option>
                                <option value="Aktif"{{ $member->approve_admin == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="Non Aktif"{{ $member->approve_admin == 'Non Aktif' ? 'selected' : '' }}>Non Aktif</option>
                                <option value="Suspend" {{ $member->approve_admin == 'Suspend' ? 'selected' : '' }}>Suspend</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label text-dark">Google Maps Url</label>
                            <div>
                                <input class="form-control" type="text" name="gmap_url" value="{{ old('$member->gmap_url') ?? $member->gmap_url }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label text-dark">View Url (1)</label>
                            <div>
                                <input class="form-control" type="text" name="view_1_url"  value="{{ old('$member->view_1_url') ?? $member->view_1_url }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label text-dark">View Url (2)</label>
                            <div>
                                <input class="form-control" type="text" name="view_2_url"  value="{{ old('$member->view_2_url') ?? $member->view_2_url }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label text-dark">View Url (3)</label>
                            <div>
                                <input class="form-control" type="text" name="view_3_url" value="{{ old('$member->view_3_url') ?? $member->view_3_url }}" />
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
                    </div>
                </div>
                <div class="card-footer">
                    <button id="btn-submit" class="btn btn-primary float-end my-2">Update Now</button>
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