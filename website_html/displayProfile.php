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
        if(isset($_POST['logout'])){
            session_destroy();
            header('Location: login.php');
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
      <li><a href="displayProfile.php" style="color: white;">Home</a></li>
      <li><a href="displayProfile.php" style="color: white;">Profile</a></li>
      <li><a><form method="POST" action=""><input type="submit" name="logout" value="Log Out" style="color: white;border: none;background-color: #00789E;"></form></a></li>
    </ul>
  </div>
  </div>
</nav>

	<div class="container">
		<div class="row">
			
			<div class="col-sm-6">
				<img src="defaultpic.png" class="img-responsive" width="300px">
			</div>

			<div class="col-sm-6">
				<h1><?php echo $_SESSION['first_name'];?> <?php echo $_SESSION['last_name'];?></h1>
                <p>Email Address: <?php echo $_SESSION['email']?></p>
                <p>Mobile Number: <?php echo $_SESSION['mobile_number']?></p>
                <p>Last Online: a few seconds ago</p>
                <p>Date Created: <?php echo $_SESSION['date_created']?></p>
				<p> Good day!</p>
				<p>Nunc ut neque eget ante pretium scelerisque vitae id mauris. Etiam lacinia tristique nisi, sed vehicula tellus iaculis nec. Maecenas maximus metus hendrerit, finibus magna sed, tempor nulla. Pellentesque quam tortor, iaculis in ullamcorper at, imperdiet eu risus. Pellentesque bibendum ipsum eu volutpat facilisis. Vivamus justo nisi, vestibulum ut pellentesque eget, maximus sed nisi. Morbi quam orci, auctor vitae ullamcorper sit amet, tristique at diam. Pellentesque volutpat, neque quis euismod tempus, magna ex lobortis sapien, nec fringilla eros dui eget mi. Donec posuere viverra elit, sed pharetra quam auctor eget. Vestibulum pellentesque. </p>	
			</div>
		</div>
	</div>   
</body>
</html>


