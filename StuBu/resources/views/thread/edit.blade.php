@extends(auth()->user()->isAdmin==1? 'layouts.adminapp': 'layouts.app');

@section('heading','Create Thread')

@section('content')

@if (count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div>
                        <h1>Edit Thread</h1>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div> 
                    @endif

                    <div class="row ">
                        <form class="col-md-12" action="{{ route('thread.update',$thread->id) }}" method="post" role="form" id="create-thread-form">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label><h5>Subject</h5></label>
                                <input type="text" class="form-control-plaintext input-group-lg" name="subject" id="" placeholder="Input..." value="{{$thread->subject}}">
                            </div>
                            <div class="form-group">
                                <label><h5>Type</h5></label>
                                <input type="text" class="form-control-plaintext input-group-lg" name="type" id="" placeholder="Input..." value="{{$thread->type}}">
                            </div>
                            <div class="form-group">
                                <label><h5>Thread</h5></label>
                                <textarea class="form-control-plaintext input-group-lg" name="body" id="" placeholder="Input...">{{$thread->body}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection