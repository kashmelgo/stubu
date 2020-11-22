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
            
		</div>
	</div>   
</body>
</html>


