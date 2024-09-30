@extends('homepage.layout.main')


@section('css')
    <link rel="stylesheet" href="{{ url('/homepage') }}/js/rev-slider/css/settings.css" type='text/css' media='all' />
    <link rel="stylesheet" href="{{ url('/homepage') }}/js/rev-slider/css/layers.css" type='text/css' media='all' />
    <link rel="stylesheet" href="{{ url('/homepage') }}/js/rev-slider/css/navigation.css" type='text/css' media='all' />
@endsection

@section('content_top')
    <!--Sub Header Start-->
    <section class="wf100 subheader">
        <div class="container">
            <h2>Contact Us </h2>
            <ul>
                <li> <a href="{{ route('home.index') }}">Home</a> </li>
                <li> Contact Us </li>
            </ul>
        </div>
    </section>
    <!--Sub Header End-->
@endsection


@section('content')
    <!--Contact Us Start-->
    <div class="contact-details-two graybg p80" style="margin-top: -80px">
        <div class="container">
            <div class="row">
                <!-- Address Box Start -->
                <div class="col-md-4 col-sm-4">
                    <div class="add-box-2">
                        <i class="fas fa-map-marker-alt"></i>
                        <h5>Our Location</h5>
                        <p>{{ $app->address }}
                        </p>
                    </div>
                </div>
                <!-- Address Box End -->
                <!-- Address Box Start -->
                <div class="col-md-4 col-sm-4">
                    <div class="add-box-2 br">
                        <i class="fas fa-phone"></i>
                        <h5>Call us</h5>
                        <p>Phone: {{ $app->phone }}</p>
                    </div>
                </div>
                <!-- Address Box End -->
                <!-- Address Box Start -->
                <div class="col-md-4 col-sm-4">
                    <div class="add-box-2">
                        <i class="far fa-envelope"></i>
                        <h5>Mail us</h5>
                        <p><a href="mailto:{{ $app->email }}">{{ $app->email }}</a></p>
                    </div>
                </div>
                <!-- Address Box End -->
            </div>
        </div>
    </div>
    <!--Contact Us Start-->
    <!-- Google Map with Contact Form -->
    <div class="map-form p80">
        <div class="container">
            <div class="row">
                <div class="col-md-12 contact-form m80">
                    <h3 class="stitle text-center">Get in Touch</h3>
                    <form id="contact-form" method="post" action="{{ route('contact.send') }}">
                        @csrf
                        <ul>
                            <li class="col-md-6">
                                <input type="text" placeholder="Name" id="name" name="name" required>
                            </li>
                            <li class="col-md-6">
                                <input type="text" id="email" name="email" placeholder="Enter Email" required>
                            </li>
                            <li class="col-md-6">
                                <input type="text" id="phone" name="phone" placeholder="Phone" required>
                            </li>
                            <li class="col-md-6">
                                <input type="text" id="website" name="website" placeholder="Your Website" required>
                            </li>
                            <li class="col-md-12">
                                <textarea id="message" name="message" placeholder="Write Message" required></textarea>
                            </li>
                            <li class="col-md-12">
                                <input id="btn-submit" type="submit" value="Send Message">
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="map">
                        <iframe
                            src="{{ $app->gmap_url ?: asset('virtual/assets/img/location-not-available.png') }}"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Google Map with Contact Form End -->
@endsection

@section('javascript')
    <script type="text/javascript" src="{{ url('/homepage') }}/js/rev-slider/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="{{ url('/homepage') }}/js/rev-slider/js/jquery.themepunch.revolution.min.js">
    </script>
    <script type="text/javascript" src="{{ url('/homepage') }}/js/rev-slider.js"></script>
    <script type="text/javascript"
        src="{{ url('/homepage') }}/js/rev-slider/js/extensions/revolution.extension.actions.min.js"></script>
    <script type="text/javascript"
        src="{{ url('/homepage') }}/js/rev-slider/js/extensions/revolution.extension.carousel.min.js"></script>
    <script type="text/javascript"
        src="{{ url('/homepage') }}/js/rev-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script type="text/javascript"
        src="{{ url('/homepage') }}/js/rev-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript"
        src="{{ url('/homepage') }}/js/rev-slider/js/extensions/revolution.extension.migration.min.js"></script>
    <script type="text/javascript"
        src="{{ url('/homepage') }}/js/rev-slider/js/extensions/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript"
        src="{{ url('/homepage') }}/js/rev-slider/js/extensions/revolution.extension.parallax.min.js"></script>
    <script type="text/javascript"
        src="{{ url('/homepage') }}/js/rev-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript"
        src="{{ url('/homepage') }}/js/rev-slider/js/extensions/revolution.extension.video.min.js"></script>

    <script>
        $(document).ready(function () {
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
                    $('#name, #email, #phone, #website, #message').val('');
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
