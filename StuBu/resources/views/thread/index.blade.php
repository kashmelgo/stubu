@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header row">
        <div class="col-md-4 main-content-heading">
            Threads
        </div>
        <div class="col-md-offset-6 col-md-2">
            <a class="btn btn-primary" href="{{ route('thread.create')}}">Create Thread</a>
        </div>
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

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
    </div>
</div>
@endsection