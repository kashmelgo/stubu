@extends(auth()->user()->isAdmin==1? 'layouts.adminapp': 'layouts.app');


@section('content')

<div class="container">
    <div class="row">
        <div class="comments-container">
            
            <div class="comment-main-level">
                <div class="comment-box">
                    <div class="comment-head">
                        <div class="thread-avatar mr-2"><img src="/images/profilePic/{{$thread->user->image}}" alt="" style="height:100%;width:100%"></div>
                        <legend>{{$thread->subject}}</legend>
                        @if(auth()->user()->id != $thread->user_id)   
                            <button class="border-0 bg-transparent ml-2" type="submit" name="submit"><i class="fa fa-flag" aria-hidden="true"></i></button>
                        @endif
                        
                        @if(auth()->user()->id == $thread->user_id || auth()->user()->isAdmin == 1)
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
                                <div class="comment-head py-4" style="overflow: visible">
                                    <h6 class="comment-name"><a href="{{route('profile_show',$comment->user->id)}}">{{$comment->user->name}}</a></h6>
                                    <span>{{$comment->created_at->diffForHumans()}}</span>

                                    @if(auth()->user()->id != $comment->user_id)   
                                    
                                    <button id="{{$comment->id}}" name="{{$comment->commentable_type}}" data-toggle="modal" data-target="#squarespaceModal" class="report border-0 bg-transparent ml-2"><i class="fa fa-flag" aria-hidden="true"></i></button>
                                    @endif

                                    <button  class="border-0 bg-transparent ml-2" onclick="showForm('comment{{$comment->id}}')"> <i class="fa fa-reply"></i></button>
                                    
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


<!-- Report Modal -->
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div id="main_content" class="modal-content">
		<div class="modal-header">
            <h3 class="modal-title" id="lineModalLabel">Report Post</h3>
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
		</div>
        <form class="reportForm">
        {{csrf_field()}}
		<div class="modal-body">
            
                
                <input id="reportID" type="hidden" name="report_id" value="">
                <input id="reportType" type="hidden" name="report_type" value="">
              <div class="form-group">
                <label for="exampleInputEmail1">Help us, What is wrong with this post?</label>
                <br>
                <label id="printID" style="color:red">Test</label>
              </div>
              <div class="checkbox">
                <label>
                  <input id="check1" type="checkbox" name="reasons[]" value="Post is Rude or Offensive"> Post is Rude or Offensive
                </label>
                <br>
                <label>
                    <input id="check2" type="checkbox" name="reasons[]" value="Post is not constructive / obsolete"> Post is not constructive / obsolete
                </label>
                <br>
                <label>
                    <input id="check3" type="checkbox" name="reasons[]" value="Post is too chatty / off-topic"> Post is too chatty / off-topic
                </label>
                <!--
                <br>
                <label><br>Others:</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> 
                <textarea type="text" class="form-control" id="exampleInputEmail1" rows="3" style="resize:none;word-wrap:break-word;" placeholder="Enter Reason"></textarea>
                -->
            </div>
            

		</div>
		<div class="modal-footer">
			<div class="btn-group btn-group-justified" role="group" aria-label="group button">
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
				</div>
				
				<div class="btn-group" role="group">
					<input type="submit" id="saveImage" class="btn btn-primary float-right" data-action="save" role="button" name="Submit" >
				</div>
			</div>
		</div>

        </form>
	</div>

    <div id="submit_content" class="modal-content d-none">
        <div class="modal-header">
            <h3 class="modal-title" id="lineModalLabel">Report Post</h3>
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
		</div>
        <div class="modal-body">
            <label> Our Team will Evaluate the Post for any Violations<br> Thank You for Helping the Site a Better Place </label>
        </div>


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


            $(".report").on("click",function(e){
                var id = $(this).attr("id");
                var type = $(this).attr("name");

                $("#reportID").val(id);
                $("#reportType").val(type);

                $("#main_content").removeClass("d-none");
                $("#submit_content").addClass("d-none");

                $('#check1').prop('checked',false); 
                $('#check2').prop('checked',false);  
                $('#check3').prop('checked',false);     
            });

            $('.reportForm').on('submit',function(e){
                e.preventDefault();
                var modal = $(this).parent().parent();
                var data = $(this).serialize();
                var url = '{{route("report")}}';
                var post = 'POST';
                $.ajax({
                    type : post,
                    url : url,
                    data : data,
                    success:function(data){
                        $("#main_content").addClass("d-none");
                        $("#submit_content").removeClass("d-none");                                                   
                    },
                })
            });



        });

    </script>

@endsection