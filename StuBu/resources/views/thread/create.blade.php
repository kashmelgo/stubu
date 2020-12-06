@extends('layouts.app')

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
                        <h1>Create Thread</h1>
                        
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
                        <form class="col-md-12" action="{{ route('thread.store') }}" method="POST" role="form" id="create-thread-form">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label><h5>Subject</h5></label>
                                <input type="text" class="form-control-plaintext input-group-lg" name="subject" id="" placeholder="Input..." value="{{old('subject')}}">
                            </div>
                            <div class="form-group">
                                <label><h5>Type</h5></label>
                                <input type="text" class="form-control-plaintext input-group-lg" name="type" id="" placeholder="Input..." value="{{old('type')}}">
                            </div>
                            <div class="form-group">
                                <label><h5>Thread</h5></label>
                                <textarea class="form-control-plaintext input-group-lg" name="body" id="" placeholder="Input...">{{old('body')}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            
                        </form>
                        <form action=" {{ route('homefeed')}}" method="">
                            <button type="submit" class="btn btn-primary">Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection