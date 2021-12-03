@extends(auth()->user()->isAdmin==1? 'layouts.adminapp': 'layouts.app');

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-9">
                            <h1>Threads</h1>
                        </div>
                        <div class="col-md-3">
                            <a class="btn btn-primary" href="{{ route('thread.create')}}">Ask Question</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="list-group">
                        @forelse($threads as $post)
                            <a href="{{ route('thread.show',$post->id)}}" class="list-group-item">
                                <h4 class="list-group-item-heading">{{$post->subject}}</h4>
                                <p class="list-group-item-text">{{ Str::limit($post->body,100) }}</p>
                            </a>

                        @empty
                            <h5>No Threads</h5>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
