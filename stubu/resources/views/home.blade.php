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

</style>

<div class="container">
    <div class="row">
        <div class="col-md-6" id="info">
              <div class="row">
                <div class="col-md-6">
                    <h1>{{Auth::user()->name}}</h1>

                    <img src="images/profilePic/defaultPic.jpg" class="img-responsive" id="wa">
                    <h5>Reputation:123</h5>
                </div>
            <div class="col-md-6">
                <h2>About Me </h2>
                
				<p>Nunc ut neque eget ante pretium scelerisque 
                vitae id mauris. Etiam lacinia tristique nisi, sed 
                vehicula tellus iaculis nec. Maecenas maximus metus 
                hendrerit, finibus magna sed, tempor nulla. Pellentesque 
                quam tortor, iaculis in ullamcorper at, imperdiet eu risus. 
                Pellentesque bibendum ipe. </p>	
             </div>
         </div>   
      </div>

        <div class="col-md-6" id="info">
            <h1>Contact Details</h1>
                <p>Email Address: {{Auth::user()->email}}</p>
                <p>Mobile Number: </p>
                <p>Date Created: {{Auth::user()->created_at}}</p>
  
            </div>   
    </div> 
</div>

    
    
 <div class="container collapse" id="profile_form" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

    <form action="submit" method="POST" enctype="multipart/form-data">
    @csrf
        Choose Profile Pic: <input type="file" name="image"><br>
        Enter Number: <input type="text" name="mobile_number"><br>
        <input type="hidden" name="user_id" value='{{Auth::user()->id}}'>
        <textarea name="about_me" rows="10" cols="100">About Yourself...</textarea>
        <input type="Submit" name="submit">
    </form>


</div>

<div class="container1">
    <div class="center">
    <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#profile_form">
        Edit Profile
        </button>
        </div>
</div>

@endsection
