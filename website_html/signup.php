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
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Oleo+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">

</head>
<body>

    <?php
        $conn = new mysqli("localhost","root","");
        $select = $conn->select_db("Stubu_Database");
        if(!$select){
            echo "<br>Error in Connecting Database";
        }else{
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
    <div class = "col-md-8" id ="rightSide">
        <div class = "container">
            <form onsubmit="" method="POST" action="">
                <div class="form-row">  
                    <div class="col-md-12">
                        <p>USERNAME</p>
                        <input type="text" id="username" name="user_name" placeholder="Enter Username">
                    </div>   
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <p>FIRST NAME</p>
                        <input type="text" id="firstname" name="first_name" placeholder="John">
                    </div>
                    <div class="col-md-6">
                        <p>LAST NAME</p>
                        <input type="text" id="lastname" name="last_name" placeholder="Doe">
                    </div>
                </div>
                <div class = "form-row">
                    <div class="col-md-12">
                        <p>PASSWORD</p>
                        <input type="password" id="password" name="pass_word" placeholder="Enter Password">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <p>CONFIRM PASSWORD</p>
                        <input type="password" id="confirmpassword" name="confirm_password" placeholder="Confirm Password">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                    <p>EMAIL</p>
                        <input type="email" id="email" name="email_address" placeholder="juandelacruz@gmail.com">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <p>MOBILE NUMBER</p>
                        <input type="text" id="mobile" name="mobile_number" placeholder="123456789"><br><br>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <input  type="submit" class="button" name="user" value="Confirm">
                    </div>    
                </div>  
            </form>
        </div>
    </div>
</div>
</body>
</html>