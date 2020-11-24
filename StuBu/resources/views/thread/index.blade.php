@extends('layouts.app')

@section('content')


<h2> Thread </h2>

<div class="list-group">
    @forelse($threads as $thread)
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">{{$thread->subject}}</h4> 
            <p class="list-group-item-text">{{ Str::limit($thread->body,100) }}</p>
        </a>

    @empty
        <h5>No Threads</h5>
    @endforelse

</div>


@endsection