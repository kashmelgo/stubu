<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Oleo+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oleo+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    

</head>
<body>

    <?php
        session_start();
        if(!isset($_SESSION['user_id'])){
        	header('Location: login.php');
        }else{
        	$conn = new mysqli("localhost","root","");
	        $select = $conn->select_db("Stubu_Database");
	        if(!$select){
	            echo "<br>Error in Connecting Database";
	        }else{

	        }
        }
    ?>
<!-- <div class ="main-container">
    <div class = "col-md-4" id ="leftSide">
        <div id="leftoSide">   
            <h1> StuBu</h1>
            <h2> A Forum-based System</h2>
            <h3> A system where Carolinians can ask questions</h3>
        </div>
    </div>
    
    <div class = "col-md-8" id ="rightSide-login">
        <div class = "container">
        	<div class="form-row"> 
              	<div class="col-md-12  col-md-offset-1">
                   	<img src="defaultpic.png" width="150px" height="150px"> 
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-5 col-md-offset-1">
                    <p><?php echo $_SESSION['first_name'];?>  <?php echo $_SESSION['last_name'];?></p><br>
                </div>
            </div>
            <div class="form-row"> 
            	<div class="col-md-12  col-md-offset-1">
                   	<p>USERNAME</p>
               		<p><?php echo $_SESSION['username'];?></p><br>
                </div>
            </div>
            
            <div class="form-row"> 
              	<div class="col-md-12  col-md-offset-1">
                    <p>EMAIL</p>
                    <p><?php echo $_SESSION['email'];?></p><br>
                </div>
                <div class="form-row"> 
              		<div class="col-md-12  col-md-offset-1">
            	       	<p>MOBILE NUMBER</p>
                	    <p><?php echo $_SESSION['mobile_number'];?></p><br>
              		</div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header" id="stubu">
    	<h1>StuBu</h1>
    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#micon">
    		<span class="icon-bar"></span>
    		<span class="icon-bar"></span>
    		<span class="icon-bar"></span>
    	</button>
      	
    </div>
    <div class="collapse navbar-collapse" id="micon">
    <ul class="nav navbar-nav navbar-right">
      <li><a href="index.html" style="color: white;">Home</a></li>
      <li><a href="hobbies.html"style="color: white;">Profile</a></li>
      <li><a href="interest.html"style="color: white;">Logout</a></li>
    </ul>
  </div>
  </div>
</nav>

	<div class="container">
		<div class="row">
			
			<div class="col-sm-6">
				<img src="defaultpic.png" class="img-responsive" width="500px">
			</div>

			<div class="col-sm-6">
				<h1>About Me</h1>
				<p> Good day!</p>
				<p>Nunc ut neque eget ante pretium scelerisque vitae id mauris. Etiam lacinia tristique nisi, sed vehicula tellus iaculis nec. Maecenas maximus metus hendrerit, finibus magna sed, tempor nulla. Pellentesque quam tortor, iaculis in ullamcorper at, imperdiet eu risus. Pellentesque bibendum ipsum eu volutpat facilisis. Vivamus justo nisi, vestibulum ut pellentesque eget, maximus sed nisi. Morbi quam orci, auctor vitae ullamcorper sit amet, tristique at diam. Pellentesque volutpat, neque quis euismod tempus, magna ex lobortis sapien, nec fringilla eros dui eget mi. Donec posuere viverra elit, sed pharetra quam auctor eget. Vestibulum pellentesque, sapien quis elementum semper, nunc felis vulputate nulla, sit amet venenatis neque ligula sit amet nulla. Mauris dolor ex, commodo sit amet velit sit amet, vulputate feugiat sapien. Pellentesque lacinia turpis id vulputate laoreet. Mauris pellentesque consequat imperdiet. Praesent ante ex, accumsan vel nibh non, tristique rhoncus massa. Phasellus euismod iaculis purus nec ullamcorper. Nunc ac congue dui. </p>	
			</div>


		</div>
	</div>
    
    
</body>
</html>


