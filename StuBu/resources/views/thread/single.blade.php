@extends('layouts.app')


@section('content')

    <hr>
    <h4>{{$thread->subject}}</h4>
 

    <div class="thread-details">
        {{$thread->body}}
    </div>
    
    <div class="actions">
        @if(auth()->user()->id == $thread->user_id)
            <a href="{{route('thread.edit',$thread->id)}}" class="btn btn-info btn-xs">Edit</a>
            <form action="{{ route('thread.destroy',$thread->id) }}" method="POST" class="inline-it">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <input class="btn btn-xs btn-danger" type="submit" value="Delete">
            </form>
        @endif
        <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#edit-comment-{{ $thread->id }}">
            Reply
        </button>
    </div>
    
    <hr>
    <div class="comment-form collapse" id="edit-comment-{{ $thread->id }}" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <form action="{{route('threadcomment.store',$thread->id)}}" method="POST" role="form">
        {{csrf_field()}}
        {{method_field('POST')}}
        <legend>Reply Thread</legend>
        <div class="form-group">
            <input type="text" class="form-control" name="body" id="" placeholder="Input...">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="comment">
        @foreach($thread->comments as $comment)
            <h4>{{$comment->user->name}}</h4>
            <p>{{$comment->body}}</p>
            <div class="actions">
                @if(auth()->user()->id == $comment->user_id)
                <a type="btn btn-xs" class="btn btn-primary" data-toggle="modal" href="#edit-comment-{{ $comment->id }}">
                    Edit
                </a>
                <div class="modal fade" id="edit-comment-{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Comment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="comment-form">
                                <form action="{{route('comment.update',$comment->id)}}" method="POST" role="form">
                                    {{csrf_field()}}
                                    {{method_field('put')}}
                                    <legend>Edit Comment</legend>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="body" id="" placeholder="Input..." value="{{$comment->body}}">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <form action="{{ route('comment.destroy',$comment->id) }}" method="POST" class="inline-it">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <input class="btn btn-xs btn-danger" type="submit" value="Delete">
                </form>
                @endif
                <a type="btn btn-xs" class="btn btn-xs btn-default" data-toggle="collapse" role="button" href="#reply-comment-{{ $comment->id }}">
                    Reply
                </a>
            </div>

            

            <!-- Reply to Comment Code -->
            <div class="reply-form collapse" id="reply-comment-{{ $comment->id }}" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <form action="{{route('replycomment.store',$comment->id)}}" method="POST" role="form">
                        {{csrf_field()}}
                        {{method_field('POST')}}
                        <legend>Reply Comment</legend>
                        <div class="form-group">
                            <input type="text" class="form-control" name="body" id="" placeholder="Reply...">
                        </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            @foreach($comment->comments as $reply)
                <div class="small well text-info reply-list">
                    <p>{{ $reply->body }}</p>
                    <lead>{{$reply->user->name}}</lead>
                    @if(auth()->user()->id == $reply->user_id)
                        <div class="actions">
                            <a type="btn btn-xs" class="btn btn-primary" data-toggle="modal" href="#edit-comment-{{ $reply->id }}">
                                Edit
                            </a>

                            <div class="modal fade" id="edit-comment-{{ $reply->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Reply</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="comment-form">
                                            <form action="{{route('comment.update',$reply->id)}}" method="POST" role="form">
                                                {{csrf_field()}}
                                                {{method_field('put')}}
                                                <legend>Edit Comment</legend>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="body" id="" placeholder="Input..." value="{{$reply->body}}">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('comment.destroy',$reply->id) }}" method="POST" class="inline-it">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <input class="btn btn-xs btn-danger" type="submit" value="Delete">
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach
        @endforeach
    </div>
    <br>
    <br>
@endsection

