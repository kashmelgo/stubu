<!DOCTYPE html>
<html>
    <head>
    	<title>Create Database</title>
    </head>
    <body>
    	<h1>Create Database Yayaya</h1>
    	<?php
            $conn = new mysqli("localhost","root","");                 // Directory Location
            $select = $conn->select_db("Stubu_Database");           // Connect to Database
            if(!$select){                                              // Creates Database if Database does not Exist
                $conn->query("CREATE DATABASE Stubu_Database;");    // Add Database Name
                    $conn->select_db('Stubu_Database');                    // Table and Columns Creation
                    $conn->query("CREATE TABLE User(
                        User_ID INT AUTO_INCREMENT PRIMARY KEY,
                        Username VARCHAR(100) NOT NULL,
                        Password NVARCHAR(50) NOT NULL,
                        Email_address VARCHAR(50) NOT NULL,
                        Profile_picture VARCHAR(100) NOT NULL,
                        First_Name VARCHAR(50) NOT NULL,
                        Last_Name VARCHAR(50) NOT NULL,
                        Mobile_Number VARCHAR(14) NOT NULL,
                        Date_Created DATE NOT NULL,
                        Last_online TIMESTAMP NOT NULL,
                        User_level INT NOT NULL
                    )");

                    /* $conn->query("CREATE TABLE Thread(
                        Thread_ID INT AUTO_INCREMENT PRIMARY KEY,
                        User_ID INT NOT NULL,
                        Subject NVARCHAR(50) NOT NULL,
                        Date_Created TIMESTAMP NOT NULL,
                        Last_Reply TIMESTAMP NOT NULL,
                    )"); */

                    $conn->query("CREATE TABLE Post(
                        Post_ID INT AUTO_INCREMENT PRIMARY KEY,
                        User_ID INT NOT NULL,
                        Subject NVARCHAR(50) NOT NULL,
                        Date_Created TIMESTAMP NOT NULL,
                        FOREIGN KEY (User_ID) REFERENCES User(User_ID)
                    )");

                    $conn->query("CREATE TABLE Reply(
                        Reply_ID INT AUTO_INCREMENT PRIMARY KEY,
                        Post_ID INT,
                        Reply_Reply_ID INT,
                        User_ID INT NOT NULL,
                        Content NVARCHAR(50) NOT NULL,
                        Date_Created TIMESTAMP NOT NULL,
                        FOREIGN KEY (Post_ID) REFERENCES Post(Post_ID),
                        FOREIGN KEY (Reply_Reply_ID) REFERENCES Reply(Reply_ID),
                        FOREIGN KEY (User_ID) REFERENCES User(User_ID),
                        CHECK(POST_ID IS NOT NULL OR Reply_Reply_ID IS NOT NULL)
                    )");

                echo "<br>Database successfully Created!";
            }
        ?>
    </body>
</html>