@extends('layouts.adminapp')

@section('content')
    <div class="container-lg">
        <div class="p-4 justify-content">
            <div class="card shadow-lg bg-white rounded">
                <div class="card-header">
                    {{-- Users Table --}}
                    <h2>Reports Table</h2>
                </div>
                    <div id="accordion" class="card-body">
                        <div class="card bg-primary container rounded-0">
                            <div class="card-header row">
                                <div class="col col-lg-2 font-weight-bold">User Name</div>
                                <div class="col col-lg-4 font-weight-bold d-flex justify-content-center">Content</div>
                                <div class="col col-lg-2 font-weight-bold d-flex justify-content-center">Type</div>
                                <div class="col col-lg-2 font-weight-bold">Date Created</div>
                                <div class="col col-lg-2 font-weight-bold d-flex justify-content-center">Action</div>
                            </div>
                        </div>
                        @foreach($comments as $comment)
                        <div class="card container rounded-0">
                            <div class="card-header row" id="heading{{$comment->id}}">
                                
                                <div class="col col-lg-2">
                                    {{$comment->user->name}}
                                </div>
                                <div class="col col-lg-4 d-flex justify-content-center">
                                    <button class="btn btn-link btn-block" data-toggle="collapse" data-target="#collapse{{$comment->id}}" aria-expanded="true" aria-controls="collapseOne">
                                        {{$comment->body}}
                                    </button>
                                </div>
                                <div class="col col-lg-2 d-flex justify-content-center">
                                    Comment
                                </div>
                                <div class="col col-lg-2">
                                    {{$comment->created_at->format('M d Y')}}
                                </div>
                                <div class="col col-lg-2 d-flex justify-content-center">
                                    <button class="btn btn-link">Template</button>
                                </div>                               
                            </div>
                            <div id="collapse{{$comment->id}}" class="collapse show" aria-labelledby="heading{{$comment->id}}" data-parent="#accordion">
                                <div class="card-body">
                                    @foreach($comment->reports as $report)
                                        {{$report->status}}
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach

                        @foreach($threads as $thread)
                        <div class="card container rounded-0">
                            <div class="card-header row" id="heading{{$thread->id}}">
                                
                                <div class="col col-lg-2">
                                    {{$thread->user->name}}
                                </div>
                                <div class="col col-lg-4 d-flex justify-content-center">
                                    <button class="btn btn-link btn-block" data-toggle="collapse" data-target="#collapse{{$thread->id}}" aria-expanded="true" aria-controls="collapseOne">
                                        {{$thread->body}}
                                    </button>
                                </div>
                                <div class="col col-lg-2 d-flex justify-content-center">
                                    Thread
                                </div>
                                <div class="col col-lg-2">
                                    {{$thread->created_at->format('M d Y')}}
                                </div>
                                <div class="col col-lg-2 d-flex justify-content-center">
                                    <button class="btn btn-link">Template</button>
                                </div>                               
                            </div>
                            <div id="collapse{{$thread->id}}" class="collapse show" aria-labelledby="heading{{$thread->id}}" data-parent="#accordion">
                                <div class="card-body">
                                    @foreach($thread->reports as $report)
                                        {{$report->status}}
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
            </div>
        </div>
    </div>
@endsection

