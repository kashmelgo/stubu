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
}
#info h1{
    text-align: center;
}
#wa{
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 200px;
}

</style>

<div class="container">
    <div class="row">
        <div class="col-md-6" id="info">
                 <h1>{{Auth::user()->name}}</h1>
                 <img src="images/petroglyph.png" class="img-responsive" id="wa">
				<p>Nunc ut neque eget ante pretium scelerisque 
                vitae id mauris. Etiam lacinia tristique nisi, sed 
                vehicula tellus iaculis nec. Maecenas maximus metus 
                hendrerit, finibus magna sed, tempor nulla. Pellentesque 
                quam tortor, iaculis in ullamcorper at, imperdiet eu risus. 
                Pellentesque bibendum ipsum eu volutpat facilisis. Vivamus justo nisi, vestibulum ut pellentesque eget, maximus sed nisi. Morbi quam orci, auctor vitae ullamcorper sit amet, tristique at diam. Pellentesque volutpat, neque quis euismod tempus, magna ex lobortis sapien, nec fringilla eros dui eget mi. Donec posuere viverra elit, sed pharetra quam auctor eget. Vestibulum pellentesque. </p>	
            </div>   

        <div class="col-md-6" id="info">
            <h1>Contact Details</h1>
                <p>Email Address: asdasd1dasd</p>
                <p>Mobile Number: asdasdasd</p>
                <p>Last Online: a few seconds ago</p>
                <p>Date Created: asdasd</p>
            </div>   
    </div> 
</div>



@endsection
