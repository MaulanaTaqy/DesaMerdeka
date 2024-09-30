@extends('homepage.layout.main')

@section('content_top')
    <section class="wf100 subheader">
        <div class="container">
            <h2>{{ $sponsor->name }}</h2>
            <ul>
                <li>
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li>
                    <a href="#"> Detail {{ $sponsor->name }} </a>
                </li>
            </ul>
        </div>
    </section>
@endsection

@section('content')
    <div class="team-details">
        <div class="container">
            <div class="row">
                <div class="team-details-txt m90">
                    <div class="col-md-5">
                        <div class="team-img">
                            @if (file_exists($sponsor->image))
                                <img src="{{ asset($sponsor->image) }}" alt="">
                            @else
                            <img src="{{ asset('homepage') }}/images/team-large.jpg" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="team-detail">
                            <h2>{{ $sponsor->name }}</h2>
                            <strong class="advisor">{{ $sponsor->email }} | {{ $sponsor->phone }}</strong>
                                {!! $sponsor->desc !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
