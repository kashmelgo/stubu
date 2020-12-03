@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div id = "homefeed-left" class="col-md-4">
            <h1>hello</h1>
        </div>
        <div id ="homefeed-right" class="col-md-6 col-md-offset-2">
            <div>
                @foreach($threads as $subjects)
                    @if($subjects!=NULL)
                    <h1>{{$subjects->$id}}</h1>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection