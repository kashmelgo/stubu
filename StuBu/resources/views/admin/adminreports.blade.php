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
                                <div class="col col-lg-2 font-weight-bold d-flex justify-content-center">Status</div>
                                <div class="col col-lg-2 font-weight-bold d-flex justify-content-center">Action</div>
                            </div>
                        </div>
                        @if($comments->count() == 0 && $threads->count() == 0)
                            <div class="card container">
                                <div class="card-header row">
                                    <div class="col col-lg-12 d-flex justify-content-center font-weight-bold">No Post Reported</div>
                                </div>
                            </div>
                        @else
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
                                <div class="col col-lg-4 container">
                                    <form method="POST" action="{{route('comment.statusUpdate',$comment->id)}}" class="container">
                                        @csrf
                                        {{ method_field('PUT') }}
                                        <div class="row">
                                            <div class="col col-lg-6 d-flex justify-content-center">                                        
                                                <select name="status" class="custom-select custom-select-md">
                                                    <option value="Pending" selected disabled hidden>Pending</option>
                                                    <option value="Flagged">Flagged</option>
                                                    <option value="Valid">Valid</option>
                                                </select>                                        
                                            </div>
                                            <div class="col col-lg-6 d-flex justify-content-center">
                                                <button class="btn btn-info" type="submit" value="submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <div id="collapse{{$comment->id}}" class="collapse show" aria-labelledby="heading{{$comment->id}}" data-parent="#accordion">
                                <div class="container p-4">
                                    <div class="row p-1">
                                        <div class="col col-lg-2 font-weight-bold">User Name:</div>
                                        <div class="col-lg-1"></div>
                                        <div class="col col-lg-9">{{$comment->user->name}}</div>
                                    </div>
                                    <div class="row p-1">
                                        <div class="col col-lg-2 font-weight-bold">Type:</div>
                                        <div class="col-lg-1"></div>
                                        <div class="col col-lg-9">Comment</div>
                                    </div>
                                    <div class="row p-1">
                                        <div class="col col-lg-2 font-weight-bold">Date Created:</div>
                                        <div class="col-lg-1"></div>
                                        <div class="col col-lg-9">{{$comment->created_at->format('M d Y')}}</div>
                                    </div>
                                    <div class="row p-1">
                                        <div class="col col-lg-2 font-weight-bold">Content:</div>
                                        <div class="col-lg-1"></div>
                                        <div class="col col-lg-9">{!!nl2br(e($comment->body))!!}</div>
                                    </div>
                                    <div class="row p-1">
                                        <div class="col col-lg-2 font-weight-bold">Thread Subject:</div>
                                        <div class="col-lg-1"></div>
                                        <div class="col col-lg-9">{!!nl2br(e($comment->thread->subject))!!}</div>
                                    </div>
                                    <div class="row p-1">
                                        <div class="col col-lg-2 font-weight-bold">Thread Body:</div>
                                        <div class="col-lg-1"></div>
                                        <div class="col col-lg-9">{!!nl2br(e($comment->thread->body))!!}</div>
                                    </div>
                                </div>
                                <h3 class="px-4">Report Information</h3>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <th>Reporter's Name</th>
                                            <th>Reason/s</th>
                                            <th>Date Reported</th>
                                        </thead>
                                        
                                    
                                    @foreach($comment->reports as $report)
                                        <tbody>
                                            <td>{{$report->user->name}}</td>
                                            <td>
                                                @foreach(json_decode($report->reasons) as $reason)
                                                    {{$reason}}<br>
                                                @endforeach
                                            </td>
                                            <td>{{$report->created_at->format(' M d Y')}}</td>
                                        </tbody>     
                                    @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        @endif
                       
                        @foreach($threads as $thread)
                        <div class="card container rounded-0">
                            <div class="card-header row" id="headingThread{{$thread->id}}">
                                
                                <div class="col col-lg-2">
                                    {{$thread->user->name}}
                                </div>
                                <div class="col col-lg-4 d-flex justify-content-center">
                                    <button class="btn btn-link btn-block" data-toggle="collapse" data-target="#collapseThread{{$thread->id}}" aria-expanded="true" aria-controls="collapseOne">
                                        {{$thread->body}}
                                    </button>
                                </div>
                                <div class="col col-lg-2 d-flex justify-content-center">
                                    Comment
                                </div>
                                <div class="col col-lg-2 d-flex justify-content-center">
                                    {{$thread->status}}
                                </div>
                                <div class="col col-lg-2 d-flex justify-content-center">
                                    <button class="btn btn-link">Template</button>
                                </div>

                            </div>
                            <div id="collapseThread{{$thread->id}}" class="collapse show" aria-labelledby="headingThread{{$thread->id}}" data-parent="#accordion">
                                <div class="container p-4">
                                    <div class="row p-1">
                                        <div class="col col-lg-2 font-weight-bold">User Name:</div>
                                        <div class="col-lg-1"></div>
                                        <div class="col col-lg-9">{{$thread->user->name}}</div>
                                    </div>
                                    <div class="row p-1">
                                        <div class="col col-lg-2 font-weight-bold">Type:</div>
                                        <div class="col-lg-1"></div>
                                        <div class="col col-lg-9">Thread</div>
                                    </div>
                                    <div class="row p-1">
                                        <div class="col col-lg-2 font-weight-bold">Date Created:</div>
                                        <div class="col-lg-1"></div>
                                        <div class="col col-lg-9">{{$thread->created_at}}</div>
                                    </div>
                                    <div class="row p-1">
                                        <div class="col col-lg-2 font-weight-bold">Content:</div>
                                        <div class="col-lg-1"></div>
                                        <div class="col col-lg-9">{!!nl2br(e($thread->body))!!}</div>
                                    </div>
                                </div>
                                <h3 class="px-4">Reported Post</h3>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <th>Reporter's Name</th>
                                            <th>Reason/s</th>
                                            <th>Date Reported</th>
                                        </thead>
                                        
                                    
                                    @foreach($thread->reports as $report)
                                        <tbody>
                                            <td>{{$report->user->name}}</td>
                                            <td>{{$report->reasons}}</td>
                                            <td>{{$report->created_at->format(' M d Y')}}</td>
                                        </tbody>     
                                    @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endforeach                        
                    </div>
            </div>
        </div>
    </div>
@endsection

