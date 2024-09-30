<div class="widget">
    <h4>Recent Posts</h4>
    <div class="recent-posts inner">
        <ul>
            @foreach ($blogs as $data)
            <li>
                <img src="{{ $data->image ? (file_exists($data->image) ? asset($data->image) :  asset('/homepage/images/rp1.jpg')) :  asset('/homepage/images/rp1.jpg')}}" alt=""> <strong>{{ date('d M, Y', strtotime($data->created_at)) }}</strong>
                <h6> <a title="{{ $data->title }}" href="{{ route('home.blog.detail', $data->id) }}">{{ Str::limit($data->title, 20) }}</a> </h6>
            </li>
            @endforeach
        </ul>
    </div>
</div>