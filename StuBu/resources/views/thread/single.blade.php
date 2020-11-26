@extends('layouts.app')


@section('content')
    <h4>{{$thread->subject}}</h4>
    <hr>

    <div class="thread-details">
        {{$thread->body}}
    </div>
    @if(auth()->user()->id == $thread->user_id)
    <div class="actions">
        <a href="{{route('thread.edit',$thread->id)}}" class="btn btn-info btn-xs">Edit</a>
        <form action="{{ route('thread.destroy',$thread->id) }}" method="POST" class="inline-it">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <input class="btn btn-xs btn-danger" type="submit" value="Delete">
        </form>
    </div>
    @endif

    <div class="comment">
        @foreach($thread->comments as $comment)
            <h4>{{$comment->user->name}}</h4>
            <p>{{$comment->body}}</p>
            @if(auth()->user()->id == $comment->user_id)
            <div class="actions">

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
            </div>
            @endif
        @endforeach
    </div>
    <br>
    <br>
    <div class="comment-form">
        <form action="{{route('threadcomment.store',$thread->id)}}" method="POST" role="form">
        {{csrf_field()}}
        {{method_field('POST')}}
        <legend>Create Comment</legend>
        <div class="form-group">
            <input type="text" class="form-control" name="body" id="" placeholder="Input...">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>



@endsection

