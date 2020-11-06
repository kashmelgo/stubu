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

        $conn = new mysqli("localhost","root","");
        $select = $conn->select_db("Stubu_Database");
        if(!$select){
            echo "<br>Error in Connecting Database";
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

                        // header("Location: index.html"); -----> Connect to Hompage

                        //Kani lang sa display2 sa Login Page gud ha?? HAHAHAH

                        echo "<br>Hello ".$_SESSION['username']."!";

                    }else{
                        $errorpass = "Password Incorrect!";
                    } 
                }else{
                    $erroruser = "Username Doesnt Exist!";
                    $username = "";
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
        <div class = "col-md-8" id ="rightSide">
            <div class = "container">
                <form onsubmit="" method="POST" action="">
                    <p>USERNAME</p>
                    <input type="text" id="username" name="user_name"placeholder="Enter Username">
                    <p>PASSWORD</p>
                    <input type="text" id="firstname" name="pass_word"placeholder="Enter Password">
                    <input type="submit" name="login" value="Login">
                    </form>
            </div>
        </div>
    </div>
</body>
</html>