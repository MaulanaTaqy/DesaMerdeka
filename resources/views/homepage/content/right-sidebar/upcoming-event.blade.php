<div class="widget">
    <h4>Upcoming Events</h4>
    <div class="upcoming-events inner">

        <ul>
            @foreach ($events as $data)
            <li>
                <div class="edate"> <strong>{{ date('d', strtotime($data->start_datetime)) }}</strong>{{ date('M', strtotime($data->start_datetime)) }}<span class="year">{{ date('Y', strtotime($data->start_datetime)) }}</span>
                </div>
                <h6> <a href="{{ route('home.event.detail', $data->id) }}">{{ $data->title }}</a> </h6>
                <span class="loc">{{ $data->address }}</span>
            </li>
            @endforeach
        </ul>
    </div>
</div>