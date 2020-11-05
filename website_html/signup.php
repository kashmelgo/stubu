<!DOCTYPE html>
<html>
<head>
	<title>Signup Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

 
<div class = "main-container">
    <div class ="row" id="rowLogSign">
    <?php
        $conn = new mysqli("localhost","root","");
        $select = $conn->select_db("Stubu_Database");
        if(!$select){
            echo "<br>Error in Connecting Database";
        }else{
            echo "<br>Database connected Successfully!";
            if (isset($_POST['user'])){
                $username = $_POST['user_name'];  
                $firstname = $_POST['first_name'];
                $lastname = $_POST['last_name'];
                $password = $_POST['pass_word'];  
                $email = $_POST['email_address'];
                $datecreated = date("Y-m-d");
                $lastlogin = date("Y-m-d");
                $mobileNumber = $_POST['mobile_number'];
                $sql = "INSERT INTO User VALUES ('','$username','$password','$email','defaultPic','$firstname','$lastname','$mobileNumber','$datecreated','$lastlogin','0')";
                $conn->query($sql);                                     // Connect inputted data to database
                echo "<br>User Successfully Added";
            }
        }
    ?>

    <div class ="row">
        <div class = "col-md-4" id ="leftSide">
            <div class="container">   
                <h1> StuBu</h1>
                <h2> A Forum-based System</h2>
                <h3> A system where Carolinians can ask questions</h3>
            </div>
        </div>
        <div class = "col-md-8" id ="rightSide">
            <div class = "container">
                <form action="" method="POST">
                    <p>USERNAME</p>
                    <input type="text" id="username" name="user_name" placeholder="Enter Username">
                    <p>FIRST NAME</p>
                    <input type="text" id="firstname" name="first_name" placeholder="John">
                    <p>LAST NAME</p>
                    <input type="text" id="lastname" name="last_name" placeholder="Doe">
                    <p>PASSWORD</p>
                    <input type="password" id="password" name="pass_word" placeholder="Enter Password">
                    <p>CONFIRM PASSWORD</p>
                    <input type="password" id="confirmpassword" name="confirm_password" placeholder="Confirm Password">
                    <p>EMAIL</p>
                    <input type="email" id="email" name="email_address" placeholder="juandelacruz@gmail.com">
                    <p>MOBILE NUMBER</p>
                    <input type="text" id="mobile" name="mobile_number" placeholder="123456789"><br><br>
                    <input  type="submit" class="button" name="user" value="Confirm">
                    </form>
            </div>
        </div>
    </div>
</div>
    

</body>
</html>