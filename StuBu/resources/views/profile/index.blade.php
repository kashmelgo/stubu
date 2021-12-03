@extends(auth()->user()->isAdmin==1? 'layouts.adminapp': 'layouts.app');

@section('content')
<div class="container">
    <div class="main-body">
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="/images/profilePic/{{$user->image}}" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>{{$user->name}}</h4>
                      <p class="text-secondary mb-1">Reputation: {{$user->reputation}}</p>
                      <p class="text-muted font-size-sm">{{$user->about_me}}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$user->name}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$user->email}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$user->mobile_number}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Joined</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$user->created_at}}
                    </div>
                  </div>
                  <hr>
                  @if(auth()->user()->id==$user->id)
                  <div class="row">
                    <div class="col-sm-12">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
                            Edit Profile
                        </button>
                    </div>
                  </div>
                  @endif
                </div>
              </div>

              <div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                    @if(auth()->user()->id==$user->id)
                          <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Posts</i>Your Latest Threads</h6>
                         @else
                          <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Posts</i>{{$user->name}}'s Latest Threads</h6>
                         @endif
                     @forelse($threads as $thread)
                         @if(auth()->user()->id==$user->id)
                <p >You Created a Thread  <a href="{{ route('thread.show',$thread->id)}}" style="color: #0a99d1"> "{{$thread->subject}}"</a> {{$thread->created_at->diffForHumans()}}</p> <br>
                @else
                <p >{{$user->name}} Created a Thread  <a href="{{ route('thread.show',$thread->id)}}" style="color: #0a99d1"> "{{$thread->subject}}"</a> {{$thread->created_at->diffForHumans()}}</p> <br>
                @endif
                @empty
                <p class="d-flex justify-content-center">No Threads Yet </p><br>
        @endforelse
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                         @if(auth()->user()->id==$user->id)
                          <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Comments</i>Your Latest Comments</h6>
                         @else
                          <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2" >Comments</i>{{$user->name}}'s Latest Comments</h6>
                         @endif
               
                      @forelse($comments as $comment)
                     @if(auth()->user()->id==$user->id)
                         <p >You commented on <a href="{{ route('thread.show',$comment->commentable->id)}}" style="color: #0a99d1">"{{$comment->commentable->subject}}"</a> {{$comment->created_at->diffForHumans()}}</p>
                    @else
                         <p>{{$user->name}} commented on <a href="{{ route('thread.show',$comment->commentable->id)}}" style="color: #0a99d1">"{{$comment->commentable->subject}}"</a> {{$comment->created_at->diffForHumans()}}</p>
                     @endif

                     @empty
                        <p class="d-flex justify-content-center"> No Comments Made </p>
                    @endforelse
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <!-- THIS WHAT WILL SHOW WHEN EDIT PROFILE IS CLICKED -->
    <div class="modal fade bd-example-modal-lg"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
             <div class="modal-content">
                <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Edit Profile</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                             </button>
                </div>
                           <div class="modal-body">
                              <form action="update" method="POST" enctype="multipart/form-data">
                                     @csrf
                                     <div class="form-group row">
                                          <label class="col-md-4 col-form-label text-md-right">Your Current Pic</label>
                                       <div class="col-md-6">
                                        <img src="/images/profilePic/{{Auth::user()->image}}" class="img-responsive" id="wa" width="150">
                                    </div>
                                    </div>

                                     <div class="form-group row">
                                          <label class="col-md-4 col-form-label text-md-right">Choose Pic</label>
                                       <div class="col-md-6">
                                            <input type="file" name="image"><br>
                                    </div>
                                    </div>

                                    <div class="form-group row">
                                        <label  class="col-md-4 col-form-label text-md-right" >Name</label>

                                       <div class="col-md-6">
                                             <input type="text" name="name" value="{{ Auth::user()->name}}">
                                      </div>
                                 </div>

                               <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Phone Number</label>

                                  <div class="col-md-6">
                                       <input type="text" name="mobile_number" value="{{ Auth::user()->mobile_number}}">
                                 </div>
                              </div>

                               <div class="form-group row">
                                  <label for="about_me" class="col-md-4 col-form-label text-md-right">About Yourself</label>

                                 <div class="col-md-6">
                                      <textarea name="about_me" rows="10" cols="65" >{{ Auth::user()->about_me}}</textarea>
                                </div>
                             </div>

                             <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" name="submit" id="submit_form">
                     </div>
                             </form>
                         </div>
        </div>
    </div>
</div> 




@endsection
