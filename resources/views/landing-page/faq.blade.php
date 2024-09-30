@extends('landing-page.layouts.main')

@section('title', 'FAQ')

@section('css')
<style>
    #form-messages {
        color: white !important;
    }

    @media only screen and (max-width: 480px){
        .rs-faq .faq-content .accordion .card .card-header .card-link {
            padding: 20px 50px 0 15px !important;
        }
    }
</style>
@endsection

@section('content')
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel" >
    <div class="carousel-inner" style="height: 100%;transition: transform 0.5s ease, opacity 1s ease-out;">
        @foreach($banner as $key => $data)
        <div class="carousel-item @if($key==0) active @endif">
            <img src="{{asset($data->image)}}" class="d-block w-100" alt="..." style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;">
        </div>
      @endforeach
      @if(count($banner) == 0)
        <div class="carousel-item active">
            <img src="{{asset('assets/images/img-tekno/slider/slide1-tp.png')}}" class="d-block w-100" alt="..." style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;">
        </div>
      @endif
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Faq Section Start -->
<div class="rs-faq gray-bg4 pt-120 md-pt-80">
    <div class="container">
        <div class="row y-middle">
            <div class="col-lg-7 md-mb-50">
                <div class="content-part">
                    <div class="faq-content">
                        <div id="accordion" class="accordion">
                            @foreach($faq as $data)
                            <div class="card">
                                <div class="card-header">
                                    <a class="card-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $data->id }}" aria-expanded="true">{{$data->question}}</a>
                                </div>
                                <div id="collapse-{{ $data->id }}" class="collapse" data-bs-parent="#accordion">
                                    <div class="card-body">
                                        {!!$data->answer!!}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 pl-30 md-pl-15">
                <div class="rs-contact home-style1 faq-home-style">
                    <div class="contact-widget">
                        <div class="sec-title mb-40">
                            <h2 class="title title2 white-color">
                                Quick Contact
                            </h2>
                        </div>
                        <div id="form-messages"></div>
                        <form id="contact-form" method="post" action="{{ route('contact.send') }}">
                            @csrf
                            <fieldset>
                                <div class="row">
                                    <div class="col-lg-12 mb-20">
                                        <input class="from-control" type="text" id="name" name="name" placeholder="Your Name" required="">
                                    </div>
                                    <div class="col-lg-12 mb-20">
                                        <input class="from-control" type="text" id="email" name="email" placeholder="Your E-Mail" required="">
                                    </div>
                                    <div class="col-lg-12 mb-20">
                                        <input class="from-control" type="text" id="phone" name="phone" placeholder="Phone Number" required="">
                                    </div>
                                    <div class="col-lg-12 mb-20">
                                        <textarea class="from-control" id="message" name="message" placeholder="Message Here" required=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="submit-btn">
                                        <input id="btn-submit" class="submit" type="submit" value="Submit Now">
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Privacy policy Section Start -->
        <div class="rs-privacy-policy pt-120 md-pt-80">
            <div class="privacy-wrap pb-130 md-pb-90">
                <div class="sec-title mb-50">
                    <h2 class="title title2">
                        Privacy policy
                    </h2>
                </div>
                <div class="privacy-content">
                    {{-- <ul class="check-list">
                        <li>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors.</li>
                        <li>Readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here.</li>
                        <li>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors It is a long established fact that a reader will be distracted by the Readable content of a page when looking at its layout.</li>
                        <li>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages</li>
                        <li>Many desktop publishing packages and web page editors. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</li>
                    </ul> --}}
                    {!! $privacyPolicy?->privacy_policies !!}
                </div>
            </div>
            <div class="privacy-wrap pb-130 md-pb-90">
                <div class="sec-title mb-50">
                    <h2 class="title title2">
                        Terms & Conditions
                    </h2>
                </div>
                <div class="privacy-content">
                    {{-- <ul class="check-list">
                        <li>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors.</li>
                        <li>Readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here.</li>
                        <li>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors It is a long established fact that a reader will be distracted by the Readable content of a page when looking at its layout.</li>
                        <li>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages</li>
                    </ul> --}}
                    {!! $termConditions?->term_conditions !!}
                </div>
            </div>
            
        </div>
        <!-- Privacy policy Section Start -->
    </div>
</div>
<!-- Faq Section End -->
@endsection

@section('script')
 <script>
    $(document).ready(function () {
        $('.privacy-content').find('ul').addClass('check-list')

        var form = $('#contact-form');

        // Get the messages div.
        var formMessages = $('#form-messages');

        // Set up an event listener for the contact form.
        $(form).submit(function(e) {
            // Stop the browser from submitting the form.
            e.preventDefault();

            $('#pre-load').addClass('opacity-50')

            $('#btn-submit').prop('disabled', true)

            // Serialize the form data.
            var formData = $(form).serialize();

            // Submit the form using AJAX.
            $.ajax({
                type: 'POST',
                url: $(form).attr('action'),
                data: formData
            })
            .done(function(response) {
                // Make sure that the formMessages div has the 'success' class.
                $(formMessages).removeClass('error');
                $(formMessages).addClass('success');

                // Set the message text.
                $(formMessages).text(response);

                $('#pre-load').removeClass('opacity-50')

                // Clear the form.
                $('#name, #email, #phone, #message').val('');
                $('#btn-submit').prop('disabled', false)
            })
            .fail(function(data) {
                // Make sure that the formMessages div has the 'error' class.
                $(formMessages).removeClass('success');
                $(formMessages).addClass('error');
                
                $('#pre-load').removeClass('opacity-50')

                // Set the message text.
                if (data.responseText !== '') {
                    $(formMessages).text(data.responseText);
                } else {
                    $(formMessages).text('Oops! An error occured and your message could not be sent.');
                }
            });
        });
    });
 </script>
@endsection

