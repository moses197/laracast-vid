<h2>
    {{ $job->title }}
</h2>

<p>
    Congrate...lol... your job is now live on our website for now
</p>

<p>
    <a href="{{ url('/jobs/'. $job->id ) }}">View your job listing</a>
</p>