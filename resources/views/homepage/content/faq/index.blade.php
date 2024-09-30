@extends('homepage.layout.main')

@section('title', 'FAQ')

@section('css')
    <link rel="stylesheet" href="{{ url('/homepage') }}/js/rev-slider/css/settings.css" type='text/css' media='all' />
    <link rel="stylesheet" href="{{ url('/homepage') }}/js/rev-slider/css/layers.css" type='text/css' media='all' />
    <link rel="stylesheet" href="{{ url('/homepage') }}/js/rev-slider/css/navigation.css" type='text/css' media='all' />
@endsection

@section('content_top')
    <!--Sub Header Start-->
    <section class="wf100 subheader">
        <div class="container">
            <h2>FAQ </h2>
            <ul>
                <li> <a href="{{ route('home.index') }}">Home</a> </li>
                <li> FAQ </li>
            </ul>
        </div>
    </section>
    <!--Sub Header End-->
@endsection


@section('content')
    <div class="team-details">
        <div class="container">
            <div class="row">
                <div class="team-details-txt">
                    <div class="col-md-8 col-sm-12">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            @foreach ($faq as $item)
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="heading{{ $loop->iteration }}">
                                    <h6 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $loop->iteration }}" aria-expanded="false" aria-controls="collapse{{ $loop->iteration }}" class="collapsed"> {{ $item->question }} </a> </h6>
                                </div>
                                <div id="collapse{{ $loop->iteration }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $loop->iteration }}" aria-expanded="false" style="">
                                    <div class="panel-body"> {!! $item->answer !!} </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="login-account">
                            <h4>Quick Contact</h4>
                            <form  method="post" action="{{ route('contact.send') }}">
                                @csrf
                                <ul>
                                    <li>
                                        <input type="text" name="name" placeholder="Your Name" class="linput">
                                    </li>
                                    <li>
                                        <input type="email" name="email" placeholder="Your Email" class="linput">
                                    </li>
                                    <li>
                                        <input type="text" name="phone" placeholder="Phone Number" class="linput">
                                    </li>
                                    <li>
                                        <textarea style="line-height: inherit; padding : 20px;" class="linput" id="message" name="message" placeholder="Message Here" required=""></textarea>
                                    </li>
                                    <li>
                                        <input value="Submit" type="submit">
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="deprt-txt">
                    <h3>Privacy & Policy</h3>
                    {!! $privacyPolicy->privacy_policies !!}
                </div>
            </div>
            <div class="row">
                <div class="deprt-txt">
                    <h3>Terms & Condition</h3>
                    {!! $termConditions->term_conditions !!}
                </div>
            </div>
        </div>
    </div>
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
