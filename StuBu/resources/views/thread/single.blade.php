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
            <div class="actions">
                <!--<a href="{{route('thread.edit',$thread->id)}}" class="btn btn-info btn-xs">Edit</a> -->

                <a class="btn btn-xs" data-toggle="modal" href="{{$comment->id}}">Edit</a>
                <div class="modal fade" id="{{$comment->id}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Modal Title</h4>
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
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save Changes</button>
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

