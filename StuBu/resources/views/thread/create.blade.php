@extends('layouts.app')

@section('heading','Create Thread')

@section('content')
    <div class="row">
        <div class="well">
            <form class="form-vertical" action="{{ route('thread.store') }}" method="POST" role="form" id="create-thread-form">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Subject</label>
                    <input type="text" class="form-control" name="subject" id="" placeholder="Input..." value="{{old('subject')}}">
                </div>
                <div class="form-group">
                    <label>Type</label>
                    <input type="text" class="form-control" name="type" id="" placeholder="Input..." value="{{old('type')}}">
                </div>
                <div class="form-group">
                    <label>Thread</label>
                    <input type="text" class="form-control" name="thread" id="" placeholder="Input..." value="{{old('thread')}}">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    

@endsection