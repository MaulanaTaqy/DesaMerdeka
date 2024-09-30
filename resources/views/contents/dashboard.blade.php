@extends('layout.main')

@section('title', 'Dashboard')

@section('css')

@endsection

@section('breadcumb')
<div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">Hi, welcome {{ Auth::user()->{getRoleName()}->name }}!</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page"> Dashboard</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')

<!-- main-content-body -->
<div class="main-content-body auth">
    <div class="row row-sm">
        @role(['admin', 'member'])
        @role(['admin'])
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="card overflow-hidden project-card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="my-auto">
                            <svg enable-background="new 0 0 469.682 469.682" version="1.1"
                                class="me-4 ht-60 wd-60 my-auto primary" viewBox="0 0 469.68 469.68"
                                xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="m120.41 298.32h87.771c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449h-87.771c-5.771 0-10.449 4.678-10.449 10.449s4.678 10.449 10.449 10.449z" />
                                <path
                                    d="m291.77 319.22h-171.36c-5.771 0-10.449 4.678-10.449 10.449s4.678 10.449 10.449 10.449h171.36c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449z" />
                                <path
                                    d="m291.77 361.01h-171.36c-5.771 0-10.449 4.678-10.449 10.449s4.678 10.449 10.449 10.449h171.36c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449z" />
                                <path
                                    d="m420.29 387.14v-344.82c0-22.987-16.196-42.318-39.183-42.318h-224.65c-22.988 0-44.408 19.331-44.408 42.318v20.376h-18.286c-22.988 0-44.408 17.763-44.408 40.751v345.34c0.68 6.37 4.644 11.919 10.449 14.629 6.009 2.654 13.026 1.416 17.763-3.135l31.869-28.735 38.139 33.959c2.845 2.639 6.569 4.128 10.449 4.18 3.861-0.144 7.554-1.621 10.449-4.18l37.616-33.959 37.616 33.959c5.95 5.322 14.948 5.322 20.898 0l38.139-33.959 31.347 28.735c3.795 4.671 10.374 5.987 15.673 3.135 5.191-2.98 8.232-8.656 7.837-14.629v-74.188l6.269-4.702 31.869 28.735c2.947 2.811 6.901 4.318 10.971 4.18 1.806 0.163 3.62-0.2 5.224-1.045 5.493-2.735 8.793-8.511 8.361-14.629zm-83.591 50.155-24.555-24.033c-5.533-5.656-14.56-5.887-20.376-0.522l-38.139 33.959-37.094-33.959c-6.108-4.89-14.79-4.89-20.898 0l-37.616 33.959-38.139-33.959c-6.589-5.4-16.134-5.178-22.465 0.522l-27.167 24.033v-333.84c0-11.494 12.016-19.853 23.51-19.853h224.65c11.494 0 18.286 8.359 18.286 19.853v333.84zm62.693-61.649-26.122-24.033c-4.18-4.18-5.224-5.224-15.673-3.657v-244.51c1.157-21.321-15.19-39.542-36.51-40.699-0.89-0.048-1.782-0.066-2.673-0.052h-185.47v-20.376c0-11.494 12.016-21.42 23.51-21.42h224.65c11.494 0 18.286 9.927 18.286 21.42v333.32z" />
                                <path
                                    d="m232.21 104.49h-57.47c-11.542 0-20.898 9.356-20.898 20.898v104.49c0 11.542 9.356 20.898 20.898 20.898h57.469c11.542 0 20.898-9.356 20.898-20.898v-104.49c1e-3 -11.542-9.356-20.898-20.897-20.898zm0 123.3h-57.47v-13.584h57.469v13.584zm0-34.482h-57.47v-67.918h57.469v67.918z" />
                            </svg>
                        </div>
                        <div class="project-content"> 
                            <h6>Desa</h6>
                            <ul>
                                <li>
                                    <strong>Registered</strong>
                                    <span class="counter number-font">{{ $countDesaSemua }}</span>
                                </li>
                                <li>
                                    <strong>Not-Permission</strong>
                                    <span>{{ $countDesa }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endrole
        @if(Auth::user()->hasRole('admin') || Auth::user()->can('member-account'))
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="card  overflow-hidden project-card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="my-auto">
                            <svg enable-background="new 0 0 438.891 438.891"
                                class="me-4 ht-60 wd-60 my-auto danger" version="1.1"
                                viewBox="0 0 438.89 438.89" xml:space="preserve"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="m347.97 57.503h-39.706v-17.763c0-5.747-6.269-8.359-12.016-8.359h-30.824c-7.314-20.898-25.6-31.347-46.498-31.347-20.668-0.777-39.467 11.896-46.498 31.347h-30.302c-5.747 0-11.494 2.612-11.494 8.359v17.763h-39.707c-23.53 0.251-42.78 18.813-43.886 42.318v299.36c0 22.988 20.898 39.706 43.886 39.706h257.04c22.988 0 43.886-16.718 43.886-39.706v-299.36c-1.106-23.506-20.356-42.068-43.886-42.319zm-196.44-5.224h28.735c5.016-0.612 9.045-4.428 9.927-9.404 3.094-13.474 14.915-23.146 28.735-23.51 13.692 0.415 25.335 10.117 28.212 23.51 0.937 5.148 5.232 9.013 10.449 9.404h29.78v41.796h-135.84v-41.796zm219.43 346.91c0 11.494-11.494 18.808-22.988 18.808h-257.04c-11.494 0-22.988-7.314-22.988-18.808v-299.36c1.066-11.964 10.978-21.201 22.988-21.42h39.706v26.645c0.552 5.854 5.622 10.233 11.494 9.927h154.12c5.98 0.327 11.209-3.992 12.016-9.927v-26.646h39.706c12.009 0.22 21.922 9.456 22.988 21.42v299.36z" />
                                <path
                                    d="m179.22 233.57c-3.919-4.131-10.425-4.364-14.629-0.522l-33.437 31.869-14.106-14.629c-3.919-4.131-10.425-4.363-14.629-0.522-4.047 4.24-4.047 10.911 0 15.151l21.42 21.943c1.854 2.076 4.532 3.224 7.314 3.135 2.756-0.039 5.385-1.166 7.314-3.135l40.751-38.661c4.04-3.706 4.31-9.986 0.603-14.025-0.19-0.211-0.391-0.412-0.601-0.604z" />
                                <path
                                    d="m329.16 256.03h-120.16c-5.771 0-10.449 4.678-10.449 10.449s4.678 10.449 10.449 10.449h120.16c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449z" />
                                <path
                                    d="m179.22 149.98c-3.919-4.131-10.425-4.364-14.629-0.522l-33.437 31.869-14.106-14.629c-3.919-4.131-10.425-4.364-14.629-0.522-4.047 4.24-4.047 10.911 0 15.151l21.42 21.943c1.854 2.076 4.532 3.224 7.314 3.135 2.756-0.039 5.385-1.166 7.314-3.135l40.751-38.661c4.04-3.706 4.31-9.986 0.603-14.025-0.19-0.211-0.391-0.412-0.601-0.604z" />
                                <path
                                    d="m329.16 172.44h-120.16c-5.771 0-10.449 4.678-10.449 10.449s4.678 10.449 10.449 10.449h120.16c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449z" />
                                <path
                                    d="m179.22 317.16c-3.919-4.131-10.425-4.363-14.629-0.522l-33.437 31.869-14.106-14.629c-3.919-4.131-10.425-4.363-14.629-0.522-4.047 4.24-4.047 10.911 0 15.151l21.42 21.943c1.854 2.076 4.532 3.224 7.314 3.135 2.756-0.039 5.385-1.166 7.314-3.135l40.751-38.661c4.04-3.706 4.31-9.986 0.603-14.025-0.19-0.21-0.391-0.411-0.601-0.604z" />
                                <path
                                    d="m329.16 339.63h-120.16c-5.771 0-10.449 4.678-10.449 10.449s4.678 10.449 10.449 10.449h120.16c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449z" />
                            </svg>
                        </div>
                        <div class="project-content">
                            <h6>UMKM</h6>
                            <ul>
                                <li>
                                    <strong>Registered</strong>
                                    <span class="counter number-font">{{ $countUmkmSemua }}</span>
                                </li>
                                <li>
                                    <strong>Not-Permission</strong>
                                    <span class="counter number-font">{{ $countUmkm }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="card overflow-hidden project-card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="my-auto">
                            <svg enable-background="new 0 0 477.849 477.849"
                                class="me-4 ht-60 wd-60 my-auto success" version="1.1"
                                viewBox="0 0 477.85 477.85" xml:space="preserve"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="m374.1 385.52c71.682-74.715 69.224-193.39-5.492-265.08-34.974-33.554-81.584-52.26-130.05-52.193-103.54-0.144-187.59 83.676-187.74 187.22-0.067 48.467 18.639 95.077 52.193 130.05l-48.777 65.024c-5.655 7.541-4.127 18.238 3.413 23.893s18.238 4.127 23.893-3.413l47.275-63.044c65.4 47.651 154.08 47.651 219.48 0l47.275 63.044c5.655 7.541 16.353 9.069 23.893 3.413 7.541-5.655 9.069-16.353 3.413-23.893l-48.775-65.024zm-135.54 24.064c-84.792-0.094-153.51-68.808-153.6-153.6 0-84.831 68.769-153.6 153.6-153.6s153.6 68.769 153.6 153.6-68.769 153.6-153.6 153.6z" />
                                <path
                                    d="m145.29 24.984c-33.742-32.902-87.767-32.221-120.67 1.521-32.314 33.139-32.318 85.997-8e-3 119.14 6.665 6.663 17.468 6.663 24.132 0l96.546-96.529c6.663-6.665 6.663-17.468 0-24.133zm-106.55 82.398c-12.186-25.516-1.38-56.08 24.136-68.267 13.955-6.665 30.175-6.665 44.131 0l-68.267 68.267z" />
                                <path
                                    d="m452.49 24.984c-33.323-33.313-87.339-33.313-120.66 0-6.663 6.665-6.663 17.468 0 24.132l96.529 96.529c6.665 6.663 17.468 6.663 24.132 0 33.313-33.322 33.313-87.338 0-120.66zm-14.08 82.449-68.301-68.301c19.632-9.021 42.79-5.041 58.283 10.018 15.356 15.341 19.371 38.696 10.018 58.283z" />
                                <path
                                    d="m238.56 136.52c-9.426 0-17.067 7.641-17.067 17.067v96.717l-47.787 63.71c-5.655 7.541-4.127 18.238 3.413 23.893s18.238 4.127 23.893-3.413l51.2-68.267c2.216-2.954 3.413-6.547 3.413-10.24v-102.4c1e-3 -9.426-7.64-17.067-17.065-17.067z" />
                            </svg>
                        </div>
                        <div class="project-content">
                            <h6>Komunitas/Asosiasi</h6>
                            <ul>
                                <li>
                                    <strong>Registered</strong>
                                    <span class="counter number-font">{{ $countKomunitasSemua }}</span>
                                </li>
                                <li>
                                    <strong>Not-Permission</strong>
                                    <span class="counter number-font">{{ $countKomunitas }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="card overflow-hidden project-card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="my-auto">
                            <svg enable-background="new 0 0 512 512"
                                class="me-4 ht-60 wd-60 my-auto warning" version="1.1"
                                viewBox="0 0 512 512" xml:space="preserve"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="m259.2 317.72h-6.398c-8.174 0-14.824-6.65-14.824-14.824 1e-3 -8.172 6.65-14.822 14.824-14.822h6.398c8.174 0 14.825 6.65 14.825 14.824h29.776c0-20.548-13.972-37.885-32.911-43.035v-33.74h-29.777v33.739c-18.94 5.15-32.911 22.487-32.911 43.036 0 24.593 20.007 44.601 44.601 44.601h6.398c8.174 0 14.825 6.65 14.825 14.824s-6.65 14.824-14.825 14.824h-6.398c-8.174 0-14.824-6.65-14.824-14.824h-29.777c0 20.548 13.972 37.885 32.911 43.036v33.739h29.777v-33.74c18.94-5.15 32.911-22.487 32.911-43.035 0-24.594-20.008-44.603-44.601-44.603z" />
                                <path
                                    d="m502.7 432.52c-7.232-60.067-26.092-111.6-57.66-157.56-27.316-39.764-65.182-76.476-115.59-112.06v-46.29l37.89-98.425-21.667-0.017c-6.068-4e-3 -8.259-1.601-13.059-5.101-6.255-4.559-14.821-10.802-30.576-10.814h-0.046c-15.726 0-24.292 6.222-30.546 10.767-4.799 3.487-6.994 5.081-13.041 5.081h-0.027c-6.07-5e-3 -8.261-1.602-13.063-5.101-6.255-4.559-14.821-10.801-30.577-10.814h-0.047c-15.725 0-24.293 6.222-30.548 10.766-4.8 3.487-6.995 5.081-13.044 5.081h-0.027l-21.484-0.017 36.932 98.721v46.117c-51.158 36.047-89.636 72.709-117.47 111.92-33.021 46.517-52.561 98.116-59.74 157.74l-9.304 77.285h512l-9.304-77.284zm-301.06-395.47c4.8-3.487 6.995-5.081 13.045-5.081h0.026c6.07 4e-3 8.261 1.602 13.062 5.101 6.255 4.559 14.821 10.802 30.578 10.814h0.047c15.725 0 24.292-6.222 30.546-10.767 4.799-3.487 6.993-5.081 13.041-5.081h0.026c6.068 5e-3 8.259 1.602 13.059 5.101 2.869 2.09 6.223 4.536 10.535 6.572l-21.349 55.455h-92.526l-20.762-55.5c4.376-2.041 7.773-4.508 10.672-6.614zm98.029 91.89v26.799h-83.375v-26.799h83.375zm-266.09 351.08 5.292-43.947c6.571-54.574 24.383-101.7 54.458-144.07 26.645-37.537 62.54-71.458 112.73-106.5h103.78c101.84 71.198 150.75 146.35 163.29 250.56l5.291 43.948h-444.85z" />
                            </svg>
                        </div>
                        <div class="project-content">
                            <h6>Industri</h6>
                            <ul>
                                <li>
                                    <strong>Registered</strong>
                                    <span class="counter number-font">{{ $countIndustriSemua }}</span>
                                </li>
                                <li>
                                    <strong>Not-Permission</strong>
                                    <span class="counter number-font">{{ $countIndustri }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endrole

    <div class="row row-sm">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="card  overflow-hidden project-card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="my-auto">
                            <svg enable-background="new 0 0 438.891 438.891"
                                class="me-4 ht-60 wd-60 my-auto danger" version="1.1"
                                viewBox="0 0 438.89 438.89" xml:space="preserve"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="m347.97 57.503h-39.706v-17.763c0-5.747-6.269-8.359-12.016-8.359h-30.824c-7.314-20.898-25.6-31.347-46.498-31.347-20.668-0.777-39.467 11.896-46.498 31.347h-30.302c-5.747 0-11.494 2.612-11.494 8.359v17.763h-39.707c-23.53 0.251-42.78 18.813-43.886 42.318v299.36c0 22.988 20.898 39.706 43.886 39.706h257.04c22.988 0 43.886-16.718 43.886-39.706v-299.36c-1.106-23.506-20.356-42.068-43.886-42.319zm-196.44-5.224h28.735c5.016-0.612 9.045-4.428 9.927-9.404 3.094-13.474 14.915-23.146 28.735-23.51 13.692 0.415 25.335 10.117 28.212 23.51 0.937 5.148 5.232 9.013 10.449 9.404h29.78v41.796h-135.84v-41.796zm219.43 346.91c0 11.494-11.494 18.808-22.988 18.808h-257.04c-11.494 0-22.988-7.314-22.988-18.808v-299.36c1.066-11.964 10.978-21.201 22.988-21.42h39.706v26.645c0.552 5.854 5.622 10.233 11.494 9.927h154.12c5.98 0.327 11.209-3.992 12.016-9.927v-26.646h39.706c12.009 0.22 21.922 9.456 22.988 21.42v299.36z" />
                                <path
                                    d="m179.22 233.57c-3.919-4.131-10.425-4.364-14.629-0.522l-33.437 31.869-14.106-14.629c-3.919-4.131-10.425-4.363-14.629-0.522-4.047 4.24-4.047 10.911 0 15.151l21.42 21.943c1.854 2.076 4.532 3.224 7.314 3.135 2.756-0.039 5.385-1.166 7.314-3.135l40.751-38.661c4.04-3.706 4.31-9.986 0.603-14.025-0.19-0.211-0.391-0.412-0.601-0.604z" />
                                <path
                                    d="m329.16 256.03h-120.16c-5.771 0-10.449 4.678-10.449 10.449s4.678 10.449 10.449 10.449h120.16c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449z" />
                                <path
                                    d="m179.22 149.98c-3.919-4.131-10.425-4.364-14.629-0.522l-33.437 31.869-14.106-14.629c-3.919-4.131-10.425-4.364-14.629-0.522-4.047 4.24-4.047 10.911 0 15.151l21.42 21.943c1.854 2.076 4.532 3.224 7.314 3.135 2.756-0.039 5.385-1.166 7.314-3.135l40.751-38.661c4.04-3.706 4.31-9.986 0.603-14.025-0.19-0.211-0.391-0.412-0.601-0.604z" />
                                <path
                                    d="m329.16 172.44h-120.16c-5.771 0-10.449 4.678-10.449 10.449s4.678 10.449 10.449 10.449h120.16c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449z" />
                                <path
                                    d="m179.22 317.16c-3.919-4.131-10.425-4.363-14.629-0.522l-33.437 31.869-14.106-14.629c-3.919-4.131-10.425-4.363-14.629-0.522-4.047 4.24-4.047 10.911 0 15.151l21.42 21.943c1.854 2.076 4.532 3.224 7.314 3.135 2.756-0.039 5.385-1.166 7.314-3.135l40.751-38.661c4.04-3.706 4.31-9.986 0.603-14.025-0.19-0.21-0.391-0.411-0.601-0.604z" />
                                <path
                                    d="m329.16 339.63h-120.16c-5.771 0-10.449 4.678-10.449 10.449s4.678 10.449 10.449 10.449h120.16c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449z" />
                            </svg>
                        </div>
                        <div class="project-content">
                            <h6>Blog</h6>
                            <ul>
                                <li>
                                    <strong>Published</strong>
                                    <span class="counter number-font">{{ $countBlogSemua }}</span>
                                </li>

                                <li>
                                    <strong>Not-Permission</strong>
                                    <span class="counter number-font">{{ $countBlog }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="card overflow-hidden project-card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="my-auto">
                            <svg enable-background="new 0 0 477.849 477.849"
                                class="me-4 ht-60 wd-60 my-auto success" version="1.1"
                                viewBox="0 0 477.85 477.85" xml:space="preserve"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="m374.1 385.52c71.682-74.715 69.224-193.39-5.492-265.08-34.974-33.554-81.584-52.26-130.05-52.193-103.54-0.144-187.59 83.676-187.74 187.22-0.067 48.467 18.639 95.077 52.193 130.05l-48.777 65.024c-5.655 7.541-4.127 18.238 3.413 23.893s18.238 4.127 23.893-3.413l47.275-63.044c65.4 47.651 154.08 47.651 219.48 0l47.275 63.044c5.655 7.541 16.353 9.069 23.893 3.413 7.541-5.655 9.069-16.353 3.413-23.893l-48.775-65.024zm-135.54 24.064c-84.792-0.094-153.51-68.808-153.6-153.6 0-84.831 68.769-153.6 153.6-153.6s153.6 68.769 153.6 153.6-68.769 153.6-153.6 153.6z" />
                                <path
                                    d="m145.29 24.984c-33.742-32.902-87.767-32.221-120.67 1.521-32.314 33.139-32.318 85.997-8e-3 119.14 6.665 6.663 17.468 6.663 24.132 0l96.546-96.529c6.663-6.665 6.663-17.468 0-24.133zm-106.55 82.398c-12.186-25.516-1.38-56.08 24.136-68.267 13.955-6.665 30.175-6.665 44.131 0l-68.267 68.267z" />
                                <path
                                    d="m452.49 24.984c-33.323-33.313-87.339-33.313-120.66 0-6.663 6.665-6.663 17.468 0 24.132l96.529 96.529c6.665 6.663 17.468 6.663 24.132 0 33.313-33.322 33.313-87.338 0-120.66zm-14.08 82.449-68.301-68.301c19.632-9.021 42.79-5.041 58.283 10.018 15.356 15.341 19.371 38.696 10.018 58.283z" />
                                <path
                                    d="m238.56 136.52c-9.426 0-17.067 7.641-17.067 17.067v96.717l-47.787 63.71c-5.655 7.541-4.127 18.238 3.413 23.893s18.238 4.127 23.893-3.413l51.2-68.267c2.216-2.954 3.413-6.547 3.413-10.24v-102.4c1e-3 -9.426-7.64-17.067-17.065-17.067z" />
                            </svg>
                        </div>
                        <div class="project-content">
                            <h6>App & Software</h6>
                            <ul>
                                <li>
                                    <strong>Published</strong>
                                    <span class="counter number-font">{{ $countProductSemua }}</span>
                                </li>

                                <li>
                                    <strong>Not-Permission</strong>
                                    <span class="counter number-font">{{ $countProduct }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="card overflow-hidden project-card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="my-auto">
                            <svg enable-background="new 0 0 469.682 469.682" version="1.1"
                                class="me-4 ht-60 wd-60 my-auto primary" viewBox="0 0 469.68 469.68"
                                xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="m120.41 298.32h87.771c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449h-87.771c-5.771 0-10.449 4.678-10.449 10.449s4.678 10.449 10.449 10.449z" />
                                <path
                                    d="m291.77 319.22h-171.36c-5.771 0-10.449 4.678-10.449 10.449s4.678 10.449 10.449 10.449h171.36c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449z" />
                                <path
                                    d="m291.77 361.01h-171.36c-5.771 0-10.449 4.678-10.449 10.449s4.678 10.449 10.449 10.449h171.36c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449z" />
                                <path
                                    d="m420.29 387.14v-344.82c0-22.987-16.196-42.318-39.183-42.318h-224.65c-22.988 0-44.408 19.331-44.408 42.318v20.376h-18.286c-22.988 0-44.408 17.763-44.408 40.751v345.34c0.68 6.37 4.644 11.919 10.449 14.629 6.009 2.654 13.026 1.416 17.763-3.135l31.869-28.735 38.139 33.959c2.845 2.639 6.569 4.128 10.449 4.18 3.861-0.144 7.554-1.621 10.449-4.18l37.616-33.959 37.616 33.959c5.95 5.322 14.948 5.322 20.898 0l38.139-33.959 31.347 28.735c3.795 4.671 10.374 5.987 15.673 3.135 5.191-2.98 8.232-8.656 7.837-14.629v-74.188l6.269-4.702 31.869 28.735c2.947 2.811 6.901 4.318 10.971 4.18 1.806 0.163 3.62-0.2 5.224-1.045 5.493-2.735 8.793-8.511 8.361-14.629zm-83.591 50.155-24.555-24.033c-5.533-5.656-14.56-5.887-20.376-0.522l-38.139 33.959-37.094-33.959c-6.108-4.89-14.79-4.89-20.898 0l-37.616 33.959-38.139-33.959c-6.589-5.4-16.134-5.178-22.465 0.522l-27.167 24.033v-333.84c0-11.494 12.016-19.853 23.51-19.853h224.65c11.494 0 18.286 8.359 18.286 19.853v333.84zm62.693-61.649-26.122-24.033c-4.18-4.18-5.224-5.224-15.673-3.657v-244.51c1.157-21.321-15.19-39.542-36.51-40.699-0.89-0.048-1.782-0.066-2.673-0.052h-185.47v-20.376c0-11.494 12.016-21.42 23.51-21.42h224.65c11.494 0 18.286 9.927 18.286 21.42v333.32z" />
                                <path
                                    d="m232.21 104.49h-57.47c-11.542 0-20.898 9.356-20.898 20.898v104.49c0 11.542 9.356 20.898 20.898 20.898h57.469c11.542 0 20.898-9.356 20.898-20.898v-104.49c1e-3 -11.542-9.356-20.898-20.897-20.898zm0 123.3h-57.47v-13.584h57.469v13.584zm0-34.482h-57.47v-67.918h57.469v67.918z" />
                            </svg>
                        </div>
                        <div class="project-content">
                            <h6>Event</h6>
                            <ul>
                                <li>
                                    <strong>Published</strong>
                                    <span class="counter number-font">{{ $countEventSemua }}</span>
                                </li>
                                <li>
                                    <strong>Not-Permission</strong>
                                    <span class="counter number-font">{{ $countEvent }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="card overflow-hidden project-card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="my-auto">
                            <svg enable-background="new 0 0 512 512"
                                class="me-4 ht-60 wd-60 my-auto warning" version="1.1"
                                viewBox="0 0 512 512" xml:space="preserve"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="m259.2 317.72h-6.398c-8.174 0-14.824-6.65-14.824-14.824 1e-3 -8.172 6.65-14.822 14.824-14.822h6.398c8.174 0 14.825 6.65 14.825 14.824h29.776c0-20.548-13.972-37.885-32.911-43.035v-33.74h-29.777v33.739c-18.94 5.15-32.911 22.487-32.911 43.036 0 24.593 20.007 44.601 44.601 44.601h6.398c8.174 0 14.825 6.65 14.825 14.824s-6.65 14.824-14.825 14.824h-6.398c-8.174 0-14.824-6.65-14.824-14.824h-29.777c0 20.548 13.972 37.885 32.911 43.036v33.739h29.777v-33.74c18.94-5.15 32.911-22.487 32.911-43.035 0-24.594-20.008-44.603-44.601-44.603z" />
                                <path
                                    d="m502.7 432.52c-7.232-60.067-26.092-111.6-57.66-157.56-27.316-39.764-65.182-76.476-115.59-112.06v-46.29l37.89-98.425-21.667-0.017c-6.068-4e-3 -8.259-1.601-13.059-5.101-6.255-4.559-14.821-10.802-30.576-10.814h-0.046c-15.726 0-24.292 6.222-30.546 10.767-4.799 3.487-6.994 5.081-13.041 5.081h-0.027c-6.07-5e-3 -8.261-1.602-13.063-5.101-6.255-4.559-14.821-10.801-30.577-10.814h-0.047c-15.725 0-24.293 6.222-30.548 10.766-4.8 3.487-6.995 5.081-13.044 5.081h-0.027l-21.484-0.017 36.932 98.721v46.117c-51.158 36.047-89.636 72.709-117.47 111.92-33.021 46.517-52.561 98.116-59.74 157.74l-9.304 77.285h512l-9.304-77.284zm-301.06-395.47c4.8-3.487 6.995-5.081 13.045-5.081h0.026c6.07 4e-3 8.261 1.602 13.062 5.101 6.255 4.559 14.821 10.802 30.578 10.814h0.047c15.725 0 24.292-6.222 30.546-10.767 4.799-3.487 6.993-5.081 13.041-5.081h0.026c6.068 5e-3 8.259 1.602 13.059 5.101 2.869 2.09 6.223 4.536 10.535 6.572l-21.349 55.455h-92.526l-20.762-55.5c4.376-2.041 7.773-4.508 10.672-6.614zm98.029 91.89v26.799h-83.375v-26.799h83.375zm-266.09 351.08 5.292-43.947c6.571-54.574 24.383-101.7 54.458-144.07 26.645-37.537 62.54-71.458 112.73-106.5h103.78c101.84 71.198 150.75 146.35 163.29 250.56l5.291 43.948h-444.85z" />
                            </svg>
                        </div>
                        <div class="project-content">
                            <h6>Member Event</h6>
                            <ul>
                                <li>
                                    <strong>Member Event</strong>
                                    <span>{{ $countGuestSemua }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- row -->
    <div class="row row-sm ">
        <div class="col-sm-12 col-md-12">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        Chart Registered In Every Month
                    </div>
                    <p class="mg-b-20">chart User who have registered in every month
                    </p>
                    {!! $chart->container() !!}
                </div>
            </div>
        </div><!-- col-6 -->



    </div>
    <!-- /row -->

    <!-- row -->
    <div class="row row-sm ">
        <div class="col-xl-12 col-md-12 col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="border-top-0 table table-bordered border-bottom">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">title</th>
                                    <th class="border-bottom-0">Author</th>
                                    <th class="border-bottom-0">Category</th>
                                    <th class="border-bottom-0">Date</th>
                                    <th class="border-bottom-0">Stauts</th>
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
    <!-- /row -->

    <!-- row -->
    <div class="row row-sm ">
        <div class="col-xl-4 col-lg-12  col-sm-12 mb-3">
            <div class="card h-100">
                <div class="card-header pb-0 pt-4">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-10">Top Event</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 text-muted mb-0">Event with the most total sum of participants.
                    </p>
                </div>
                <div class="card-body p-0 m-scroll mh-350 mt-2">
                    <div class="list-group projects-list">
                        @foreach ( $topEvents->take(5) as $item )
                        <a href="javascript:void(0);"
                            class="list-group-item list-group-item-action flex-column align-items-start border-top-0">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1 font-weight-semibold ">{{ $item->title }}</h6>
                           
                            </div>
                            <p class="mb-0 text-muted mb-0 tx-12">Started:{{ $item->created_at }}</p>
                            <small class="text-muted">{{ limittext($item->desc, 5) }}</small>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-12 mb-3">
            <div class="card overflow-hidden h-100">
                <div class="card-header pb-0 pt-4">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-10 ">New User Joined to VirtualDesa</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 text-muted mb-0">Data Users who has Join In Desa <a href=""></a></p>
                </div>
                <div class="card-body p-0">
                    <div class="activity Activity-scroll">
                        <div class="activity-list">

                        @foreach ($pengguna as $item)
                            <img src="{{ asset($item->guest->image ?? $item->member->image ?? 'assets/images/img-tekno/slider/slide1-tp.png') }}" alt="" class="img-activity">
                            <div class="time-activity">
                                <div class="item-activity">
                                    <p class="mb-0">
                                        <span class="h6 me-1">{{ $item->guest->name ?? $item->member->name ?? 'Nama Tidak Tersedia' }}</span>
                                        <span class="text-muted tx-13">created at {{ $item->created_at->diffForHumans() }}
                                            Status: </span>
                                        <span class="h6 badge bg-pill {{ $item->status_user->name === 'unverified' ? 'bg-danger' : 'bg-success' }}">
                                            {{ $item->status_user->name }}
                                        </span>
                                    </p>
                                    <small class="text-muted">{{ $item->created_at->format('d M Y H:i') }}</small>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-12 mb-3 ">
            <div class="card h-100">
                <div class="card-header pt-4 pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-10 ">Top Catgeory Event</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 text-muted mb-0">The Data From Top Event Category <a href=""></a> </p>
                </div>
                <div class="p-4">
                    <div class="">
                        <div class="row">
                            <div class="col-md-6 col-6 text-center">
                                <div class="task-box primary mb-0">
                                    <p class="mb-0 tx-12">Total Event</p>
                                    <h3 class="counter number-font mb-0">{{ $event->count() }}</h3>
                                </div>
                            </div>
                            <div class="col-md-6 col-6 text-center">
                                <div class="task-box danger  mb-0">
                                    <p class="mb-0 tx-12">Jumlah Category</p>
                                    <h3 class="counter number-font mb-0">{{ $meta->count() }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="task-stat pb-0">
                    @foreach ( $meta->take(5) as $item )
                    <div class="d-flex tasks">
                        <div class="mb-0">
                            <div class="h6 fs-15 mb-0"><i
                                    class="far fa-dot-circle text-pink me-2"></i>{{ $item->name }}</div>
                        </div>
                        <span class="tx-12 ms-auto">
                            <i >{{ $item->category->count() }}</i>
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row -->
<hr>
<div class="row row-sm auth">
    <div class="col-lg-12 col-md-12">
        <div class="card">

 
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    DATA STATISTICS EVENT
                </div>
                <p class="mg-b-20">Statistics Event In Every Month.</p>
                @if(auth()->user()->member)
                    {{-- @if(auth()->user()->member->member_type->name != 'Desa') --}}
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
    </div>


    <div class="row row-sm">
        <div class="col-xl-4 col-lg-6 col-md-12 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-10">Newest Event</h4>
                        <i class="mdi mdi-dots-Vertical"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-3">Latest event your team created .<a href="event.html">All
                            View</a></p>
                    <div>
                        <div class="chips">

                            @foreach ($eventSekarang as $item )
                            <div class="team">
                                <a href="javascript:void(0)" class="chip">
                                    <span class="avatar cover-image"
                                        data-bs-image-src="{{ asset($item->admin->image ?? $item->member->image ?? 'assets/images/img-tekno/slider/slide1-tp.png') }}"></span>
                                   {{ $item->admin->name ?? $item->member->name ?? "tidak ada" }}
                                </a>
                                <a href="{{ urlCheck($item->ig_url) }}"><i class="fab fa-instagram text-primary" aria-hidden="true"></i></a>
                                <a href="{{ urlCheck($item->fb_url) }}"><i class="fab fa-facebook text-primary" aria-hidden="true"></i></a>
                                <a href="{{ urlCheck($item->yt_url) }}"><i class="fab fa-youtube text-primary" aria-hidden="true"></i></a>
                                <a href="{{ urlCheck($item->tk_url) }}"><i class="fa-brands fa-tiktok" aria-hidden="true"></i></a>

                                <p>{{ $item->title }} : 
                                    @if($item->is_paid == 0)
                                    <span
                                    class="badge bg-pill bg-success">FREE REGISTER</span></p>
                                    @else
                                    <span
                                    class="badge bg-pill bg-success">paid</span></p>
                                    @endif
                                    
                            </div>
  
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-md-12 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-10">Upcoming event</h4>
                        <i class="mdi mdi-dots-Vertical"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-3">Upcoming events .<a
                            href="event.html">All View</a></p>
                    <div>
                        <div class="chips">

                            @foreach ($eventSoon as $item )
                            <div class="team">
                                <a href="javascript:void(0)" class="chip">
                                    <span class="avatar cover-image"
                                        data-bs-image-src="{{ asset($item->member->image ?? $item->admin->image ?? 'virtual/assets/img/faces/25.png') }}"
                                        style='background: url("{{ asset($item->member->image ?? $item->admin->image ?? 'virtual/assets/img/faces/25.png') }}") center center;'></span> {{ $item->member->name ?? $item->admin->name }}
                                </a>
                                {{-- <span id="timer-outputpattern" class="mb-0 text-primary"></span> --}}
                                <p>{{ $item->title }} </p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-12 col-md-12 mb-3">
            <div class="card overflow-hidden h-100">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-10 mt-2">Statistik Event</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 text-muted mb-0"> Total Chart from End Event and UpCominng Event</a></p>
                </div>
                <div class="card-body">
                    <div class="">
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
                    </div>
                    <div class="pt-3">
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
    <div class="row row-sm my-3">
        <div class="col-md-12 col-lg-8 col-xl-8 mb-3">
            <div class="card h-100">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title pt-2">Apps & Software</h4>
                        <i class="mdi mdi-dots-Vertical"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-0">newly created applications and software<a href="app.html"> View All</a></p>
                </div><!-- card-header -->
                <div class="card-body p-0">

                    <div class="browser-stats">
                        @foreach ( $app as $item)
                        <div class="d-flex align-items-center item  border-bottom">
                            <div class="d-flex">
                                <img src="{{ asset($item->image ?? 'virtual/assets/img/20.jpg') }}" alt=""
                                    class="ht-30 wd-30 me-2">
                                <div class="">
                                    <h6 class="">{{ $item->title }} </h6>
                                    <span class="sub-text">Category : 
                                        @foreach ($item->category as $meta )
                                        <span class="badge badge-pill bg-danger">{{ $meta->meta_name->name }}</span>
                                        @endforeach
                                    </span>
                                </div>
                            </div>
                            <div class=" my-auto">

                            </div>
                            <div class=" my-auto">
                                <div class="d-flex">
                                    <h6 class="sub-text mt-3 badge badge-pill"
                                        style="margin-left: 10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;border-radius: 20px;padding: 10px;">
                                        Owner : {{ $item->member->name ?? $item->admin->name ?? "nama tidak ada" }} <img src="{{ asset($item->member->image ?? $item->admin->image ?? "virtual/assets/img/20.jpg" ) }}" 
                                            alt="" class="ht-30 wd-30"
                                            style="border-radius: 50%;margin-left: 10px;"> </h6>
                                </div>
                            </div>
                            <div class="ms-auto my-auto">
                                <div class="d-flex">
                                    {{ $item->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div><!-- card -->

        </div>
        <div class="col-md-12 col-lg-4 col-xl-4 mb-3">
            <div class="card h-100">
                <div class="card-header pt-4 pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-10 ">Top Category Apps & Software</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 text-muted mb-0">The Top Category From Event <a href=""></a> </p>
                </div>
                <div class="p-4">
                    <div class="">
                        <div class="row">
                            <div class="col-md-6 col-6 text-center">
                                <div class="task-box  mb-0"
                                    style="background-color: #870101;border-radius: 20px;color: white;box-shadow: rgba(255, 69, 69,0.90) 0px 3px 8px;">
                                    <p class="mb-0 tx-12">Jumlah Apps</p>
                                    <h3 class="counter number-font mb-0">{{ $app->count() }}</h3>
                                </div>
                            </div>
                            <div class="col-md-6 col-6 text-center">
                                <div class="task-box  mb-0"
                                    style="background-color: #017582;border-radius: 20px;color: white;box-shadow: rgba(55, 221, 240,0.90) 0px 3px 8px;">
                                    <p class="mb-0 tx-12">Jumlah Category</p>
                                    <h3 class="counter number-font mb-0">{{ $metaProduct->count() }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="task-stat pb-0">

                    @foreach ($metaProduct as $item)
                    <div class="d-flex tasks">
                        <div class="mb-0">
                            <div class="h6 fs-15 mb-0"><i class="fa fa-object-ungroup me-2"></i>{{ $item->name }}
                            </div>
                        </div>
                        <span class="tx-12 ms-auto">
                            <p class="counter number-font mb-0"
                                style="font-weight:bold;color: #017582;">{{ $item->category_count }}</p>
                        </span>
                    </div>
                    @endforeach


                </div>
            </div>

        </div>

    </div>
    <!-- /row -->

    <!-- perbaikan -->

    <!-- /row -->
    <!-- /container -->
</div>

@endsection



@section('script')
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

    {{ $upcomingEventMember->script() }}

    {{ $totalEventMembers->script() }}

    {{ $desaBar->script() }}

    {{ $desaDone->script() }}

    {{ $desaUpcoming->script() }}

    {{ $desaTotal->script() }}


    
    <!--- Internal Chart.bundle js --->
    <script src="{{ asset('virtual/assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>

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

    <script src="{{ asset('virtual/assets/js/table-data.js')}}"></script>

    <!--- Select2 js --->
    <script src="{{ asset('virtual/assets/plugins/select2/js/select2.min.js') }}" defer></script>

    <!--- Index js --->
    <script src="{{ asset('virtual/assets/js/index.js') }}"></script>


    <script>
    var $table;
    
    $(document).ready(function() {
        
        table = $("#datatable").DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: "{{ route('dashboard.datatable') }}",
            columnDefs: [
                {
                    targets: 4,
                    render: function(data, type, full, meta) {
                        if(!!+data) return `<a class="badge bg-success" href="javascript:void(0);">Approved</a>`;
                        else return `<a class="badge bg-danger" href="javascript:void(0);">Unapproved</a>`;
                    }
                },
                
                {
                    targets: 1,
                    render: function(data, type, full, meta) {
                        console.log(data);
                        if (data != 'Admin') return `<a href="javascript:void(0);" class="btn btn-sm btn-outline-dark">${data}</a>`
                        else return `<a href="javascript:void(0);" class="btn btn-sm btn-outline-primary">${data}</a>`
                    }
                },

                {
                targets: 2,
                render: function(data, type, full, meta) {
                    let cat = '';
                    data.map(function(item){
                        cat += `<a class="badge bg-primary me-1" href="javascript:void(0);">${item.meta_name.name}</a>`;
                    })
                    return cat;
                }
            },

            {
                targets: 3,
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
                targets: 0,
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
    })


    </script>
@endsection