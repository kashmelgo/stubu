<!DOCTYPE html>
<html>
<head>
    <title>Signup Page</title>

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
<div class ="main-container">
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
                   	<p>USERNAME</p>
                	<?php echo $_SESSION['username'];?><br>
                </div>
            </div>
            <div class="form-row"> 
            	<div class="col-md-12  col-md-offset-1">
                   	<p>USERNAME</p>
               		<?php echo $_SESSION['username'];?><br>
                </div>
            </div>
            <div class="form-row">
              	<div class="col-md-5 col-md-offset-1">
                    <p>FIRST NAME</p>
                    <?php echo $_SESSION['first_name'];?><br>
                </div>
                <div class="col-md-5 col-md-offset-1">
                    <p>LAST NAME</p>
                    <?php echo $_SESSION['last_name'];?><br>
                </div>
            </div>
            <div class="form-row"> 
              	<div class="col-md-12  col-md-offset-1">
                    <p>EMAIL</p>
                    <?php echo $_SESSION['email'];?><br>
                </div>
                <div class="form-row"> 
              		<div class="col-md-12  col-md-offset-1">
            	       	<p>MOBILE NUMBER</p>
                	    <?php echo $_SESSION['mobile_number'];?><br>
              		</div>
                </div>
            </div>
        </div>
    </div>
</div>
    
    
</body>
</html>


