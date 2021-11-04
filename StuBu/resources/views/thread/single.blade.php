@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="comments-container">
            
            <div class="comment-main-level">
                <div class="comment-box">
                    <div class="comment-head">
                        <div class="thread-avatar mr-2"><img src="/images/profilePic/{{$thread->user->image}}" alt="" style="height:100%;width:100%"></div>
                        <legend>{{$thread->subject}}</legend>
                        
                        @if(auth()->user()->id == $thread->user_id)
                            <i class="fas fa-edit"></i>
                            <form action="{{ route('thread.destroy',$thread->id) }}" method="POST" class="inline-it">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button class="border-0 bg-transparent ml-2" type="submit"><i class="fa fa-trash"></i></button>
                            </form>                            
                        @else
                            <i class="fas fa-flag" aria-hidden="true"></i>
                            
                        @endif
                        
                        <h6 class="comment-name">by: <a href="{{route('profile_show',$thread->user->id)}}">{{$thread->user->name}}</a></h6>
                        <span>  {{$thread->created_at->diffForHumans()}}</span>
                    </div>
                    <div class="comment-content">
                        {!!nl2br(e($thread->body))!!}
                    </div>
                </div>
            </div>
            <br>



            <div class="comment-main-level">
                <div class="comment-box">
                    <div class="comment-head">
                       <h4>Create Comment</h4>
                    </div>
                    <div class="comment-content">
                        <form action="{{route('threadcomment.store',$thread->id)}}" method="POST" role="form">
                            {{csrf_field()}}
                            {{method_field('POST')}}
                            <div class="form-group">
                                <pre><textarea type="text" class="form-control" name="body" id="" placeholder="Input..." rows="4" style="resize:none;word-wrap:break-word;white-space: pre-wrap"></textarea></pre>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                            <br><br>
                        </form>
                    </div>
                </div>
            </div>

            <h1>Comments</h1>
                @if($thread->comments->count() == 0)
                <br>
                <h3 class="d-flex justify-content-center">No Comments Yet</h3>

                @else

                @foreach($thread->comments as $comment)
                
                <ul id="comments-list" class="comments-list">
                    <li>
                        <div class="comment-main-level">
                            <div class="comment-avatar"><img src="/images/profilePic/{{$comment->user->image}}" alt=""></div>
                            <div class="comment-box">
                                <div class="comment-head">
                                    <h6 class="comment-name"><a href="{{route('profile_show',$comment->user->id)}}">{{$comment->user->name}}</a></h6>
                                    <span>{{$comment->created_at->diffForHumans()}}</span>
                                    @if(auth()->user()->id != $comment->user_id)
                                        
                                    <div class="dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                    


                                    {{-- <div class="dropdown show">

                                        <a class="btn btn-link dropdown-toggle" href="#" role="button" id="dropdownMenuLinkTest" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-bell fa-lg" id="notifbutton"></i>
                                            <span class="badge"> {{count(auth()->user()->unreadNotifications)}} </span>
                                        </a>
                                        
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkTest">
                                            @foreach(auth()->user()->unreadNotifications as $notification)
                                                @include('layouts.notifications')
                                            @endforeach
                                        </div>
                                    </div> --}}


                                    @endif

                                    <button class="border-0 bg-transparent ml-2" onclick="showForm('comment{{$comment->id}}')"> <i class="fa fa-reply"></i></button>
                                    
                                   @if(auth()->user()->id != $comment->user_id)
                                   
                                    <div class="voting">
                                        <form class="unlikeComment">
                                                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                                <input type="hidden" name="vote" value="-1">
                                                <button class="border-0 bg-transparent ml-2" type="submit" name="submit"><i class="fa fa-thumbs-down {{$comment->isUnLiked() ? "clicked" : ""}}" aria-hidden="true"></i></button>
                                        </form>
                                        <!-- Hover Color color: #03658c; -->
                                        <form class="likeComment">
                                                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                                <input type="hidden" name="vote" value="1">
                                                <button class="border-0 bg-transparent ml-2" type="submit" name="submit"><i class="fa fa-thumbs-up {{$comment->isLiked() ? "clicked" : ""}}" aria-hidden="true"></i></button>
                                        </form>
                                    </div>
                                   @endif
                                   
                                   @if(auth()->user()->id == $comment->user_id)
                                        <button class="border-0 bg-transparent ml-2" onclick="editForm('edit{{$comment->id}}','show{{$comment->id}}')"><i class="fas fa-edit"></i></button>
                                        <form action="{{ route('comment.destroy',$comment->id) }}" method="POST" class="inline-it">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button class="border-0 bg-transparent ml-2" type="submit"><i class="fa fa-trash"></i></button>
                                        </form>
                                    @endif

                                </div>
                                <div class="comment-content" id="show{{$comment->id}}">
                                    {!!nl2br(e($comment->body))!!}
                                </div>
                                
                                <div class="comment-content d-none" id="edit{{$comment->id}}">
                                    <form action="{{route('comment.update',$comment->id)}}" method="POST" role="form">
                                        {{csrf_field()}}
                                        {{method_field('put')}}
                                        <textarea type="text" class="form-control" name="body" id="" rows="4" style="resize:none;word-wrap:break-word;">{{$comment->body}}</textarea>
                                        <br>
                                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                                    </form>
                                    <button class="btn btn-primary" onclick="editForm('show{{$comment->id}}','edit{{$comment->id}}')">Close</button>
                                    <br><br>
                                </div>
                            </div>
                        </div>

                        <li>
                            <div class="comment-box d-none" id="comment{{$comment->id}}">
                                <div class="comment-head">
                                    <h5 class="comment-name">Reply Comment</h5>
                                    
                                    <button class="border-0 bg-transparent ml-2" onclick="hideForm('comment{{$comment->id}}')"><i class="fa fa-times" aria-hidden="true"></i></button>
                                </div>
                                <div class="comment-content">
                                    <form action="{{route('replycomment.store',$comment->id)}}" method="POST" role="form">
                                        {{csrf_field()}}
                                        {{method_field('POST')}}
                                        <div class="form-group">
                                            <textarea type="text" class="form-control" name="body" id="" placeholder="Input..." rows="3" style="resize:none;word-wrap:break-word;"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                                        <br><br>
                                    </form>
                                </div>
                            </div>
                        </li>
                        
                        @foreach($comment->comments as $reply)
                        <ul class="comments-list reply-list">
                            <li>
                                <div class="comment-avatar"><img src="/images/profilePic/{{$reply->user->image}}" alt=""></div>
                                <div class="comment-box">
                                    <div class="comment-head">
                                        <h6 class="comment-name"><a href="{{route('profile_show',$reply->user->id)}}">{{$reply->user->name}}</a></h6>
                                        <span>{{$reply->created_at->diffForHumans()}}</span>
                                        @if(auth()->user()->id == $reply->user_id)
                                        <button class="border-0 bg-transparent ml-2" onclick="editForm('editR{{$reply->id}}','showR{{$reply->id}}')"><i class="fas fa-edit"></i></button>
                                        <form action="{{ route('comment.destroy',$reply->id) }}" method="POST" class="inline-it">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button class="border-0 bg-transparent ml-2" type="submit"><i class="fa fa-trash"></i></button>
                                        </form>
                                        @endif
                                    </div>
                                    <div class="comment-content" id="showR{{$reply->id}}">
                                        {!!nl2br(e($reply->body))!!}
                                    </div>
                                    <div class="comment-content d-none" id="editR{{$reply->id}}">
                                        <form action="{{route('comment.update',$reply->id)}}" method="POST" role="form">
                                            {{csrf_field()}}
                                            {{method_field('put')}}
                                            <div class="form-group">
                                                <textarea type="text" class="form-control" name="body" id="" rows="3" style="resize:none;word-wrap:break-word;">{{$reply->body}}</textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                                        </form>
                                        <button class="btn btn-primary" onclick="editForm('showR{{$reply->id}}','editR{{$reply->id}}')">Close</button>
                                        <br><br>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        @endforeach
                    </li>
                </ul>
            @endforeach
            @endif
        </div>
	</div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
    
            $('.likeComment').on('submit',function(e){
                e.preventDefault();
                var parent = $(this).parent()
                var item = $(this);
                var data = $(this).serialize();
                var url = '{{route("likeIt")}}';
                var post = 'POST';
                $.ajax({
                    type : post,
                    url : url,
                    data : data,
                    success:function(data){
                        data = JSON.parse(data);
                        if(data != 1){
                            item.find('.fa-thumbs-up').removeClass('clicked'); 
                        }else{
                            item.find('.fa-thumbs-up').addClass('clicked'); 
                            parent.find('.fa-thumbs-down').removeClass('clicked');
                        }                                   
                    },
                })
            });

            $('.unlikeComment').on('submit',function(e){
                e.preventDefault();
                var parent = $(this).parent()
                var item = $(this);
                var data = $(this).serialize();
                var url = '{{route("unLikeIt")}}';
                var post = 'POST';
                $.ajax({
                    type : post,
                    url : url,
                    data : data,
                    success:function(data){
                        data = JSON.parse(data);
                        if(data != -1){
                            item.find('.fa-thumbs-down').removeClass('clicked'); 
                        }else{
                            item.find('.fa-thumbs-down').addClass('clicked'); 
                            parent.find('.fa-thumbs-up').removeClass('clicked');
                        }
                                                              
                    },
                })
            });

        });

    </script>

@endsection