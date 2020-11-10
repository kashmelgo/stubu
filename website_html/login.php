<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Oleo+Script&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Oleo+Script&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">


</head>
<body>

    <?php
        session_start();
        $errormessage = "";
        $username = "Enter Username";
        $conn = new mysqli("localhost","root","");
        $select = $conn->select_db("Stubu_Database");
        if(!$select){
            // echo "<br>Error in Connecting Database";
        }else{
            if(isset($_POST['login'])){
                $username = $_POST['user_name'];
                $password = $_POST['pass_word'];

                $result = $conn->query("SELECT * FROM User WHERE Username = '$username'");
                if($row = $result->fetch_assoc()){
                    if($row['Password'] == $password){
                        $_SESSION['user_id'] = $row['User_ID'];
                        $_SESSION['username'] = $row['Username'];
                        $_SESSION['password'] = $row['Password'];
                        $_SESSION['email'] = $row['Email_address'];
                        $_SESSION['profile_picture'] = $row['Profile_picture'];
                        $_SESSION['first_name'] = $row['First_Name'];
                        $_SESSION['last_name'] = $row['Last_Name'];
                        $_SESSION['mobile_number'] = $row['Mobile_Number'];
                        $_SESSION['date_created'] = $row['Date_Created'];
                        $_SESSION['last_online'] = $row['Last_online'];
                        $_SESSION['user_level'] = $row['User_level'];

                        header("Location: displayProfile.php");

                    }else{
                        $errormessage = "Username or Password Incorrect";;
                    } 
                }else{
                    $errormessage = "Username or Password Incorrect";
                }
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
        <div class = "col-md-8" id ="login">
            <div class = "container">
                <form onsubmit="" method="POST" action="">
                	<div class="form-row"> 
               			 <div class="col-md-12  col-md-offset-1">
                    		<?php echo "<p>USERNAME<i style='color:red'>".$errormessage."</i></p>"?>
                   			<input type="text" class="form-control" id="username" name="user_name"placeholder="Enter Username"><br>
                		</div>
            		</div>
            		<div class="form-row">
            			<div class="col-md-12 col-md-offset-1">
                    		<p>PASSWORD</p>
                    		<input type="password" class="form-control" id="firstname" name="pass_word"placeholder="Enter Password"><br>
                    		<button onclick="signup()" type="submit" class="btn btn-primary" name="signup">Sign Up</button>
                            <input type="submit" class=" btn btn-primary" id="submit" value="Login" name="login">
                    	</div>
                	</div>
                </form>
            </div>
        </div>
    </div>

    <?php
    	if(isset($_POST['signup'])){
    		header('Location: signup.php');
    	}
     ?>
</body>
</html>