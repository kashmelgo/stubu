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

        if(isset($_POST['edit'])){
            $files = $_FILES['file'];
                
            $filename = $files['name'];                 //File Information
            $type = $files['type'];
            $tmp = $files['tmp_name'];
            $error = $files['error'];
            $size = $files['size'];

            $location = 'images/'.$filename;           // Folder is Created beforehand

            move_uploaded_file($tmp, $location);           // Moves the Submitted File to a designated Folder
                
                
            $sql = "UPDATE User
                    SET Profile_picture = '$tmp'
                    WHERE User_ID == $_SESSION['User_ID']";

            $conn->query($sql); 
        }
    ?>

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
			
			<div class="col-sm-4">
				<img src="defaultpic.png" class="img-responsive" width="300px">
                <br>
                <?php
                    if(isset($_POST['edit'])){
                        echo "<form method='POST' action='' enctype='multipart/form-data'>
                            <input type = 'file' name='file' required>
                            <input type='submit' name='submit'>
                        </form>";
                    }else{
                        echo "<form method='POST' action=''>
                    <input type='submit' name='edit' value='Edit Image'>
                </form>";
                    }
                ?>
			</div>

			<div class="col-sm-8">
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


