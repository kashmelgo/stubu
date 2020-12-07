@extends('layouts.app')

@section('content')
<style>
#info{

  background-color: #00789E;
  border-style:solid;
  border-color:white;
  border-radius: 25px;
  margin-bottom:20px;
  color: white;
  text-align: justify;
}
#info h1{
    text-align: center;
}
#info h2{
    text-align: center;
}
#info p{
    margin-top:20px;
}
#info h5{
    text-align: center;
    margin-top:10px;
    padding-top:10px;
    padding-bottom:10px;
    margin-bottom:10px;
    background-color: #00B8AB;
    border-radius:25px;
}
#wa{
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 200px;
}
#about_me{
    width:400px;
    height:500px;
}
.container1 { 
  height: 50px;
  position: relative;
 
}

.center {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  /* -ms-transform: translate(-50%, -50%); */
  transform: translate(-50%, -50%);
}
.center button{
    font-size: 15px;
    padding-top:10px;
    padding-bottom:10px;
    padding-left:10px;
    padding-right:10px;
    background-color:#00B8AB;
    border-radius:25px;

}
#submit_form{
    background-color:#00B8AB;
}


    </style>





<div class="container">
    <div class="row">
        <div class="col-md-6" id="info">
              <div class="row">
                <div class="col-md-6">
                  
                    <h1>{{ Auth::user()->name}}</h1>
                    

                    <img src="images/profilePic/{{Auth::user()->image}}" class="img-responsive" id="wa">
                    <h5>Reputation: {{ Auth::user()->reputation}} </h5>
                </div>
            <div class="col-md-6">
                <h2>About Me </h2>
                
				<p>{{ Auth::user()->about_me}} </p>	
             </div>
         </div>   
      </div>

        <div class="col-md-6" id="info">
            <h1>Contact Details</h1>
                <p>Email Address: {{Auth::user()->email}}</p>
                <p>Mobile Number:{{ Auth::user()->mobile_number}} </p>
                <p>Date Created: {{Auth::user()->created_at}}</p>

                   


            </div>   
    </div> 


    <div>
        <h3> {{$user->name}}'s latest Thread</h3>

        @forelse($threads as $thread)
                <h5>{{$thread->subject}}</h5>

        @empty
                <h5>No Threads Yet </h5>

        @endforelse

        <b4>
        <hr>

        <h3>{{$user->name}}'s latest Comments </h3>

        @forelse($comments as $comment)
            <h5>{{$user->name}} commented on <a href="{{ route('thread.show',$comment->commentable->id)}}"> {{$comment->commentable->body}}</a> {{$comment->created_at->diffForHumans()}}</h5>
        @empty
            <h5> No Comments Yet </h5>
        
        @endforelse

    </div>
  
</div>

    
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
                                        <img src="images/profilePic/{{Auth::user()->image}}" class="img-responsive" id="wa">
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
                                      <label class="col-md-4 col-form-label text-md-right">Change Password</label>

                                      <div class="col-md-6">
                                         <input type="text" name="password">
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


<div class="container1">
    <div class="center">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
        Edit Profile
        </button>
       
        </div>
</div>



  



@endsection
